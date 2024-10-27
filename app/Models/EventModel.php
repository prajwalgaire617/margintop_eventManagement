<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'location', 'category_id'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function attendees()
    {
        return $this->hasMany(AttendeeModel::class, 'event_id');
    }
}
