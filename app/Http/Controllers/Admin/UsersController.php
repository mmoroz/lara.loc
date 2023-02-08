<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query()->orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        $users = $query->paginate(20)->withQueryString();


        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(CreateRequest $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(UpdateRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
