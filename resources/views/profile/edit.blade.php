<x-master-layout>
  <h3>Edit {{$profile->name}} Profile</h3>
  @if ($errors->any())
    <x-alert type="danger">
      <h6>Errors:</h6>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        {{-- @foreach ($errors->getMessages() as $field => $messages)
        <strong>{{ $field }}</strong>:
        <ul>
          @foreach ($messages as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @endforeach --}}
      </ul>
    </x-alert>
  @endif
  <form method="POST" action="{{route('profile.store')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{$profile->name}}" />
      @error('name')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}" />
      @error('email')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" />
      @error('password')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="repeted_password" class="form-label">Confirm Password</label>
      <input type="password" name="repeted_password" id="repeted_password" class="form-control"
        value="{{old('repeted_password')}}" />
      {{-- @error('password')
      <div class="text-danger">{{$message}}</div>
      @enderror --}}
    </div>
    <div class=" mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea name="bio" id="bio" class="form-control">{{$profile->bio}}</textarea>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Update
      </button>
    </div>
  </form>

</x-master-layout>