<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $visitor;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Visitor $visitor)
    {
        $this->middleware('auth');
        $this->visitor = $visitor;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $visitors = $this->visitor->whereDate('created_at', Carbon::today())->get();
        $total_check_in = $visitors->count();
        $total_check_out = $visitors->where('status', 1)->count();

        $total_staff = User::count();

        $data = [
            'total_check_in'    => $total_check_in,
            'total_check_out'   => $total_check_out,
            'total_staff'       => $total_staff,
        ];

        return view('home', $data);
    }
}
