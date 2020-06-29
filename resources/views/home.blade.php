@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
    <div class="col">
    <div class="nav-side-menu" style="margin-top:100px;">
   
   <div class="menu-list">

       <ul id="menu-content" class="menu-content collapse out">
          

           <li  data-toggle="collapse" data-target="#products" class="collapsed active">
             <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
           </li>
           <ul class="sub-menu collapse" id="products">
               <li class="active"><a href="#">CSS3 Animation</a></li>
               <li><a href="#">General</a></li>
               <li><a href="#">Buttons</a></li>
               <li><a href="#">Tabs & Accordions</a></li>
           </ul>

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
