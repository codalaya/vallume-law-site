<x-filament-panels::page>
    <div class="space-y-6">
        <form wire:submit.prevent="saveHeaderForm">
            {{ $this->headerForm }}
        </form>

        <form wire:submit.prevent="saveServiceDetailsForm">
            {{ $this->serviceDetailsForm }}
        </form>

        <form wire:submit.prevent="saveQuickStatsForm">
            {{ $this->quickStatsForm }}
        </form>

        <form wire:submit.prevent="saveFoundersNoteForm">
            {{ $this->foundersNoteForm }}
        </form>

        <form wire:submit.prevent="saveHighlightsForm">
            {{ $this->highlightsForm }}
        </form>

        <form wire:submit.prevent="saveJourneyForm">
            {{ $this->journeyForm }}
        </form>

        <form wire:submit.prevent="saveGlobalOperationsForm">
            {{ $this->globalOperationsForm }}
        </form>

        <form wire:submit.prevent="saveTeamMembersForm">
            {{ $this->teamMembersForm }}
        </form>
    </div>
</x-filament-panels::page>
