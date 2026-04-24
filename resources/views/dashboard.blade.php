<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 flex items-center gap-3">
                <span class="text-emerald-600">💰</span>
                Dashboard POS
            </h2>
            
            <div class="flex items-center gap-4">
                <!-- Quick Action Buttons -->
                <a href="{{ route('seles.create') }}" 
                   class="inline-flex items-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-2xl shadow-lg transition-all active:scale-95">
                    <span class="text-xl mr-2">🛒</span>
                    Buat Seles Baru
                </a>
                
                <a href="{{ route('suppliers.create') }}" 
                   class="inline-flex items-center px-5 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 hover:border-emerald-500 text-gray-700 dark:text-gray-300 font-medium rounded-2xl shadow-sm transition-all">
                    <span class="text-xl mr-2">🏪</span>
                    Tambah Supplier
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="mb-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl p-8 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-emerald-100 text-sm font-medium tracking-widest">SELAMAT DATANG KEMBALI 👋</p>
                        <h1 class="text-4xl font-bold mt-1">Halo, {{ Auth::user()->name ?? 'Owner' }}!</h1>
                        <p class="text-emerald-100 mt-3 text-lg">Yuk cek ringkasan data supplier & seles kamu hari ini.</p>
                    </div>
                    <div class="hidden md:block text-8xl opacity-20">🛒</div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <!-- Card 1: Seles Hari Ini -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 hover:border-emerald-200 transition-all group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Seles Hari Ini</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-2">Rp {{ number_format($salesToday, 0, ',', '.') }}</p>
                            <p class="text-emerald-600 text-sm flex items-center gap-1 mt-3">
                                <span>📅</span> 
                                {{ now()->format('d M Y') }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-3xl group-hover:rotate-12 transition-transform">
                            💵
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Supplier -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 hover:border-emerald-200 transition-all group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Supplier</p>
                            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100 mt-2">{{ $totalSuppliers }}</p>
                            <p class="text-teal-600 text-sm flex items-center gap-1 mt-3">
                                <span>🏪</span> Supplier terdaftar
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/30 rounded-2xl flex items-center justify-center text-3xl group-hover:rotate-12 transition-transform">
                            🏪
                        </div>
                    </div>
                </div>

                <!-- Card 3: Seles Bulan Ini -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 hover:border-emerald-200 transition-all group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Seles Bulan Ini</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-2">Rp {{ number_format($monthlySales, 0, ',', '.') }}</p>
                            <p class="text-amber-600 text-sm flex items-center gap-1 mt-3">
                                <span>📈</span> 
                                {{ now()->format('F Y') }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-3xl group-hover:rotate-12 transition-transform">
                            📊
                        </div>
                    </div>
                </div>

                <!-- Card 4: Total Seles -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 hover:border-emerald-200 transition-all group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaksi Hari Ini</p>
                            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100 mt-2">{{ $transactionsToday }}</p>
                            <p class="text-purple-600 text-sm flex items-center gap-1 mt-3">
                                <span>🧾</span> Total {{ $totalSeles }} seles
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-2xl flex items-center justify-center text-3xl group-hover:rotate-12 transition-transform">
                            🧾
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Recent Seles -->
                <div class="lg:col-span-7 bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-semibold text-lg flex items-center gap-2">
                            <span>🛒</span> Seles Terbaru
                        </h3>
                        <a href="{{ route('seles.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium flex items-center gap-1">
                            Lihat Semua 
                            <span class="text-xl leading-none">→</span>
                        </a>
                    </div>
                    
                    <div class="overflow-hidden">
                        @if($recentSeles->count() > 0)
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b dark:border-gray-700">
                                        <th class="text-left py-3 text-sm font-medium text-gray-500">#</th>
                                        <th class="text-left py-3 text-sm font-medium text-gray-500">Supplier</th>
                                        <th class="text-left py-3 text-sm font-medium text-gray-500">Waktu</th>
                                        <th class="text-right py-3 text-sm font-medium text-gray-500">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y dark:divide-gray-700 text-sm">
                                    @foreach($recentSeles as $s)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                            <td class="py-4 font-mono text-gray-400">#{{ $s->id }}</td>
                                            <td class="py-4 font-medium">{{ $s->supplier->name ?? '—' }}</td>
                                            <td class="py-4 text-gray-500">{{ $s->created_at->diffForHumans() }}</td>
                                            <td class="py-4 text-right font-semibold text-emerald-600">Rp {{ number_format($s->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-10 text-gray-400">
                                <div class="text-4xl mb-3">📭</div>
                                <p class="font-medium">Belum ada data seles</p>
                                <p class="text-sm mt-1">Tambahkan seles pertama kamu!</p>
                                <a href="{{ route('seles.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-emerald-600 text-white rounded-xl text-sm font-medium hover:bg-emerald-700 transition-colors">
                                    <span>+</span> Tambah Seles
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Supplier Summary -->
                <div class="lg:col-span-5 bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-6">
                    <h3 class="font-semibold text-lg mb-6 flex items-center gap-2">
                        <span>🏪</span> Supplier Terbaru
                    </h3>
                    
                    @if($recentSuppliers->count() > 0)
                        <div class="space-y-3">
                            @foreach($recentSuppliers as $sup)
                                <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-900 p-4 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-xl flex items-center justify-center text-sm font-bold">
                                            {{ strtoupper(substr($sup->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-sm">{{ $sup->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $sup->email ?: ($sup->phone ?: 'Tidak ada kontak') }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('suppliers.edit', $sup->id) }}" class="text-gray-400 hover:text-emerald-600 transition-colors">
                                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"/></svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-400">
                            <div class="text-4xl mb-3">📦</div>
                            <p class="font-medium">Belum ada supplier</p>
                            <p class="text-sm mt-1">Tambahkan supplier pertama kamu!</p>
                            <a href="{{ route('suppliers.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-teal-600 text-white rounded-xl text-sm font-medium hover:bg-teal-700 transition-colors">
                                <span>+</span> Tambah Supplier
                            </a>
                        </div>
                    @endif
                    
                    <a href="{{ route('suppliers.index') }}" 
                       class="mt-6 block text-center py-3.5 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-gray-700 rounded-2xl font-medium transition-colors">
                        Kelola Semua Supplier →
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>