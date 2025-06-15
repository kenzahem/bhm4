<div>
    <div class="flex justify-center mt-[200px]">
    <x-card title="LOGIN" class="w-75 border border-accent">
        <x-form wire:submit="authUser" >
            <x-input type="email" wire:model="email" label="Email Address" />
            <x-input type="password" wire:model="password" label="Password" />
            <x-slot:actions>
                <x-button type="submit" label="Login" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-card>
    </div>
</div>
