<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/admintheme/dist/img/no-image.jpeg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">            
        <ul class="sidebar-menu" data-widget="tree">
            <?php 
            if(!empty($menus_array)){

            foreach($menus_array as $key => $value)
            {
            $Activeurlarray = explode('/',url()->current());
            $getUrlName = isset($Activeurlarray[5]) ? $Activeurlarray[5] : '';


            if(isset($Activeurlarray[5]) && $Activeurlarray[5] == 'pagesContent'){
                $getUrlName = str_replace("pagesContent","pages", $Activeurlarray[5]);
            }elseif(isset($Activeurlarray[5]) && $Activeurlarray[5] == 'eventgallery'){
                $getUrlName = str_replace("eventgallery","event", $Activeurlarray[5]);
            }elseif(isset($Activeurlarray[5]) && $Activeurlarray[5] == 'clubgallery'){
                $getUrlName = str_replace("clubgallery","club", $Activeurlarray[5]);
            }else{
                $getUrlName = isset($Activeurlarray[5]) ? $Activeurlarray[5] : '';
            }

            $Activeurl = isset($Activeurlarray[5]) ? $getUrlName :  '';
           // $title = isset($value['title']) ? $value['title'] : "";
            ?>
            <!-- <h2>hp</h2> -->



         <li class="{{ $Activeurl == $key ? 'active treeview menu-open' : '' }}">
                
                <a href="{{ asset($value['url']) }}">
                    <i class="{{ $value['icon'] }}"></i><span>Manage {{ ucfirst($key) }}</span>
                 <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
             </a>

        </li>
      <?php } 
           }
           ?>
        </ul>
         </li>
        
         
      </ul>

    </section>
    <!-- /.sidebar -->
</aside>
