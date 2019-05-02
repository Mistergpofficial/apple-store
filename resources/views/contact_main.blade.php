<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/11/2019
 * Time: 9:17 AM
 */
?>

@extends('partials.master')
@section('page_title')
    Contact -  {{ config('siteconfig.site_title') }}
@endsection
@section('content')

    <div class="box-pagecontent">
        <div class="container">
            <div class="posttitle">
                <h1>Contact Us</h1>
            </div>

            <div class="randombox">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">


                        <form class="form-horizontal" role="form" method="post" action="{{ url('contact') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <p class='text-danger'>{{ $errors->first('name') }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com">
                                    <p class='text-danger'>{{ $errors->first('email') }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="message"></textarea>
                                    <p class='text-danger'>{{ $errors->first('message') }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                                   <p class='text-danger'>{{ $errors->first('human') }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-raised btn-warning">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @endsection
