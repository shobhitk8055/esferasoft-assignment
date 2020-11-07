<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
