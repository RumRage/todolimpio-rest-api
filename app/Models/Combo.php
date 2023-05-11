<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $fillable = ['service_ids','name','price','discount','total_price'];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'combo_service', 'combo_id', 'service_id');
    }
}


