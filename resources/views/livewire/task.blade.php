<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">To-Do List</h2>

    <!-- Input Field & Add Button -->
    <div class="flex items-center gap-2 bg-gray-100 p-3 rounded-lg shadow-md">
        <input type="text" wire:model="title"
            class="flex-1 border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none p-3 rounded-lg text-black placeholder-gray-500"
            placeholder="Enter a new task..." required autofocus autocomplete="title">

        <button wire:click="{{ $updateMode ? 'update' : 'store' }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-blue-600 active:scale-95 transition duration-200">
            {{ $updateMode ? 'Update' : 'Add' }}
        </button>
    </div>

    <!-- List Task -->
    <ul class="mt-4 space-y-2">

        @foreach ($this->tasks as $task)
            <li wire:key="task-{{ $task->id }}"
                class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow">
                {{-- {{ dd($task) }}; --}}
            <li class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow">
                <div class="flex items-center gap-3">
                    <input type="checkbox" wire:click="toggleTask({{ $task->id }})"
                        {{ $task->completed ? 'checked' : '' }} class="h-5 w-5 cursor-pointer accent-blue-500">
                    <span class="text-lg {{ $task->completed ? 'line-through text-gray-500' : 'text-black' }}">
                        {{ $task->title }}
                    </span>
                </div>
                <div class="flex gap-4">
                    <div class="flex gap-2">
                        <button wire:click.prevent="edit({{ $task->id }})"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-green-600 active:scale-95 transition duration-200">
                            Edit
                        </button>
                        <button wire:click.prevent="delete({{ $task->id }})"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-red-600 active:scale-95 transition duration-200">
                            Delete
                        </button>
                    </div>
                </div>
            </li>
        @endforeach
        <div
            class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-700 max-sm:flex-col max-sm:gap-3 max-sm:items-end">
            {{ $this->tasks->links() }}
        </div>
    </ul>
    <script>
        window.addEventListener('alert', (event) => {
            const detail = event.detail[0] || event.detail {};
            Swal.fire({
                text: detail.message,
                icon: detail.type,
            })
        })
        window.addEventListener('delete', (event) => {
            const detail = event.detail[0] || event.detail {};
            const id = event.detail.id;
            console.log('delete', event, id)
            Swal.fire({
                title: detail[0].title,
                text: detail[0].text,
                icon: detail[0].type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Confirmed delete', id);
                    @this.call('delete', id)
                } else {
                    console.log('Delete cancelled');
                    @this.call('resetInput')
                }
            })
        })
    </script>
</div>
