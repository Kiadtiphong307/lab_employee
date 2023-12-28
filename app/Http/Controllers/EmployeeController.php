<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dept = DB::table('departments')
        ->pluck('dept_name')
        ->sort();
        $data = json_decode(json_encode($dept), true);

        $male = DB::table('employees')
        ->select('first_name', 'last_name', 'gender')
        ->where('gender', 'M')
        ->where('first_name', 'like', 'A%')
        ->orderBy('first_name', 'asc')
        ->limit(50)
        ->get();

        $female = DB::table('employees')
        ->select('first_name', 'last_name', 'gender')
        ->selectRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age')
        ->where('gender', 'F')
        ->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) > 50')
        ->orderBy('age', 'desc')
        ->limit(50)
        ->get();

        return Inertia::render('Employees/Index', [
            'dept' => $dept,
            'male' => $male,
            'female' => $female,

        ]);

    }

}

?>
