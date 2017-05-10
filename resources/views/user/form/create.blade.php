<?php
/**
 * Created by PhpStorm.
 * User: anele
 * Date: 2017/04/29
 * Time: 11:40 PM
 */
        ?>

@extends('layouts.app')

@section('title')
    Create Users
@endsection

@section('page-css')

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            {{--<li><a href="#">Examples</a></li>--}}
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <form role="form" method="post" autocomplete="off" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="remember_token" value="">

                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            {{--<h3 class="box-title">Quick Example</h3>--}}
                        </div>


                        <div class="box-body">

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name">Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                       placeholder="Enter name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name">Surname</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Surname"
                                       value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                       value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Password"
                                       value="{{ old('password') }}">


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="Location"
                                       value="{{ old('location') }}">

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
                                <label for="job_title">Job Title</label>
                                <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title"
                                       value="{{ old('job_title') }}">

                                @if ($errors->has('job_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender">Gender:</label>
                                <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender"
                                       value="{{ old('gender') }}">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="job_title">Phone No:</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No"
                                       value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="form-group">
                                <label for="avatar">Picture:</label>
                                <!-- <input type="text" name="picture" class="form-control" id="picture" placeholder="picture"
                                       value=""> -->
                                       <input type="file" name="avatar" id="avatar">
                            </div>--}}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            {{--<h3 class="box-title">User Roles</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="bio">User Biography</label>
                                <textarea name="bio" id="bio" class="form-control bio textarea_bio" rows="3" placeholder="Enter ..."></textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label for="">User Roles</label>
                                @foreach($data as $key => $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="roles[]" placeholder="{!! $key !!}"
                                            @if(!empty($data['item'])&&$data['item']->hasRole($role))
                                                   checked
                                                   @endif;
                                                   value="{!! $key !!}">
                                            {{ ucwords($role) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </form>
        </div>
    </section>
@endsection

@section('page-script')

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=key&libraries=places"></script>
    <script type="text/javascript">
        $(function () {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            $(".textarea_bio, .bio").wysihtml5();
        });
    </script>

@stop