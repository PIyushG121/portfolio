<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'projectCount' => Project::query()->count(),
            'featuredCount' => Project::query()->where('featured', true)->count(),
            'messageCount' => ContactMessage::query()->count(),
            'recentMessages' => ContactMessage::query()->latest()->limit(5)->get(),
        ]);
    }
}
