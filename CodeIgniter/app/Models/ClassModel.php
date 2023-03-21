<?php namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model {
    protected $table = 'Class';
    protected $primaryKey = 'ClassID';
    protected $allowedFields = ['ClassName', 'ClassID'];
}

?>