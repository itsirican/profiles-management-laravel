<x-master-layout>
  <h3>Login Page</h3>
  <form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" />
      @error('email')
        <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" />
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Submit
      </button>
    </div>
  </form>

</x-master-layout>