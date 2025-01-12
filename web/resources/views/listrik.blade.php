<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-modal :name="'tambah-listrik'">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <p class="text-xl mb-5">Tambah Listrik</p>
                    <form action="{{route('listrik.store')}}" method="post" class="flex flex-col gap-8" >
                        @csrf
                        <label>
                            <p class="text-gray-900 dark:text-gray-100 mb-5">Listrik</p>
                            <select class="w-full text-gray-900" name="tarif_id">
                                @foreach ($tarif as $t)
                                    <option value="{{$t->id}}">{{$t->daya}}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <p class="text-gray-900 dark:text-gray-100 mb-5">Alamat</p>
                            <textarea class="w-full text-gray-900" name="alamat"></textarea>
                        </label>
                        <button type="submit" class="p-5 rounded bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                    </form>
                </div>
            </x-modal>
            <div x-data>
                <button class="mb-5 p-5 rounded bg-gray-50 border-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100"
                x-on:click="$dispatch('open-modal', 'tambah-listrik')">Tambah</button>
            </div>
            <x-table :columns="[
                ['name' => 'Nomor KWH', 'field' => 'nomor_kwh'],
                ['name' => 'Daya', 'field' => 'daya'],
                ['name' => 'Tarif per KWH', 'field' => 'tarifperkwh'],
                ['name' => 'Alamat', 'field' => 'alamat'],
            ]" :rows="$listrik->items()">
                <x-slot name="tableActions">
                    <div class="flex flex-wrap space-x-4">
                        <form :action="`/listrik/${row.id}/delete`" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 underline">Delete</button>
                        </form>
                    </div>
                </x-slot>
            </x-table>
            {{ $listrik->links() }}
        </div>

    </div>

</x-app-layout>
