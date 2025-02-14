<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tagihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-modal :name="'tambah-daya'">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <p class="text-xl mb-5">Tambah Daya</p>
                    <form :action="route("admin.tagihan.store")" method="post" class="flex flex-col gap-8" >
                        @csrf
                        <label>
                            <p class="text-gray-900 dark:text-gray-100">Daya</p>
                            <input class="w-full mt-4 text-gray-900" type="number" name="daya">
                        </label>
                        <label>
                            <p class="text-gray-900 dark:text-gray-100">Tarif per kwh</p>
                            <input class="w-full mt-4 text-gray-900" type="number" name="tarifperkwh">
                        </label>
                        <button type="submit" class="p-5 rounded bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                    </form>
                </div>
            </x-modal>
            <div x-data>
                <button class="mb-5 p-5 rounded bg-gray-50 border-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100"
                x-on:click="$dispatch('open-modal', 'tambah-daya')">Tambah</button>
            </div> --}}
            <x-table :columns="[['name' => 'Nomor KWH', 'field' => 'nomor_kwh'], ['name' => 'Daya', 'field' => 'daya'], ['name' => 'Nama', 'field' => 'name']]" :rows="$listrik->items()">
                <x-slot name="tableActions">
                    <div class="flex flex-wrap space-x-4">
                        <a :href="`/admin/tagihan/${row.id}/show`" class="text-blue-500 underline">View</a>
                    </div>
                </x-slot>
            </x-table>
            {{ $listrik->links() }}
        </div>

    </div>

</x-app-layout>
