<x-layouts.app title="Booking">
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading size="xl" level="1">Booking</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your booking.') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="mt-5 w-full">

        <!-- @dump($bookings) -->
        <div class="flex justify-center">
            <form action="/booking-store" method="POST">
                @csrf
                <flux:input :label="__('Customer Name')" type="text" name="customer_name" id="customer_name" required
                    autofocus autocomplete="customer_name" class="w-64" />
                <!-- <input type="text" name="customer_name" id="customer_name"> -->
                @error('customer_name')
                    <div style="color:red">{{ $message }}</div>
                @enderror

                <br>
                <flux:input :label="__('Customer Email')" type="email" name="customer_email" id="customer_email"
                    required autofocus autocomplete="customer_email" />
                <!-- <input type="email" name="customer_email" id="customer_email"> -->
                @error('customer_email')
                    <div style="color:red">{{ $message }}</div>
                @enderror

                <br>
                <flux:input :label="__('Booking Code')" type="text" name="booking_code" id="booking_code" required
                    autofocus autocomplete="booking_code" />
                <!-- <input type="text" name="booking_code" id="booking_code"> -->
                @error('booking_code')
                    <div style="color:red">{{ $message }}</div>
                @enderror

                <br>
                <flux:input :label="__('Room ID')" type="text" name="room_id" id="room_id" required autofocus
                    autocomplete="room_id" />
                <!-- <input type="text" name="room_id" id="room_id"> -->
                @error('room_id')
                    <div style="color:red">{{ $message }}</div>
                @enderror

                <br>
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Booking Code</th>
                <th>Room ID</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td> {{ $booking->id }} </td>
                    <td> {{ $booking->customer_name }} </td>
                    <td> {{ $booking->customer_email }} </td>
                    <td> {{ $booking->booking_code }} </td>
                    <td> {{ $booking->room_id }} </td>
                    <td> <a href="{{ route('booking.edit', $booking->id) }}">Edit</a>
                        <a href="{{ route('booking.delete', $booking->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</x-layouts.app>