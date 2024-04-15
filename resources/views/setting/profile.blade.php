<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.profile.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="name" class="text-gray-700 select-none font-medium">Gebruiker Naam</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                                placeholder="Enter name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="text" name="email" value="{{ old('email', $user->email) }}"
                                placeholder="Enter email"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        {{-- <div id="image-preview" class="image-preview flex text-gray-500 mt-5">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div> --}}

                        <div class="flex text-gray-500 mt-5">
                            <div class="bg-white rounded-lg">
                                <div class="" x-data="imageData()">
                                    <div x-show="previewUrl == '' && imgurl == ''">
                                        <p class="text-center uppercase text-bold">
                                            <label for="thumbnailprev" class="cursor-pointer bg-[#3b3b3b] text-[#a3aab7] p-3 rounded-md">
                                                Upload a file
                                            </label>
                                            <input type="file" name="image" id="thumbnailprev"
                                                class="hidden thumbnailprev" @change="updatePreview()">
                                        </p>
                                    </div>
                                    <div x-show="previewUrl !== ''" class="relative w-24 h-24">
                                        <img :src="previewUrl" alt=""
                                            class="shadow-lg rounded-full max-w-full h-auto align-middle border-none w-full object-cover ml-3 mb-3">
                                        <div class="ml-5">
                                            <button type="button" class="bg-[#3b3b3b] text-[#a3aab7] p-3 rounded-md"
                                                @click="clearPreview()">Foto Veranderen</button>
                                        </div>
                                    </div>

                                    <div x-show="imgurl !== ''" class="relative w-24 h-24">
                                        <img :src="imgurl" alt=""
                                            class="shadow-lg rounded-full max-w-full h-auto align-middle border-none w-full object-cover ml-3 mb-3">
                                        <div class="ml-5">
                                            <button type="button" class="bg-[#3b3b3b] text-[#a3aab7] p-3 rounded-md"
                                                @click="clearPreview()">Foto Veranderen</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
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

    @push('scripts')
        <script>
            function imageData() {
                var files = document.getElementById("thumbnailprev").files;
                if (files.length == 0) {
                    var url = '/images/' + {!! json_encode($user->image) !!};
                } else {
                    url = '';
                }
                return {
                    previewUrl: "",
                    imgurl: url,
                    updatePreview() {
                        var reader, files = document.getElementById("thumbnailprev").files;
                        reader = new FileReader();
                        reader.onload = e => {
                            this.previewUrl = e.target.result;
                        };
                        reader.readAsDataURL(files[0]);
                    },
                    clearPreview() {
                        document.getElementById("thumbnailprev").value = null;
                        this.previewUrl = "";
                        this.imgurl = "";
                    }
                };
            }
        </script>
    @endpush

    {{-- @push('scripts')
        <script>
            $(document).ready(function() {
                $('.image-preview').css({
                    'background-image': 'url({{ asset(auth()->user()->image) }})',
                    'background-size': 'cover',
                    'background-position': 'center center',
                    'width': '250px',
                    'height': '250px',
                    'border': '2px dashed #ddd',
                    'border-radius': '3px',
                    'position': 'relative',
                    'overflow': 'hidden',
                    'background-color': '#ffffff',

                })
            })
        </script>
    @endpush --}}
</x-app-layout>
