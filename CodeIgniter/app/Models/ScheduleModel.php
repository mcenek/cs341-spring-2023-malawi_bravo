<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model {
    protected $table = 'Schedule';
    protected $primaryKey = 'StudentID'; // Set the primary key to one of the columns
    protected $useAutoIncrement = false;
    protected $allowedFields = ['StudentID', 'ClassID', 'Grade'];

    // Override the _getPrimaryKey method to handle composite primary keys
    protected function _getPrimaryKey() {
        return ['StudentID', 'ClassID']; // Return an array of primary key columns
    }
}