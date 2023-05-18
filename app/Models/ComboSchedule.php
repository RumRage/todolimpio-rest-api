<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboSchedule extends Model
{
    use HasFactory;

    protected $table = 'combo_schedule';

    protected $fillable = ['combo_id'];

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}