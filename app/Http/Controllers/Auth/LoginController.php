<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

     public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the user has too many failed login attempts, we will increment the lockouts counter
        // and redirect the user back to the form. Of course, when this user is locked out,
        // we will not allow them to attempt to login again until their lockout time has expired.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the form. Of course, they will receive
        // an error message with their credentials.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

     protected function credentials(Request $request)
    {
        // Get the role from the request
        $role = $request->input('login_as');

        // Validate that a role was selected
        if (empty($role)) {
            throw ValidationException::withMessages([
                'login_as' => [trans('auth.role_required')], // Add this to lang/en/auth.php
            ]);
        }

        // Return credentials including the selected role
        return array_merge($request->only($this->username(), 'password'), ['role' => $role]);
    }

      protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->intended('index'); // Or your admin panel route
        }

        return redirect()->intended('userindex'); // Default user dashboard
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email'; // Or 'username' if you change your login to use a username field
    }







    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to a specific URL after logout
        return $this->loggedOut($request) ?: redirect('/login'); // Redirect to the homepage after logout
    }
}
