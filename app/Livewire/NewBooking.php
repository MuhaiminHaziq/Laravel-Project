<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class NewBooking extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $customer_name, $customer_email, $booking_code, $room_id, $id;
    public $updateMode = false, $msg = '';
    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }
    #[\Livewire\Attributes\Computed]
    public function bookings2()
    {
        return Booking::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(5);
    }
    public function render()
    {
        $bookings = Booking::all();
        return view('livewire.new-booking', [
            'bookings' => $bookings
        ]);
    }
    public function resetInput()
    {
        $this->customer_name = '';
        $this->customer_email = '';
        $this->booking_code = '';
        $this->room_id = '';
        $this->id = '';
    }
    public function update()
    {
        $this->validate([
            'customer_name' => 'required',
            'customer_email' => 'required | email',
            'booking_code' => 'required',
            'room_id' => 'required',
        ]);
        $booking = Booking::find($this->id);
        $booking->update([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'booking_code' => $this->booking_code,
            'room_id' => $this->room_id,
        ]);
        $this->resetInput();
        $this->updateMode = false;
        // $this->msg='Booking Updated Successfully.';
        $this->updateAlert();
    }
    public function edit($id)
    {
        $booking = Booking::find($id);
        // dd($booking);
        $this->id = $booking->id;
        $this->customer_name = $booking->customer_name;
        $this->customer_email = $booking->customer_email;
        $this->booking_code = $booking->booking_code;
        $this->room_id = $booking->room_id;
        $this->updateMode = true;
        $this->msg = '';
    }
    public function delete($id)
    {
        Booking::find($id)->delete();
        // $this->msg='Booking Deleted Successfully.';
        $this->deleteAlert();
    }
    public function store()
    {
        // dd($this->customer_name, $this->customer_email, $this->booking_code, $this->room_id);
        $this->validate([
            'customer_name' => 'required',
            'customer_email' => 'required | email',
            'booking_code' => 'required',
            'room_id' => 'required',
        ]);
        Booking::create([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'booking_code' => $this->booking_code,
            'room_id' => $this->room_id,
        ]);
        // $this->msg='Booking Created Successfully.';
        $this->successAlert();
        $this->resetInput();
    }
    public function successAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Booking Created Successfully.',
        ]);
    }
    public function updateAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Booking Updated Successfully.',
        ]);
    }
    public function deleteAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Booking Deleted Successfully.',
        ]);
    }
    public function deleteConfirm($id)
    {
        $this->dispatch('delete', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'You won\'t be able to revert this!',
            'id' => $id,
        ]);
    }
    public function cancelConfirm()
    {
        $this->dispatch('cancel', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'You won\'t be able to revert this!',
        ]);
    }
}
