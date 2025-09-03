<?php

namespace App\Filament\Pages;

use App\Models\GeneralSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class LandingPageSetting extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.landing-page-setting';

    public ?array $heroSection = [];
    public ?array $aboutUsSection = [];
    public ?array $serviceSection = [];
    public ?array $whyChooseUs = [];
    public ?array $testimonials = [];
    public ?array $careerWithUs = [];
    public ?array $contactWithUs = [];

    protected function getForms(): array
    {
        return [
            'heroSectionForm',
            'aboutUsSectionForm',
            'serviceSectionForm',
            'whyChooseUsForm',
            'testimonialsForm',
            'careerWithUsForm',
            'contactWithUsForm',
        ];
    }


    public function mount(): void
    {
        $values = GeneralSetting::where('name', 'landing.hero_section')->first();
        $this->heroSectionForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'landing.about_us_section')->first();
        $this->aboutUsSectionForm->fill($values ? json_decode($values->value, true) : []);


        $values = GeneralSetting::where('name', 'landing.service_section')->first();
        $this->serviceSectionForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'landing.why_choose_us')->first();
        $this->whyChooseUsForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'landing.testimonials')->first();
        $this->testimonialsForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'landing.career_with_us')->first();
        $this->careerWithUsForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'landing.contact_with_us')->first();
        $this->contactWithUsForm->fill($values ? json_decode($values->value, true) : []);
    }

    public function heroSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Hero Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->required(),
                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('media_file')
                        ->label('Image')
                        ->image()
                        ->directory('uploads')
                        ->visible('public')
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(), // aligns nicely

                ])
        ])->statePath('heroSection');
    }

    public function saveHeroSectionForm(): void
    {
        $data = $this->heroSectionForm->getState();

        $generalSetting = GeneralSetting::where('name', 'landing.hero_section')->firstOrNew();
        $generalSetting->display_name = 'Landing Page Hero Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'landing.hero_section';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Hero section saved')
            ->success()
            ->send();
    }

    public function aboutUsSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('About Us Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('primary_image')
                        ->label('Primary Image')
                        ->image()->directory('uploads')
                        ->visible('public')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('about_us_video')
                        ->label('About Us YouTube Video Link')
                        ->url()
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('secondary_image')
                        ->label('Secondary Image')
                        ->image()->directory('uploads')
                        ->visible('public')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('quick_stats')
                        ->label('Quick Stats')
                        ->helperText('Only 4 values are allowed.')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('number')
                                ->label('Number')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Stat Title')
                                ->required(),
                        ])
                        ->minItems(4)
                        ->maxItems(4)
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save About Us Section')
                            ->submit('saveAboutUsSection'),
                    ])->fullWidth(), // aligns nicely
                ])
        ])->statePath('aboutUsSection');
    }

    public function saveAboutUsSectionForm(): void
    {
        $data = $this->aboutUsSectionForm->getState();
        $generalSetting = GeneralSetting::where('name', 'landing.about_us_section')->firstOrNew();
        $generalSetting->display_name = 'Landing Page About Us Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'landing.about_us_section';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('About Us Section Saved')
            ->success()
            ->send();
    }

    public function serviceSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Service Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->required(),

                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Service Title')
                                ->required(),
                            \Filament\Forms\Components\Textarea::make('description')
                                ->label('Service Description')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('link')
                                ->label('Link')
                                ->url()
                                ->nullable(),
                        ])
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Service Section')
                            ->submit('saveServiceSection'),
                    ])->fullWidth(), // aligns nicely
                ])
        ])->statePath('serviceSection');
    }

    public function saveServiceSectionForm(): void
    {
        $data = $this->serviceSectionForm->getState();

        $generalSetting = GeneralSetting::where('name', 'landing.service_section')->firstOrNew();
        $generalSetting->display_name = 'Landing Page Service Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'landing.service_section';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();


        Notification::make()
            ->title('Service section saved')
            ->success()
            ->send();
    }

    public function whyChooseUsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Why Choose Us Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Section Title')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('reasons')
                        ->label('Reasons')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Reason Title')
                                ->required(),
                            \Filament\Forms\Components\Textarea::make('description')
                                ->label('Description')
                                ->required(),
                            \Filament\Forms\Components\FileUpload::make('image')
                                ->label('Image')
                                ->directory('uploads')
                                ->visible('public')
                                ->image()
                                ->required(),
                            \Filament\Forms\Components\Repeater::make('extra_points')
                                ->label('Extra Points')
                                ->helperText('Optional extra points')
                                ->simple(
                                    \Filament\Forms\Components\TextInput::make('point')
                                        ->label('Point')
                                        ->nullable(),
                                )
                                ->nullable(),
                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon (Font Awesome)')
                                ->helperText('Font Awesome icon class, e.g. fa-solid fa-star')
                                ->nullable(),
                        ])
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Why Choose Us Section')
                            ->submit('saveWhyChooseUsSection'),
                    ])->fullWidth(),
                ])
        ])->statePath('whyChooseUs');
    }

    public function saveWhyChooseUsForm(): void
    {
        $data = $this->whyChooseUsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'landing.why_choose_us')->firstOrNew();
        $generalSetting->display_name = 'Landing Page Why Choose Us Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'landing.why_choose_us';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();


        Notification::make()
            ->title('Why Choose Us section saved')
            ->success()->send();
    }

    public function testimonialsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Testimonials Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Testimonials Section')
                            ->submit('saveTestimonials'),
                    ])->fullWidth(),
                ])
        ])->statePath('testimonials');
    }

    public function saveTestimonialsForm(): void
    {
        $data = $this->testimonialsForm->getState();

        $generalSetting = GeneralSetting::where('name', 'landing.testimonials')->firstOrNew();
        $generalSetting->display_name = 'Landing Page Testimonials Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'landing.testimonials';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Testimonials section saved')
            ->success()->send();
    }

    public function careerWithUsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Career With Us Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('body')
                        ->label('Body')
                        ->required(),
                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('feature_1_title')
                                        ->label('Feature 1 Title')
                                        ->required(),
                                    \Filament\Forms\Components\Textarea::make('feature_1_description')
                                        ->label('Feature 1 Description')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('feature_1_icon')
                                        ->label('Feature 1 Icon')
                                        ->helperText('Font Awesome icons')
                                        ->nullable(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('feature_2_title')
                                        ->label('Feature 2 Title')
                                        ->required(),
                                    \Filament\Forms\Components\Textarea::make('feature_2_description')
                                        ->label('Feature 2 Description')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('feature_2_icon')
                                        ->label('Feature 2 Icon')
                                        ->helperText('Font Awesome icons')
                                        ->nullable(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('feature_3_title')
                                        ->label('Feature 3 Title')
                                        ->required(),
                                    \Filament\Forms\Components\Textarea::make('feature_3_description')
                                        ->label('Feature 3 Description')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('feature_3_icon')
                                        ->label('Feature 3 Icon')
                                        ->helperText('Font Awesome icons')
                                        ->nullable(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('feature_4_title')
                                        ->label('Feature 4 Title')
                                        ->required(),
                                    \Filament\Forms\Components\Textarea::make('feature_4_description')
                                        ->label('Feature 4 Description')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('feature_4_icon')
                                        ->label('Feature 4 Icon')
                                        ->helperText('Font Awesome icons')
                                        ->nullable(),
                                ]),
                        ]),
                    \Filament\Forms\Components\FileUpload::make('media_file')
                        ->label('Media File')
                        ->directory('uploads')
                        ->visible('public')
                        ->required(),
                    \Filament\Forms\Components\Select::make('media_type')
                        ->label('Media Type')
                        ->options([
                            'image' => 'Image',
                            'video' => 'Video',
                        ])
                        ->required(),
                    \Filament\Forms\Components\Grid::make(4)
                        ->schema([
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('stat_1_number')
                                        ->label('Stat 1 Number')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('stat_1_description')
                                        ->label('Stat 1 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('stat_2_number')
                                        ->label('Stat 2 Number')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('stat_2_description')
                                        ->label('Stat 2 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('stat_3_number')
                                        ->label('Stat 3 Number')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('stat_3_description')
                                        ->label('Stat 3 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('stat_4_number')
                                        ->label('Stat 4 Number')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('stat_4_description')
                                        ->label('Stat 4 Description')
                                        ->required(),
                                ]),
                        ]),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Career With Us Section')
                            ->submit('saveCareerWithUs'),
                    ])->fullWidth(),
                ])
        ])->statePath('careerWithUs');
    }

    public function saveCareerWithUsForm(): void
    {
        $data = $this->careerWithUsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'landing.career_with_us')->firstOrNew();
        $generalSetting->name = 'landing.career_with_us';
        $generalSetting->display_name = 'Landing Page Career With Us Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Career With Us section saved')
            ->success()->send();
    }

    public function contactWithUsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Contact With Us Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('media_file')
                        ->label('Media File')
                        ->directory('uploads')
                        ->visible('public')
                        ->required(),
                    \Filament\Forms\Components\Select::make('media_type')
                        ->label('Media Type')
                        ->options([
                            'image' => 'Image',
                            'video' => 'Video',
                        ])
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('form_page_title')
                        ->label('Form Page Title')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('legal_interest_list')
                        ->label('Legal Interest List')
                        ->helperText('Add multiple legal interests (single line each)')
                        ->simple(
                            \Filament\Forms\Components\TextInput::make('interest')
                                ->label('Legal Interest')
                                ->required(),
                        )
                        ->required(),
                    \Filament\Forms\Components\Textarea::make('consent_message')
                        ->label('Consent Message')
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Contact With Us Section')
                            ->submit('saveContactWithUs'),
                    ])->fullWidth(),
                ])
        ])->statePath('contactWithUs');
    }

    public function saveContactWithUsForm(): void
    {
        $data = $this->contactWithUsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'landing.contact_with_us')->firstOrNew();
        $generalSetting->name = 'landing.contact_with_us';
        $generalSetting->display_name = 'Landing Page Contact With Us Section';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Contact With Us section saved')
            ->success()->send();
    }
}
