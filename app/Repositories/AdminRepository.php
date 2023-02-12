<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Repositories\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return  Admin::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function getAdmins()
    {
        return Admin::all();
    }

    public function findOneById($adminId)
    {
        return Admin::findOrFail($adminId);
    }

    public function findOneByEmail($email)
    {
        return Admin::where('email', $email)->first();
    }

    public function create($payload, $encryptedGoogleKey)
    {
        $admin = new Admin();
        $admin->first_name = $payload->first_name;
        $admin->last_name = $payload->last_name;
        $admin->birthdate = $payload->birthdate;
        $admin->gender = $payload->gender;
        $admin->email = $payload->email;
        $admin->password = Hash::make($payload->password);
        $admin->google_2fa_secret = $encryptedGoogleKey;
        $admin->save();
        return $admin->fresh();
    }

    public function update($payload, $adminId)
    {
        $admin = Admin::findOrFail($adminId);
        $admin->first_name = $payload->first_name;
        $admin->last_name = $payload->last_name;
        $admin->birthdate = $payload->birthdate;
        $admin->gender = $payload->gender;
        $admin->email = $payload->email;
        $admin->save();
        return $admin->fresh();
    }

    public function updateStatus($payload, $adminId)
    {
        $admin = Admin::findOrFail($adminId);
        $admin->is_active = $payload->is_active;
        $admin->save();
        return $admin->fresh();
    }

    public function updatePassword($payload, $adminId)
    {
        $admin = Admin::findOrFail($adminId);
        $admin->password = Hash::make($payload->password);
        $admin->save();
        return $admin->fresh();
    }

    public function findAllCount()
    {
        return Admin::all()->count();
    }
}
