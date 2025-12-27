{{-- @props(['publication']) --}}
<div class="card my-2 bg-light">
  <div class="card-body">
    @auth
      @if ($canUpdate)
        <div style="float: inline-end">
          <a class="float-end btn btn-primary btn-sm" href="{{ route('publications.edit', $publication->id) }}">Edit</a>
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
      <div style="display: flex; align-items: center; gap: 15px; width: fit-content;
        position: relative;">
        {{-- {{ $publication->profile->image}} --}}
        <img src="{{ asset("storage/" . $publication->profile->image) }}" style="max-width: 100%;
        width: 50px;
        border-radius: 50%;
        height: 50px;
        object-fit: cover;">
        <div style="display: flex; flex-direction: column; justify-content: center;">
          <h4 style="margin: 0">{{ $publication->profile->name }}</h4>
          <span style="font-size: 14px; color: #777;">
            {{ $publication->profile->created_at }}
          </span>
        </div>
        <a href="{{ route('profiles.show', $publication->profile->id) }}" class="stretched-link"></a>
      </div>
      <hr>
      <h5>{{ $publication->title }}</h5>
      <p>{{ $publication->body }}</p>
      @unless(!$publication->image)
      <footer class="blockquote-footer">
        <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}" class="img-fluid">
      </footer>
      @endisset
    </blockquote>
  </div>
</div>