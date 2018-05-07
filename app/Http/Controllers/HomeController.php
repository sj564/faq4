<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        return view('home')->with('questions', $questions);
       // return view('home');


    }
   public function admin(Request $req){
        return view('middleware')->withMessage("Admin");

    }

    function tutor(Request $req){
        return view('middleware')->withMessage("Tutor");

    }
    public function student(Request $req){
        return view('middleware')->withMessage("Student");

    }
}
