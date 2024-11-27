<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedbacks';
    protected $allowedFields = ['message', 'rating'];
    protected $useTimestamps = false;
}