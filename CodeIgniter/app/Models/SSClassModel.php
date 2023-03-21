<?php namespace App\Models;

use CodeIgniter\Model;

class SSClassModel extends Model {
    protected $table = 'Semester_Schedule_Class';
    protected $allowedFields = ['ScheduleID', 'ClassID'];
}

?>