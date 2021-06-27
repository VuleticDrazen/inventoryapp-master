<?php

namespace App\Models;

use App\Http\Controllers\EquipmentCategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** TICKET TYPES **/
    const NEW_EQUIPMENT = 1;
    const REPAIR_EQUIPMENT = 2;

    /** TICKET REQUEST TYPES **/
    const EQUIPMENT_REQUEST = 1;
    const OFFICE_SUPPLIES_REQUEST = 2;

    /** TICKET STATUSES **/
    const UNPROCESSED = 1;
    const IN_PROGRESS = 2;
    const PROCESSED = 3;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }

    public function officer(){
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function status(){
        return $this->belongsTo(TicketStatus::class);
    }

    public function scopeOpen($query){
        return $query->whereIn('ticket_status_id', [self::UNPROCESSED, self::IN_PROGRESS]);
    }
}
