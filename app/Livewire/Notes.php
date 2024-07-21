<?php

namespace App\Livewire;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\WireElementsModalUpgrade;

class Notes extends Component
{
    use WithFileUploads;

    public $notes;
    public $title;
    public $content;
    public $due_date;
    public $image;
    public $noteId;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'due_date' => 'nullable|date',
        'image' => 'nullable|image|max:2048', // TODO: implement it
    ];

    public function mount()
    {
        $this->notes = Note::all();
    }

    public function store()
    {
        $this->validate();

        Note::create([
            'title' => $this->title,
            'content' => $this->content,
            'due_date' => $this->due_date ? Carbon::parse($this->due_date) : null,
        ]);

        $this->resetFields();

        $this->notes = Note::all();

        $this->dispatch('modalClosed', ['modal' => 'create']);
    }

    public function edit(Note $note)
    {
        $this->noteId = $note->id;
        $this->title = $note->title;
        $this->content = $note->content;
        $this->due_date = $note->due_date;
    }

    public function delete(Note $note)
    {
        if ($note->image) {
            Storage::disk('public')->delete($note->image);
        }
        $note->delete();
        $this->notes = Note::all();
    }

    public function update()
    {
        $this->validate();

        $note = Note::find($this->noteId);
        $note->update([
            'title' => $this->title,
            'content' => $this->content,
            'due_date' => $this->due_date ? Carbon::parse($this->due_date) : null,
        ]);

        $this->resetFields();

        $this->notes = Note::all();

        $this->dispatch('modalClosed', ['modal' => 'edit']);
    }

    public function render()
    {
        $notes = Note::all();
        return view('livewire.notes', compact('notes'));
    }

    private function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->due_date = null;
        $this->image = null;
    }
}
