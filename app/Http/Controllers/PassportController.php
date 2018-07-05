<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class PassportController extends Controller
{
    public function login()
    {
        if (Auth::attempt(
            [
                'email'    => request('email'),
                'password' => request('password'),
            ]
        )) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->acessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request,
                [
                    'name'       => 'required',
                    'email'      => 'required|email',
                    'password'   => 'required',
                    'c_password' => 'required|same:password',

                ]
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name']  = $user->name;

        return response()->json(['success' => $success], 201);
    }

    public function getDetails()
    {
        $user = Auth::user();

        return response()->json(['success' => $user], 200);
    }

}
