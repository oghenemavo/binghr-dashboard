<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $user = User::create([
                'employee_id' => data_get($attributes, 'employee_id'),
                'first_name' => data_get($attributes, 'first_name'),
                'last_name' => data_get($attributes, 'last_name'),
                'phone' => data_get($attributes, 'mobile_no'),
                'position' => data_get($attributes, 'position'),
                'email' => data_get($attributes, 'email'),
                'username' => data_get($attributes, 'username'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);

            if ($role_id = data_get($attributes, 'role')) {
                $role = Role::find($role_id);
        
                $user->roles()->attach($role);
            }

            return $user;
        });
    }

    public function update()
    {

    }
    public function forceDelete($attributes)
    {
        $user = User::find($attributes);

        if ($user) {
            $user->delete();
            return response()->json(['status' => true, 'message' => 'user deleted successfully']);
        }
        return response()->json(['status' => false, 'message' => 'unable to delete user']);
    }

}