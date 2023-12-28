<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $emp = DB::table('employees')->select('first_name','last_name')->take(5)->get();
        $data = json_decode(json_encode($emp), true);

        $emp2 = DB::table('employees')->select('first_name','last_name')->take(10)->get();
        $data2 = json_decode(json_encode($emp2), true);
        // Log::info( $data);
        // return Response($data);

        return Inertia::render('Test/Index', [

       'emp' => $emp,
       'emp2' => $emp2

    ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
