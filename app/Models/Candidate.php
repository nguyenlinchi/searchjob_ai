<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'candidate_id';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'full_name',
        'phone',
        'gender',
        'date_of_birth',
        'avatar',
        'cover_image',
        'address'
    ];
}