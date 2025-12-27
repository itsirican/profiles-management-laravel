<x-master-layout>
  <h2>Publications</h2>
  <div class="container w-75 mx-auto">
    <div>
      @foreach ($publications as $publication)
        <x-publication :publication="$publication" {{-- :canUpdate="auth()->user()->id === $publication->profile_id"
          --}} />
        {{-- <div class="card my-2 bg-light">
          <div class="card-body">
            @auth
            @if (auth()->user()->id === $publication->profile_id)
            <div style="float: inline-end">
              <a class="float-end btn btn-primary btn-sm"
                href="{{ route('publications.edit', $publication->id) }}">Edit</a>
              <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure, you want to delete this publication')"
                  class="mx-1 float-end btn btn-danger btn-sm">
                  Delete</button>
              </form>
            </div>
            @endif
            @endauth
            <blockquote class="blockquote mb-0">
              <p>{{ $publication->title }}</p>
              <p>{{ $publication->body }}</p>
              @unless(!$publication->image)
              <footer class="blockquote-footer">
                <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}"
                  class="img-fluid">
              </footer>
              @endisset
            </blockquote>
          </div>
        </div> --}}
      @endforeach
    </div>
  </div>
</x-master-layout>