<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model {
    protected $table = '';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password'];
}

?> 