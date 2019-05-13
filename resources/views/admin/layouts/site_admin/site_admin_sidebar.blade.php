<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin_image//sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-normal">
            Admin
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            
            {{--<li class="nav-item @if($url=="school") active @endif">--}}
                {{--<a class="nav-link" href="{{url('admin_site')}}">--}}
                    {{--<i class="material-icons">library_books</i>--}}
                    {{--<p>Manage School</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item @if($url=="reg_lists") active @endif">
                <a class="nav-link" href="{{url('reg_list')}}">
                    <i class="material-icons">library_books</i>
                    <p>Registration List</p>
                </a>
            </li>
            <li class="nav-item @if($url=="accommodation_lists") active @endif">
                <a class="nav-link" href="{{url('accommodation_lists')}}">
                    <i class="material-icons">library_books</i>
                    <p>Accommodation List</p>
                </a>
            </li>
             <li class="nav-item @if($url=="paid") active @endif">
                <a class="nav-link" href="{{url('paid_students')}}">
                    <i class="material-icons">library_books</i>
                    <p>Accommodation Payment List</p>
                </a>
            </li>
            <li class="nav-item @if($url=="report") active @endif">
                <a class="nav-link" href="{{url('report')}}">
                    <i class="material-icons">library_books</i>
                    <p>Student Report</p>
                </a>
            </li>
             <li class="nav-item @if($url=="stu_regi_trash_data") active @endif">
                <a class="nav-link" href="{{url('stu_regi_trash_data')}}">
                    <i class="material-icons">library_books</i>
                    <p>Recycle Deleted Data</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">
                    <i class="material-icons">notifications</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>