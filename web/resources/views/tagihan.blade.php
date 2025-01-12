<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tagihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table :columns="[
                ['name' => 'Nomor Tagihan', 'field' => 'tagihan_id'],
                ['name' => 'Nomor KWH', 'field' => 'nomor_kwh'],
                ['name' => 'Daya', 'field' => 'daya'],
                ['name' => 'Jumlah Meter', 'field' => 'jumlah_meter'],
                ['name' => 'Tagihan', 'field' => 'total'],
            ]" :rows="$result">
            </x-table>
            {{ $tagihan->links() }}
        </div>

    </div>

</x-app-layout>
