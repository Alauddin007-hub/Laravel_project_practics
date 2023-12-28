@extends ('layouts.app')
@section('title','Contact_edit Page')



@section('content')



<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
      <h2>Contact Us</h2>
      
    </div><br />

    <!-- success msg -->
    <div class="col-sm-12">
      @if (session('msg'))
      <div class="alert alert-success">
        {{ session('msg') }}
      </div>
      @endif

      <!-- error msg -->
      
      <!-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif -->
      <form action="/contact/update/{{$single['id']}}" method="post">
        @csrf
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example1">Name</label>
          <input type="text" id="form1Example1" class="form-control" value="{{ old('name') ? old('name'): $single->name}}" name="name" placeholder="Enter Name" />
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example2">Email address</label>
          <input type="email" id="form1Example2" class="form-control" value="{{ old('email') ? old('email'): $single->email}}" name="email" placeholder="Enter Your Email" />
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example3">Subject</label>
          <input type="text" id="form1Example3" class="form-control" value="{{ old('subject') ? old('subject'): $single->subject}}" name="subject" placeholder="Enter Your Subject" />
          @error('subject')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example4">Message</label>
          <textarea id="form1Example4" class="form-control" name="message" placeholder="Type Something" cols="30" rows="10">{{ old('massage') ? old('message'): $single->message}}</textarea>
          @error('message')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Update</button>
      </form>
    </div>
  </div>
</div>





@endsection