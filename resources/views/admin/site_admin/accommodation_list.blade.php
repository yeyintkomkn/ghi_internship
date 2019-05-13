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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="row m-2">
                <div class="col-md-12">
                 <a href="{{url('student_accommodation_export')}}" class="btn btn-success pull-right"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Export To Excel</a>
                </div>
                
              
                 
            </div>
                    <div class="col-md-12">
                        <div class="card mt-0 p-3">
                            <table id="" class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Year Level</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        {{-- <th></th>
                                        <th></th>
                                        <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($accom_lists as $accom_list)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$accom_list->name}}</td>
                                            <td>{{$accom_list->year_level}}</td>
                                            <td>{{$accom_list->email}}</td>
                                            <td>{{$accom_list->phone}}</td>
                                            <td>{{$accom_list->dob}}</td>
                                            <td>
                                                <a href="{{url('detail/reg_list/'.$accom_list->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                                <a href="{{url('edit/reg_list/'.$accom_list->id)}}" class="btn btn-success btn-sm">Edit</a>
                                            </td>
                                            {{-- <td>
                                                <a href="{{url('delete/reg_list/'.$detail->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            <td>
                                                <a href="{{url('edit/reg_list/'.$detail->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>

        
    </div>
@endsection

@section('js')
    <script>
        function show_main_category() {
            var main=document.getElementById('main_option');
            main.style.display="block";
        }

        function hide_main_category() {
            var main=document.getElementById('main_option');
            main.style.display="none";
        }

        $("[data-tooltip='tooltip']").tooltip();
    </script>

    <script>
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
    
            $(document).ready(function(){
                
                var dt = $('#show').DataTable({
                    "bInfo" : false,
                    "bLengthChange": false
                });
                
    
            });
    
        </script>
@endsection