<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page_tile'] = 'BingHr Dashboard';
        $data['roles'] = Role::get();
        return view('welcome', $data);
    }

    public function create(StoreUserRequest $request, UserRepository $repository)
    {
        $user = $repository->create($request->all());
        if ($user) {
            return redirect()->back()->with('success', 'User Created');
        }
        return redirect()->back()->with('error', 'User Created');
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

}
