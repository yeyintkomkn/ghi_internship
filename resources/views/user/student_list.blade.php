
<!--- Developed By Ye Yint Ko --->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Green Hackers Institute | Student List</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <link rel="icon" href="{{asset('gh_image/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style>
        h1,h2,h3,h4,h5,h6,p,a,span,label,input[type="submit"]{
            font-family: 'Montserrat', sans-serif;
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

        .photo_upload_img label.btn{
            width: 100%;
        }

        .photo_upload_img img{
            padding: 10px;
        }
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
<div class="container student_body" style="margin-top:20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <div class="well-header">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                            <img src="{{asset('gh_image/logo.jpg')}}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <h3 class="text-center student_text">Students List</h3>
                </div>
                <div class="well-body">
                    <div class="table-responsive">
                         <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th width="10px">Accommodation</th>
                                    <th>School</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            @php
                                $no = 1;
                            @endphp
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$detail->name}}</td>
                                    <td>{{$detail->accommodation}}</td>
                                    <td>{{$detail->school_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                   

                </div>
                <div class="well-body">
                    <h6 class="text text-center"><a href="{{url('/')}}">Go to Register Form</a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{url('js/jquery-1.12.4.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
//                "ordering": false,
            // "paging": false,
            "bInfo" : false,
            // "bPaginate": false,
            "bLengthChange": false
            // "bFilter": true,
            // "bAutoWidth": false
        });
    } );
</script>
</body>
</html>