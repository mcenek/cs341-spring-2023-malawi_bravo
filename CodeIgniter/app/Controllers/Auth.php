<?php

namespace App\Controllers;

use App\Libraries\Hash;
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
                'password'=>Hash::make($password),
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
                //return redirect()->to('auth/register')->with('fail', 'Something went wrong');
            } else {
                //return redirect()->to('auth/register')->with('success', 'You are now registered successfully');
                $last_id = $usersModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard');
            }
        }
    }

    function check() {
        // Check if there's a lockout timestamp in the session.
    $lockout_timestamp = session()->get('lockout_timestamp');
    
    if ($lockout_timestamp) {
        // Calculate the time difference between now and the lockout timestamp.
        $time_difference = time() - $lockout_timestamp;

        // If it's been less than 30 seconds, show an error message and exit.
        if ($time_difference < 30) {
            $remaining_time = 30 - $time_difference;
            session()->setFlashdata('fail', "You are temporarily locked out. Please wait 30 seconds before trying again.");
            return redirect()->to('auth');
        }
    }
    
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_not_unique' => 'Email not registered in our server.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must have atleast 5 characters in length.',
                    'max_length' => 'Password must not have characters more thant 20 in length.',
                ],
            ],
        ]);


    // If the user fails authentication, increment the failed login attempts count.
    $failed_attempts = session()->get('failed_attempts', 0) + 1;

    // If the user has reached 3 failed attempts, set the lockout timestamp and reset the failed attempts count.
    if ($failed_attempts >= 3) {
        session()->set('lockout_timestamp', time());
        $failed_attempts = 0;
    }

    // Update the failed attempts count in the session.
    session()->set('failed_attempts', $failed_attempts);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);
            
            if( !$check_password ){
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);

                session()->remove('failed_attempts');
                session()->remove('lockout_timestamp');

                return  redirect()->to('/dashboard');

            }
        }
    }
    function logout() {
        if(session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
        }
    }
}
