@extends ('layouts.app')
@section('title','Contact List Page')



@section('content')

<!-- On tables -->
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
      <h2>Contact Us</h2>
      @if(session('msg'))
      <div class="alert alert-success">
        {{ session('msg') }}
      </div>
      @endif
    </div><br />
    <table class="table table-success table-striped">
      <thead>
        <tr>
          <td>#ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Subject</td>
          <td>Message</td>
          <td>Created At</td>
          <td>Action</td>
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
          <td><a href="/contact/edit/{{$message['id']}}" class="btn btn-success"><i class="bi bi-pencil-square">Edit</i></a>|<a href="/contact/delete/{{$message['id']}}" class="btn btn-danger"><i class="bi bi-trash-fill">Delete</i></a></td>
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
          <td>Action</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</div>





@endsection