<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthdate',
        'phone',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
