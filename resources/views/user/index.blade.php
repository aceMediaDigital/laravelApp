<?php
/**
 * Created by PhpStorm.
 * User: anele
 * Date: 2017/04/29
 * Time: 11:54 PM
 */
?>


@extends('layouts.app')

@section('title')
    Manage Users || {{ Auth::user()->name }} {{ Auth::user()->surname }}
@endsection

@section('page-css')

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>

                        <a class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="left" title="Create New User"
                           href="{{ route('user.create') }}">
                            <i class="fa fa-pencil"></i> Create User
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Job Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($collection as $data)
                                <tr>
                                    <td>{{ $data->first_name }}</td>
                                    <td>{{ $data->last_name }}</td>
                                    <td>{{ $data->profile->location }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->profile->job_title }}</td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="tooltip" data-placement="left" title="View {{$data->name}}"
                                           href="{!! route('user',$data->id) !!}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection



@section('page-script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@stop