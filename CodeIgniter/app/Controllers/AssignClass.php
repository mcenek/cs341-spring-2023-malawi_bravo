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
		$studentID = $this->request->getPost('addStudent');
		$classID = $this->request->getPost('classID');

		$values = [
			'StudentID' => $studentID,
			'ClassID' => $classID,
		];

		/*
			- populate checkboxes with students already enrolled
			- click on checkboxes to add new students
			- click save and loop through list (if not in database, add them)
			- success or error
		*/

		$scheduleModel = new \App\Models\ScheduleModel();
		$query = $scheduleModel->insert($values);

		if (!$query) {
			return redirect()->back()->with('fail', 'An error has occurred.');
		}
		else {
			//$builder->insert($values);
			return redirect()->back()->with('success', 'Student(s) successfully been added to the class.');
		}
	}
}


