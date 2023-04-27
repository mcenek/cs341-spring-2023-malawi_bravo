<?php

namespace App\Controllers;

/*
    - AddClass

    This controls the page in which a class is added. Functionality includes constructing
    the page to display and saving the data once input fields are inserted.
*/
class AddClass extends BaseController {
    public function __construct() {
        helper(['url', 'form', 'Form']);
    }

    public function index() {
        return view('insert/add_class');
    }

    // Saves the class based on the input fields
    public function save() {
        // validate input text fields
        $validation = $this->validate([
            'cname' => 'required',
            'classid' => 'required|min_length[1]|max_length[20]|is_unique[Class.ClassID]',
        ]);
        if (!$validation) {
            return view('insert/add_class', ['validation'=>$this->validator]);
        }
        else {
            $classname = $this->request->getPost('cname');
            $classid = $this->request->getPost('classid');

            // generate the data to be inserted
            $values = [
                'ClassName' => $classname,
                'ClassID' => $classid,
            ];

            // save the new class into the database
            $classModel = new \App\Models\ClassModel();
            $query = $classModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'An error has occurred.');
            }
            else {
                return redirect()->back()->with('success', 'Class has successfully been added.');
            }
        }
    }
}
