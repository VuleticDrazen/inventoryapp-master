<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    const PER_PAGE = 10;

    protected $guarded = [];
    protected $hidden = ['updated_at'];
    protected $dates = ['created_at'];
    protected $casts = ['created_at' => 'datetime:d.m.Y' ];
    protected $with = ['positions'];

    public function positions(){
        return $this->hasMany(Position::class);
    }

    public function addPosition($data){
        return $this->positions()->create($data);
    }
}
