<x-filament-panels::page>
    <div class="space-y-6">
        <form wire:submit.prevent="saveHeroSectionForm">
            {{ $this->heroSectionForm }}
        </form>
        <form wire:submit.prevent="saveAboutUsSectionForm">
            {{ $this->aboutUsSectionForm }}
        </form>
        <form wire:submit.prevent="saveFeaturesForm">
            {{ $this->featuresForm }}
        </form>
        <form wire:submit.prevent="saveUseCaseSectionForm">
            {{ $this->useCaseSectionForm }}
        </form>
        <form wire:submit.prevent="saveRegistrationFormSectionForm">
            {{ $this->registrationFormSectionForm }}
        </form>
    </div>
</x-filament-panels::page>
