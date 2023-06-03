<?php


namespace App\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8',
            'no_hp'      => 'required',
            'no_credential'      => 'required',
        ]);


        //if validation fails
        if ($validator->fails()) {
            //return response()->json($validator->errors(), 422);
            // return view('/register');
            return Redirect::back()->withErrors($validator);
        }


        //create user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'no_hp'     => $request->no_hp,
            'no_credential'  => $request->no_credential,
            'id_role'     => 4
        ]);


        if ($user) {
            $jumlah = session()->get('login_attempts', 0);
            return view('login', [
                'displayCaptcha' => $jumlah,
            ]);
        }
    }
}
