<h1>Edit Booking</h1>

<form action="{{ route('booking.update', $booking->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" id="customer_name"
        value="{{ old('customer_name', $booking->customer_name) }}">
    @error('customer_name')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>
    <label for="customer_email">Email:</label>
    <input type="email" name="customer_email" id="customer_email"
        value="{{ old('customer_email', $booking->customer_email) }}">
    @error('customer_email')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>
    <label for="booking_code">Booking Code:</label>
    <input type="text" name="booking_code" id="booking_code"
        value="{{ old('booking_code', $booking->booking_code) }}">
    @error('booking_code')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>
    <label for="room_id">Room ID:</label>
    <input type="text" name="room_id" id="room_id" value="{{ old('room_id', $booking->room_id) }}">
    @error('room_id')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>
    <button type="submit">Submit</button>
</form>
