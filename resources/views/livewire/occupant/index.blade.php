<div>
    <x-header title="Occupant List" separator>
        <x-slot:middle class="!justify-end">
            <x-button wire:navigate href="/occupant/create" label="Add Occupant" class="btn-primary" />
        </x-slot:middle>
    </x-header>
    <x-card class="border border-white">
        <x-table :headers="$headers" :rows="$occupants" striped>
            @scope('actions', $occupants)
                <div class="flex justify-end gap-3">
                    <x-button wire:navigate link="/occupant/{{ $occupants->id }}/edit" icon="lucide.trash-2" label="Edit" class="btn-error btn-outline btn-sm" />
                    <x-button wire:navigate link="/occupant/{{ $occupants->id }}/view" icon="lucide.eye" label="View" class="btn-info btn-outline btn-sm" />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
