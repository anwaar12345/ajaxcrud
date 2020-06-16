@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <ul class="list-group">
  <?php  if(Auth::user()->role==1){ ?><li class="list-group-item active bg-light"><a href="/users" class="link" style="text-decoration:none;">User Management</a></li>
  <?php
  }
?></ul>
    </div>
    <div class="col-md-8">
 <h4 class="text-center text-danger">Approved users</h4>   
    @foreach($users as $user)
    {{$user->id}}
    @endforeach
    
    </div>
    </div>
    </div>
@endsection
