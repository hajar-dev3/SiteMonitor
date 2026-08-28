<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display all monitored sites.
     */
    public function index()
    {
        $sites = Site::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.sites.index', compact('sites'));
    }

    /**
     * Display a specific site.
     */
    public function show(Site $site)
    {
        $site->load('user');

        return view('admin.sites.show', compact('site'));
    }

    /**
     * Show the form for creating a new site.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();

        return view('admin.sites.create', compact('users'));
    }

    /**
     * Store a newly created site.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'monitoring_interval' => 'required|integer|min:1',
        ]);

        Site::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'url' => $request->url,
            'monitoring_interval' => $request->monitoring_interval,
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.sites.index')
            ->with('success', 'Site ajouté avec succès.');
    }

    /**
     * Show the form for editing a site.
     */
    public function edit(Site $site)
    {
        $users = User::orderBy('name')->get();

        return view('admin.sites.edit', compact('site', 'users'));
    }

    /**
     * Update an existing site.
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'monitoring_interval' => 'required|integer|min:1',
        ]);

        $site->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'url' => $request->url,
            'monitoring_interval' => $request->monitoring_interval,
        ]);

        return redirect()
            ->route('admin.sites.index')
            ->with('success', 'Site modifié avec succès.');
    }

    /**
     * Delete a site.
     */
    public function destroy(Site $site)
    {
        $site->delete();

        return redirect()
            ->route('admin.sites.index')
            ->with('success', 'Site supprimé avec succès.');
    }
}