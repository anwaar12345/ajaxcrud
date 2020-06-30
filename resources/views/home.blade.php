@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
    <div class="col">
    @include('side')
</div>
    <div class="col">
  @if(Auth::user()->role==1)
 <h4 class=" text-danger">Approved users</h4>   
    
    
    <table class="table table-dark" style="margin-left:-300px">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Profile</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td> <img src="{{asset('images')}}/{{$user->profile}}" height="100px" width="100px"> </td>
      <td>{{$user->role==1 ?  "Admin" :"user"}}</td>
   
    </tr>
    @endforeach

  </tbody>
</table>

 @endif
    </div>
    </div>
    </div>
@endsection
