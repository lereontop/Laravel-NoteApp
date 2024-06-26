<x-app-layout>
    <div class="note-container single-note">
        <h1 text-3xl py-4   > Create New Note </h1>
        <form action="{{ route('note.update', $note) }}" method="post" class="note">
            @csrf
            @method('PUT')
            <textarea name="note" id=""  rows="10" placeholder="Enter your note here"  class="note-body" >
                {{ $note->note }}
            </textarea>

            <div class="note-buttons">
                <a href=" {{ route('note.index') }}" class="note-cancel-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
