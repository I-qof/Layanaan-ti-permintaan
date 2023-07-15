<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\DescAduan;
use App\Models\Inventaris;
use App\Models\User;
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
        $aduan =Aduan::where('deleted',1)->count();
        $descAduan = DescAduan::where('deleted',1)->count();
        $inventaris = Inventaris::where('deleted',1)->count();
        $user = User::all()->count();
        return view('views.dashboard',[
            'aduan'=>$aduan,
            'descAduan'=>$descAduan,
            'inventaris'=>$inventaris,
            'user'=>$user
        ]);
    
    }

   
}
