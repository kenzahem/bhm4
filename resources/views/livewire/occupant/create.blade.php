<div>
    <x-header title="Add Occupant"/>
    <x-card class="border border-white w-1/2">
        <x-form wire:submit="addOc">
            <x-file wire:model="pic_id" label="ID Picture" hint="Image Files Only" accept="image/jpeg, image/png" />
            <x-input wire:model="firstname" label="First Name" required />
            <x-input wire:model="middlename" label="Middle Name" />
            <x-input wire:model="lastname" label="First Name" required />
            <x-input wire:model="origin_address" label="Origin Address" required />
            <x-datetime wire:model="entry_date" icon="lucide.calendar" label="Date Of Entry" required />
            <x-datetime wire:model="exit_date" icon="lucide.calendar" label="Date Of Exit" />
            <x-input wire:model="balance" label="Balance" prefix="PHP" money />
            <div class="flex justify-end mt-5 py-3 px-3 gap-3">
                <x-button wire:navigate href="/occupant" icon="lucide.x" label="Cancel" class="btn-error" />
                <x-button type="submit" icon="lucide.check" label="Create Record" class="btn-primary" />
            </div>
        </x-form>
    </x-card>
</div>
