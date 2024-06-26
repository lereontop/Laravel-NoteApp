<x-app-layout>
    <div class="py-12 note-container">
        <a href="{{ route('note.create') }}" class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            @foreach ($notes as $note)
            <div class="note">
                <div class="note-body">
                    {{  Str::words($note->note, 30) }}
                </div>
                <div class="note-buttons">
                    <a href="{{ route('note.show', $note) }}" class="note-edit-button ">View</a>
                    <a href="{{ route('note.edit', $note) }}" class="note-edit-button ">Edit</a>
                    {{--  <button class="note-delete-button"> Delete</button>  --}}
                    <form action="{{ route('note.destroy', $note) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="note-delete-button"> Delete</button>
                    </form>
                </div>
            </div>
            @endforeach

            <div class="p-6">
                {{ $notes->links() }}
                </div>
            {{--  class="note-edit-button"  --}}
        </div>
    </div>
</x-app-layout>
