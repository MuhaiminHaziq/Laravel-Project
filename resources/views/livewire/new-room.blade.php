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
        {{-- <div class="flex flex-col">
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
        </div> --}}

        <div class="flex flex-col gap-4 w-full">
            <flux:input wire:model="student_name" :label="__('Student Name')" type="text" name="student_name" id="room_name"
                required autofocus autocomplete="room_name" class="w-full" />

            <flux:input wire:model="student_age" :label="__('Age')" type="number" name="student_age"
                id="room_price" required autofocus autocomplete="room_price" prefix="RM" class="w-full" />

            <flux:input wire:model="student_id" :label="__('ID')" type="number" name="student_id"
                id="room_quantity" required autofocus autocomplete="room_quantity" class="w-full" />

            <flux:input wire:model="student_email" :label="__('Email')" type="number" name="student_email"
                id="room_available" required autofocus autocomplete="room_available" class="w-full" />

            <flux:input wire:model="student_username" :label="__('Username')" type="number" name="student_username"
                        id="room_price" required autofocus autocomplete="room_price" prefix="RM" class="w-full" />

            <flux:input wire:model="student_password" :label="__('Password')" type="number" name="student_password"
                        id="room_available" required autofocus autocomplete="room_available" class="w-full" />

            <flux:input wire:model="student_department" :label="__('Department')" type="number" name="student_department"
                        id="room_available" required autofocus autocomplete="room_available" class="w-full" />

            <div class="flex items-center justify-between w-full gap-4">
                <div class="flex items-center justify-center w-full">
                    @if ($updateMode)
                        <flux:button wire:click.prevent="update()" variant="primary" type="submit"
                            class="w-full py-2 px-4 rounded-lg shadow-md">
                            {{ __('Update') }}
                        </flux:button>
                    @else
                        <flux:button wire:click.prevent="store()" variant="primary" type="submit"
                            class="w-full py-2 px-4 rounded-lg shadow-md">
                            {{ __('Save') }}
                        </flux:button>
                    @endif
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
                                            <div class="flex in-[.group\/right-align]:justify-end">Name</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Age</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Student ID</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Email</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Username</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Password</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end">Category</div>
                                        </th>
                                        <th class="py-3 px-3 first:pl-0 last:pr-0 text-left text-sm font-medium text-zinc-800 dark:text-white  **:data-flux-table-sortable:last:mr-0"
                                            data-flux-column="">
                                            <div class="flex in-[.group\/right-align]:justify-end"> </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-zinc-800/10 dark:divide-white/20" data-flux-rows="">
                                    @foreach ($this->rooms as $room)
                                        <tr data-flux-rows="">
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_name }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_age }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_id }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_email }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_username }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_password }}
                                            </td>
                                            <td class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white"
                                                data-flux-cell="">
                                                {{ $room->student_department }}
                                            </td>
                                            <td
                                                class="py-3 px-3 first:pl-0 last:pr-0 text-sm font-medium text-zinc-800 dark:text-white">
                                                <div class="flex items-center justify-center gap-4">
                                                    <flux:button wire:click.prevent="edit({{ $room->id }})"
                                                        variant="primary" type="submit">
                                                        {{ 'Edit' }}
                                                    </flux:button>
                                                    <flux:button
                                                        wire:click.prevent="deleteConfirm({{ $room->id }})"
                                                        variant="danger" type="submit">
                                                        {{ 'Delete' }}
                                                    </flux:button>
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
