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
            @if (session()->has('alert-success'))
                <div x-data class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5"
                    role="alert">
                    <span class="block sm:inline">{{ session()->get('alert-success') }}.</span>
                    <span x-on:click="$event.target.parentElement.parentElement.remove()"
                        class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <a href="{{ route('admin.tagihan') }}" class="text-blue-500 underline">
                < Kembali</a>
                    <div
                        class="flex flex-col gap-5 my-8 p-8 text-gray-900 bg-gray-50 rounded dark:text-gray-100 dark:bg-gray-800">
                        <div>
                            <div class="font-bold">Nomor KWH</div>
                            <div class="text-xl">{{ $listrik->nomor_kwh }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Daya</div>
                            <div class="text-xl">{{ $listrik->tarif->daya }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Nama</div>
                            <div class="text-xl">{{ $listrik->user->name }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Email</div>
                            <div class="text-xl">{{ $listrik->user->email }}</div>
                        </div>
                    </div>

                    <x-modal :name="'tambah-daya'">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <p class="text-xl mb-5">Tambah Tagihan</p>
                            <form action="{{ route('admin.tagihan.store', ['id' => $listrik->id]) }}" method="post"
                                class="flex flex-col gap-8">
                                @csrf
                                <label>
                                    <p class="text-gray-900 dark:text-gray-100 mb-5">Bulan</p>
                                    <select class="w-full text-gray-900" name="bulan">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                            </option>
                                        @endfor
                                    </select>
                                </label>
                                <label>
                                    <p class="text-gray-900 dark:text-gray-100 mb-5">Tahun</p>
                                    <select class="w-full text-gray-900" name="tahun">
                                        @for ($i = (int) date('Y') - 10; $i <= (int) date('Y') + 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </label>
                                <label>
                                    <p class="text-gray-900 dark:text-gray-100 mb-5">Meter Awal</p>
                                    <input class="w-full text-gray-900" type="number" name="meter_awal">
                                </label>
                                <label>
                                    <p class="text-gray-900 dark:text-gray-100 mb-5">Meter Akhir</p>
                                    <input class="w-full text-gray-900" type="number" name="meter_akhir">
                                </label>
                                <button type="submit"
                                    class="p-5 rounded bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                            </form>
                        </div>
                    </x-modal>
                    <div x-data>
                        <button
                            class="p-5 rounded bg-gray-50 border-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100"
                            x-on:click="$dispatch('open-modal', 'tambah-daya')">Tambah</button>
                    </div>

                    @forelse ($penggunaan as $p)
                        <div
                            class="flex flex-wrap justify-between gap-5 my-8 p-8 text-gray-900 bg-gray-50 rounded dark:text-gray-100 dark:bg-gray-800">
                            <div>
                                <div class="font-bold">Nomor Tagihan</div>
                                <div class="text-xl">{{ $p->tagihan->id }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Bulan</div>
                                <div class="text-xl">{{ $p->bulan }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Tahun</div>
                                <div class="text-xl">{{ $p->tahun }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Meter Awal</div>
                                <div class="text-xl">{{ $p->meter_awal }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Meter Akhir</div>
                                <div class="text-xl">{{ $p->meter_akhir }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Jumlah Meter</div>
                                <div class="text-xl">{{ $p->tagihan->jumlah_meter }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Tagihan</div>
                                <div class="text-xl">{{ $p->tagihan->jumlah_meter * $listrik->tarif->tarifperkwh }}
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">Status</div>
                                <div class="text-xl">{{ $p->tagihan->status }}</div>
                            </div>
                            <div>
                                <div class="font-bold">Action</div>
                                <form
                                    action="{{ route('admin.tagihan.destroyPenggunaan', ['id' => $listrik->id, 'penggunaan_id' => $p->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-500 underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div
                            class="flex flex-col flex-wrap items-center gap-5 my-8 p-8 text-gray-900 bg-gray-50 rounded dark:text-gray-100 dark:bg-gray-800">
                            Tidak ada data ditemukan!</div>
                    @endforelse
                    {{ $penggunaan->links() }}

        </div>
    </div>

</x-app-layout>
