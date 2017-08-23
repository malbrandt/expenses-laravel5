<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreUser;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        return view('users.create');
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
        $user = \App\User::make([
            $request->only([
                'name', 'email', 'password',
            ])
        ]);

        $user->assignRole('user');
        $user->save();

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->only($user->getFillable()));

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
}
