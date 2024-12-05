<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $keyType = 'string';

    
}
