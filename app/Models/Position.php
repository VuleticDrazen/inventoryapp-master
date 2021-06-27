<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    // protected $appends = ['department_name'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function getDepartmentNameAttribute(){
        return $this->department->name;
    }
}
