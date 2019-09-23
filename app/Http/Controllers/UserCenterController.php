<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\User;
use App\Models\UserCenter;
use Illuminate\Http\Request;

class UserCenterController extends Controller {
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
     * @return Center $center_id
     */
    public function store(
        $user_id,
        $center_id
    ) {
        $user_center = UserCenter::where('user_id', $user_id)
            ->where('center_id', $center_id)
            ->first();

        if (isset($user_center)) {
            return 'error';
        }

        $match = new UserCenter([
            'user_id'   => $user_id,
            'center_id' => $center_id,
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
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  User $user_id
     * @return Center $center_id
     */
    public function destroy(
        $user_id,
        $center_id
    ) {
        $user_center = UserCenter::where('user_id', $user_id)
            ->where('center_id', $center_id)
            ->first();

        if (!isset($user_center)) {
            return 'error';
        }

        $user_center->delete();
        return 'successfully deleted';
    }
}
