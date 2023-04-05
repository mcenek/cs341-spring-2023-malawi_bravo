<?php namespace App\Models;

use CodeIgniter\Model;

class SSModel extends Model {
    protected $table = 'Semester_Schedule';
    protected $primaryKey = 'ScheduleID';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['TranscriptID'];
}

?>