<?php namespace App\Controllers;

use CodeIgniter\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $classModel = new \App\Models\ClassModel();
        
        $data['result'] = $classModel->findAll();

        return view('grade_access/search', $data);
    }

    public function search()
    {
        $classModel = new \App\Models\ClassModel();
        $classID = $this->request->getPost('query');
        $classInfo = $classModel->where('ClassID', $classID)->findAll();
        //$classInfo =  $classModel->findAll();
        

        // Your search logic here   
        // For example, you can query your database using CodeIgniter's Model and return the results.

        $data['result'] = $classInfo;

        

        return view('grade_access/search', $data);
    }

    
}


