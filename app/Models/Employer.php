<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';
    protected $primaryKey = 'employer_id';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
         'company_name',
        'avatar'
    ];
     public function jobs()
    {
        return $this->hasMany(JobPosting::class, 'employer_id');
    }
}
