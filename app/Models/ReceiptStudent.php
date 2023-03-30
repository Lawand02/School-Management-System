<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class ReceiptStudent extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}