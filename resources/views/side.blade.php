<div class="nav-side-menu" style="margin-top:100px;">
   
   <div class="menu-list">
   <ul id="menu-content" class="menu-content collapse out">
       @foreach(Session::get('category') as $menu)
           <li  data-toggle="collapse"  data-target="{{ '#'.str_replace(' ', '', $menu->name) }}" class="collapsed" >         
             <a href="#"><i class='{{$menu->icons}}'></i>   {{ $menu->name }} <span class="arrow"></span></a>
             </li>     
           <ul class="sub-menu collapse" id="<?php  echo str_replace(' ', '', $menu->name);?>">
           @foreach($menu->childs as $child)
            <li  class="<?php  echo (Route::currentRouteName()==strtolower(str_replace(' ', '', $child->name)) ? 'active':'') ?>"> <a href="{{url(strtolower(str_replace(' ', '', $child->name)))}}">{{ $child->name }}</a></li>
            @endforeach    
           </ul>

           @endforeach
       </ul>

</div>
</div>