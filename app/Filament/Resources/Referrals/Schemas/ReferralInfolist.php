<?php

namespace App\Filament\Resources\Referrals\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReferralInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')->label('Name'),
                TextEntry::make('user.username')->label('Username'),
                TextEntry::make('user.email')->label('Email'),
                TextEntry::make('commission_rate')->label('Commission Rate')->money('idr', true),


            ]);
    }
}
