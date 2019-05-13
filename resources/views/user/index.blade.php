<!--- Developed By Ye Yint Ko --->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Green Hackers Institute | Student Register Form</title>
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('css/index.css')}}">
    <link rel="icon" href="{{asset('gh_image/logo.jpg')}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
  <!-- Fontawesome 5 -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <style>
    h1,h2,h3,h4,h5,h6,p,a,span,label,input[type="submit"]{
      font-family: 'Montserrat', sans-serif;
    }

    .img_parent{
        width:100%;
        height:180px;
    }
    body{
      width: 100%;
      background-image: url("{{asset('gh_image/green_hackers_bg.jpg')}}");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    li{
        list-style-type: none;
    }
    label{
      color: #008E38;
    }
    .photo_upload_img{
      width: 100%;
      display: inline-block;
      box-shadow: 0px 0px 3px #000;
    }
    .photo_upload_img label.btn{
      width: 100%;
    }
    .telent_color{
      color: #008E38!important;
    }
    .label_color_change label{
      color: #000;
    }
    .id_photo{
      border-radius: 0px!important;
    }
    .student_text{
      color: #008E38;
    }
    .student_body{
      margin-top: 34px;
    }
    .btn{
      border-radius: 20px;
    }
    .photo_upload_img img{
      padding: 10px;
    }
    .panel,
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="date"],
    textarea
    {
      box-shadow: 0px 0px 3px #ccc!important;
      border-radius: 0px!important;
    }
    input[type="date"]{
      padding: 0;
    }
    .panel-heading{
      background-color: #008E38!important;
      color: #fff!important;
    }
    hr{
      border-color: #ccc!important;
    }
    @media(max-width: 767px){
      .student_text{
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
    @if(Auth::check())
      <a href="{{url('/logout')}}"><button class="btn btn-warning">Logout</button></a>
    @endif
	
	<div class="container student_body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="well">
          <div class="well-header">
            <div class="row">
              <div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                <img src="{{asset('gh_image/logo.jpg')}}" alt="" class="img-responsive">
              </div>
            </div>
            <h3 class="text-center student_text">Students Registration Form</h3>
            <h6 class="text text-center"><a href="{{url('/student_list')}}">View Student List</a></h6>
          </div>
          <div class="well-body">
            <br>
              @if(!session('status'))
            <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              * is a required!
            </div>
              @endif
            <form action="{{url('/insert_student')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @if(session('status'))
                    <!-- <p class="alert alert-success">{{session('status')}}</p> -->
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{session('status')}}
                    </div>
                  @endif
                  {{---------------------------------}}
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <div class="photo_upload_img">
                                      <br>
                                      <img src="{{asset('gh_image/image-default.png')}}" alt="" id="img_preview" class="img-responsive img_parent">
                                      <input type="file" name="id_photo" id="id_photo" required style="visibility: hidden;" accept="image/*" onchange="displaySelectedPhoto('id_photo','img_preview')">
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
                                      <img src="{{asset('gh_image/image-default.png')}}" id="card_preview" alt="" class="img-responsive img_parent">
                                      <input type="file" name="id_card_photo" id="id_card_photo" required style="visibility: hidden;" accept="image/*" onchange="displaySelectedPhoto('id_card_photo','card_preview')">
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
{{--------------------------------}}

                  <div class="form-group">
                    <label for="f_name">Name*</label>
                    <input type="text" name="name" class="form-control" id="f_name" required>
                  </div>
                  <div class="form-group">
                    <label>Year Level*</label>
                    <select name="year_level" id="" class="form-control" required>
                        <option value="">---Select---</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                        <option value="5th Year">5th Year</option>
                        <option value="Final Year">Final Year</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Email*</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Mobile Number*</label>
                    <input type="number" name="phone" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>NRC*</label>
                      <input type="text" name="nrc" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Gender*</label>
                    <div>
                     <label class="radio-inline"><input type="radio" name="gender" onclick="check_room('male')" id="" value="male" required>Male</label>
                     <label class="radio-inline"><input type="radio" name="gender" onclick="check_room('female')" id="" value="female" required checked>Female</label>
                   </div>
                 </div>
                  <div class="form-group">
                     <label>Date Of Birth*</label>
                       <input type="date" name="dob" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Present Address*</label>
                    <textarea class="form-control" rows="3" name="pre_address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Permanent Address*</label>
                    <textarea class="form-control" rows="3" name="per_address" required></textarea>
                  </div>
                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <label class="panel-title">Person to contact in case of emergency*</label>
                      </div>
                      <div class="panel-body">
                      <input type="text" name="emergency_contact" class="form-control" required>
                    <small>Parent/Guardian</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <label class="panel-title">Relationship*</label>
                      </div>
                      <div class="panel-body">
                      <input type="text" name="relationship" class="form-control" required>
                    <small>ex.Father,Mother,etc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Address of person to contact in case of emergency*</label>
                    <input type="text" name="emergency_address" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Contact details of person to contact in case of emergency*</label>
                    <textarea name="emergency_detail_address" id="" rows="3" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>High School Name*</label>
                    <input type="text" name="high_school_name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Other Extra curricular activities*</label>
                     <textarea name="curricular_activities" id="" rows="3" class="form-control" required></textarea>
                  </div>
                  <div class="form-group label_color_change">
                    <label class="telent_color">Skills/Talents*</label>
                    <!-- <textarea name="skill" id="" rows="3" class="form-control" required></textarea> -->
                    <div class="row">
                      <div class="col-md-4">
                          <ul>
                              <li><input type="checkbox" name="skill[]" value="acting" id="acting"><label for="acting">Acting</label>
                              <li><input type="checkbox" name="skill[]" value="calculating" id="calculating"><label for="calculating">Calculating</label>
                              <li><input type="checkbox" name="skill[]" value="debating" id="debating"><label for="debating"> Debating</label>
                              <li><input type="checkbox" name="skill[]" value="eating" id="eating"><label for="eating"> Eating</label>
                              <li><input type="checkbox" name="skill[]" value="photography" id="photography"><label for="photography"> Photography</label>
                          </ul>

                      </div>
                      <div class="col-md-4">
                          <ul>
                          <li> <input type="checkbox" name="skill[]" value="playing_guitar" id="playing_guitar"><label for="playing_guitar"> Playing Guitar</label>
                          <li> <input type="checkbox" name="skill[]" value="programming" id="programming"><label for="programming"> Programming</label>
                          <li> <input type="checkbox" name="skill[]" value="writing" id="writing"><label for="writing"> Writing</label>
                          <li> <input type="checkbox" name="skill[]" value="art" id="art"><label for="art"> Art</label>
                          <li> <input type="checkbox" name="skill[]" value="dancing" id="dancing"><label for="dancing"> Dancing</label>
                          </ul>
                      </div>
                      <div class="col-md-4">
                          <ul>
                              <li> <input type="checkbox" name="skill[]" value="drawing" id="drawing"><label for="drawing"> Drawing</label>
                              <li> <input type="checkbox" name="skill[]" value="fashion" id="fashion"><label for="fashion"> Fashion</label>
                              <li> <input type="checkbox" name="skill[]" value="playing_football" id="playing_football"><label for="playing_football">Playing Football</label>
                              <li><input type="checkbox" name="skill[]" value="playing_piano" id="playing_piano"><label for="playing_piano"> Playing piano</label>
                              <li><input type="checkbox" name="skill[]" value="singing" id="singing"><label for="singing"> Singing</label>
                          </ul>

                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                     <label>Do you have any scholarship*</label>
                     <div>
                      <label class="radio-inline"><input type="radio" name="scholarship" id="" value="yes" required="">Yes</label>
                      <label class="radio-inline"><input type="radio" name="scholarship" id="" value="no" required="" checked>No</label>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label>What is your plan after college?*</label>
                    <select name="plan" class="form-control" required>
                      <option value="">---Select---</option>
                      <option value="Take another Bachelor's Degree">Take another Bachelor's Degree</option>
                      <option value="Take a Master's Degree">Take a Master's Degree</option>
                      <option value="Take a Master's Degree,then PhD">Take a Master's Degree,then PhD</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label>School*</label>
                    <input type="text" name="school" placeholder="eg.University of Computer Studies (Myitkyina)" class="form-control" required>
                  </div>

                  <div class="form-group" id="accommodation">
                    <label>Student Accommodation*</label>
                    <div>
                     <label class="radio-inline"><input type="radio" name="accommodation" id="" value="yes" onclick="is_selected_gender()" required>Yes</label>
                     <label class="radio-inline"><input type="radio" name="accommodation" id="" value="no" required checked="">No</label>
                    </div>
                 </div>

                  <div class="form-group">
                    <label>Suggestions/Comments</label>
                    <textarea name="comment" class="form-control"></textarea>
                  </div>

                  <input type="submit" name="submit" class="btn btn-success form-control" value="Submit">
            </form>
          </div>
          <div class="well-footer">
            
          </div>
        </div>
      </div>
    </div>
</div>
	<script src="{{url('js/jquery-1.12.4.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
    <script>


        function displaySelectedPhoto(selectedfile_id,img_id){
//            console.log(selectedfile_id+"ffff"+img_id);
            var fileSelected=document.getElementById(selectedfile_id).files;
            var image_ui=document.getElementById(img_id);
            //alert(fileSelected.length);
            if(fileSelected.length>0){
                var fileToLoad=fileSelected[0];
                if(fileToLoad.type.match("image.*")){
                    var fileReader=new FileReader();
                    fileReader.onload=function(fileLoadedEvent){
                        image_ui.src=fileLoadedEvent.target.result;
                    };
                    fileReader.readAsDataURL(fileToLoad);
                }
            }
            if(fileSelected && fileSelected.length == 1)
            {           
                if (fileSelected[0].size > 4097152) 
                {
                    alert("The file must be less than 4 MB");
                }
            }
        }

//        check_room('female');
//        onclick="check_room('male')"
        function check_room(gender) {
            var limit;
            if(gender==="male"){
                limit='{{$limit->male}}';
            }
            else{
                limit='{{$limit->female}}';
            }
//            console.log(limit);
          if(limit<1){
//                console.log('no room');
                document.getElementById('accommodation').style.display="none";
            }
             else{
//                console.log('no room');
                document.getElementById('accommodation').style.display="block";
            }
        }

        function is_selected_gender(){
            var gender=document.getElementsByName("gender");
//            console.log(gender[0].checked+" "+gender[1].checked);
            if(gender[0].checked==false && gender[1].checked==false){
                alert('Please Select Your Gender First!');
                this.event.preventDefault();
            }
        }

    </script>
</body>
</html>