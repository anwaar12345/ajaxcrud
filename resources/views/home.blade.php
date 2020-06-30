@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
    <div class="col">
    <div class="nav-side-menu" style="margin-top:100px;">
   
   <div class="menu-list">
   <ul id="menu-content" class="menu-content collapse out">
       @foreach(Session::get('category') as $menu)

           <li  data-toggle="collapse" data-target="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "#WEBDEVELOPMENT" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? '#MOBILEAPPDEVELOPMENT':''));?>" class="collapsed <?php  echo($menu->name == 'WEB DEVELOPMENT' ? 'active' : ($menu->name == 'MOBILE APP DEVELOPMENT' ? 'active':''));?>">
         
             <a href="#"><i class="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "fa fa-globe fa-lg" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? 'fa fa-phone fa-lg':''));?>"></i>   {{ $menu->name }} <span class="arrow"></span></a>
             </li>     
           <ul class="sub-menu collapse" id="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "WEBDEVELOPMENT" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? 'MOBILEAPPDEVELOPMENT':''));?>">
           @foreach($menu->childs as $child)
            <li> <a href="#">{{ $child->name }}</a></li>
            @endforeach    
           </ul>

           @endforeach
       </ul>


</div>
</div>
</div>
    <div class="col">
 <?php if(Auth::user()->role==1){?>
 <h4 class="text-center text-danger">Approved users</h4>   
    
    
    <table class="table table-dark">
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
      <td>{{$user->profile}}</td>
      <td><?php echo $user->role==1 ?  "Admin" :"user" ?></td>
   
    </tr>
    @endforeach

  </tbody>
</table>

 <?php } ?>
    </div>
    </div>
    </div>
@endsection
