<?php

namespace App\Controllers;

class GradeController extends BaseController {
    public function index($classId) {
        $scheduleModel = new \App\Models\ScheduleModel();
        $classModel = new \App\Models\ClassModel();
        $studentModel = new \App\Models\StudentModel();
        $scheduleInfo = $scheduleModel->where('ClassID', $classId)->findAll();
        $classInfo = $classModel->where('ClassID', $classId)->findAll();
        $length = sizeof($scheduleInfo);
        for($i = 0; $i < $length; $i++){
            $studentId = $scheduleInfo[$i]['StudentID'];
            $studentInfo = $studentModel->where('StudentID', $studentId)->findAll();
            $scheduleInfo[$i]['StudentID'] = $studentInfo[0]['FirstName'];
            $scheduleInfo[$i]['ClassID'] = $studentInfo[0]['LastName'];
        }
           
	    $data['classId'] = $classId;
        $data['result'] = $scheduleInfo;
        $data['className'] = $classInfo[0]['ClassName'];
        return view('grade_access/results.php', $data);
    }
    public function edit($classId) {
        $scheduleModel = new \App\Models\ScheduleModel();
        $classModel = new \App\Models\ClassModel();
        $studentModel = new \App\Models\StudentModel();
        $scheduleInfo = $scheduleModel->where('ClassID', $classId)->findAll();
        $classInfo = $classModel->where('ClassID', $classId)->findAll();
        $length = sizeof($scheduleInfo);
        for($i = 0; $i < $length; $i++){
            $studentId = $scheduleInfo[$i]['StudentID'];
            $studentInfo = $studentModel->where('StudentID', $studentId)->findAll();
            $scheduleInfo[$i]['StudentID'] = $studentInfo[0]['FirstName'];
            $scheduleInfo[$i]['ClassID'] = $studentInfo[0]['LastName'];
        }
           
	    $data['classId'] = $classId;
        $data['result'] = $scheduleInfo;
        $data['className'] = $classInfo[0]['ClassName'];
        return view('grade_access/edit.php', $data);
    }

    public function submit($classId) {
        $scheduleModel = new \App\Models\ScheduleModel();
        $classModel = new \App\Models\ClassModel();
        $studentModel = new \App\Models\StudentModel();

        $newGrades = $this->request->getPost('grade') ?? [];

        $scheduleInfo = $scheduleModel->where('ClassID', $classId)->findAll();
        $classInfo = $classModel->where('ClassID', $classId)->findAll();
        $length = sizeof($scheduleInfo);
        for($i = 0; $i < $length; $i++){
            $values = [
				'StudentID' => $scheduleInfo[$i]['StudentID'],
				'ClassID' => $classId,
                'Grade' => $newGrades[$i]
			];
            $scheduleModel->where('StudentID', $scheduleInfo[$i]['StudentID'])->where('ClassID', $classId)->delete();
            $scheduleModel->insert($values);
        }
        
        return redirect()->to('/editGrades/result/'. $classId)->with('success', 'grades saved');
    }
    
}
