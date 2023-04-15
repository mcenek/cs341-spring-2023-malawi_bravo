<?php

namespace App\Controllers;

class AssignClass extends BaseController {
	public function index(){
		$studentModel = new \App\Models\StudentModel();
		$data['result'] = $studentModel->findAll();
		return view('AssignClass/classSelected', $data);
	}
	public function search(){
		$studentModel = new \App\Models\StudentModel();
		$studentId = $this->request->getPost('query');
		$studentInfo = $studentModel->where('StudentId', $studentId)->findAll();
		$data['result'] = $studentInfo;
		return view('AssignClass/classSelected', $data);
	}
}

