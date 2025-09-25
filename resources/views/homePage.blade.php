<x-master-layout title="Home">
  {{-- @section('main') --}}
  <x-alert type="primary">
    <strong>Alert Heading</strong> Some Word
  </x-alert>
  <h1>Home page</h1>
  @dump($users)
  <x-users-table :users="$users" />
  {{-- @endsection --}}
</x-master-layout>