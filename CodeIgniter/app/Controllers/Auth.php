<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function __construct(){
        helper(['url', 'form', 'Form']);
    }
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }
    public function save() {

        $validation = $this->validate([
            'name'=>'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        ]);

        if (!$validation) {
            return view('auth/register', ['validation'=>$this->validator]);
        } else {

            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' =>$name,
                'email'=>$email,
                'password'=>$password,
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
                //return redirect()->to('auth/register')->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('auth')->with('success', 'You are now registered successfully');
            }
        }
    }
}
