<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\UserCentre;
use Auth;
use Illuminate\Http\Request;

class EntryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $self = Auth::user();
        $isAdmin = $self->hasRole('admin');
        $isSuperAdmin = $self->hasRole('super-admin');

        if ($isSuperAdmin) {
            $entries = Entry::all();
        } elseif ($isAdmin) {
            $centre_ids = UserCentre::whereUserId($self->id)->pluck('centre_id')->toArray();
            $entries = Entry::whereIn('centre_id', $centre_ids)->get();
        } else {
            $entries = Entry::whereUserId($self->id)->get();
        }

        return view('pages.dashboard', compact('entries'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Entry        $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry) {
        //
    }
}
