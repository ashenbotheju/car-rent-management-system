<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // If password field is empty, remove it from the data array to keep the existing password
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('password')
                ->password()
                ->label('New Password')
                ->minLength(8)
                ->maxLength(255)
                ->confirmed()
                ->revealable()
                ->nullable()
                ->helperText('Leave empty to keep current password')
                ->autocomplete('new-password')
                ->dehydrated(fn($state) => filled($state))
                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null),
            // Add other fields as needed or use the ones from UserResource
        ];
    }
}
