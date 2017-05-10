<?php
/**
 * Created by PhpStorm.
 * User: anele
 * Date: 2017/04/29
 * Time: 6:30 PM
 */
?>

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    @if(Auth::user())
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('/uploads/avatars/') }}/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        @if(Auth::user() && Auth::user()->isAdmin())
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right">  </i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('user.index') }}"><i class="fa fa-list"></i> List </a></li>
                <li><a href="{{ route('user.create') }}"><i class="fa fa-user"></i> Add User</a></li>
            </ul>
        </li>
        @endif

    </ul>
        @endif
</section>
<!-- /.sidebar -->