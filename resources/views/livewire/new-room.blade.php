<div>
    {{-- Be like water. --}}
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading size="xl" level="1">Room Data</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('View, manage, and update room information effortlessly.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="px-6 py-16 overflow-x-auto">
        @if ($msg != '')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ $msg }}
            </div>
        @endif
        <div class="flex flex-col">
            <flux:input wire:model="room_name" :label="__('Room Name')" type="text" name="room_name" id="room_name"
                required autofocus autocomplete="room_name" />
            <br>
            <flux:input wire:model="room_price" :label="__('Room Price')" type="number" name="room_price"
                id="room_price" required autofocus autocomplete="room_price" prefix="RM" />
            <br>
            <flux:input wire:model="room_quantity" :label="__('Room Quantity')" type="number" name="room_quantity"
                id="room_quantity" required autofocus autocomplete="room_quantity" />
            <br>
            <flux:input wire:model="room_available" :label="__('Room Available')" type="number" name="room_available"
                id="room_available" required autofocus autocomplete="room_available" />
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
                                        <div class="flex in-[.group\/right-align]:justify-end">Room Name</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Room Price</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Room Quantity</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Room Available</div>
                                    </th>
                                    <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                        data-flux-column="">
                                        <div class="flex in-[.group\/right-align]:justify-end">Status</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-800/10 dark:divide-white/20" data-flux-rows="">
                                @foreach ($this->rooms as $room)
                                    <tr data-flux-rows="">
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $room->room_name }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $room->room_price }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $room->room_quantity }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $room->room_available }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            {{ $room->status }}
                                        </td>
                                        <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                            data-flux-cell="">
                                            <div class="flex items-center justify-center gap-4">
                                                <div class="flex items-center justify-center">
                                                    <div class="flex gap-4">
                                                        <flux-button wire:click="edit({{ $room->id }})"
                                                            variant="primary" type="submit" class="w-full">
                                                            {{ 'Edit' }}
                                                        </flux-button>
                                                        <flux-button wire:click="danger({{ $room->id }})"
                                                            variant="danger" type="submit" class="w-full">
                                                            {{ 'Delete' }}
                                                        </flux-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-700 max-sm:flex-col max-sm:gap-3 max-sm:items-end">
                            {{ $this->rooms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('alert', function() {
            Swal.fire({
                title: 'Success',
                text: 'Room Added Successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        })
        window.addEventListener('delete', function() {
            const id = event.detail[0].id
            console.log('delete', event, id)
            Swal.fire({
                title: event.detail[0].title,
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
        })
    </script>
</div>
