<?php

namespace App\Controllers;

/*
    - AddStudent
 
    This controls the page in which a student is added. Functionality includes constructing
    the page to display and saving the data once input fields are inserted.
*/
class AddStudent extends BaseController {
    public function __construct() {
        helper(['url', 'form', 'Form']);
    }

    public function index() {
        return view('insert/add_student');
    }

    // save the class based on input fields
    public function save() {
        // validate input
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
            
            // generate the data array to be inserted
            $values = [
                'FirstName' => $fname,
                'LastName' => $lname,
                'StudentID' => $studentid,
                'DOB' => $dob,
                'FamilyContact' => $fcontact,
                'FamilyAddress' => $faddress,
            ];

            // save the class into the database
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