<?php namespace App\Models;

use CodeIgniter\Model;

class SSModel extends Model {
    protected $table = 'SemesterSchedule';
    protected $primaryKey = 'ScheduleID';
    protected $allowedFields = ['TranscriptID'];
}

?>