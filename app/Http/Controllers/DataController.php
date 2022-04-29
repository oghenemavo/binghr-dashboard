<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            return $data;
        });

        return response()->json([
            'users' => $mapped_users,
        ]);
    }
}
