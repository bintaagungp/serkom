<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            @if(session()->has('alert-success'))
                <div x-data class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5"
                    role="alert">
                    <span class="block sm:inline">{{ session()->get('alert-success') }}.</span>
                    <span x-on:click="$event.target.parentElement.parentElement.remove()"
                        class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <x-modal :name="'tambah-pelanggan'">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <p class="text-xl mb-5">Tambah Pelanggan</p>
                    <form :action="route("admin.pelanggan.store")" method="post" class="flex flex-col gap-8" >
                        @csrf
                        <label>
                            <p class="text-gray-900 dark:text-gray-100">Nama</p>
                            <input class="w-full mt-4 text-gray-900" type="text" name="name">
                        </label>
                        <label>
                            <p class="text-gray-900 dark:text-gray-100">Email</p>
                            <input class="w-full mt-4 text-gray-900" type="email" name="email">
                        </label>
                        <button type="submit" class="p-5 rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                    </form>
                </div>
            </x-modal>
            <div x-data>
                <button class="mb-5 p-5 rounded bg-gray-50 border-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100"
                x-on:click="$dispatch('open-modal', 'tambah-pelanggan')">Tambah</button>
            </div>
            <x-table :columns="[['name' => 'Nama', 'field' => 'name'], ['name' => 'Email', 'field' => 'email']]" :rows="$pelanggan->items()">
                <x-slot name="tableActions">
                    <div class="flex flex-wrap space-x-4">
                        <a :href="`pelanggan/${row.id}/show`" class="text-green-500 underline">View</a>
                        <a :href="`pelanggan/${row.id}/edit`" class="text-blue-500 underline">Edit</a>
                        <form :action="`pelanggan/${row.id}/delete`" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 underline">Delete</button>
                        </form>
                    </div>
                </x-slot>
            </x-table>
            {{ $pelanggan->links() }}
        </div>

    </div>

</x-app-layout>
