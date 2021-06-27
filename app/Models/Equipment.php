<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }


    public function serial_num(){
        return $this->hasMany(SerialNumber::class);
    }

    public function getShortDescriptionAttribute(){
        if(strlen($this->description) < 25) return $this->description;
        else return substr($this->description, 0, 25).'...';
    }

    public function getFullNameAttribute(){
        return $this->category->name." - ".$this->name;
    }

    public function scopeAvailable($query){
        return $query->where('available_quantity', '>', 0);
    }
}
