<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div
                class="flex flex-col justify-center items-center container mx-auto md:container md:mx-[0%] md:w-full px-6 py-8 bg-[#3E6553] ">


                <h3 class="text-white text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>

                <p>Role : <b>
                        @foreach (auth()->user()->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </b> </p>

            </div>
        </main>
    </div>
    </div>
</x-app-layout>
