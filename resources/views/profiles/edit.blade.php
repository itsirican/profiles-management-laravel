<x-master-layout>
  <h3>Edit {{$profile->name}} Profile</h3>
  <form method="POST" action="{{route('profiles.update', $profile->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{old('name', $profile->name)}}" />
      @error('name')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{old('email', $profile->email)}}" />
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
      <textarea name="bio" id="bio" class="form-control">{{old('bio', $profile->bio)}}</textarea>
    </div>
    <div class=" mb-3">
      <label for="image" class="form-label">Image</label>
      <input name="image" id="image" type="file" class="form-control" />
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Update
      </button>
    </div>
  </form>

</x-master-layout>