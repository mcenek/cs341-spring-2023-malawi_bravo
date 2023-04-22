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
		$classQuery = $this->request->getPost('query');
        $classID = $this->request->getPost('classID');
		$classInfo = $classModel->like('ClassName', $classQuery)->findAll();
		$data['result'] = $classInfo;

		return view('AssignClass/chooseClass', $data);
	}

    public function selectClass() {
        $classID = $this->request->getPost('classID');
        //TODO: Pass in list of every student ID that is enrolled in the class
        //$data['classID'] = $classID;
        return view('AssignClass/classSelected', $data);
    }
}

