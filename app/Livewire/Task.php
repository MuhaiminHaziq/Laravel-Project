<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
use Livewire\WithPagination;

class Task extends Component
{
    public $id, $title, $taskIdBeingEdited = null;
    public $updateMode = false, $msg = '';
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'desc';

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
    public function tasks()
    {
        // return TaskModel::all();
        return TaskModel::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(5);
    }

    public function render()
    {
        // $tasks = TaskModel::all();
        // dd($this->tasks, $tasks);
        return view('livewire.task');
        // $tasks = Task::all();
        //     'tasks' => $tasks
        // ]);
    }

    public function resetInput()
    {
        $this->title = '';
    }

    public function update()
    {
        $this->validate([
            'title' => 'required'
        ]);
        $task = TaskModel::find($this->id);
        $task->update([
            'title' => $this->title
        ]);
        $this->resetInput();
        $this->updateMode = false;
        // $this->msg='Task Updated Successfully.';
        $this->updateAlert();
    }

    public function edit($id)
    {
        $task = TaskModel::find($id);
        // dd($room);
        $this->id = $task->id;
        $this->title = $task->title;
        $this->updateMode = true;
        $this->msg = '';
    }

    public function delete($id)
    {
        TaskModel::find($id)->delete();
        // $this->msg='Task Deleted Successfully.';
        $this->deleteAlert();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required'
        ]);
        // dd('test');
        TaskModel::create([
            'title' => $this->title
        ]);
        // $this->msg='New Task Created Successfully.';
        $this->successAlert();
        $this->resetInput();
    }

    public function successAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'New Task Created Successfully.',
        ]);
    }

    public function updateAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Task Updated Successfully.',
        ]);
    }

    public function deleteAlert()
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Task Deleted Successfully.',
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
