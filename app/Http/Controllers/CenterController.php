<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $centers = Center::order_by('center_name', 'asc')->get();

//        return view('', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // Not needed
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'center_name' => 'required|max:255',
            'location'    => 'required|max:255',
            'timezone'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $center = new Center;
        $center->center_name = $request->center_name;
        $center->location = $request->location;
        $center->timezone = $request->timezone;

        $center->save();

        return back()->with('success', '<strong>Success!</strong> You have successfully stored a center');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // Todo: Return to this page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // Not needed
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // Not needed
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
