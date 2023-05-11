<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tel', 'address', 'date_time', 'combo_ids', 'price','discount','total_price', 'payments', 'status'];

    public function combos()
    {
        return $this->belongsToMany(Combo::class, 'combo_schedule', 'combo_id', 'schedule_id');
    }
}
