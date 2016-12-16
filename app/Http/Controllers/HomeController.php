<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(
        User $user,
        Auth $auth
    )
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $events = CustomEvent::whereHas('users', function ($q) use ($user) {
            $q->where('users.id', '=', $user->id);

        })->get();

        return view('home', [
            'user' => $user,
            'events' => $events
        ]);
    }
}
