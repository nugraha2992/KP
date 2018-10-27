<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        // if ($user->hasRole('admin')) {
        //     $this->redirectTo = '/kolaladata';
        // } else if ($user->hasPermissionTo('bisnis')) {
        //     $this->redirectTo = '/home';
        // } else if ($user->hasPermissionTo('AOM')) {
        //     $this->redirectTo = '/kelolaaom';
        // }
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect('keloladata');
        } else if ($user->hasRole('bisnis')) {
            return redirect('home');
        } else if ($user->hasRole('AOM')) {
            return redirect('/kelolaaom');
        }
    }
}
