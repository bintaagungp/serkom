<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div x-data class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5"
                        role="alert">
                        <span class="block sm:inline">{{ $error }}.</span>
                        <span x-on:click="$event.target.parentElement.parentElement.remove()"
                            class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endforeach
            @endif
            <a href="{{route('admin.pelanggan')}}" class="text-blue-500 underline">
                < Kembali</a>
                    <div class="mt-8 sm:p-6 lg:p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <form action="{{route('admin.pelanggan.update',['id' => $pelanggan->id])}}" class="flex flex-col gap-8" method="POST">
                            @csrf
                            @method('put')
                            <label>
                                <p class="text-gray-900 dark:text-gray-100">Nama</p>
                                <input class="w-full mt-4" type="text" name="name" value="{{ $pelanggan->name }}">
                            </label>
                            <label>
                                <p class="text-gray-900 dark:text-gray-100">Email</p>
                                <input class="w-full mt-4" type="email" name="email" value="{{ $pelanggan->email }}">
                            </label>
                            <button type="submit" class="p-5 rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                        </form>
                    </div>
        </div>
    </div>

</x-app-layout>
