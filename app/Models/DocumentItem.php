<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'return_date'];

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function getReturnedAttribute(){
        return $this->return_date != null;
    }

    public function getReturnedDateFormatedAttribute(){
        if($this->returned)
            return $this->return_date->format('d.m.Y');
        else
            return '/';
    }

    public function serialNumber(){
        return $this->belongsTo(SerialNumber::class);
    }

    public function getSerialNoAttribute(){

        $sn = $this->serialNumber;

        if ($sn != null) {
            return $sn->serial_number;
        }

        return '/';
    }
}
