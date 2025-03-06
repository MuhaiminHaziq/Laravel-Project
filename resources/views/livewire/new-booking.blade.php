<div>
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading size="xl" level="1">Data Booking</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your data.') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="px-6 py-16 overflow-x-auto">
        @if($msg != '')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ $msg }}
            </div>
        @endif
        <div class="flex flex-col">
            <flux:input wire:model="customer_name" :label="__('Customer Name')" type="text" name="customer_name"
                id="customer_name" required autofocus autocomplete="customer_name" />

            <br>
            <flux:input wire:model="customer_email" :label="__('Customer Email')" type="email" name="customer_email"
                id="customer_email" required autofocus autocomplete="customer_email" />

            <br>
            <flux:input wire:model="booking_code" :label="__('Booking Code')" type="text" name="booking_code"
                id="booking_code" required autofocus autocomplete="booking_code" />

            <br>
            <flux:input wire:model="room_id" :label="__('Room ID')" type="text" name="room_id" id="room_id" required
                autofocus autocomplete="room_id" />

            <br>
            <div class="flex items-center justify-center gap-4 w-full">
                <div class="flex items-center justify-center w-full">
                    @if($updateMode)
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
                        <table
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
                                                        <flux:button wire:click.prevent="delete({{ $booking->id }})"
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
</div>
