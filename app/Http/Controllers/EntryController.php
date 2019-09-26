<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Role;
use Auth;
use App\Models\Entry;
use App\Models\User;
use App\Models\UserCentre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class EntryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $self = Auth::user();
        $current_role = $self->role()->first()->name;

        $isAdmin = $current_role == 'admin';
        $isSuperAdmin = $current_role == 'super-admin';
        $users = [];
        $centres = [];

        if ($isSuperAdmin) {
            $entries = Entry::orderBy('in_time', 'desc')->get();
            $users = User::orderBy('first_name')->get();
            $centres = Centre::all();

        } elseif ($isAdmin) {
            $centre_ids = UserCentre::whereUserId($self->id)->pluck('centre_id')->toArray();
            $entries = Entry::whereIn('centre_id', $centre_ids)->orderBy('in_time', 'desc')->get();

            $users = User::whereHas('user_centre', function (Builder $builder) use ($centre_ids) {
                $builder->whereIn('centre_id', $centre_ids);
            })->get();

            $centres = Centre::whereIn('id', $centre_ids)->get();

        } else {
            $entries = Entry::whereUserId($self->id)->orderBy('in_time', 'desc')->get();
        }

        $roles = Role::where('name', '!=', 'super-admin')->get();

        return view('pages.dashboard', compact(
            'entries',
            'users',
            'centres',
            'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $today_date = Carbon::now()->timezone('America/Toronto')->format('M d, y h:i A') . ' EDT';
        return view('pages.index', compact('today_date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'clocking_type' => 'required',
        ]);

        $clocking_type = $request['clocking_type'];
        $username = $request['username'];

        $user = User::whereUsername($username)->first();

        if (!$user) {
            return back()->with('failure', 'The username is not valid! Please ensure that you have an account, 
            otherwise, please register.')->withInput();
        }

        if ($clocking_type == 'out') {
            $entry = Entry::where('user_id', $user->id)->where('out_time', null)->first();

            if (!$entry) {
                return back()->with('failure', 'You have not clocked in; please clock in before attempting to clock out');
            }

            /** @var Entry $entry */
            return $this->update($request, $entry);
        }

        $entry = new Entry;
        $entry->user_id = $user->id;
        $entry->centre_id = $user->centres->first()->id;
        $entry->in_time = Carbon::now()->getTimestamp();

        $entry->save();
        // Redirect Success
        return redirect('/')->with('success',
            '<strong>Success!</strong> You have successfully clocked in, have a great day!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Entry $entry
     * @return Response
     */
    public function show(Entry $entry) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Entry   $entry
     * @return Response
     */
    public function update(Request $request, Entry $entry) {
        $in_time = $entry->getOriginal('in_time');
        $out_time = Carbon::now()->getTimestamp();

        $entry->out_time = $out_time;
        $entry->total = $out_time - $in_time;

        $entry->save();

        // Redirect Success
        return redirect('/')->with('success',
            '<strong>Success!</strong> You have successfully clocked out, have a great day!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $entry = Entry::find($id);

        //Delete Entry
        $entry->delete();

        // Redirect
        return back()->with('success',
            '<strong>Success!</strong> You have successfully deleted the entry.');
    }
}
