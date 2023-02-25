<?php

namespace App\Models;

use App\Models\Icon;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['title', 'alias', 'desc', 'icon'];


    public function portfolios() {
    	return $this->hasMany(Portfolio::class, 'service_id', 'id');
    }

    public function icons() {
    	return $this->belongsTo(Icon::class, 'icon', 'id');
    }
}
