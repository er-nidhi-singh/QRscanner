


<!-- end inventory pages -->

<div class="nav-lavel">Modules </div>
<div class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
    <a href="#"><i class="ik ik-edit"></i><span>Master Data</span></a>
    <div class="submenu-content">
        <a href="{{url('master-list')}}" class="menu-item {{ ($segment1 == 'form-components') ? 'active' : '' }}">User Master List</a>
        <!--<a href="{{url('ac_list')}}" class="menu-item {{ ($segment1 == 'form-components') ? 'active' : '' }}">Approved Chemicals List</a>-->
    <!--<a href="{{url('table-bootstrap')}}"><i class="ik ik-credit-card"></i><span>{{ __('Bootstrap Table')}}</span></a>-->
        <!--<a href="{{url('form-advance')}}" class="menu-item {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a>-->
    </div>
</div>
