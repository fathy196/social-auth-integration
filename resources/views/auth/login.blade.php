<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-6">
            <a href="{{ route('google.redirect') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 48 48">
                    <path fill="#EA4335"
                        d="M24 9.5c3.2 0 6 .9 8.3 2.5l6.2-6.2C34.1 2.1 29.4 0 24 0 14.6 0 6.7 5.7 2.9 13.8l7.3 5.7C12.2 13 17.6 9.5 24 9.5z" />
                    <path fill="#4285F4"
                        d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9h12.4c-.5 2.5-2.1 4.6-4.4 6l6.9 5.3c4-3.7 6.2-9.1 6.2-15.6z" />
                    <path fill="#FBBC05"
                        d="M10.2 28.8c-1.1-3.2-1.1-6.6 0-9.8l-7.3-5.7C.6 18.2 0 21 0 24s.6 5.8 1.7 8.7l7.3-5.9z" />
                    <path fill="#34A853"
                        d="M24 48c5.4 0 10.1-1.8 13.5-4.9l-6.9-5.3c-2 1.3-4.6 2-7.6 2-6.4 0-11.8-4.3-13.8-10.1l-7.3 5.9C6.7 42.3 14.6 48 24 48z" />
                </svg>
                <span>Login with Google</span>
            </a>
        </div>
<div class="flex items-center justify-center mt-4">
    <a href="{{ route('facebook.redirect') }}"
        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
            <path fill="white" d="M22 12c0-5.5-4.5-10-10-10S2 6.5 2 12c0 5 3.7 9.1 8.5 9.9v-7H8v-2.9h2.5V9.5c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.3.2 2.3.2v2.6h-1.3c-1.3 0-1.7.8-1.7 1.6v1.9h2.9l-.5 2.9h-2.4v7C18.3 21.1 22 17 22 12z"/>
        </svg>
        <span>Login with Facebook</span>
    </a>
</div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
