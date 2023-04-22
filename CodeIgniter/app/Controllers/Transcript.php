<?php

namespace App\Controllers;

class Transcript extends BaseController
{
    //$this->load->library('table');
    public function result()
    {
        //this will take the Name of a student as a parameter
        //then return the correspoonding student info to the data
        $studentModel = new \App\Models\StudentModel();
        $studentId = 1234;
        $userInfo = $studentModel->find($studentId);

        $classes = [
            ['Course' => 'Mathematics', 'Grade' => 98],
            ['Course' => 'Biology', 'Grade' => 80],
            ['Course' => 'Life Skills/Social Studies', 'Grade' => 90],
            ['Course' => 'Bible Knowledge', 'Grade' => 98],
            ['Course' => 'History', 'Grade' => 98],
            ['Course' => 'Chemistry', 'Grade' => 98],
            ['Course' => 'Chichewa', 'Grade' => 98],
            ['Course' => 'English', 'Grade' => 98],
            ['Course' => 'Computer Studies', 'Grade' => 98],
            ['Course' => 'Geography', 'Grade' => 98],
            ['Course' => 'Agriculture', 'Grade' => 98],
            ['Course' => 'Physics', 'Grade' => 98],
        ];
        $name = $userInfo['FirstName'] . " " . $userInfo['LastName'];
        $data = [
            'studentName' => $name,
            'studentId' => $studentId,
            'classStanding' => $userInfo['ClassStanding'],
            'classes' => $classes
        ];
        
        return view('transcript/result', $data);
    }

}
