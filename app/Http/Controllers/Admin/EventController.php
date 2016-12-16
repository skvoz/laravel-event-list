<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomEventsUser;
use App\Models\CustomEvent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @var CustomEvent
     */
    private $event;

    /**
     * @var User
     */
    private $user;

    /**
     * @var CustomEventsUser
     */
    private $eventsUser;

    /**
     * Create a new controller instance.
     *
     * @param CustomEvent $event
     * @param CustomEventsUser $eventsUser
     * @param User $user
     */
    public function __construct(
        CustomEvent $event,
        CustomEventsUser $eventsUser,
        User $user
    ) {
        $this->event = $event;
        $this->user = $user;
        $this->eventsUser = $eventsUser;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->has('events')->get();

        return view ('event.index', [
            'users' => $users,
        ]);

    }

    public function view(Request $request, $id)
    {
        $event = $this->event->findOrFail($id);

        return view ('event.view', [
            'event' => $event,
        ]);

    }

    public function create(Request $request)
    {
        $event = $this->event;

        return view ('event.update', [
            'event' => $event,
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

        $event = $id ? $this->event->firstOrCreate(['id' => $id]) : $this->event;

        $this->validate($request, [
            'name' => 'required|max:255|min:4',
            'description' => 'required|max:1000'
        ]);

        $event->fill($input)->save();

        $request->session()->flash('messages', 'Event was successful!');

        return redirect()->action('Admin\EventController@eventList');
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

        $request->session()->flash('messages', 'Event drop successful!');

        return redirect()->action('Admin\EventController@index');
    }

    /**
     * @return mixed
     */
    public function eventList()
    {
        $events = $this->event->all();

        return view('event.list')->withEvents($events);
    }

    public function assign()
    {
        $users = $this->user->all();
        $events = $this->event->all();

        return view('event.assign', [
            'users' => $users,
            'events' => $events
        ]);
    }

    public function assignStore(Request $request)
    {
        $input = $request->except('_token');

        $this->eventsUser->fill($input)->save();

        $request->session()->flash('messages', 'Event assign successful!');

        return redirect()->action('Admin\EventController@index');
    }
}
