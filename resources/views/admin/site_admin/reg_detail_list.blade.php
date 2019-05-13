@extends('admin.layouts.site_admin.site_admin_design')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery/jquery.dataTables.min.css')}}">
    //<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('nav_bar_text')
    Detail
@endsection
@section('content')
    <div class="content" style="margin-top: 0px">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-md-12">

                                <div class="pull-right">
                                    <a href="{{url('edit/reg_list/'.$datas->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-success" onclick="print_form()">Print</button>
                                </div>
                            {{--</div>--}}
                            <div class="card mt-0 p-3" id="card">
                                <h3 class="text text-center">Green Hackers Institute</h3>
                                <h4 class="text text-center">Student Register Form</h4>
                                <hr>
                                    <div class="table-responsive">
                                    <table class="table table-hovered table-bordered">
                                        {{-- <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Titel</th>
                                            <th>Description</th>
                                            <th>photo</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Time</th>
                                            <th>Apply&nbsp;now</th>
                                          </tr>
                                        </thead> --}}
                                        <tbody>
                                        <tr>
                                            <td><b>Photo</b></td>
                                            <td>
                                                <img src="{{$datas->photo_url}}" width="200px;" alt="" height="200px">
                                                <img src="{{$datas->student_card_url}}" height="200px;" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>{{$datas->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Year</b></td>
                                            <td>{{$datas->year_level}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>{{$datas->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone</b></td>
                                            <td>{{$datas->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>NRC</b></td>
                                            <td>{{$datas->nrc}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date of Birth</b></td>
                                            <td>{{$datas->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Present Address</b></td>
                                            <td class="font_myanmar">{{$datas->pre_address}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Permanent Adress</b></td>
                                            <td class="font_myanmar">{{$datas->per_address}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Emergency Contact</b></td>
                                            <td>{{$datas->emergency_contact}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Relationship</b></td>
                                            <td>{{$datas->relationship}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Emergency Address</b></td>
                                            <td class="font_myanmar">{{$datas->emergency_address}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Emergency Detail Address</b></td>
                                            <td class="font_myanmar">{{$datas->emergency_detail_address}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>High School Name</b></td>
                                            <td class="font_myanmar">{{$datas->high_school_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Curricular Activities</b></td>
                                            <td class="font_myanmar">{{$datas->curricular_activities}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Skill</b></td>
                                            <td>
                                             @if($datas->skill!= "null")
                                                @php
                                                    $skills=json_decode($datas->skill);
                                                @endphp

                                                <ol>
                                                    @php
                                                        foreach ($skills as $data){


                                                        echo "<li>".$data."</li>";
                                                        }

                                                    @endphp
                                                </ol>
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Scholarship</b></td>
                                            <td>{{$datas->scholarship}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>After College Plan</b></td>
                                            <td>{{$datas->after_college_plan}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>School Name</b></td>
                                            <td>{{$datas->school_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Student Accommodation</b></td>
                                            <td>{{$datas->accommodation}}</td>
                                        </tr>
                                        @if($datas->accommodation=="yes")
                                        <tr>
                                            <td><b> Accommodation Payment</b></td>
                                            <td>{{$datas->paid}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><b>Gender</b></td>
                                            <td>{{$datas->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font_myanmar"><b>Comment</b></td>
                                            <td>{{$datas->comment}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

            </div>
        </div>

        
    </div>
@endsection

@section('js')
    <script>

        $("[data-tooltip='tooltip']").tooltip();
    </script>

    <script>
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
    
            function print_form(){
                var print_data=document.getElementById('card').outerHTML;
                var aa=window.open("");
                aa.document.write(print_data);
                aa.print();
                aa.close();
            }

    
        </script>
@endsection