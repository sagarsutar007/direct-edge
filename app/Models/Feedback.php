<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feedback extends Model

{
    use HasFactory, HasUuids;
    
    protected $table = 'feedbacks';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'feedback_id';

    protected $fillable = [
        'name', 
        'designation', 
        'company', 
        'profile_img', 
        'description', 
        'rating', 
        'approved'
    ];
}

