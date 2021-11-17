<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
