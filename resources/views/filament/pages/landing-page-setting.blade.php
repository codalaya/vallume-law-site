<x-filament-panels::page>
    <div class="space-y-6">
        <form wire:submit.prevent="saveHeroSectionForm">
            {{ $this->heroSectionForm }}
        </form>

        <form wire:submit.prevent="saveAboutUsSectionForm">
            {{ $this->aboutUsSectionForm }}
        </form>

        <form wire:submit.prevent="saveServiceSectionForm">
            {{ $this->serviceSectionForm }}
        </form>

        <form wire:submit.prevent="saveWhyChooseUsForm">
            {{ $this->whyChooseUsForm }}
        </form>

        <form wire:submit.prevent="saveTestimonialsForm">
            {{ $this->testimonialsForm }}
        </form>

        <form wire:submit.prevent="saveCareerWithUsForm">
            {{ $this->careerWithUsForm }}
        </form>

        <form wire:submit.prevent="saveContactWithUsForm">
            {{ $this->contactWithUsForm }}
        </form>

    </div>
</x-filament-panels::page>
