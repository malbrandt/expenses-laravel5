<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreUser;
use App\User;
use App\Http\Requests\Update\UpdateUser;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display all users
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // for role(-s) assigning
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUser|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $this->authorize('create', User::class);

        /** @var User $user */
        $user = User::make($request->all());

        $user->password = bcrypt($request['password']);
        $user->save();
        $this->assignRolesFromRequest($request, $user);

        return redirect(route('users.show', $user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        $rejected = $user
            ->payments
            ->where('assent', '=', '-1')
            ->count();

        $pending = $user
            ->payments
            ->where('assent', '=', null)
            ->count();

        $accepted= $user
            ->payments
            ->where('assent', '=', 1)
            ->count();

        $user['counts'] = [
            'expenses' => $user->expenses()->count(),
            'payments' => [
                'all' => $accepted + $rejected + $pending,
                'pending' => $pending,
                'accepted' => $accepted,
                'rejected' => $rejected
            ]
        ];

        return view('users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        // for role(-s) assigning
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser|Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->only($user->getFillable()));
        $this->assignRolesFromRequest($request, $user);

        return redirect(route('users.show', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect('users');
    }

    /**
     * @param Request $request
     * @param $user
     */
    private function assignRolesFromRequest(Request $request, $user)
    {
        $roles = Role
            ::whereIn('id', $request['roles'])
            ->pluck('name')
            ->toArray();

        $user->assignRole($roles);
    }
}
