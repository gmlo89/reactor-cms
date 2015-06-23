<?php

namespace Gmlo\CMS\Controllers;

use Carbon\Carbon;
use Gmlo\CMS\Modules\Users\UsersRepo;
use Gmlo\CMS\Requests\CreateUserRequest;
use Gmlo\CMS\Requests\UpdatePassRequest;
use Gmlo\CMS\Requests\UpdateUserRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    protected $usersRepo;
    protected $current_user;

    public function __construct(UsersRepo $usersRepo, Guard $guard)
    {
        $this->usersRepo = $usersRepo;
        $this->current_user = $guard->user();
        $this->middleware('CMSAuthenticate');

        view()->share('user_types', getUserTypesList());
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->usersRepo->paginate();
        return view('CMS::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('CMS::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->usersRepo->storeNew($request->all());
        \Alert::message("User stored!");
        return redirect()->route('CMS::admin.users.edit', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->usersRepo->findOrFail($id);

        return view('CMS::users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->usersRepo->findOrFail($id);
        $this->usersRepo->update($user, $request->all());
        \Alert::message("User updated!");
        return redirect()->route('CMS::admin.users.edit', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->usersRepo->findOrFail($id);
        if($user->id == $this->current_user->id)
        {
            \Alert::message("You can't delete yourself!", "danger");
            return redirect()->back();
        }
        $this->usersRepo->delete($user);
        \Alert::message("User deleted!");
        return redirect()->route('CMS::admin.users.index');
    }

    public function editPassword($id)
    {
        $user = $this->usersRepo->findOrFail($id);

        return view('CMS::users.edit-password', compact('user'));
    }

    public function updatePassword(UpdatePassRequest $request, $id)
    {
        $user = $this->usersRepo->findOrFail($id);
        $this->usersRepo->update($user, $request->all());
        \Alert::message("Password updated!");
        return redirect()->route('CMS::admin.users.edit', $user->id);
    }


    public function editMyPassword(Guard $guard)
    {
        $user = $this->current_user;

        return view('CMS::users.edit-my-password', compact('user'));
    }

    public function updateMyPassword(Guard $guard, UpdatePassRequest $request)
    {
        $user = $this->current_user;
        $this->usersRepo->update($user, $request->all());
        \Alert::message("Password updated!");
        return redirect()->route('CMS::admin.home');
    }

    public function statusToggle(Guard $guard, $id)
    {
        $user = $this->usersRepo->findOrFail($id);
        if($user->isBlocked())
        {
            $user->blocked_at = null;
            \Alert::message("User unblocked!");
        }
        else
        {
            if($user->id == $this->current_user->id)
            {
                \Alert::message("You can't block yourself!", "danger");
                return redirect()->back();
            }
            $user->blocked_at = Carbon::now();
            \Alert::message("User blocked!");
        }
        $this->usersRepo->save($user);

        return redirect()->route('CMS::admin.users.edit', $user->id);
    }
}
