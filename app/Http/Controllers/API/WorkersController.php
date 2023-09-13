<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()->all()]);
    //     }


    //     if (auth()->attempt($request->all())) {
    //         // if (auth()->guard('workers')->attempt(['email' => request('email'), 'password' => request('password')])) {
    //         $workers = Workers::select('id', 'name', 'email')->find(auth()->guard('workers')->user()->id);
    //         $success =  $workers;
    //         $success['token'] =  $workers->createToken('MyApp', ['workers'])->plainTextToken;

    //         return response()->json($success, 200);
    //     } else {
    //         return response()->json(['error' => ['Email and Password are Wrong.']], 200);
    //     }
    // }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $workers = Workers::create($input);
        $success =  $workers;
        $success['token'] =  $workers->createToken('MyApp', ['workers'])->plainTextToken;

        return response()->json($success, 200);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }


        if (auth()->guard('workers')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $workers = Workers::select('id', 'name', 'email')->find(auth()->guard('workers')->user()->id);
            $success =  $workers;
            $success['token'] =  $workers->createToken('MyApp', ['workers'])->plainTextToken;

            return response()->json($success, 200);
        } else {
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }


    public function logout(Request $request)
    {
        //$request->user()->tokens()->delete();
        // $request->auth()->guard('workers')->user()->tokens()->delete();
        Auth::guard('workers')->logout();

    }
}
