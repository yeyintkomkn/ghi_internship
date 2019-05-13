<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class PaymentExport implements FromCollection,WithHeadings,ShouldAutoSize
{

    public function headings(): array
    {
        return [
            'Name',
            'Year',
            'Email',
            'Phone',
            'Date of birth',
            'Present address',
            'Permanent address',
            'Person to contact in case of emergency',
            'Relationship',
            'Emergency address',
            'Emergency detail address',
            'High school name',
            'Other Extra curricular activities',
            'Skill',
            'Scholarship',
            'After college plan',
            'School name',
            'Student Accommodation',
            'Accommodation Payment',
            'Comment',
            'Gender',
        ];
    }

    public function collection()
    {
        return DB::table('student_registrations')->select('name','year_level','email','phone',
        'dob','pre_address','per_address','emergency_contact','relationship','emergency_address',
        'emergency_detail_address','high_school_name','curricular_activities','skill','scholarship',
        'after_college_plan','school_name','accommodation','paid','comment','gender')->where('paid','Yes')->where('accommodation','yes')->get();
    }
}
