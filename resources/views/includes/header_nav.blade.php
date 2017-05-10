<?php
/**
 * Created by PhpStorm.
 * User: anele
 * Date: 2017/04/29
 * Time: 6:31 PM
 */
?>

<!-- Logo -->
<a href="/profile" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Business</b>Reg</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            @if(Auth::user())

            <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('/uploads/avatars/') }}/{{Auth::user()->avatar}}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->first_name  }} {{ Auth::user()->last_name  }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('/uploads/avatars/') }}/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">

                        <p>
                            {{ Auth::user()->first_name  }} {{ Auth::user()->last_name  }} - Web Developer
                            <small>Member since {{ date("M. Y",strtotime(Auth::user()->created_at)) }}</small>
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

            @endif
        </ul>
    </div>
</nav>