<div class="w-full mt-12">
    <div class="container mx-auto max-w-2xl">
        @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded" role="alert">
                {{-- <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg> --}}
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="mb-12 p-6 bg-white border rounded-md shadow-xl">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <input type="file" wire:model="photo" class="">
                    <div>
                        @error('photo') <span class="text-sm text-red-500 italic">{{ $message }}</span>@enderror
                    </div>
                    <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Uploading...</div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Photo</button>
            </form>
        </div>

        <div class="flex flex-wrap -mx-2">
            @foreach($photos as $photo)
                <div class="w-1/2 p-2">
                    <div class="w-full h-full border">
                        <img src="{{ asset('storage/photos/' . $photo->file_name) }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
