<?php

namespace App\Filament\Resources\Referrals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReferralForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('name')->required()->placeholder("Masukkan nama anda")->label('Nama Lengkap'),
               TextInput::make('email')->required()->email()->placeholder("contoh:admin@gmail.com")->label('Email Address'),
               TextInput::make('password')->required()->password()->placeholder("Masukkan password anda")->label('Password')->confirmed()
    ->required(fn (string $context): bool => $context === 'create')
    ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
    ->dehydrated(fn ($state) => filled($state)),
               TextInput::make('password_confirmation')->required()->password()->placeholder("Masukkan kembali password anda")->label('Konfirmasi Password')
    ->required(fn (string $context): bool => $context === 'create'),
               TextInput::make('commission_rate')->required()->numeric()->minValue(0)->label('Commission Rate (Rp)'),
            ]);
    }
}
