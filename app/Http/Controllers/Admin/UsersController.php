<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-users');
    }

    public function index(Request $request)
    {
        $query = User::query()->orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        $users = $query->paginate(20)->withQueryString();

        $roles = User::rolesList();

        return view('admin.users.index', compact('users','roles'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateRequest $request)
    {
        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make('password'),
            'role' => User::ROLE_USER
        ]);

        flash('Пользователь успешно добавлен!')->success()->important();

        return redirect()->route('admin.users.show', $user);
    }


    public function show(User $user)
    {
        $roles = User::rolesList();

        return view('admin.users.show', compact('user','roles'));
    }


    public function edit(User $user)
    {
        $roles = User::rolesList();

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        if ($request['role'] !== $user->role) {
            $user->changeRole($request['role']);
        }

        flash('Пользователь успешно обновлен!')->success()->important();

        return redirect()->route('admin.users.show', $user);
    }


    public function destroy(User $user)
    {
        $user->delete();

        flash('Пользователь успешно удален!')->info()->important();

        return redirect()->route('admin.users.index');
    }
}
