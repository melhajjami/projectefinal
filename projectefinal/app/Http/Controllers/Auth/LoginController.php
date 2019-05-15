<?php

namespace App\Http\Controllers\Auth;

use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\friendshipController;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
    protected $redirectTo = '/biblioteca';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        //AL FER LOGIN CREA VARIABLE GLOBAL AMB INVITACIONS D'AMISTAT PENDENTS
        session(['pendingfriendships' => friendshipController::invitacions()]);
        //AL FER LOGIN CREA VARIABLE GLOBAL AMB USUARI AMB EL QUE HAS FET LOGIN
        session(['usuarilogin' => Auth::user()]);
    }
}
