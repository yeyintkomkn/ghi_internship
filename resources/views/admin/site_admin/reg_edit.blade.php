@extends('admin.layouts.site_admin.site_admin_design')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery/jquery.dataTables.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Fontawesome 5 -->
    <style>
        h1,h2,h3,h4,h5,h6,p,a,span,label,input[type="submit"]{
            font-family: 'Montserrat', sans-serif;
        }

        .img_parent{
            width:100%;
            height:180px;
        }
        li{
            list-style-type: none;
        }
        .label,label{
            color: #008E38;
            margin-bottom: 10px!important;
        }
        .photo_upload_img{
            width: 100%;
            display: inline-block;
            box-shadow: 0px 0px 3px #000;
        }
        .photo_upload_img label.btn{
            width: 100%;
        }
        .label_color_change label{
            color: #000;
        }
        .id_photo{
            border-radius: 0px!important;
        }
        .photo_upload_img img{
            padding: 10px;
        }

    </style>
@endsection

@section('nav_bar_text')
    Detail
@endsection
@section('content')
    <div class="content" style="margin-top: 0px">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 offset-2">
                    @if(session('success_msg'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success_msg')}}
                        </div>
                    @endif
                        @if(session('error_msg'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('error_msg')}}
                            </div>
                        @endif
                    <div class="card mt-0 p-3">
                    <form action="{{url('/update/reg_list')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" class="form-control" id="id_edit" value="{{$datas->id}}">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="photo_upload_img">
                                        <br>
                                        <img src="{{$datas->photo_url}}" alt="" id="img_preview" class="img-responsive img_parent">
                                        <input type="file" name="id_photo" id="id_photo" style="visibility: hidden;" accept="image/*" onchange="displaySelectedPhoto('id_photo','img_preview')">
                                        <label for="id_photo" class="btn btn-warning btn-sm id_photo">License Photo*</label>
                                        @if ($errors->has('id_photo'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('id_photo') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="photo_upload_img">
                                        <br>
                                        <img src="{{$datas->student_card_url}}" id="card_preview" alt="" class="img-responsive img_parent">
                                        <input type="file" name="id_card_photo" id="id_card_photo" style="visibility: hidden;" accept="image/*" onchange="displaySelectedPhoto('id_card_photo','card_preview')">
                                        <label for="id_card_photo" class="btn btn-warning btn-sm id_photo">Student ID card*</label>
                                        @if ($errors->has('id_card_photo'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('id_card_photo') }}</strong>
                                            </span>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="f_name" class="label">Name*</label>
                          <input type="text" name="name" class="form-control" id="f_name" value="{{$datas->name}}" required>
                        </div>
                        <div class="form-group">
                          <label class="label">Year Level*</label>
                          <select name="year_level" id="" class="form-control" required>
                              <option value="{{$datas->year_level}}">{{$datas->year_level}}</option>
                              <option value="1st Year">1st Year</option>
                              <option value="2nd Year">2nd Year</option>
                              <option value="3rd Year">3rd Year</option>
                              <option value="4th Year">4th Year</option>
                              <option value="5th Year">5th Year</option>
                              <option value="Final Year">Final Year</option>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label class="label">Email*</label>
                          <input type="email" name="email" class="form-control" value="{{$datas->email}}" required>
                        </div>
                        <div class="form-group">
                          <label class="label">Mobile Number*</label>
                          <input type="number" name="phone" class="form-control" value="{{$datas->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label class="label">NRC*</label>
                            <input type="text" name="nrc" class="form-control" value="{{$datas->nrc}}">
                        </div>
                        
                        <div class="form-group">
                             <label class="label">Date Of Birth*</label>
                             <input type="date" name="dob" class="form-control" value="{{$datas->dob}}" required>
                        </div>
                       <div class="form-group">
                          <label>Present Address*</label>
                          <textarea class="form-control" rows="3" name="pre_address" required>{{$datas->pre_address}}</textarea>
                        </div>
                       <div class="form-group">
                          <label class="label"> Permanent Address*</label>
                          <textarea class="form-control" rows="3" name="per_address" required>{{$datas->per_address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="panel-title">Person to contact in case of emergency*</label>
                            <input type="text" name="emergency_contact" class="form-control" value="{{$datas->emergency_contact}}" required>
                       </div>
                        <div class="form-group">
                            <label class="panel-title">Relationship*</label>
                            <input type="text" name="relationship" class="form-control" value="{{$datas->relationship}}" required>
                       </div>
                        <div class="form-group">
                          <label>Address of person to contact in case of emergency*</label>
                          <input type="text" name="emergency_address" class="form-control" value="{{$datas->emergency_address}}" required>
                        </div>
                        <div class="form-group">
                          <label class="label">Contact details of person to contact in case of emergency*</label>
                          <textarea name="emergency_detail_address" id="" rows="3" class="form-control" required>{{$datas->emergency_detail_address}}</textarea>
                        </div>

                        <div class="form-group">
                          <label class="label">High School Name*</label>
                          <input type="text" name="high_school_name" class="form-control" value="{{$datas->high_school_name}}" required>
                        </div>
                        <div class="form-group">
                           <label class="label">Other Extra curricular activities*</label>
                           <textarea name="curricular_activities" id="" rows="3" class="form-control" required>{{$datas->curricular_activities}}</textarea>
                        </div>
                        {{--<div class="form-group">--}}
                          {{--<label>Skills/Talents*</label>--}}
                          {{--<textarea name="skill" id="" rows="3" class="form-control" required>{{$datas->skill}}</textarea>--}}
                        {{--</div>--}}
                        <div class="form-group">
                           <label class="label">Do you have any scholarship*</label>
                           <div>
                            <label class="radio-inline"><input type="radio" name="scholarship" id="" value="yes" @if($datas->scholarship=="yes") checked @endif required>Yes</label>
                            <label class="radio-inline"><input type="radio" name="scholarship" id="" value="no" @if($datas->scholarship=="no") checked @endif required>No</label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="label">What is your plan after college?*</label>
                          <select name="plan" class="form-control" required>
                            <option value="{{$datas->after_college_plan}}">{{$datas->after_college_plan}}</option>
                            <option value="Take another Bachelor's Degree">Take another Bachelor's Degree</option>
                            <option value="Take a Master's Degree">Take a Master's Degree</option>
                            <option value="Take a Master's Degree,then PhD">Take a Master's Degree,then PhD</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      
                        {{-- <div class="form-group">
                          <label>School*</label>
                          <select name="school" class="form-control" required>
                            <option value="{{$datas->school_name}}">{{$datas->school_name}}</option>
                            @foreach($schools as $school)
                              <option value="{{$school->school_name}}">{{$school->school_name}}</option>
                            @endforeach
                          </select>
                        </div> --}}

                        <div class="form-group">
                          <label class="label">School*</label>
                          <input type="text" name="school" class="form-control" value="{{$datas->school_name}}" required>
                        </div>

                        <div class="form-group">
                          <label class="label">Student Accommodation*</label>
                          <div>
                           <label class="radio-inline"><input type="radio" name="accommodation" @if($datas->accommodation=="yes") checked @endif id="" value="yes" required>Yes</label>
                           <label class="radio-inline"><input type="radio" name="accommodation" @if($datas->accommodation=="no") checked @endif id="" value="no" required>No</label>
                         </div>
                       </div>




                        <div class="form-group">
                        <label class="label">Gender*</label>
                        <div>
                         <label class="radio-inline"><input type="radio" name="gender" id="" @if($datas->gender=="male") checked @endif value="male" required>Male</label>
                         <label class="radio-inline"><input type="radio" name="gender" id="" @if($datas->gender=="female") checked @endif value="female" required>Female</label>
                         </div>
                        </div>
                      
                        <div class="form-group">
                          <label class="label">Suggestions/Comments*</label>
                          <textarea name="comment" class="form-control">{{$datas->comment}}</textarea>
                        </div>

                        @if($datas->accommodation=="yes")
                        <fieldset id="payment_ui">
                            <legend class="text text-center">Accommodation Payment</legend>
                            <div class="form-group">
                                <label class="label">Payment*</label>
                                <div>
                                    <label class="radio-inline"><input type="radio" name="paid" id="" @if($datas->paid=="Yes") checked @endif value="Yes">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="paid" id="" @if($datas->paid=="No") checked @endif value="No">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">No of Month*</label>
                                <div>
                                    <label class="radio-inline"><input type="radio" name="month" id="" @if($datas->month=="1") checked @endif value="1" onclick="set_amount('35000')">1</label>
                                    <label class="radio-inline"><input type="radio" name="month" id="" @if($datas->month=="2") checked @endif value="2" onclick="set_amount('70000')">2</label>
                                    <label class="radio-inline"><input type="radio" name="month" id="" @if($datas->month=="3") checked @endif value="3" onclick="set_amount('105000')">3</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Amount*</label>
                                <input type="text" id="amount" name="amount" class="form-control" value="{{$datas->amount}}">
                            </div>

                        </fieldset>
                            @endif

                      
                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                    </form>

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
            set_amount=(amt)=> {
                $('#amount').val(amt);
            };
        </script>
@endsection