@extends('layouts.main')

@section('content')

@if (session('successMsg'))

<div class="alert alert-success" role="alert">
 {{ session('successMsg') }}
</div>

@endif


<div class="container">
    <div class="row">
        <div class="col-md-12">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>


          </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
          <tr>
            <th scope="row">{{ $student->id }}</th>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
              <a  class="btn btn-raised btn-active btn-sm" href="{{ route('edit', $student->id) }}"> <i class="fa fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
            
              <form method="POST" id="delete-form-{{ $student->id }}" action="{{ route('destroy', $student->id) }}" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('delete') }} 
              </form>   
             
               <button onclick="if (confirm('Are you sure to delete this data?')) {
               event.preventDefault();
               document.getElementById('delete-form-{{ $student->id }}').submit();
            
               }else{
                event.preventDefault();
               }
            
               "  class="btn btn-raised btn-danger btn-sm" href=" "><i class="fa fa-trash fa-2x" aria-hidden="true"></i>  
            
              </button>

            </td>

          </tr>
         @endforeach
          
        </tbody>
      </table>

     
        </div>
    </div>
</div>

{{ $students->links() }}
@endsection