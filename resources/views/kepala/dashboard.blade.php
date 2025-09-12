<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\kepala\dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Kepala Dinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">Role: <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Kepala Dinas</span></p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-red-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-800">Approve Event</h4>
                            <p class="text-red-600">Setujui atau tolak proposal event</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-blue-800">Laporan Eksekutif</h4>
                            <p class="text-blue-600">Lihat summary semua kegiatan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>