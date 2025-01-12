<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <a href="{{route('admin.daya')}}" class="text-blue-500 underline">
                < Kembali</a>
                    <div class="mt-8 sm:p-6 lg:p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <form action="{{route('admin.daya.update',['id' => $tarif->id])}}" class="flex flex-col gap-8" method="POST">
                            @csrf
                            @method('put')
                            <label>
                                <p class="text-gray-900 dark:text-gray-100">Daya</p>
                                <input class="w-full mt-4" type="number" name="daya" value="{{ $tarif->daya }}">
                            </label>
                            <label>
                                <p class="text-gray-900 dark:text-gray-100">Tarif per kwh</p>
                                <input class="w-full mt-4" type="number" name="tarifperkwh" value="{{ $tarif->tarifperkwh }}">
                            </label>
                            <button type="submit" class="p-5 rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">Simpan</button>
                        </form>
                    </div>
        </div>
    </div>

</x-app-layout>
