<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading size="xl" level="1">Booking Data</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Organize and manage your records.') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="px-6 py-16 overflow-x-auto">
        @if ($msg != '')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ $msg }}
            </div>
        @endif
        {{-- <div class="flex flex-col">
            <flux:input wire:model="customer_name" :label="__('Customer Name')" type="text" name="customer_name"
                id="customer_name" required autofocus autocomplete="customer_name" />
            <br>
            <flux:input wire:model="customer_email" :label="__('Customer Email')" type="email" name="customer_email"
                id="customer_email" required autofocus autocomplete="customer_email" />
            <br>
            <flux:input wire:model="booking_code" :label="__('Booking Code')" type="number" name="booking_code"
                id="booking_code" required autofocus autocomplete="booking_code" min="0" />
            <br>
            <flux:input wire:model="room_id" :label="__('Room ID')" type="number" name="room_id" id="room_id"
                required autofocus autocomplete="room_id" min="0" />
            <br>
            <div class="flex items-center justify-center gap-4 w-full">
                <div class="flex items-center justify-center w-full">
                    @if ($updateMode)
                        <flux:button wire:click.prevent="update()" variant="primary" type="submit" class="w-full">
                            {{ __('Update') }}
                        </flux:button>
                    @else
                        <flux:button wire:click.prevent="store()" variant="primary" type="submit" class="w-full">
                            {{ __('Save') }}
                        </flux:button>
                    @endif
                </div>
            </div>
        </div> --}}
        <div class="flex flex-col gap-4">
            <flux:input wire:model="customer_name" :label="__('Customer Name')" type="text" name="customer_name"
                id="customer_name" required autofocus autocomplete="customer_name" />

            <flux:input wire:model="customer_email" :label="__('Customer Email')" type="email" name="customer_email"
                id="customer_email" required autofocus autocomplete="customer_email" />

            <flux:input wire:model="booking_code" :label="__('Booking Code')" type="number" name="booking_code"
                id="booking_code" required autofocus autocomplete="booking_code" min="0" />

            <flux:input wire:model="room_id" :label="__('Room ID')" type="number" name="room_id" id="room_id"
                required autofocus autocomplete="room_id" min="0" />

            <div class="flex items-center justify-center gap-4 w-full">
                <div class="flex items-center justify-center w-full">
                    @if ($updateMode)
                        <flux:button wire:click.prevent="update()" variant="primary" type="submit" class="w-full">
                            {{ __('Update') }}
                        </flux:button>
                    @else
                        <flux:button wire:click.prevent="store()" variant="primary" type="submit" class="w-full">
                            {{ __('Save') }}
                        </flux:button>
                    @endif
                </div>
            </div>
        </div>

        <div class="m-auto  flex justify-center">
            <div class="w-full lg:px-24 overflow-x-auto">
                <div>
                    <div class="overflow-x-auto">
                        {{-- <table
                            class="[:where(&)]:min-w-full table-fixed text-zinc-800 divide-y divide-zinc-800/10 dark:divide-white/20 text-zinc-800 whitespace-nowrap [&_dialog]:whitespace-normal [&_[popover]]:whitespace-normal"
                            data-flux-table="">
                            <thead data-flux-columns="">
                                <tr>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">ID</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Customer Name</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Customer Email</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Booking Code</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Room ID</div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-zinc-800/10 dark:divide-white/20 [&:not(:has(*))]:border-t-0!"
                                data-flux-rows="">
                                @foreach ($this->bookings2 as $booking)
                                    <tr data-flux-row="">
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm  text-zinc-500 dark:text-zinc-300"
                                            data-flux-cell="">
                                            {{ $booking->id }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm  text-zinc-500 dark:text-zinc-300"
                                            data-flux-cell="">
                                            {{ $booking->customer_name }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm  text-zinc-500 dark:text-zinc-300"
                                            data-flux-cell="">
                                            {{ $booking->customer_email }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm  text-zinc-500 dark:text-zinc-300"
                                            data-flux-cell="">
                                            {{ $booking->booking_code }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm  font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $booking->room_id }}
                                        </td>
                                        <td
                                            class="py-3 px-3 first:pl-0 last:pr-0 text-sm  text-zinc-500 dark:text-zinc-300">
                                            <div class="flex items-center justify-center gap-4">
                                                <div class="flex items-center justify-center">
                                                    <div class="flex gap-4">
                                                        <flux:button wire:click.prevent="edit({{ $booking->id }})"
                                                            variant="primary" type="submit" class="w-full">
                                                            {{ __('Edit') }}
                                                        </flux:button>
                                                        <flux:button
                                                            wire:click.prevent="deleteConfirm({{ $booking->id }})"
                                                            variant="danger" type="submit" class="w-full">
                                                            {{ __('Delete') }}
                                                        </flux:button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        <table
                            class="[:where(&)]:min-w-full table-fixed text-zinc-800 divide-y divide-zinc-800/10 dark:divide-white/20
           text-zinc-800 whitespace-nowrap [&_dialog]:whitespace-normal [&_[popover]]:whitespace-normal"
                            data-flux-table="">
                            <thead data-flux-columns="">
                                <tr>
                                    @foreach (['ID', 'Customer Name', 'Customer Email', 'Booking Code', 'Room ID', 'Actions'] as $header)
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">{{ $header }}
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-zinc-800/10 dark:divide-white/20 [&:not(:has(*))]:border-t-0!"
                                data-flux-rows="">
                                @foreach ($this->bookings2 as $booking)
                                    <tr data-flux-row="">
                                        @foreach (['id', 'customer_name', 'customer_email', 'booking_code', 'room_id'] as $field)
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm text-zinc-500 dark:text-zinc-300 {{ $field == 'room_id' ? 'font-medium text-zinc-800 dark:text-white' : '' }}"
                                                data-flux-cell="">
                                                {{ $booking->$field }}
                                            </td>
                                        @endforeach

                                        <td
                                            class="py-3 px-3 first:pl-0 last:pr-0 text-sm text-zinc-500 dark:text-zinc-300 text-center">
                                            <div class="flex items-center justify-center gap-4">
                                                <flux:button wire:click.prevent="edit({{ $booking->id }})"
                                                    variant="primary" type="submit">
                                                    {{ __('Edit') }}
                                                </flux:button>
                                                <flux:button wire:click.prevent="deleteConfirm({{ $booking->id }})"
                                                    variant="danger" type="submit">
                                                    {{ __('Delete') }}
                                                </flux:button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div
                            class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-700  max-sm:flex-col max-sm:gap-3 max-sm:items-end">
                            {{ $this->bookings2->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        window.addEventListener('alert', function() {
            Swal.fire({
                icon: event.detail[0].type,
                title: event.detail[0].message,
            });
        });

        window.addEventListener('delete', function() {
            const id = event.detail[0].id
            console.log('delete', event, id)
            Swal.fire({
                title: event.detail[0].message,
                text: event.detail[0].text,
                icon: event.detail[0].type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    console.log('delete', event, id);
                    @this.call('delete', id)
                } else {
                    console.log('cancel');
                    @this.call('resetInput')
                }
            })
        });
    </script> --}}
    <script>
        window.addEventListener('alert', (event) => {
            const detail = event.detail[0] || {}; // Prevents errors if undefined
            Swal.fire({
                icon: detail.type,
                title: detail.message,
            });
        });

        window.addEventListener('delete', (event) => {
            const detail = event.detail[0] || {}; // Extract and prevent errors
            const id = detail.id;

            console.log('delete', event, id);

            Swal.fire({
                title: detail.message,
                text: detail.text,
                icon: detail.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Confirmed delete:', id);
                    @this.call('delete', id);
                } else {
                    console.log('Delete cancelled');
                    @this.call('resetInput');
                }
            });
        });
    </script>

</div>
