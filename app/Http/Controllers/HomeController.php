<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PreRegistration;

class HomeController extends Controller
{
    public function __construct() {}

    public function getGlobalSettingValue($key)
    {
        $set =  GeneralSetting::where('name', $key)->first();

        if (!$set) return [];

        return json_decode($set->value, true);
    }

    public function home(Request $request)
    {

        $data = [
            'heroSection' => $this->getGlobalSettingValue('landing.hero_section'),
            'aboutUsSection' => $this->getGlobalSettingValue('landing.about_us_section'),
            'serviceSection' => $this->getGlobalSettingValue('landing.service_section'),
            'whyChooseUs' => $this->getGlobalSettingValue('landing.why_choose_us'),
            'testimonialsSection' => $this->getGlobalSettingValue('landing.testimonials'),
            'careerWithUsSection' => $this->getGlobalSettingValue('landing.career_with_us'),
            'contactWithUsSection' => $this->getGlobalSettingValue('landing.contact_with_us'),
            'gptHeroSection' => $this->getGlobalSettingValue('gpt_launch.hero_section'),
        ];

        return Inertia::render('Home', ['dashboard_data' => $data]);
    }


    public function about()
    {
        $data = [
            'testimonialsSection' => $this->getGlobalSettingValue('landing.testimonials'),
            'gptHeroSection' => $this->getGlobalSettingValue('gpt_launch.hero_section'),
            'contactWithUsSection' => $this->getGlobalSettingValue('landing.contact_with_us'),
            'headerSection' => $this->getGlobalSettingValue('about_page.header'),
            'serviceDetailsSection' => $this->getGlobalSettingValue('about_page.service_details'),
            'quickStatsSection' => $this->getGlobalSettingValue('about_page.quick_stats'),
            'foundersNoteSection' => $this->getGlobalSettingValue('about_page.founders_note'),
            'highlightsSection' => $this->getGlobalSettingValue('about_page.highlights'),
            'journeySection' => $this->getGlobalSettingValue('about_page.journey'),
            'globalOperationsSection' => $this->getGlobalSettingValue('about_page.global_operations'),
            'teamMembersSection' => $this->getGlobalSettingValue('about_page.team_members')
        ];
        return Inertia::render('AboutUs', ['dashboard_data' => $data]);
    }

    public function gptPage()
    {
        $data = [
            'contactWithUsSection' => $this->getGlobalSettingValue('landing.contact_with_us'),
            'gptHeroSection' => $this->getGlobalSettingValue('gpt_launch.hero_section'),
            'aboutUsSection' => $this->getGlobalSettingValue('gpt_launch.about_us_section'),
            'featuresSection' => $this->getGlobalSettingValue('gpt_launch.features'),
            'useCaseSection' => $this->getGlobalSettingValue('gpt_launch.use_case_section'),
            'registrationFormSection' => $this->getGlobalSettingValue('gpt_launch.registration_form_section'),
        ];

        return Inertia::render('GptLaunchPage', ['dashboard_data' => $data]);
    }


    public function savePreregistrationRequest(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'countrycode' => 'nullable|string|max:10',
            'role' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255'
        ]);

        PreRegistration::create($request->all());

        return back()->with(['alert' => 'Registration successful', 'type' => 'success']);
    }


    public function test()
    {
        return Inertia::render('Test/Test2');
    }

    public function testHome()
    {
        return Inertia::render('Test/Landing');
    }
}
