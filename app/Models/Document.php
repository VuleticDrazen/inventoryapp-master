<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['date', 'created_at', 'updated_at'];
//    protected $casts = [
//        'date' => 'date:d.m.Y'
//    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function getDateFormatedAttribute(){
        return $this->date->format('d.m.Y');
    }

    public function items(){
        return $this->hasMany(DocumentItem::class);
    }

    public static function getDocuments(Request $request = null){
        return Document::query()
            ->when($request->user_id, function($query) use($request){
                $query->where('user_id','=', $request->user_id);
            })
            ->get();
    }

}
