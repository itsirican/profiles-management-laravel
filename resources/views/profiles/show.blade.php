@props(['profile'])
<x-master-layout>
  <div class="my-5">
    <div class="my-4"><a href="{{Route('profiles.index')}}">Back to profiles</a></div>

    {{-- <div class="card">
      <img class="card-img-top" style="height: 600px;" src="https://picsum.photos/id/{{$profile->id + 10}}/200/300"
        alt="Title" />
      <div class="card-body">
        <h4 class="card-title">{{$profile->name}}</h4>
        <h6 class="card-text">{{$profile->email}}</h6>
        <p class="card-body">{{$profile->bio}}</p>
      </div>
    </div> --}}
    <h6 class="card-title">Created At: {{$profile->created_at->format('d-m-Y')}}</h6>
    <x-profile-card :profile="$profile" :limit="NULL" />
    <h2 class="mt-5">Publications</h2>
    {{-- {{ dd($profile->publications) }} --}}
    <div class="mt-4">
      <div>
        @foreach ($profile->publications as $publication)
          <x-publication :publication="$publication" :canUpdate="auth()->user()->id === $publication->profile_id" />
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
  </div>
</x-master-layout>