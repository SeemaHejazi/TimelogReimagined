<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\User;
use App\Models\UserCentre;
use Illuminate\Http\Request;

class UserCentreController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  User $user_id
     * @return Centre $centre_id
     */
    public function store(
        $user_id,
        $centre_id
    ) {
        $user_centre = UserCentre::where('user_id', $user_id)
            ->where('centre_id', $centre_id)
            ->first();

        if (isset($user_centre)) {
            return 'error';
        }

        $match = new UserCentre([
            'user_id'   => $user_id,
            'centre_id' => $centre_id,
        ]);

        $match->save();

        return 'successfully added';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  User    $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id) {
        $centres = Centre::orderBy('centre_name', 'asc')->get();
        $centre_list = [];

        foreach ($centres as $centre) {
            $centre_list[$centre->id] = $centre->centre_name;
        }

        $present = $request->except(['_token']);
        $missing = array_diff($centre_list, $present);

        foreach ($missing as $i => $name) {
            $this->destroy($user_id, $i);
        }

        foreach ($present as $i => $name) {
            $this->store($user_id, $i);
        }

        return back()->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user_id
     * @return Centre $centre_id
     */
    public function destroy(
        $user_id,
        $centre_id
    ) {
        $user_centre = UserCentre::where('user_id', $user_id)
            ->where('centre_id', $centre_id)
            ->first();

        if (!isset($user_centre)) {
            return 'error';
        }

        $user_centre->delete();
        return 'successfully deleted';
    }
}
