<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboService extends Model
{
    use HasFactory;

    protected $table = 'combo_service';

    protected $fillable = ['service_id'];

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}