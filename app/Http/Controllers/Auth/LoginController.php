<?php

namespace App\Http\Controllers\Auth;

use App\Models\Centre;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Return username instead of email
     *
     * @return string
     */
    public function username() {
        return 'username';
    }

    /**
     * User Login form
     *
     */
    public function showUserLoginForm() {
        $roles = Role::all();
        $centres = Centre::all();
        return view('pages.login', compact('roles', 'centres'));
    }

    /**
     * Send failed login response.
     *
     * @param  \Illuminate\Http\Request $request
     * @throws ValidationException
     * @return mixed
     */
    protected function sendFailedLoginResponse(Request $request) {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Login
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function login(Request $request) {
        $this->validateLogin($request);


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Logout
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function logout(Request $request) {
        $redirect = '/';

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
