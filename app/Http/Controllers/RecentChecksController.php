<?php

namespace App\Http\Controllers;

use App\Models\Verification;

class RecentChecksController extends Controller
{
    /**
     * Display recent monitoring checks.
     */
    public function index()
    {
        $user = auth()->user();

        $checks = Verification::whereHas('site', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with('site')
        ->latest('checked_at')
        ->paginate(20);

        return view('checks', compact('checks'));
    }
}