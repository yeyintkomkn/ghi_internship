@extends('admin.layouts.site_admin.site_admin_design')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery/jquery.dataTables.min.css')}}">
    //<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('nav_bar_text')
    
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Create School</h4>
                                {{--<p class="card-category">Complete your profile</p>--}}
                            </div>
                            <div class="card-body">
                                <form id="insert_school" method="post" class="md-form">
                                    {{csrf_field()}}
                                    <input type="hidden" id="blog_id" value="0" name="blog_id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" name="school_name" id="school_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
    
                                    <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card  mt-0 p-3">
                            <table id="show" class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>School Name</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>

        <!-- edit modal -->
                <div class="modal fade" id="modalBox">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Form</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">
                               

                                <form id="update_data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                    <div class="form-group">
                                        <label for="update_school_name">Title</label>
                                        <input type="text" name="school_name" id="update_school_name" class="form-control">
                                    </div>
                                     <div class="modal-footer">
										<div class="form-group">
											<button type="submit" class="btn btn-primary" id="update_btn">Update</button>
											<button class=" btn btn-primary" data-dismiss="modal">Close</button>
										</div>
									</div>
                                </form>
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

                function reset(){
                    $('#update_data')[0].reset();
                }

                load();

                function load(){
                    $.ajax({
                    type: "POST",
                    url: "{{url('get_all_school_name')}}",
                    
                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        //console.log(data);
                        dt.clear();
                        var no = 1;                   
                        for(var i = 0;i<data_return.length;i++){
                            dt.row.add( [
                                no++,
                                data_return[i]['school_name'],
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>',
                                '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'
                            ] ).draw( false );
                        }

                        $('#insert_school')[0].reset();

                    }
                    });
                }
    
                $('#insert_school').on('submit',function (e)
                {
                    e.preventDefault();
                    var alldata = new FormData(this);
                    $.ajax
                    ({
                        type: "POST",
                        url: "{{url('insert/school')}}",
                        data:alldata,
                        cache:false,
                        processData: false,
                        contentType: false,
                        success: function(data){
                        alert('Done');
                        //$('#insert_school')[0].reset();
                        load();
                      }
                    });
                    return false;
                });
                
                delete_data=function(id){
                    if(confirm('Are you sure You want to delete!')==true){
                        $.ajax({
                                type: "POST",
                                url: "delete/school/"+id,
                                
                                cache: false,
                                success: function(data){
                                    alert('Success');
                                    load();
                                }
                            });
                        }else{
                            return false;
                        } 
                    }

                    edit_data=function(id){
                
                        $.ajax({
                          type: "POST",
                          url: "edit/school/"+id,
                          
                          cache: false,
                          success: function(data){
                            reset();
                            var data=JSON.parse(data);
                            
                            //console.log(blog);
                            $('#id_edit').val(data['id']);
                            $('#update_school_name').val(data['school_name']);
        
                            $('#modalBox').modal('show');
                          }
                        });
                    }

                    $('#update_data').on('submit',function (e)
                    {
                        e.preventDefault();
                        var updateData = new FormData(this);
                        $.ajax
                        ({
                            type: 'POST',
                            url: "{{url('update/school')}}",
                            data:updateData,
                            cache:false,
                            processData: false,
                            contentType: false,
                            success: function(data){
                            //console.log(data);
                            //alert(data);
                            $('#modalBox').modal('hide');
                            load();
                        }
                        });
                        return false;
                    });
    
            });
    
        </script>
@endsection