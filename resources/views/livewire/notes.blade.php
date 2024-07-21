<div class="container mt-4">
    <h1 class="mb-4">Notizen</h1>

    <!-- Button zum Erstellen neuer Notizen -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createNoteModal">
        Neue Notiz erstellen
    </button>

    <!-- Tabelle der Notizen -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Inhalt</th>
                    <th>Fällig</th>
                    <th>Erstellt am</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td>{{ $note->id }} {{ $note->title }}</td>
                        <td>{{ Str::limit($note->content, 50) }}</td>
                        <td>{{ $note->due_date ? $note->due_date->format('d.m.Y') : 'N/A' }}</td>
                        <td>{{ $note->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editNoteModal" wire:click="edit({{ $note->id }})">Bearbeiten</button>
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $note->id }})">Löschen</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal zum Erstellen neuer Notizen -->
    <div class="modal fade" id="createNoteModal" tabindex="-1" role="dialog" aria-labelledby="createNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNoteModalLabel">Neue Notiz erstellen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="title">Titel</label>
                            <input type="text" class="form-control" id="title" wire:model="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Inhalt</label>
                            <textarea class="form-control" id="content" rows="5" wire:model="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="due_date">Fälligkeitsdatum</label>
                            <input type="date" class="form-control" id="due_date" wire:model="due_date">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Speichern</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal zum Bearbeiten von Notizen -->
    <div class="modal fade" wire:ignore.self id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="editNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNoteModalLabel">Notiz bearbeiten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <label for="editTitle">Titel</label>
                            <input type="text" class="form-control" id="editTitle" wire:model="title" required>
                        </div>
                        <div class="form-group">
                            <label for="editContent">Inhalt</label>
                            <textarea class="form-control" id="editContent" rows="5" wire:model="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editDueDate">Fälligkeitsdatum</label>
                            <input type="date" class="form-control" id="editDueDate" wire:model="due_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Aktualisieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('modalClosed', event => {
            if (event[0].modal === 'create') {
                $('#createNoteModal').modal('hide');
            } else if (event[0].modal === 'edit') {
                $('#editNoteModal').modal('hide');
            }
        });
    });
</script>
