<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobPost extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'job_post_id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_post_id',
        'slug',
        'title',
        'description',
        'reference',
        'company_name',
        'experience',
        'cost_to_company',
        'time_period',
        'currency',
        'location',
        'vacancy_count',
        'expiry_date',
        'status',
        'extra_configs',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'vacancy_count' => 'integer',
        'expiry_date' => 'date',
        'extra_configs' => 'array',
        'status' => 'string',
    ];

    /**
     * Boot function to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUIDs for the primary key
        static::creating(function ($model) {
            if (empty($model->job_post_id)) {
                $model->job_post_id = (string) Str::uuid();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
