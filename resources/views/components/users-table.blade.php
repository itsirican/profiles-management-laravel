{{-- @props(['users']) --}}
@isset($users)
  <table class="table">
    <tr>
      <td>Id</td>
      <td>Name</td>
      <td>Job</td>
    </tr>
    @foreach ($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['job']}}</td>
      </tr>
    @endforeach
  </table>
@else
  <h2>Users not found</h2>
@endisset