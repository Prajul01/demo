<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['name', 'slug', 'status', 'created_by', 'updated_by'];
    public function User(){
        return$this->belongsTo(User::class ,'created_by');
    }
    public function UpdateUser(){
        return$this->belongsTo(User::class ,'updated_by');
    }
}
