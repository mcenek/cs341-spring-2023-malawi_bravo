<?php

namespace App\Controllers;

class AddStudent extends BaseController {
    public function __construct() {
        helper(['url', 'form', 'Form']);
    }

    public function index() {
        return view('insert/add_student');
    }

    public function save() {
        $validation = $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'studentid' => 'required|max_length[20]|is_unique[Student.StudentID]',
            'dob' => 'required|valid_date',
            'fcontact' => 'required',
            'faddress' => 'required|valid_email',
        ]);

        if (!$validation) {
            return view('insert/add_student', ['validation'=>$this->validator]);
        }
        else {
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $studentid = $this->request->getPost('studentid');
            $dob = $this->request->getPost('dob');
            $fcontact = $this->request->getPost('fcontact');
            $faddress = $this->request->getPost('faddress');
            
            $values = [
                'FirstName' => $fname,
                'LastName' => $lname,
                'StudentID' => $studentid,
                'DOB' => $dob,
                'FamilyContact' => $fcontact,
                'FamilyAddress' => $faddress,
            ];

            $studentModel = new \App\Models\StudentModel();
            $query = $studentModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'An error has occurred.');
            }
            else {
                //$builder->insert($values);
                return redirect()->back()->with('success', 'Student has successfully been added.');
            }
        }
    }
}