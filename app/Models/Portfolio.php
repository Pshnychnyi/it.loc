<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = ['title', 'alias', 'desc', 'service_id', 'img'];


    public function service() {
    	return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
