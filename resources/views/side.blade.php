<div class="nav-side-menu" style="margin-top:100px;">
   
   <div class="menu-list">
   <ul id="menu-content" class="menu-content collapse out">
       @foreach(Session::get('category') as $menu)

           <li  data-toggle="collapse" data-target="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "#WEBDEVELOPMENT" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? '#MOBILEAPPDEVELOPMENT':''));?>" class="collapsed" >         
             <a href="#"><i class="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "fa fa-globe fa-lg" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? 'fa fa-phone fa-lg':''));?>"></i>   {{ $menu->name }} <span class="arrow"></span></a>
             </li>     
           <ul class="sub-menu collapse" id="<?php  echo($menu->name == 'WEB DEVELOPMENT' ? "WEBDEVELOPMENT" : ($menu->name == 'MOBILE APP DEVELOPMENT' ? 'MOBILEAPPDEVELOPMENT':''));?>">
           @foreach($menu->childs as $child)
            <li  class="<?php  echo (Route::currentRouteName()==strtolower(str_replace(' ', '', $child->name)) ? 'active':'') ?>"> <a href="{{url(strtolower(str_replace(' ', '', $child->name)))}}">{{ $child->name }}</a></li>
            @endforeach    
           </ul>

           @endforeach
       </ul>

</div>
</div>