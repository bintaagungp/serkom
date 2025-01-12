<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
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
