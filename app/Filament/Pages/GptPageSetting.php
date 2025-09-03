<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use App\Models\GeneralSetting;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class GptPageSetting extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.gpt-page-setting';

    public ?array $heroSection = [];
    public ?array $aboutUsSection = [];
    public ?array $features = [];
    public ?array $useCaseSection = [];
    public ?array $registrationFormSection = [];


    protected function getForms(): array
    {
        return ['heroSectionForm', 'aboutUsSectionForm', 'featuresForm', 'useCaseSectionForm', 'registrationFormSectionForm'];
    }

    public function mount()
    {
        $values = GeneralSetting::where('name', 'gpt_launch.hero_section')->first();
        $this->heroSectionForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'gpt_launch.about_us_section')->first();
        $this->aboutUsSectionForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'gpt_launch.features')->first();
        $this->featuresForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'gpt_launch.use_case_section')->first();
        $this->useCaseSectionForm->fill($values ? json_decode($values->value, true) : []);

        $values = GeneralSetting::where('name', 'gpt_launch.registration_form_section')->first();
        $this->registrationFormSectionForm->fill($values ? json_decode($values->value, true) : []);
    }

    public function heroSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Hero Section')
                ->schema([
                    \Filament\Forms\Components\RichEditor::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('message')
                        ->label('Message')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('launch_description')
                        ->label('Launch Description')
                        ->required(),


                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            \Filament\Forms\Components\Group::make()->schema([
                                \Filament\Forms\Components\Group::make()
                                    ->schema([
                                        \Filament\Forms\Components\TextInput::make('point_1_title')
                                            ->label('Point 1 Title')
                                            ->required(),
                                        \Filament\Forms\Components\TextInput::make('point_1_description')
                                            ->label('Point 1 Description')
                                            ->maxLength(100)
                                            ->required(),
                                        \Filament\Forms\Components\TextInput::make('point_1_icon')
                                            ->label('Icon')
                                            ->required(),
                                    ]),
                                \Filament\Forms\Components\Group::make()
                                    ->schema([
                                        \Filament\Forms\Components\TextInput::make('point_2_title')
                                            ->label('Point 2 Title')
                                            ->required(),
                                        \Filament\Forms\Components\TextInput::make('point_2_description')
                                            ->label('Point 2 Description')
                                            ->maxLength(100)
                                            ->required(),

                                        \Filament\Forms\Components\TextInput::make('point_2_icon')
                                            ->label('Icon')
                                            ->required(),
                                    ]),
                            ]),

                            \Filament\Forms\Components\Group::make()->schema([

                                \Filament\Forms\Components\FileUpload::make('media_file')
                                    ->label('Media File (Video/Image Vertical)')->imagePreviewHeight(200)
                                    ->required()
                                    ->directory('uploads')
                                    ->visibility('public'),

                                \Filament\Forms\Components\Select::make('media_type')
                                    ->label('Media Type')
                                    ->options([
                                        'video' => 'Video',
                                        'image' => 'Image',
                                    ])
                                    ->required()
                            ]),
                        ]),

                    \Filament\Forms\Components\Grid::make(3)
                        ->schema([
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('message_1_title')
                                        ->label('Message 1 Title')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('message_1_description')
                                        ->label('Message 1 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('message_2_title')
                                        ->label('Message 2 Title')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('message_2_description')
                                        ->label('Message 2 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('message_3_title')
                                        ->label('Message 3 Title')
                                        ->required(),
                                    \Filament\Forms\Components\TextInput::make('message_3_description')
                                        ->label('Message 3 Description')
                                        ->required(),
                                ]),

                        ]),

                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(), // aligns nicely
                ])
        ])->statePath('heroSection');
    }

    public function saveHeroSectionForm()
    {
        $data = $this->heroSectionForm->getState();

        GeneralSetting::updateOrCreate(
            ['name' => 'gpt_launch.hero_section'],
            ['value' => json_encode($data), 'type' => 'json', 'is_specific' => false, 'display_name' => 'Hero Section']
        );

        Notification::make()
            ->title('Hero Section saved successfully.')
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

                    \Filament\Forms\Components\Repeater::make('highlight_points')
                        ->label('Highlight Points')
                        ->schema([
                            \Filament\Forms\Components\Toggle::make('is_featured')
                                ->label('Is Featured'),

                            \Filament\Forms\Components\TextInput::make('number')
                                ->label('Number')
                                ->required(),

                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Point Title')
                                ->required(),

                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon')
                                ->required(),

                            \Filament\Forms\Components\Textarea::make('short_description')
                                ->label('Short Description')
                                ->required(),
                        ])
                        ->grid(2)

                        ->minItems(1)
                        ->required(),

                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(),
                ])
        ])->statePath('aboutUsSection');
    }
    public function saveAboutUsSectionForm()
    {
        $data = $this->aboutUsSectionForm->getState();

        GeneralSetting::updateOrCreate(
            ['name' => 'gpt_launch.about_us_section'],
            ['value' => json_encode($data), 'type' => 'json', 'is_specific' => false, 'display_name' => 'About Us Section']
        );

        Notification::make()
            ->title('About Us Section saved successfully.')
            ->success()
            ->send();
    }

    public function featuresForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Features')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),

                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),

                    \Filament\Forms\Components\Repeater::make('list')
                        ->label('Feature List')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Feature Title')
                                ->required(),
                            \Filament\Forms\Components\Textarea::make('description')
                                ->label('Feature Description')
                                ->required(),

                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon')
                                ->required(),
                        ])
                        ->grid(2)
                        ->minItems(1)
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(),
                ])
        ])->statePath('features');
    }

    public function saveFeaturesForm()
    {
        $data = $this->featuresForm->getState();

        GeneralSetting::updateOrCreate(
            ['name' => 'gpt_launch.features'],
            ['value' => json_encode($data), 'type' => 'json', 'is_specific' => false, 'display_name' => 'Features']
        );

        Notification::make()
            ->title('Features saved successfully.')
            ->success()
            ->send();
    }

    public function useCaseSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Use Case Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),

                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),

                    \Filament\Forms\Components\Repeater::make('uses')
                        ->label('Use Cases')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Use Case Title')
                                ->required(),

                            \Filament\Forms\Components\RichEditor::make('body')
                                ->label('Body')
                                ->required(),

                            \Filament\Forms\Components\Repeater::make('points')
                                ->label('Points')
                                ->simple(
                                    \Filament\Forms\Components\TextInput::make('line')
                                        ->label('Point')
                                        ->required(),
                                )
                                ->minItems(1)
                                ->required(),

                            \Filament\Forms\Components\FileUpload::make('media_file')
                                ->label('Media File')
                                ->required(),

                            \Filament\Forms\Components\Select::make('media_type')
                                ->label('Media Type')
                                ->options([
                                    'video' => 'Video',
                                    'image' => 'Image',
                                ])
                                ->required(),
                        ])
                        ->minItems(1)
                        ->grid(2)
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(),
                ])
        ])->statePath('useCaseSection');
    }

    public function saveUseCaseSectionForm()
    {
        $data = $this->useCaseSectionForm->getState();

        GeneralSetting::updateOrCreate(
            ['name' => 'gpt_launch.use_case_section'],
            ['value' => json_encode($data), 'type' => 'json', 'is_specific' => false, 'display_name' => 'Use Case Section']
        );

        Notification::make()
            ->title('Use Case Section saved successfully.')
            ->success()
            ->send();
    }
    public function registrationFormSectionForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Registration Form Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),

                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),

                    \Filament\Forms\Components\Repeater::make('roles')
                        ->label('Roles')
                        ->simple(
                            \Filament\Forms\Components\TextInput::make('line')
                                ->label('Role')
                                ->required(),
                        )
                        ->minItems(1)
                        ->required(),

                    \Filament\Forms\Components\TextInput::make('button_text')
                        ->label('Button Text')
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Hero Section')
                            ->submit('saveHeroSection'),
                    ])->fullWidth(),
                ])
        ])->statePath('registrationFormSection');
    }
    public function saveRegistrationFormSectionForm()
    {
        $data = $this->registrationFormSectionForm->getState();

        GeneralSetting::updateOrCreate(
            ['name' => 'gpt_launch.registration_form_section'],
            ['value' => json_encode($data), 'type' => 'json', 'is_specific' => false, 'display_name' => 'Registration Form Section']
        );

        Notification::make()
            ->title('Registration Form Section saved successfully.')
            ->success()
            ->send();
    }
}
