<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Query_Builder extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Qurrybuilder/Index', [
            //1
            'titles_name' =>$titles = DB::table('titles')
            ->select('title')
            ->distinct()
            ->get(),

            //2
            'employees_age' => $employees_age =  DB::table('employees')
            ->select('emp_no', 'birth_date',
             DB::raw('YEAR(NOW()) AS now_year'), DB::raw('YEAR(NOW()) - YEAR(birth_date) AS age'))
            ->orderBy('age', 'DESC')
            ->limit(10) //จำกัด 10 คนแรก เพราะข้อมูลเยอะมากครับ
            ->get(),

            //3
            'gender_count'=> $gender_count = DB::table('employees')
            ->select('gender', DB::raw('COUNT(*) as count'))
            ->groupBy('gender')
            ->get(),

            //4
            'dept_managers' =>  $departmentmanagers = DB::table('dept_manager')
            ->select('dept_no', 'emp_no', 'from_date', 'to_date')
            ->whereYear('to_date', '=', 9999)
            ->get(),

            //5
            'emp_salaries'=> $employees_salaries = DB::table('salaries')
            ->select('emp_no', 'salary')
            ->whereYear('to_date', '=', 9999)
            ->orderBy('emp_no', 'ASC')
            ->limit(10) //จำกัด 10 คนแรก เพราะข้อมูลเยอะมากครับ
            ->get(),

            //6
            'dept_emp_count'=> $department_emplpoyees_count = DB::table('dept_emp')
            ->select('dept_no', DB::raw('COUNT(*) as count'))
            ->whereYear('to_date', '=', 9999)
            ->groupBy('dept_no')
            ->get(),

            //7
            'dept_avg_salaries' =>$depart_avg_salaries = DB::table('dept_emp as de')
            ->join('salaries as s', 'de.emp_no', '=', 's.emp_no')
            ->select('de.dept_no', DB::raw('AVG(s.salary) as average_salary'))
            ->groupBy('de.dept_no')
            ->get(),

            //8
                //เพิ่มข้อมูลในตาราง dept_emp
            $insert_dept_emp = DB::table('dept_emp')->insert([
                'emp_no' => 9999999,
                'dept_no' => 'd010',
                'from_date' => now(),
                'to_date' => '9999-01-01'
            ]),

            //ตรวจสอบข้อมูลในตาราง dept_emp
            'dept_d010'=> $employees_department_d010 = DB::table('dept_emp as de')
            ->join('employees as e', 'de.emp_no', '=', 'e.emp_no')
            ->select('de.dept_no', 'e.emp_no', 'e.first_name', 'e.last_name', 'e.gender')
            ->where('de.dept_no', 'd010')
            ->get(),

            //9
            //อัพเดทเงินเดือนของพนักงานที่มีเงินเดือนปัจจุบัน ให้เพิ่มเงินเดือน 10%
            $update_emp_salary = DB::table('salaries')
            ->whereYear('to_date', 9999)
            ->update(['salary' => DB::raw('salary * 1.1')]),


            //ตรวจสอบข้อมูลในตาราง salaries
            'edit_salary'=> $edit_salary = DB::table('salaries')
            ->select('emp_no', 'salary')
            ->whereYear('to_date', '=', 9999)
            ->orderBy('emp_no', 'ASC')
            ->limit(10) //จำกัด 10 คนแรก เพราะข้อมูลเยอะมากครับ
            ->get(),


            //10
            //ตรวจสอบเงินเดือนของพนักงานที่มีรหัสพนักงาน 10001
            $check_emp_10001 = DB::table('salaries')
            ->select('emp_no', 'salary', 'from_date', 'to_date')
            ->where('emp_no', 10001)
            ->get(),

            // ลบข้อมูลเงินเดือนเก่าของพนักงานที่มีรหัสพนักงาน 10001
            $del_emp_10001 = DB::table('salaries')
            ->where('emp_no', 10001)
            ->whereDate('to_date', '<', now())
            ->delete(),


            //ตรวจสอบเงินเดือนของพนักงานที่มีรหัสพนักงาน 10001 ในปัจจุบัน
            'salary_emp_10001'=> $salary_employees_10001 = DB::table('salaries')
            ->select('emp_no', 'salary' ,'from_date' , 'to_date')
            ->where('emp_no', 10001)
            ->get(),



        ]);
    }
}



//
