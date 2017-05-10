<?php
/**
 * Created by PhpStorm.
 * User: anele
 * Date: 2017/04/29
 * Time: 6:29 PM
 */
?>

@if(Session::has('flash_message_warning'))
    <div class="content-header">
        <div class="col-md-12 col-md-offset-600">
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Warning!</h4>
                <p>{{ session('flash_message_warning') }}</p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif

@if(Session::has('flash_message_success'))
    <div class="content-header">
        <div class="col-md-12 col-md-offset-600">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Well Done!</h4>
                <p>{{ session('flash_message_success') }}</p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif

@if(Session::has('flash_message_danger'))
    <div class="content-header">
        <div class="col-md-12 col-md-offset-600">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Someting Went Wrong!</h4>
                <p>{{ session('flash_message_danger') }}</p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif