<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\UserCentre;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'first_name'            => 'required|max:255',
            'last_name'             => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users',
            'username'              => 'required|email|max:255|unique:users',
            'password'              => 'required|string|min:6|max:20|confirmed',
            'password_confirmation' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = new User([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'username'   => $request['username'],
            'password'   => bcrypt($request['password']),
            'role_id'    => $request['role_id'] ?: 3,
        ]);

        $user->save();

        if ($request['centre_id']) {
            $user_centre = new UserCentre([
                'user_id' => $user->id,
                'centre_id' => $request['centre_id']
            ]);

            $user_centre->save();
        }

        return back()->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $isAdmin = Auth::user()->isAdmin();

        if (!$isAdmin) {
            return redirect('/dashboard');
        }

        $user = User::find($id);
        if (!$user) {
            return redirect('/dashboard');
        }

        $centre_list = [];
        $centres = Centre::orderBy('centre_name', 'asc')->get();

        foreach ($centres as $centre) {
            $user_centre = UserCentre::whereUserId($id)
                ->where('centre_id', $centre->id)
                ->first();

            $centre_list[$centre->id] = [
                $centre->centre_name,
                isset($user_centre),
            ];
        }

        return view('pages.user-show', compact('user', 'centre_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'username'   => 'required',
            'email'      => 'required',
            'role'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->role_id = $request['role'];

        $user->save();

        return back()->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return back()->with('success', 'User deleted!');
    }
}
