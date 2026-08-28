<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Site;
use App\Models\Alerte;
use App\Models\TachePlanifiee;

class Verification extends Model
{
    protected $fillable = [
        'site_id',
        'status',
        'response_time',
        'http_code',
        'checked_at',
        'error_message',
    ];

    protected $casts = [
        'checked_at' => 'datetime',
    ];

    // Verification appartient à un Site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Verification possède plusieurs Alertes
    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

    // Verification possède une seule TachePlanifiee
    public function tachePlanifiee()
    {
        return $this->hasOne(TachePlanifiee::class);
    }
}