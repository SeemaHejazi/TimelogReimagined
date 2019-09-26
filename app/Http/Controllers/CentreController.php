<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Centre;
use Illuminate\Http\Request;

class CentreController extends Controller {
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'centre_name' => 'required|max:255',
            'location'    => 'required|max:255',
            'timezone'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $centre = new Centre;
        $centre->centre_name = $request->centre_name;
        $centre->location = $request->location;
        $centre->timezone = $request->timezone;

        $centre->save();

        return back()->with('success', '<strong>Success!</strong> You have successfully stored a centre');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // Todo: update centre info
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // Todo: delete centres safly considering the assignements made
    }
}
