<?php

namespace App\Controllers;

class AddClass extends BaseController {
    public function __construct() {
        helper(['url', 'form', 'Form']);
    }

    public function index() {
        return view('insert/add_class');
    }

    public function save() {
        $validation = $this->validate([
            'ClassName' => 'required',
            'ClassID' => 'required|min_length[1]|max_legngth[20]|is_unique[Class.ClassID]',
        ]);

        if (!$validation) {
            return view('insert/add_class', ['validation'=>$this->validator]);
        }
        else {
            $classname = $this->request->getPost('ClassName');
            $classid = $this->request->getPost('ClassID');

            $values = [
                'ClassName' => $classname,
                'ClassID' => $classid,
            ];

            $classModel = new \App\Models\ClassModel();
            $query = $classModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'An error has occurred.');
            }
            else {
                $query->insertID();
                return redirect()->to('/insert/add_class')->with('success', 'Class has successfully been added.');
            }
        }
    }
}
