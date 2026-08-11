<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $settings = SiteSetting::query()->pluck('value', 'key');

        return view('home', [
            'settings' => $settings,
            'skills' => Skill::query()->orderBy('sort_order')->get(),
            'educations' => Education::query()->orderBy('sort_order')->get(),
            'experiences' => Experience::query()->orderBy('sort_order')->get(),
            'projects' => Project::query()->orderByDesc('featured')->orderBy('sort_order')->get(),
            'services' => Service::query()->orderBy('id')->get(),
            'testimonials' => Testimonial::query()->orderBy('id')->get(),
        ]);
    }
}
