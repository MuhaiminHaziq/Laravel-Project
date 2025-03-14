<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Counter</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('And counting..') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex items-start max-md:flex-col">

        <div class="mt-5 w-full max-w-lg">
            <h1>{{ $count }}</h1>


            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button wire:click="increment" variant="primary" type="submit" class="w-full">
                        {{ __('+') }}</flux:button>
                </div>
                <div class="flex items-center justify-end">
                    <flux:button wire:click="decrement" variant="primary" type="submit" class="w-full">
                        {{ __('-') }}</flux:button>
                </div>
            </div>

        </div>
    </div>
</div>
