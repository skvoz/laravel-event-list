<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(
      User $user
    ) {
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.home', [
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        return view('admin.update')->withUser($user);
    }

    public function store(Request $request, $id = null)
    {
        $input = $request->except('_token');

        $user = $id ? $this->user->firstOrCreate(['id' => $id]) : $this->user;

        if(empty($input['password'])) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $this->validate($request, [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|min:5|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user->fill($input)->save();

        $request->session()->flash('messages', 'User was successful!');

        return redirect()->action('Admin\HomeController@index');
    }

    public function delete(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $user->delete();

        $request->session()->flash('messages', 'User drop successful!');

        return redirect()->action('Admin\HomeController@index');
    }

    public function create(Request $request)
    {
        $user = $this->user;

        return view('admin.update', [
            'user' => $user,
        ]);
    }
}
