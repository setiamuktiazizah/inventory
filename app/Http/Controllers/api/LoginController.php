<?php


namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;




class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {


        $request->session()->increment('login_attempts');


        $jumlah = session()->get('login_attempts', 0);


        //set validation




        if ($jumlah < 3) {
            $validator = Validator::make($request->all(), [
                'email'     => 'required',
                'password'  => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email'     => 'required',
                'password'  => 'required',
                'g-recaptcha-response' => 'recaptcha'
            ]);
        }




        //if validation fails
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }


        //get credentials from request
        $credentials = $request->only('email', 'password');


        //if auth failed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return view('login', [
                'displayCaptcha' => $jumlah > 3,
            ]);
        }


        //if auth success
        // $role = Role::create([
        //     'role' => $request->email,
        //     'credential_type' => $token,
        //     'created_by' => 1
        // ]);


        //return app('App\Http\Controllers\InventoryController')->dashboardAdminPage();

        $token_jwt = cookie('token', $token, 60);
        $name = cookie('name', auth()->guard('api')->user()->name, 60);
        return response(view('/dashboard-admin'))->cookie($token_jwt)->cookie($name);
    }



    public function loginPage()
    {
        $jumlah = session()->get('login_attempts', 0);


        return view('login', [
            'displayCaptcha' => $jumlah,
        ]);




        // return view('/login');
    }
}
