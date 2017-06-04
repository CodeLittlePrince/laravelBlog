<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	function __construct()
	{
		$this->middleware('guest:admin');
	}
   	public function showLoginForm()
   	{
   		return view('auth.admin-login');
   	}
   	public function login(Request $request)
   	{
   		// Validate the form data
   		$this->validateLogin($request);
   		// Attempt to log the user in
   		if ($this->attemptLogin($request)) {
   		// if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
   		// if unsuccessful, then redirect back to the login form with form data
        return redirect()->back()->withInput(
        	$request->only(
	        	$this->username(),
	        	'remember'
        	)
        );
   	}
   	public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
        ]);
    }
    public function attemptLogin(Request $request)
    {
        return Auth::guard('admin')->attempt(
            $this->credentials($request),
            $request->has('remember')
        );
    }
    public function credentials(Request $request)
    {
        return $request->only(
        	$this->username(),
        	'password'
        );
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}
