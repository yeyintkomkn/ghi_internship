<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentRegistrationExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentAcomodationExport;
use App\Exports\PaymentExport;

class AdminExportController extends Controller
{
    
    /* export to excel student registration all data*/
    public function exportStudentRegisterationData(){
        return Excel::download(new StudentRegistrationExport, 'student_registration_datas.xlsx');
    }

    /* export to excel student acommodation all data*/
    public function exportStudentAcomodationData(){
        return Excel::download(new StudentAcomodationExport, 'student_accommodation_datas.xlsx');
    }
    
     /* export to excel student payment export */
    public function studentPaymentExport(){
        return Excel::download(new PaymentExport, 'student_payment_list.xlsx');
    }
}
