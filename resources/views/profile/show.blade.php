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
  </div>
</x-master-layout>