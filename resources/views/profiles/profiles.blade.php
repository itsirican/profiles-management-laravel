{{-- @extends('layout.master') --}}
<x-master-layout title="Profile">
  <h2>Profiles</h2>
  {{-- <table class="table">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Bio</th>
      <th>Actions</th>
    </tr> --}}
    <div class="row my-2">
      @foreach ($profiles as $profile)
        <div class="col-sm-4 my-3">
          <x-profile-card :profile="$profile" :limit="80" />
        </div>

        {{-- <tr>
          <td>{{$profile->id}}</td>
          <td>{{$profile->name}}</td>
          <td>{{$profile->email}}</td>
          <td>{{Str::limit($profile->bio, 50)}}</td>
          <td>
            <a class="btn btn-primary" href="{{Route('profile.show', $profile->id)}}" role="button">Show more</a>
          </td>
        </tr> --}}
      @endforeach
    </div>
    {{--
  </table> --}}
  {{$profiles->links()}}
  {{-- @section("title")Profile @endsection --}}
  {{-- @section('main') --}}
  {{-- <x-alert type="danger">Hello profile alert</x-alert>
  <x-users-table /> --}}
  {{-- @endsection --}}
</x-master-layout>