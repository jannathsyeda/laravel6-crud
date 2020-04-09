@extends('layouts.main')

@section('content')

@if($errors->any())
@foreach ($errors->all() as $error)

<div class="alert alert-danger" role="alert">
 {{ $error }}
</div>

@endforeach

@endif

<h1> Edit page </h1> 

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('update',$student->id) }}" method="POST">
{{ csrf_field() }}

    <p class="h4 mb-4">update Student </p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="firstname" placeholder="First name" value="{{ $student->first_name }}">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" name="lastname" placeholder="Last name" value="{{ $student->last_name }}">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail"  value="{{ $student->email }}">

    

    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword" class="form-control" name="phone" value="{{ $student->phone }}" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
     

    <!-- Newsletter -->
 

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">updated Data</button>

    <!-- Social register -->
     

     

</form>
<!-- Default form register -->    
@endsection