@extends ('layouts.app')
@section('title','Contact List Page')



@section('content')

<!-- On tables -->
<table class="table table-success table-striped">
  <thead>
    <tr>
        <td>#ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Subject</td>
        <td>Message</td>
        <td>Created At</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($messages as $message)
    <tr>
        <td>{{$message['id']}}</td>
        <td>{{$message['name']}}</td>
        <td>{{$message['email']}}</td>
        <td>{{$message['subject']}}</td>
        <td>{{$message['message']}}</td>
        <td>{{$message['create_at']}}</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
    <td>#ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Subject</td>
        <td>Message</td>
        <td>Created At</td>
    </tr>
  </tfoot>
</table>





@endsection