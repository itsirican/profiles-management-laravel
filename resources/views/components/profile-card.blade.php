@props(['profile', 'limit' => NULL])
<div class="card">
  <img class="card-img-top" style="height: 600px; object-fit: cover;" src="{{asset('storage/' . $profile->image)}}"
    alt="Title" />
  <div class="card-body">
    <h4 class="card-title">{{$profile->name}}</h4>
    <h6 class="card-text">{{$profile->email}}</h6>
    {{-- <p class="card-body">{{$profile->bio}}</p> --}}
    <p class="card-body">{{$limit ? Str::limit($profile->bio, $limit) : $profile->bio}}</p>
    @if ($limit)
      <a href="{{Route('profiles.show', $profile->id)}}" class="stretched-link"></a>
    @endif
  </div>
  <div class="card-footer border-top px-3 py-2 bg-light" style="z-index: 9">
    <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
      @method('Delete')
      @csrf
      <button class="btn btn-danger btn-sm float-right">Delete</button>
    </form>
    <form action="{{route('profiles.edit', $profile->id)}}" method="GET">
      {{-- @csrf --}}
      <button class="btn btn-primary btn-sm float-right mx-2">Edit</button>
    </form>
    </form>
  </div>
</div>