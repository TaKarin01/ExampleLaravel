<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'IdStudent';

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'IDClass','IdClass');
    }
    protected $fillable = ['IdStudent','NameStudent','GenderStudent','IDClass'];
}
