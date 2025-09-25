<x-master-layout>
  <h3>Add New Profile</h3>

  <form method="POST" action="{{route('profile.store')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" />
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea name="bio" id="bio" class="form-control"></textarea>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Submit
      </button>
    </div>
  </form>

</x-master-layout>