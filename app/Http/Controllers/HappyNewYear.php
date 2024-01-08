<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HappyNewYear extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //1
        $dept = DB::table('departments')
        ->get();
        //2
        $emp = DB::table('employees')
        ->take(10)
        ->get(['emp_no', 'first_name']);
        //3
        $emp_one = DB::table('employees')
        ->select('emp_no', 'first_name')
        ->offset(10)
	    ->limit(5)
	    ->get();
        //4
        $emp_two = DB::table('employees')
        ->where('emp_no','10009')
        ->get();
        //5
        $emp_three  = DB::table('employees')
        ->where('first_name', 'like', 'T%')
        ->whereRaw('YEAR(CURDATE()) - YEAR(birth_date) > 70')
        ->limit(10)
        ->get();
        //6
        $emp_four = DB::table('dept_emp')
        ->select('dept_no',
			DB::raw('COUNT(*) as cnt'))
        ->whereYear('to_date','<>','9999')
        ->groupBy('dept_no')
        ->get();
        //7
        $emp_five = DB::table('dept_emp')->select('*', DB::raw('YEAR(NOW()) - YEAR(to_date) as w'))
        ->whereYear('to_date','2000')
        ->limit(10)
        ->get();
        //8
        $emp_six = DB::table('dept_emp')->leftJoin('employees','dept_emp.emp_no','=','employees.emp_no')
        ->leftJoin('departments','dept_emp.dept_no','=','departments.dept_no')
        ->select('employees.*','dept_name','dept_emp.to_date',
		DB::raw('YEAR(CURDATE()) - YEAR(dept_emp.to_date) as work'))
        ->whereYear('to_date','<>','9999')
        ->limit(10)
        ->get();

        //9.
        // $emp_seven = DB::table('departments')->insert([
        //     'dept_no' => 'd010',
        //     'dept_name' => 'CS MJU'
        // ]);

        $emp_seven = DB::table('departments')
        ->where('dept_no', 'd010')
        ->get();


        //10
        // $emp_eight = DB::table('employees')-> insertOrIgnore(['emp_no' => '9999999', 'birth_date' =>
        // DB::raw('DATE_SUB(CURDATE(),
	    // INTERVAL 30 DAY)'),
        // 'first_name' => 'Attawit',
        // 'last_name' => 'Chang',
        // 'gender' => 'M',
        // 'hire_date' => DB::raw('CURDATE()'
        // )]);

        $emp_eight = DB::table('employees')
        ->select('emp_no', 'first_name', 'last_name', 'gender', 'hire_date')
        ->where('emp_no', '9999999')
        ->get();





        return Inertia::render('Happynewyear/Index', [
            'dept' => $dept,
            'emp' => $emp,
            'emp_one' => $emp_one,
            'emp_two' => $emp_two,
            'emp_three' => $emp_three,
            'emp_four' => $emp_four,
            'emp_five' => $emp_five,
            'emp_six' => $emp_six,
            'emp_seven' => $emp_seven,
            'emp_eight' => $emp_eight,




        ]);

    }

}
