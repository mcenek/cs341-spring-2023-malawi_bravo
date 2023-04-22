<?php namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model {
    protected $table = 'Schedule';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['StudentID', 'ClassID', 'Grade'];
}

?> 