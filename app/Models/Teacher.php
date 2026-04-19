<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'person_id',
        'degree',
        'entry_date',
    ];

    protected $casts = [
        'entry_date' => 'date',
    ];


    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
