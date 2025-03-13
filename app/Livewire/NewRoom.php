<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithPagination;

class NewRoom extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $room_name, $room_price, $room_quantity, $room_available, $status, $id;
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
    public function rooms()
    {
        return Room::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(5);
    }
    public function render()
    {
        $rooms = Room::all();
        return view('livewire.new-room', [
            'rooms' => $rooms
        ]);
    }
    public function resetInput()
    {
        $this->room_name = '';
        $this->room_price = '';
        $this->room_quantity = '';
        $this->room_available = '';
        $this->status = '';
        $this->id = '';
    }
    public function update()
    {
        $this->validate([
            'room_name' => 'required',
            'room_price' => 'required',
            'room_quantity' => 'required',
            'room_available' => 'required',
            'status' => 'required',
        ]);
        $room = Room::find($this->id);
        $room->update([
            'room_name' => $this->room_name,
            'room_price' => $this->room_price,
            'room_quantity' => $this->room_quantity,
            'room_available' => $this->room_available,
            'status' => $this->status,
        ]);
        $this->resetInput();
        $this->updateMode = false;
        // $this->msg='Room Updated Successfully.';
        $this->updateAlert();
    }
    public function edit($id)
    {
        $room = Room::find($id);
        // dd($room);
        $this->id = $room->id;
        $this->room_name = $room->room_name;
        $this->room_price = $room->room_price;
        $this->room_quantity = $room->room_quantity;
        $this->room_available = $room->room_available;
        $this->status = $room->status;
        $this->updateMode = true;
        $this->msg = '';
    }
    public function delete($id)
    {
        Room::find($id)->delete();
        // $this->msg='Room Deleted Successfully.';
        $this->deleteAlert();
    }
    public function store()
    {
        $this->validate([
            'room_name' => 'required',
            'room_price' => 'required',
            'room_quantity' => 'required',
            'room_available' => 'required',
            'status' => 'required',
        ]);
        Room::create([
            'room_name' => $this->room_name,
            'room_price' => $this->room_price,
            'room_quantity' => $this->room_quantity,
            'room_available' => $this->room_available,
            'status' => $this->status,
        ]);
        // $this->msg='Room Created Successfully.';
        $this->successAlert();
        $this->resetInput();
    }
    public function successAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Room Created Successfully.',
        ]);
    }
    public function updateAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Room Updated Successfully.',
        ]);
    }
    public function deleteAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Room Deleted Successfully.',
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
