<x-front-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="bg-white rounded-lg shadow-md p-4" action="{{ route('login') }}">
        @csrf

        <div class="p-4 px-5">
            <a href="/" class="flex items-center">
                <x-application-logo class="w-20 h-1 fill-current" />
                <h1 class="text-4xl font-semibold">GV</h1>
            </a>
            <!-- Email Address -->
            <div class="mt-5">
                <x-input-label for="text" class="mb-3 text-lg" :value="__('Voer uw gebruikersgegevens in.')" />
                <x-input-label for="email" class="mb-2" :value="__('E-mail')" />
                <x-text-input id="email"
                    class="block w-full px-4 py-2 text-sm font-normal leading-5 text-gray-600 bg-white border  rounded-md appearance-none focus:outline-none focus:ring transition duration-150 ease-in-out"
                    type="email" name="email" :value="old('email')" placeholder="Voer uw e-mailadres in" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" class="mb-2" :value="__('Wachtwoord')" />

                <x-text-input id="password"
                    class="block w-full px-4 py-2 text-sm font-normal leading-5 text-gray-600 bg-white border rounded-md appearance-none focus:outline-none focus:ring transition duration-150 ease-in-out"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="Voer uw e-mailadres in" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-[#527b68]" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <x-primary-button class="mt-6 uppercase w-full">
                {{ __('Inloggen') }}
            </x-primary-button>
            <div class="flex gap-16">
                <div class="flex justify-start mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Wachtwoord vergeten?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-end mt-4">

                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __('Account aanmaken') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-front-guest-layout>
