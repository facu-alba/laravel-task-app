<x-guest-layout>
    <x-jet-authentication-card class="mt-8">
        <x-slot name="logo">
            <div class="text-center text-sm text-gray-500 font-semibold">
                {{ __(env('CUSTOMER_NAME')) }}
            </div>

            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('auth/index.input.email_title') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('auth/index.input.password_title') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('auth/index.keep_me_logged_in_title') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('auth/index.forgot_password_title') }}
                    </a>
                @endif --}}

                <x-jet-button class="ml-4">
                    {{ __('auth/index.login_title') }}
                </x-jet-button>
            </div>
        </form>

        <div class="flex justify-between p-2"></div>

        <div class="text-center text-sm text-gray-500 font-semibold">
            &copy; {{ __('auth/index.powered_by_title') }} ~
            @if(env('PARTNER_NAME'))
                {{ __('auth/index.partner_title') }}
            @endif
        </div>
    </x-jet-authentication-card>    
</x-guest-layout>
