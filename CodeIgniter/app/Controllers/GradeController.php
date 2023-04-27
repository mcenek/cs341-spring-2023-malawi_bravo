<?php

namespace App\Controllers;

/*
    - AddStudent
 
    This controls the page in which a student's grade for a specific class can be edited. Functionality of this
    class includes displaying the initial page with grades, changing the grade fields to text boxes, and submitting
    the form to the database to save grades.
*/
class GradeController extends BaseController {

    // displays the initial page
    public function index($classId) {
        // create 3 models to grab data from all
        $scheduleModel = new \App\Models\ScheduleModel();
        $classModel = new \App\Models\ClassModel();
        $studentModel = new \App\Models\StudentModel();
        // get data from models to process
        $scheduleInfo = $scheduleModel->where('ClassID', $classId)->findAll();
        $classInfo = $classModel->where('ClassID', $classId)->findAll();
        $length = sizeof($scheduleInfo);
        // loop through schedule to find all students where classid matches
        for($i = 0; $i < $length; $i++){
            $studentId = $scheduleInfo[$i]['StudentID'];
            $studentInfo = $studentModel->where('StudentID', $studentId)->findAll();
            $scheduleInfo[$i]['StudentID'] = $studentInfo[0]['FirstName'];
            $scheduleInfo[$i]['ClassID'] = $studentInfo[0]['LastName'];
        }
        
        // create the info to display to the screen and return it to display
	    $data['classId'] = $classId;
        $data['result'] = $scheduleInfo;
        $data['className'] = $classInfo[0]['ClassName'];
        return view('grade_access/results.php', $data);
    }

    // changes the fields to text boxes (same as index, but loads the edit page with the data.)
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

    // submit the updated grades to the database
    public function submit($classId) {
        // create the 3 models to be processed
        $scheduleModel = new \App\Models\ScheduleModel();
        $classModel = new \App\Models\ClassModel();
        $studentModel = new \App\Models\StudentModel();

        // get the post input value array (holds the grades)
        $newGrades = $this->request->getPost('grade') ?? [];

        // find the students matching the class for info
        $scheduleInfo = $scheduleModel->where('ClassID', $classId)->findAll();
        $classInfo = $classModel->where('ClassID', $classId)->findAll();
        $length = sizeof($scheduleInfo);
        for($i = 0; $i < $length; $i++){
            // build the data to submit into the database
            $values = [
				'StudentID' => $scheduleInfo[$i]['StudentID'],
				'ClassID' => $classId,
                'Grade' => $newGrades[$i]
			];
            // clear the entire entry that already exits and re-input an entry with the exact same field but different grade
            $scheduleModel->where('StudentID', $scheduleInfo[$i]['StudentID'])->where('ClassID', $classId)->delete();
            $scheduleModel->insert($values);
        }
        
        // redirect to the edit grades intitial page
        return redirect()->to('/editGrades/result/'. $classId)->with('success', 'grades saved');
    }
    
}
