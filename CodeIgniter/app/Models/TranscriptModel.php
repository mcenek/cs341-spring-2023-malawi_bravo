<?php namespace App\Models;

use CodeIgniter\Model;

class TranscriptModel extends Model {
    protected $table = 'Transcript';
    protected $primaryKey = 'TranscriptID';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['StudentID', 'GPA', 'ClassRanking'];
}

?>