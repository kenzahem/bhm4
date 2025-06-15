<div>
    <x-header title="Edit {{ $occupant->lastname }}, {{ $occupant->firstname }}">
        <x-slot:middle class="!justify-end">
            <x-button icon="lucide.arrow-left" label="Back" wire:navigate link="/occupant" class="btn-secondary" />
        </x-slot:middle>
    </x-header>
</div>
