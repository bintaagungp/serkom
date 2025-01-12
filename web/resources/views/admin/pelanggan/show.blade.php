<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('admin.pelanggan') }}" class="text-blue-500 underline">
                < Kembali</a>
                    <div
                        class="flex flex-col gap-5 my-8 p-8 text-gray-900 bg-gray-50 rounded dark:text-gray-100 dark:bg-gray-800">
                        <div>
                            <div class="font-bold">Nama</div>
                            <div class="text-xl">{{ $pelanggan->name }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Email</div>
                            <div class="text-xl">{{ $pelanggan->email }}</div>
                        </div>
                    </div>
                    <x-modal :name="'tambah-daya'">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <p class="text-xl mb-5">Tambah Listrik</p>
                            <form action="{{route('admin.pelanggan.storeListrik', ['id' => $pelanggan->id])}}" method="post" class="flex flex-col gap-8" >
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
                        x-on:click="$dispatch('open-modal', 'tambah-daya')">Tambah</button>
                    </div>
                    <x-table :columns="[
                        ['name' => 'Nomor KWH', 'field' => 'nomor_kwh'],
                        ['name' => 'Daya', 'field' => 'daya'],
                        ['name' => 'Tarif per KWH', 'field' => 'tarifperkwh'],
                        ['name' => 'Alamat', 'field' => 'alamat'],
                    ]" :rows="$listrik->items()">
                        <x-slot name="tableActions">
                            <div class="flex flex-wrap space-x-4">
                                <form :action="`/admin/pelanggan/${row.user_id}/listrik/${row.id}/delete`" method="post">
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
