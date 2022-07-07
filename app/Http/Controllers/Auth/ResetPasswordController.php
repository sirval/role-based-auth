<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;


    public function redirectTo()
    {
        //check user role
        switch (Auth::user()->role_id) {
            case 1:
                $this->redirectTo = route('admin-home');
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = route('staff-home');
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/'; //if user has no role
                return $this->redirectTo;
                break;
        }
    }
}
