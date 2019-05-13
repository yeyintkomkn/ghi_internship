<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student_registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\CustomClass\student_regData;
use App\CustomClass\Path;
use App\Schoolmanage;
use App\Limit;

class StudentregistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Student_registration::orderBy('id','desc')->get();
        $arr=[];
        foreach ($datas as $data){
            $reg_data=new student_regData($data->id);
            array_push($arr,$reg_data->getRegData());
        }
        return view('admin.site_admin.reg_list')->with(['url'=>'reg_lists','details'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
             'id_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
         ]);
         
        
        $name = $request->get('name');
        $year_level = $request->get('year_level');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $dob = $request->get('dob');
        $pre_address = $request->get('pre_address');
        $per_address = $request->get('per_address');
        $emergency_contact = $request->get('emergency_contact');
        $relationship = $request->get('relationship');
        $emergency_address = $request->get('emergency_address');
        $emergency_detail_address = $request->get('emergency_detail_address');

        $profile_picture = $request->file('id_photo');
        $profile_photo_name = uniqid().'_'.$profile_picture->getClientOriginalName();
        $profile_picture->move(public_path('upload/student_reg'),$profile_photo_name);

        $student_card = $request->file('id_card_photo');
        $card_photo_name = uniqid().'_'.$student_card->getClientOriginalName();
        $student_card->move(public_path('upload/student_card'),$card_photo_name);

        $high_school_name = $request->get('high_school_name');
        $curricular_activities = $request->get('curricular_activities');
        $skill = $request->get('skill');
        $scholarship = $request->get('scholarship');
        $plan = $request->get('plan');
        $school = $request->get('school');
        $accommodation = $request->get('accommodation');
        $gender = $request->get('gender');
        $comment = $request->get('comment');
        $nrc = $request->get('nrc');

       $student=Student_registration::where('email',$email)->where('phone',$phone)->get();
        if(count($student)==0){
            Student_registration::create([
                'name'=>$name,
                'year_level'=>$year_level,
                'email'=>$email,
                'phone'=>$phone,
                'dob'=>$dob,
                'pre_address'=>$pre_address,
                'per_address'=>$per_address,
                'emergency_contact'=>$emergency_contact,
                'relationship'=>$relationship,
                'emergency_address'=>$emergency_address,
                'emergency_detail_address'=>$emergency_detail_address,
                'id_photo'=>$profile_photo_name,
                'student_card'=>$card_photo_name,
                'high_school_name'=>$high_school_name,
                'curricular_activities'=>$curricular_activities,
                'skill'=>json_encode($skill),
                'scholarship'=>$scholarship,
                'after_college_plan'=>$plan,
                'school_name'=>$school,
                'accommodation'=>$accommodation,
                'gender'=>$gender,
                'nrc'=>$nrc,
                'comment'=>$comment
            ]);
            if($accommodation=="yes"){
                if($this->can_accommodation($gender)){
                    if($gender=="male"){
                        $count=Limit::find(1)->male;
                        Limit::find(1)->update(['male'=>($count-1)]);
                    }
                    else{
                        $count=Limit::find(1)->female;
                        Limit::find(1)->update(['female'=>($count-1)]);
                    }
                }
                else{
                    return redirect('/')->with('status','Your Application has been submitted! Accommodation limit is full.You Cannot Accommodation.');
                }
            return redirect('/')->with('status','Your Application has been submitted!');
        }
        else{
            return redirect('/')->with('status','Sorry, You have already registered!');
        }

    }

    }

    function can_accommodation($gender){
        $limit=Limit::find(1);
        if($gender=="male" && $limit->male<1){
            return false;
        }
        else if($gender=="female" && $limit->female<1){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $datas = Student_registration::orderBy('id','desc')->get();
        $arr=[];
        foreach ($datas as $data){
            $reg_data=new student_regData($data->id);
            array_push($arr,$reg_data->getRegData());
        }
        return view('user.student_list')->with(['details'=>$arr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reg_obj = new student_regData($id);
        $reg_detail = $reg_obj->getRegData();
        return view('admin.site_admin.reg_edit')->with(['url'=>'reg_lists','datas'=>$reg_detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $year_level = $request->get('year_level');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $nrc = $request->get('nrc');
        $dob = $request->get('dob');
        $pre_address = $request->get('pre_address');
        $per_address = $request->get('per_address');
        $emergency_contact = $request->get('emergency_contact');
        $relationship = $request->get('relationship');
        $emergency_address = $request->get('emergency_address');
        $emergency_detail_address = $request->get('emergency_detail_address');
        $high_school_name = $request->get('high_school_name');
        $curricular_activities = $request->get('curricular_activities');
        //$skill = $request->get('skill');
        $scholarship = $request->get('scholarship');
        $plan = $request->get('plan');
        $school = $request->get('school');
        $accommodation = $request->get('accommodation');
        $paid = $request->get('paid');
        $month = $request->get('month');
        $amount= $request->get('amount');
        $gender = $request->get('gender');
        $comment = $request->get('comment');



        if($request->hasFile('id_photo')){
            $profile_picture = $request->file('id_photo');
            $photo_name = uniqid().'_'.$profile_picture->getClientOriginalName();
            $profile_picture->move(public_path('upload/student_reg'),$photo_name);
            $reg_photo = Student_registration::find($id);
            $image_path=public_path().'/upload/student_reg/'.$reg_photo->id_photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            Student_registration::findOrFail($id)->update([
                'id_photo'=>$photo_name,
            ]);
        }
        if($request->hasFile('id_card_photo')){
            $id_card_photo = $request->file('id_card_photo');
            $photo_name2 = uniqid().'_'.$id_card_photo->getClientOriginalName();
            $id_card_photo->move(public_path('upload/student_card'),$photo_name2);
            $reg_photo = Student_registration::find($id);
            $image_path2=public_path().'/upload/student_card/'.$reg_photo->student_card;
            if(file_exists($image_path2)){
                unlink($image_path2);
            }
            Student_registration::findOrFail($id)->update([
                'student_card'=>$photo_name2,
            ]);
        }
        Student_registration::findOrFail($id)->update([
                'name'=>$name,
                'year_level'=>$year_level,
                'email'=>$email,
                'phone'=>$phone,
                'nrc'=>$nrc,
                'dob'=>$dob,
                'pre_address'=>$pre_address,
                'per_address'=>$per_address,
                'emergency_contact'=>$emergency_contact,
                'relationship'=>$relationship,
                'emergency_address'=>$emergency_address,
                'emergency_detail_address'=>$emergency_detail_address,
                'high_school_name'=>$high_school_name,
                'curricular_activities'=>$curricular_activities,
//                'skill'=>$skill,
                'scholarship'=>$scholarship,
                'after_college_plan'=>$plan,
                'school_name'=>$school,
//                'accommodation'=>$accommodation,

                'gender'=>$gender,
                'comment'=>$comment
            ]);



        $old_data=Student_registration::findOrFail($id);
        if($old_data->accommodation!=$accommodation){
            if($accommodation=="yes"){
                if($this->can_accommodation($gender)) {
                    Student_registration::findOrFail($id)->update([
                        'accommodation'=>"yes",
                    ]);
                    if ($gender == "male") {
                        $count = Limit::find(1)->male;
                        Limit::find(1)->update(['male' => ($count - 1)]);
                    } else {
                        $count = Limit::find(1)->female;
                        Limit::find(1)->update(['female' => ($count - 1)]);
                    }
                }
                else{
                    Student_registration::findOrFail($id)->update([
                        'accommodation'=>"no"
                    ]);
                    return redirect('/edit/reg_list/'.$id)->with(['error_msg'=>'Sorry, Accomoodation limit is full!']);
                }

            }
            if($accommodation=="no"){
                Student_registration::findOrFail($id)->update([
                    'accommodation'=>"no"
                ]);
                if($gender=="male"){
                    $count=Limit::find(1)->male;
                    Limit::find(1)->update(['male'=>($count+1)]);
                }
                else{
                    $count=Limit::find(1)->female;
                    Limit::find(1)->update(['female'=>($count+1)]);
                }
            }
        }

        if($old_data->accommodation=='yes' || $accommodation=='yes'){
            Student_registration::findOrFail($id)->update([
                'paid'=>$paid,
                'month'=>$month,
                'amount'=>$amount,
            ]);
        }


        return redirect('/edit/reg_list/'.$id)->with(['success_msg'=>'Success Updating Data!..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reg_list = Student_registration::find($id);
        if($reg_list->gender=="male" && $reg_list->accommodation=="yes"){
            $limit=Limit::find(1);
            $limit->update(['male'=>($limit->male+1)]);
        }
        else if($reg_list->gender=="female" && $reg_list->accommodation=="yes"){
            $limit=Limit::find(1);
            $limit->update(['female'=>($limit->female+1)]);
        }
        
        $image_path=public_path().'/upload/student_reg/'.$reg_list->id_photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        $image_path2=public_path().'/upload/student_card/'.$reg_list->student_card;
        if(file_exists($image_path2)){
            unlink($image_path2);
        }
        $reg_list->delete();
        return redirect('/reg_list');
    }

    // public function get_all_reg_list(){
    //     $data = Student_registration::orderBy('id','desc')->get();
    //     return json_encode($data);
    // }

    public function detail_reg($reg_id){
        $reg_obj = new student_regData($reg_id);
        $reg_detail = $reg_obj->getRegData();
        return view('admin.site_admin.reg_detail_list')->with(['url'=>'reg_lists','datas'=>$reg_detail]);
    }

    public function show_accommodation()
    {
        $datas = Student_registration::where('accommodation','yes')->orderBy('id','desc')->get();
        $arr=[];
        foreach ($datas as $data){
            $reg_data=new student_regData($data->id);
            array_push($arr,$reg_data->getRegData());
        }
        return view('admin.site_admin.accommodation_list')->with(['url'=>'accommodation_lists','accom_lists'=>$arr]);
    }

    public function report(){
        $student=[
            'total'=>Student_registration::count(),
            'male'=>Student_registration::where('gender','male')->count(),
            'female'=>Student_registration::where('gender','female')->count(),
            ];
        $accommodation=[
            'total'=>Student_registration::where('accommodation','yes')->count(),
            'male'=>Student_registration::where('accommodation','yes')->where('gender','male')->count(),
            'female'=>Student_registration::where('accommodation','yes')->where('gender','female')->count(),
        ];

         $payment=[
            'total'=>DB::select("select sum(amount) as amount from student_registrations where accommodation='yes' and paid='yes'"),
            'male'=>DB::select("select sum(amount) as amount from student_registrations where accommodation='yes' and paid='yes' and gender='male'"),
            'female'=>DB::select("select sum(amount) as amount from student_registrations where accommodation='yes' and paid='yes' and gender='female'"),
        ];

        return view('admin.site_admin.report')->with([
            'url'=>'report',
            'student'=>$student,
            'accommodation'=>$accommodation,
            'payment'=>$payment
        ]);
    }
    
    
     public function paid_students(){
        $datas = Student_registration::where('accommodation','yes')->where('paid','Yes')->orderBy('id','desc')->get();
        $arr=[];
        foreach ($datas as $data){
            $reg_data=new student_regData($data->id);
            array_push($arr,$reg_data->getRegData());
        }
        return view('admin.site_admin.paid')->with(['url'=>'paid','details'=>$arr]);
    }
    
     public function no_paid_students(){
        $datas = Student_registration::where('accommodation','yes')->where('paid','No')->orderBy('id','desc')->get();
        $arr=[];
        foreach ($datas as $data){
            $reg_data=new student_regData($data->id);
            array_push($arr,$reg_data->getRegData());
        }
        return view('admin.site_admin.paid')->with(['url'=>'paid','details'=>$arr]);
    }
    
    public function trashData(){
        $stu_regi_trash_data=Student_registration::onlyTrashed()->get();
        return view('admin.site_admin.reg_trash_data')->with([
            'stu_regi_trash_data'=>$stu_regi_trash_data,
            'url'=>'stu_regi_trash_data'
        ]);
    }
    
    public function restoreStgData($id){
        Student_registration::onlyTrashed()->where('id',$id)->restore();
        return redirect(url('stu_regi_trash_data'));
    }

    public function permanentDelete($id){
        Student_registration::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect(url('stu_regi_trash_data'));
    }
    
    
}
