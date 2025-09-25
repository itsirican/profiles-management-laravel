@props(['profile', 'limit' => NULL])
<div class="card">
  <img class="card-img-top" style="height: 600px;" src="https://picsum.photos/id/{{$profile->id + 10}}/200/300"
    alt="Title" />
  <div class="card-body">
    <h4 class="card-title">{{$profile->name}}</h4>
    <h6 class="card-text">{{$profile->email}}</h6>
    {{-- <p class="card-body">{{$profile->bio}}</p> --}}
    <p class="card-body">{{$limit ? Str::limit($profile->bio, $limit) : $profile->bio}}</p>
    @if ($limit)
      <a href="{{Route('profile.show', $profile->id)}}" class="stretched-link"></a>
    @endif
  </div>
</div>