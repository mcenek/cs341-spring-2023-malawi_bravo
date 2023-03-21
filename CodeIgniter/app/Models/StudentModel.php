<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model {
    protected $table = 'Student';
    protected $primaryKey = 'StudentID';
    protected $allowedFields = ['StudentID', 'ClassStanding', 'FirstName', 'LastName'];
}

?> 