<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;
use App\Models\Verification;
use App\Models\StatistiqueUptime;
use App\Models\TachePlanifiee;

class Site extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
        'monitoring_interval',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Un site appartient à un utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Un site possède plusieurs vérifications
    public function verifications(): HasMany
    {
        return $this->hasMany(Verification::class);
    }

    // Un site possède plusieurs statistiques d'uptime
    public function statistiqueUptimes(): HasMany
    {
        return $this->hasMany(StatistiqueUptime::class);
    }

    // Un site possède plusieurs tâches planifiées
    public function tachesPlanifiees(): HasMany
    {
        return $this->hasMany(TachePlanifiee::class);
    }
}
