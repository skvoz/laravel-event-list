<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 */
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

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');

        $user = $id ? $this->user->firstOrNew(['id' => $id]) : $this->user;

        $validator = Validator::make($input, [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|min:5',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->action('Admin\HomeController@create')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirm']));
        }

        //TODO prepare data or hidrator
        if(empty($input['password'])) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $user->fill($input)->update();

        $request->session()->flash('messages', 'User was successful!');

        return redirect()
            ->action('Admin\HomeController@index');
    }

    /**
     * @param Request $request
     * @param null $id
     * @return $this
     */
    public function store(Request $request)
    {

        $input = $request->except('_token');

        $user = $this->user;

        $validator = Validator::make($input, [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|min:5',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->action('Admin\HomeController@create')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirm']));
        }

        //TODO prepare data or hidrator
        if(empty($input['password'])) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $user->fill($input)->save();

        $request->session()->flash('messages', 'User was successful!');

        return redirect()
            ->action('Admin\HomeController@index');
    }



    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $user->delete();

        $request->session()->flash('messages', 'User drop successful!');

        return redirect()->action('Admin\HomeController@index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.create');
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        return view('admin.update')->withUser($user);
    }
}
