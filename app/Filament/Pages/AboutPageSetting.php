<?php

namespace App\Filament\Pages;

use App\Models\GeneralSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;


class AboutPageSetting extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.about-page-setting';

    public ?array $headerSection = [];
    public ?array $serviceDetailsSection = [];
    public ?array $quickStatsSection = [];
    public ?array $foundersNoteSection = [];
    public ?array $highlightsSection = [];
    public ?array $journeySection = [];
    public ?array $globalOperationsSection = [];
    public ?array $teamMembersSection = [];

    public function mount()
    {
        $value = GeneralSetting::where('name', 'about_page.header')->first();
        $this->headerForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.service_details')->first();
        $this->serviceDetailsForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.quick_stats')->first();
        $this->quickStatsForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.founders_note')->first();
        $this->foundersNoteForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.highlights')->first();
        $this->highlightsForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.journey')->first();
        $this->journeyForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.global_operations')->first();
        $this->globalOperationsForm->fill(json_decode($value?->value ?? '{}', true));

        $value = GeneralSetting::where('name', 'about_page.team_members')->first();
        $this->teamMembersForm->fill(json_decode($value?->value ?? '{}', true));
    }

    protected function getForms(): array
    {
        return [
            'headerForm',
            'serviceDetailsForm',
            'quickStatsForm',
            'foundersNoteForm',
            'highlightsForm',
            'journeyForm',
            'globalOperationsForm',
            'teamMembersForm'
        ];
    }

    public function headerForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Header Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->directory('uploads')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('youtube_video_link')
                        ->label('YouTube Video Link')
                        ->url()
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Header Section')
                            ->submit('saveHeaderForm'),
                    ])->fullWidth(), // aligns nicely
                ])
        ])->statePath('headerSection');
    }

    public function saveHeaderForm(): void
    {
        $data = $this->headerForm->getState();

        $generalSetting = GeneralSetting::where('name', 'about_page.header')->firstOrNew();
        $generalSetting->display_name = 'About Page Header';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.header';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();


        Notification::make()
            ->title('Hero section saved')
            ->success()
            ->send();
    }

    public function serviceDetailsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Service Details Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('list_1_title')
                                        ->label('List 1 Title')
                                        ->required(),

                                    \Filament\Forms\Components\RichEditor::make('list_1_description')
                                        ->label('List 1 Description')
                                        ->required(),
                                ]),

                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('list_2_title')
                                        ->label('List 2 Title')
                                        ->required(),
                                    \Filament\Forms\Components\RichEditor::make('list_2_description')
                                        ->label('List 2 Description')
                                        ->required(),

                                ]),

                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('list_3_title')
                                        ->label('List 3 Title')
                                        ->required(),
                                    \Filament\Forms\Components\RichEditor::make('list_3_description')
                                        ->label('List 3 Description')
                                        ->required(),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\TextInput::make('list_4_title')
                                        ->label('List 4 Title')
                                        ->required(),
                                    \Filament\Forms\Components\RichEditor::make('list_4_description')
                                        ->label('List 4 Description')
                                        ->required(),
                                ]),
                        ]),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Service Details Section')
                            ->submit('saveServiceDetailsForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('serviceDetailsSection');
    }

    public function saveServiceDetailsForm(): void
    {
        $data = $this->serviceDetailsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.service_details')->firstOrNew();
        $generalSetting->display_name = 'About Page Service Details';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.service_details';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Service details section saved')
            ->success()
            ->send();
    }

    public function quickStatsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Quick Stats')
                ->schema([
                    \Filament\Forms\Components\Repeater::make('stats')
                        ->label('Stats List')
                        ->schema([

                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('number')
                                ->label('Number')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('description')
                                ->label('Description')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->addActionLabel('Add Stat')
                        ->grid(3),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Quick Stats Section')
                            ->submit('saveQuickStatsForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('quickStatsSection');
    }

    public function saveQuickStatsForm(): void
    {
        $data = $this->quickStatsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.quick_stats')->firstOrNew();
        $generalSetting->display_name = 'About Page Quick Stats';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.quick_stats';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Quick stats section saved')
            ->success()
            ->send();
    }

    public function foundersNoteForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Founders Note Section')
                ->schema([
                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\RichEditor::make('our_mission_body')
                                        ->label('Our Mission')
                                        ->required(),
                                    \Filament\Forms\Components\Repeater::make('mission_features')
                                        ->label('Mission Features')
                                        ->simple(
                                            \Filament\Forms\Components\TextInput::make('feature')
                                                ->label('Feature')
                                                ->required(),
                                        )
                                        ->minItems(1)
                                        ->addActionLabel('Add Mission Feature')
                                        ->grid(1),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\RichEditor::make('our_vision_body')
                                        ->label('Our Vision')
                                        ->required(),
                                    \Filament\Forms\Components\Repeater::make('vision_features')
                                        ->label('Vision Features')
                                        ->simple(
                                            \Filament\Forms\Components\TextInput::make('feature')
                                                ->label('Feature')
                                                ->required(),
                                        )
                                        ->minItems(1)
                                        ->addActionLabel('Add Vision Feature')
                                        ->grid(1),
                                ]),
                            \Filament\Forms\Components\Group::make()
                                ->schema([
                                    \Filament\Forms\Components\RichEditor::make('our_commitment_body')
                                        ->label('Our Commitment')
                                        ->required(),
                                    \Filament\Forms\Components\Repeater::make('commitment_features')
                                        ->label('Commitment Features')
                                        ->simple(
                                            \Filament\Forms\Components\TextInput::make('feature')
                                                ->label('Feature')
                                                ->required(),
                                        )
                                        ->minItems(1)
                                        ->addActionLabel('Add Commitment Feature')
                                        ->grid(1),
                                ]),
                        ]),
                    \Filament\Forms\Components\RichEditor::make('founders_note')
                        ->label('Founders Note')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('founders_name')
                        ->label('Founders Name')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('founders_job_title')
                        ->label('Founders Job Title')
                        ->required(),
                    \Filament\Forms\Components\FileUpload::make('founders_image')
                        ->label('Founders Image')
                        ->image()
                        ->directory('uploads')
                        ->required(),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Founders Note Section')
                            ->submit('saveFoundersNoteForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('foundersNoteSection');
    }

    public function saveFoundersNoteForm(): void
    {
        $data = $this->foundersNoteForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.founders_note')->firstOrNew();
        $generalSetting->display_name = 'About Page Founders Note';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.founders_note';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Founders note section saved')
            ->success()
            ->send();
    }

    public function highlightsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Highlights Section')
                ->schema([
                    \Filament\Forms\Components\Repeater::make('highlights')
                        ->label('Highlights List')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon (Font Awesome class)')
                                ->placeholder('e.g. fa-solid fa-star')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Title')
                                ->required(),
                            \Filament\Forms\Components\RichEditor::make('description')
                                ->label('Description')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->addActionLabel('Add Highlight')
                        ->grid(3),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Highlights Section')
                            ->submit('saveHighlightsForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('highlightsSection');
    }

    public function saveHighlightsForm(): void
    {
        $data = $this->highlightsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.highlights')->firstOrNew();
        $generalSetting->display_name = 'About Page Highlights';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.highlights';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Highlights section saved')
            ->success()
            ->send();
    }

    public function journeyForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Journey Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('milestones')
                        ->label('Milestones')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('icon')
                                ->label('Icon')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('year')
                                ->label('Year')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Milestone Title')
                                ->required(),
                            \Filament\Forms\Components\RichEditor::make('short_description')
                                ->label('Short Description')
                                ->required(),
                            \Filament\Forms\Components\RichEditor::make('long_description')
                                ->label('Long Description')
                                ->required(),
                            \Filament\Forms\Components\FileUpload::make('image')
                                ->label('Image')
                                ->image()
                                ->directory('uploads')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->addActionLabel('Add Milestone')
                        ->grid(2),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Journey Section')
                            ->submit('saveJourneyForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('journeySection');
    }

    public function saveJourneyForm(): void
    {
        $data = $this->journeyForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.journey')->firstOrNew();
        $generalSetting->display_name = 'About Page Journey';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.journey';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Journey section saved')
            ->success()
            ->send();
    }

    public function globalOperationsForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Global Operations Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('operation_countries')
                        ->label('Operation Countries')
                        ->schema([

                            \Filament\Forms\Components\FileUpload::make('office_image')
                                ->label('Office Image')
                                ->image()
                                ->directory('uploads')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('office_title')
                                ->label('Office Title')
                                ->required(),
                            \Filament\Forms\Components\FileUpload::make('flag')
                                ->label('Country Flag')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('hq_locations')
                                ->label('HQ Locations')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('offices_locations')
                                ->label('Offices Locations')
                                ->required(),
                            \Filament\Forms\Components\Repeater::make('services')
                                ->label('Services')
                                ->simple(
                                    \Filament\Forms\Components\TextInput::make('point')
                                        ->label('Service Point')
                                        ->required(),
                                )
                                ->minItems(1)
                                ->addActionLabel('Add Service Point')
                                ->grid(1),
                            \Filament\Forms\Components\TextInput::make('highlight_button_icon')
                                ->label('Highlight Icon')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('highlight_button_text')
                                ->label('Highlight Text')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->addActionLabel('Add Country')
                        ->grid(1),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Global Operations Section')
                            ->submit('saveGlobalOperationsForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('globalOperationsSection');
    }

    public function saveGlobalOperationsForm(): void
    {
        $data = $this->globalOperationsForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.global_operations')->firstOrNew();
        $generalSetting->display_name = 'About Page Global Operations';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.global_operations';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Global operations section saved')
            ->success()
            ->send();
    }

    public function teamMembersForm(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Section::make('Team Members Section')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('title')
                        ->label('Section Title')
                        ->required(),
                    \Filament\Forms\Components\RichEditor::make('description')
                        ->label('Section Description')
                        ->required(),
                    \Filament\Forms\Components\Repeater::make('members')
                        ->label('Team Members')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('title')
                                ->label('Name')
                                ->required(),
                            \Filament\Forms\Components\TextInput::make('job_title')
                                ->label('Job Title')
                                ->required(),
                            \Filament\Forms\Components\FileUpload::make('media_file')
                                ->label('Media File')
                                ->image()
                                ->directory('uploads')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->addActionLabel('Add Team Member')
                        ->grid(2),
                    \Filament\Forms\Components\Actions::make([
                        \Filament\Forms\Components\Actions\Action::make('save')
                            ->label('Save Team Members Section')
                            ->submit('saveTeamMembersForm'),
                    ])->fullWidth(),
                ])
        ])->statePath('teamMembersSection');
    }

    public function saveTeamMembersForm(): void
    {
        $data = $this->teamMembersForm->getState();
        $generalSetting = GeneralSetting::where('name', 'about_page.team_members')->firstOrNew();
        $generalSetting->display_name = 'About Page Team Members';
        $generalSetting->type = 'json';
        $generalSetting->is_specific = 0;
        $generalSetting->name = 'about_page.team_members';
        $generalSetting->value = json_encode($data);
        $generalSetting->save();

        Notification::make()
            ->title('Team members section saved')
            ->success()
            ->send();
    }
}
