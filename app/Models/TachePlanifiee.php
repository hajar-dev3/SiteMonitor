<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Site;
use App\Models\Verification;

class TachePlanifiee extends Model
{
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function verification()
    {
        return $this->belongsTo(Verification::class);
    }
}