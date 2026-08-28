```php
<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if ($status !== Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
};
?>

<div>
    <h1>Mot de passe oublié</h1>

    <form wire:submit="sendPasswordResetLink">

        <label for="email">
            Email
        </label>

        <input
            id="email"
            type="email"
            wire:model="email"
            required
        >

        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">
            Envoyer
        </button>

    </form>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <a href="{{ route('login') }}">
        Retour à la connexion
    </a>
</div>
```
