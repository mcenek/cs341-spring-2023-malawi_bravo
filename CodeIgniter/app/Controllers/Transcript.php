<?php

namespace App\Controllers;

class Transcript extends BaseController
{

    public function search()
    {
        $studentModel = new \App\Models\StudentModel();
        $query = $this->request->getPost('query');
        $students = $studentModel->like('LastName', $query)->findAll();
        return view('transcript/selectStudent', ['result' => $students]);
    }

    public function selectStudent()
    {
        $studentModel = new \App\Models\StudentModel();
        $students = $studentModel->findAll();
        return view('transcript/selectStudent', ['result' => $students]);
    }

    public function showTranscript()
{
    $studentModel = new \App\Models\StudentModel();
    $scheduleModel = new \App\Models\ScheduleModel();
    $classModel = new \App\Models\ClassModel();

    $studentId = $this->request->getPost('student_id'); // Get student ID from form submission
    $student = $studentModel->find($studentId);
    $studentName = "{$student['FirstName']} {$student['LastName']}";

    // Fetch the classes the student is enrolled in
    $enrolledClassIds = $scheduleModel->where('StudentID', $studentId)->findColumn('ClassID');
    $enrolledClasses = $scheduleModel->select('Schedule.Grade, Class.ClassName')
                             ->join('Class', 'Class.ClassID = Schedule.ClassID')
                             ->whereIn('Schedule.ClassID', $enrolledClassIds)
                             ->where('Schedule.StudentID', $studentId)
                             ->findAll();

    $data = [
        'studentName' => $studentName,
        'studentId' => $studentId,
        'classStanding' => $student['ClassStanding'],
        'classes' => $enrolledClasses,
    ];

    return view('transcript/result', $data);
}

}