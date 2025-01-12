<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
