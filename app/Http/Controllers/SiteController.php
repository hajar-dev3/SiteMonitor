<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Services\MonitoringService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display the user's websites.
     */
    public function index()
    {
        $sites = auth()->user()->sites()->latest()->get();

        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new website.
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created website.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'monitoring_interval' => 'required|integer|min:1',
        ]);

        auth()->user()->sites()->create([
            'name' => $request->name,
            'url' => $request->url,
            'monitoring_interval' => $request->monitoring_interval,
            'is_active' => true,
        ]);

        return redirect()
            ->route('sites.index')
            ->with('success', 'Site added successfully.');
    }

    /**
     * Show the form for editing a website.
     */
    public function edit(Site $site)
    {
        // Security: make sure the site belongs to the logged-in user
        abort_unless($site->user_id === auth()->id(), 403);

        return view('sites.edit', compact('site'));
    }

    /**
     * Update an existing website.
     */
    public function update(Request $request, Site $site)
    {
        // Security: make sure the site belongs to the logged-in user
        abort_unless($site->user_id === auth()->id(), 403);

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'monitoring_interval' => 'required|integer|min:1',
        ]);

        $site->update([
            'name' => $request->name,
            'url' => $request->url,
            'monitoring_interval' => $request->monitoring_interval,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('sites.index')
            ->with('success', 'Site updated successfully.');
    }

    /**
     * Check the availability of a website.
     */
    public function check(Site $site, MonitoringService $monitoringService)
    {
        // Security: make sure the site belongs to the logged-in user
        abort_unless($site->user_id === auth()->id(), 403);

        // Perform the monitoring check
        $monitoringService->check($site);

        return redirect()
            ->route('monitoring.index')
            ->with('success', 'Website checked successfully.');
    }

    /**
     * Delete a website.
     */
    public function destroy(Site $site)
    {
        // Security: make sure the site belongs to the logged-in user
        abort_unless($site->user_id === auth()->id(), 403);

        $site->delete();

        return redirect()
            ->route('sites.index')
            ->with('success', 'Site deleted successfully.');
    }
}