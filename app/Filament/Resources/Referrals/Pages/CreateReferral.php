<?php

namespace App\Filament\Resources\Referrals\Pages;

use App\Filament\Resources\Referrals\ReferralResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateReferral extends CreateRecord
{
    protected static string $resource = ReferralResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);

        $data['username'] = $user->username;

        return parent::handleRecordCreation($data);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $username = User::orderBy('id', 'desc')->first()->username;
        $username = substr($username, 2);
        $newUsername = 'BZ' . str_pad($username + 1, 4, '0', STR_PAD_LEFT);
        $data['username'] = $newUsername;
        $data['parent'] = auth()->user()->username;
        return $data;
    }

}
