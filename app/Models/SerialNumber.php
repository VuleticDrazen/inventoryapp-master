<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIsUsedAttribute(){
        return DocumentItem::query()
                ->where('equipment_id', '=', $this->equipment_id)
                ->where('serial_number_id', '=', $this->id)
                ->where('return_date', '=', null)
                ->count() > 0;
    }
    public function documentItem()
    {
        return $this->hasMany(DocumentItem::class);
    }

    // get all serial numbers which are not part of document items or are returned
    public function scopeAvailable($query)
    {
        return $query->doesntHave('documentItem')->orWhereHas('documentItem', function ($q) {
            $q->whereNull('return_date');
        }, '=', 0);
    }

}
