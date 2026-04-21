<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $table = 'job_postings';
    protected $primaryKey = 'job_id';
    public $timestamps = false;

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}