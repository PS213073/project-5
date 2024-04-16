<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        @method('post')
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="name" class="text-gray-700 select-none font-medium">Gebruiker Naam</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                placeholder="naam invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="text" name="email" value="{{ old('email') }}"
                                placeholder="email invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="password" class="text-gray-700 select-none font-medium">Wachtwoord</label>
                            <input id="password" type="password" name="password" value="{{ old('password') }}"
                                placeholder="wachtwoord invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="password_confirmation" class="text-gray-700 select-none font-medium">Bevestig
                                Wachtwoord</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="wachtwoord bevestigen"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <h3 class="text-xl my-4 text-gray-600">Rol</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($roles as $role)
                                <div class="flex flex-col justify-cente">
                                    <div class="flex flex-col">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                name="roles[]" value="{{ $role->id }}"><span
                                                class="ml-2 text-gray-700">{{ $role->name }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Opslaan</button>
                        </div>
                </div>


            </div>
        </main>
    </div>
    </div>
</x-app-layout>
