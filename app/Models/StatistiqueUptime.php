<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

class StatistiqueUptime extends Model
{
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}