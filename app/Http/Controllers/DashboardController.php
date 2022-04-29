<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page_tile'] = 'BingHr Dashboard';
        return view('welcome', $data);
    }

    public function create(StoreUserRequest $request, UserRepository $repository)
    {
        // dd('yes');
        $user = $repository->create($request->all());
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

}
