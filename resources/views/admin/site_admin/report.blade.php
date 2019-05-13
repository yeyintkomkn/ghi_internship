@extends('admin.layouts.site_admin.site_admin_design')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery/jquery.dataTables.min.css')}}">
    //<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- fontaweson -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
@endsection

@section('nav_bar_text')

@endsection
@section('content')
    <div class="content" style="margin-top: 0px">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            Student Report
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">Male</div>
                                <div class="col-md-4">{{$student['male']}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Female</div>
                                <div class="col-md-4">{{$student['female']}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">Total</div>
                                <div class="col-md-4">{{$student['total']}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            Accommodation Report
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">Male</div>
                                <div class="col-md-4">{{$accommodation['male']}}</div>
                                <div class="col-md-4">({{$payment['male'][0]->amount}} Kyats)</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Female</div>
                                <div class="col-md-4">{{$accommodation['female']}}</div>
                                <div class="col-md-4">({{$payment['female'][0]->amount}} Kyats)</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">Total</div>
                                <div class="col-md-4">{{$accommodation['total']}}</div>
                                <div class="col-md-4">({{$payment['total'][0]->amount}} Kyats)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection

