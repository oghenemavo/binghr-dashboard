<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function users()
    {
        $users = User::get();
        $mapped_users = $users->map(function($item, $key) {
            $data['id'] = $item->id;
            $data['employee_id'] = $item->employee_id;
            $data['first_name'] = $item->first_name;
            $data['last_name'] = $item->last_name;
            $data['mobile_no'] = $item->phone;
            $data['position'] = $item->position;
            $data['email'] = $item->email;
            $data['username'] = $item->username;
            $data['initials'] = strtoupper($item->first_name[0]) . '' . strtoupper($item->last_name[0]);
            $data['created_at'] = date('dS M, Y', strtotime($item->created_at));
            $data['name'] = ucfirst($item->first_name) . ' ' . $item->last_name;
            $data['role_id'] = $item->roles->first()->pivot->role_id;
            $data['role'] = $item->roles->first()->name;
            $data['permissions'] = $item->permissions;

            return $data;
        });

        return response()->json([
            'users' => $mapped_users,
        ]);
    }

    public function deleteUser(Request $request, UserRepository $repository)
    {
        return $repository->forceDelete($request->user_id);
    }

    public function updateUser(Request $request, UserRepository $repository, User $user)
    {
        return $repository->update($request->all(), $user);
    }
}
