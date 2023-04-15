<?php

namespace App\Controllers;

class GradeController extends BaseController {
    public function index($classId) {
        $scheduleModel = new \App\Models\ScheduleModel();
        $classInfo = $scheduleModel->where('ClassId', $classId)->findAll();
        $data['result'] = $classInfo;

        print($classInfo);
        return view('grade_access/results.php', $data);
    }

    
}