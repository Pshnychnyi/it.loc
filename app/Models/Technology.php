<?php

namespace App\Models;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $table = 'technologies';

    public function prices() {
    	return $this->belongsToMany(Price::class, 'price_technology', 'price_id', 'technology_id');
    }
}
