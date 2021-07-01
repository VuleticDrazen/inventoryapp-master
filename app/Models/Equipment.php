<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function scopeAvailable($query){
        return $query->where('available_quantity', '>', 0);
    }

    public static function getEquipment(Request $request = null){

        return Equipment::query()
            ->when($request->category_id, function($query) use($request){
                $query->where('equipment_category_id', $request->category_id);
            })
            ->get();
    }

}
