<?php

namespace App\Models;

use App\Models\Icon;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';

    protected $fillable = ['title', 'price', 'icon_id'];

    protected $with = ['icon'];

    public function technologies() {
    	return $this->belongsToMany(Technology::class, 'price_technology', 'price_id', 'technology_id');
    }

    public function icon() {
    	return $this->belongsTo(Icon::class, 'icon_id', 'id');
    }
}
