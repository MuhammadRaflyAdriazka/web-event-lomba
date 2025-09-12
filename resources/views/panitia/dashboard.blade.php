<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\panitia\dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Panitia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">Role: <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Panitia</span></p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-purple-800">Verifikasi Peserta</h4>
                            <p class="text-purple-600">Verifikasi data pendaftaran peserta</p>
                        </div>
                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-indigo-800">Kelola Pendaftaran</h4>
                            <p class="text-indigo-600">Manage pendaftaran event</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>