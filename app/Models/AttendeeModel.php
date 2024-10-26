<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeModel extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'email', 'event_id'];

    public function event()
    {
        return $this->belongsTo(EventModel::class, 'event_id');
    }
}
