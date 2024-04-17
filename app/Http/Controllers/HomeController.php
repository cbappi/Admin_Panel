<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Gate::authorize('access-dashboard'); // authorize this user to access/give access to admin dashboard
        return view('admin.pages.dashboard');
    }

    // function UserLogin(Request $request){
    //     $count=User::where('email','=',$request->input('email'))
    //          ->where('password','=',$request->input('password'))
    //          ->select('id')->first();

    //     if($count!==null){

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'User Login Successful'

    //         ],200);
    //     }
    //     else{
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'unauthorizedddd'
    //         ],200);

    //     }

    //  }
}
