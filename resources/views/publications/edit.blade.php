<x-master-layout>
  <h3>Update Publication</h3>
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
  <form method="POST" action="{{route('publications.update', $publication->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{old('title', $publication->title)}}" />
      @error('title')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="body" class="form-label">Description</label>
      <textarea name="body" id="body" class="form-control">{{old('body', $publication->body)}}</textarea>
      @error('body')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="image" class="form-label">Image</label>
      <input name="image" id="image" type="file" class="form-control" />
      @error('image')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="my-2">
      <img class="mw-100" src="{{ asset('storage/' . $publication->image) }}" alt="">
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Update
      </button>
    </div>
  </form>

</x-master-layout>