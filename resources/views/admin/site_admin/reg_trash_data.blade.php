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
                <div class="col-md-12">
                    <a href="{{url('student_registration_export')}}" class="pull-right btn btn-success"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Export To Excel</a>
                </div>
            </div>
            <div class="row">

                    <div class="col-md-12">
                        <div class="card mt-0 p-3">
                            <table id="myTable" class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($stu_regi_trash_data as $detail)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$detail->name}}</td>
                                            <td>{{$detail->year_level}}</td>
                                            <td>{{$detail->email}}</td>
                                            <td>{{$detail->phone}}</td>
                                            <td>{{$detail->dob}}</td>
                                            <td>
                                                <a href="{{url('restore/reg_list/'.$detail->id)}}" class="btn btn-success btn-sm">Restore</a>
                                                <button class="btn btn-danger btn-sm" onclick="delete_data('{{url('trash/reg_list/'.$detail->id)}}')">Delete</button>
                                            </td>
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

        $("[data-tooltip='tooltip']").tooltip();

        function delete_data(link) {
            var cc=window.confirm("Are You Sure!");
            if(cc){
                window.open(link,'_self');
            }
        }


    </script>

@endsection