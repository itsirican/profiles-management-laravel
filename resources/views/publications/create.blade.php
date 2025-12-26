<x-master-layout>
  <h3>Add New Publication</h3>
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
  <form method="POST" action="{{route('publications.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" />
      @error('title')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" mb-3">
      <label for="body" class="form-label">Description</label>
      <textarea name="body" id="body" class="form-control">{{old('body')}}</textarea>
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
    <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block my-2">
        Submit
      </button>
    </div>
  </form>

</x-master-layout>