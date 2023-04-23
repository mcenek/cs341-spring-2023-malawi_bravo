<?php

namespace App\Controllers;

class AssignClass extends BaseController {
	public function index(){
		$studentModel = new \App\Models\StudentModel();
		$scheduleModel = new \App\Models\ScheduleModel();
		$classModel = new \App\Models\ClassModel();
		$className = $this->request->getPost('className');
		$classID = $this->request->getPost('classID');
	
		// Join ScheduleModel with StudentModel and filter by classID
		$studentsInClass = $scheduleModel
			->select('Student.StudentID') // Select only StudentID
			->join('Student', 'Student.StudentID = Schedule.StudentID')
			->where('Schedule.ClassID', $classID)
			->findAll();
	
		// Extract student ids into an array
		$studentIdsInClass = array_column($studentsInClass, 'StudentID');
	
		$studentAll = $studentModel->findAll();
		$data = [
			'result' => $studentAll,
			'className' => $className,
			'classID' => $classID,
			'checked' => $studentIdsInClass, // Pass student ids array
		];
	
		return view('AssignClass/classSelected', $data);
	}
	

	public function search(){
		$studentModel = new \App\Models\StudentModel();
		$studentQuery = $this->request->getPost('query');
		$className = $this->request->getPost('className');
		$studentInfo = $studentModel->like('LastName', $studentQuery)->findAll();
		$data = [
			'result'=> $studentInfo,
			'className' => $className,
		];
		return view('AssignClass/classSelected', $data);
	}

	public function save() {
		$studentIDs = $this->request->getPost('student') ?? [];
		$classID = $this->request->getPost('classID') ?? [];
	
		$scheduleModel = new \App\Models\ScheduleModel();
		$currentEnrolledStudents = $scheduleModel->where('ClassID', $classID)->findColumn('StudentID') ?? [];
	
		$studentsToAdd = array_diff($studentIDs, $currentEnrolledStudents);
		$studentsToRemove = array_diff($currentEnrolledStudents, $studentIDs);
	
		$success = true;
	
		// Add new students to the class
		foreach ($studentsToAdd as $studentID) {
			$values = [
				'StudentID' => $studentID,
				'ClassID' => $classID,
			];
	
			if (!$scheduleModel->insert($values)) {
				$success = false;
				break;
			}
		}
	
		// Remove students from the class
		if ($success) {
			foreach ($studentsToRemove as $studentID) {
				if (!$scheduleModel->where('StudentID', $studentID)->where('ClassID', $classID)->delete()) {
					$success = false;
					break;
				}
			}
		}
		//TODO: Display success or error message depending on outcome
		if (!$success) {
			return redirect()->to('/dashboard')->with('fail', 'An error has occurred.');
		} else {
			return redirect()->to('/dashboard')->with('success', 'Roster has been successfully updated.');
		}
		
	}
}