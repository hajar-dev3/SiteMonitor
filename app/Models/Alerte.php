<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Verification;
use App\Models\User;

class Alerte extends Model
{
    protected $fillable = [
        'verification_id',
        'user_id',
        'type',
        'message',
        'is_sent',
        'sent_at',
    ];

    protected $casts = [
        'is_sent' => 'boolean',
        'sent_at' => 'datetime',
    ];

    // Alerte appartient à une Verification
    public function verification()
    {
        return $this->belongsTo(Verification::class);
    }

    // Alerte appartient à un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}