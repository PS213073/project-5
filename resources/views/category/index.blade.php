<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                @can('Type maken')
                    <a href="{{ route('admin.categories.create') }}"
                        class="bg-[#3E6553] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#1e3129] transition-colors ">Nieuwe
                        Type</a>
                @endcan
            </div>

            <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Naam</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right pr-14">
                                Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('Toegang tot typen')
                            @foreach ($categories as $category)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $category->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-right">
                                        @can('Type bewerken')
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Bewerking</a>
                                        @endcan

                                        @can('Type verwijderen')
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Verwijderen</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>
</x-app-layout>
