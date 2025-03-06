<div class="flex flex-col items-center gap-2">
    <div class="flex flex-col items-center gap-4">
        <h1 class="text-4xl font-bold text-gray-800 bg-gray-100 px-6 py-3 rounded-lg shadow-md">
            {{ $count }}
        </h1>
    </div>

    <div class="flex gap-2">
        <flux:button wire:click="increment" variant="primary" type="submit" class="px-4 py-2 text-sm">
            {{ __('+') }}
        </flux:button>

        <flux:button wire:click="decrement" variant="primary" type="submit" class="px-4 py-2 text-sm">
            {{ __('-') }}
        </flux:button>
    </div>
</div>