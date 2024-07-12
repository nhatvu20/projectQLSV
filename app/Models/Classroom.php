<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    // public $timestamps = false;
    // protected $primaryKey = 'ClassRoomID';

    // public function student(){
    //     return $this->hasMany(Student::class,'ClassRoomID','ClassRoomID'); //Quan hệ mỗi sinh viên thuộc về 1 lớp
    // }
    // protected $fillable = [
    //     'ClassRoomID',
    //     'ClassRoomName',
    // ];
}
