<?php

namespace App\Controllers;

class AddStudent extends BaseController {
    public function __construct() {
        helper(['url', 'form', 'Form']);
    }

    public function index() {
        return view('insert/add_student');
    }

    public function register() {
        return view('auth/register');
    }

    public function save() {
        $validation = $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'studentid' => 'required|min_length[1]|max_length[20]|is_unique[Student.StudentID]',
        ]);

        if (!$validation) {
            return view('insert/add_student', ['validation'=>$this->validator]);
        }
        else {
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $studentid = $this->request->getPost('studentid');
            
            $values = [
                'FirstName' => $fname,
                'LastName' => $lname,
                'StudentID' => $studentid,
            ];

            $studentModel = new \App\Models\StudentModel();
            $query = $studentModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'An error has occurred.');
            }
            else {
                //$builder->insert($values);
                return redirect()->to('/dashboard')->with('success', 'Student has successfully been added.');
            }
        }
    }
}