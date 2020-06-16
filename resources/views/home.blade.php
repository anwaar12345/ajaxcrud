@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <ul class="list-group">
  <?php  if(Auth::user()->role==1){ ?><li class="list-group-item active bg-light"><a href="/users" class="link" style="text-decoration:none;">User Management</a></li>
  <?php
  }
?>
</ul>
        </div>
    </div>
    </div>
@endsection
