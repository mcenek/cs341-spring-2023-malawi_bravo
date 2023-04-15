<?php

namespace App\Controllers;

class AssignStudent extends BaseController {
    public function index() {
        $classModel = new \App\Models\ClassModel();
        $data['result'] = $classModel->findAll();
        return view('AssignClass/chooseClass', $data);
    }

    public function search(){
		$classModel = new \App\Models\ClassModel();
		$classId = $this->request->getPost('query');
		$classInfo = $classModel->where('ClassID', $classId)->findAll();
		$data['result'] = $classInfo;
		return view('AssignClass/chooseClass', $data);
	}
}

