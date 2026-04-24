<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Seles') }}
        </h2>
    </x-slot>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── Container ── */
        .sel-wrapper {
            padding: 2rem 0 3rem;
        }

        /* ── Header bar ── */
        .sel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .sel-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -.5px;
        }
        .dark .sel-title { color: #f1f5f9; }

        .sel-count {
            font-size: .78rem;
            font-weight: 600;
            color: #64748b;
            background: #f1f5f9;
            padding: .2rem .65rem;
            border-radius: 999px;
            margin-left: .5rem;
        }
        .dark .sel-count { background: #1e293b; color: #94a3b8; }

        /* ── Add button ── */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
            font-size: .82rem;
            font-weight: 600;
            padding: .5rem 1.1rem;
            border-radius: .5rem;
            border: none;
            cursor: pointer;
            transition: background .15s, transform .1s, box-shadow .15s;
            box-shadow: 0 2px 8px rgba(124,58,237,.25);
            text-decoration: none;
        }
        .btn-add:hover {
            background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(124,58,237,.35);
        }
        .btn-add:active { transform: translateY(0); }

        /* ── Card ── */
        .sel-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.07), 0 4px 20px rgba(0,0,0,.05);
            overflow: hidden;
        }
        .dark .sel-card {
            background: #1e293b;
            box-shadow: 0 1px 3px rgba(0,0,0,.3), 0 4px 20px rgba(0,0,0,.2);
        }

        /* ── Search bar ── */
        .sel-search-wrap {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .dark .sel-search-wrap { border-color: #334155; }

        .sel-search {
            width: 100%;
            max-width: 18rem;
            padding: .45rem .85rem .45rem 2.2rem;
            border: 1.5px solid #e2e8f0;
            border-radius: .5rem;
            font-size: .82rem;
            color: #0f172a;
            background: #f8fafc url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='m21 21-4.35-4.35'/%3E%3C/svg%3E") no-repeat .7rem center;
            transition: border .15s, box-shadow .15s;
            outline: none;
        }
        .dark .sel-search {
            background-color: #0f172a;
            border-color: #334155;
            color: #f1f5f9;
        }
        .sel-search:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,.12);
        }

        /* ── Table ── */
        .sel-table-wrap { overflow-x: auto; }
        .sel-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .84rem;
        }

        .sel-table thead {
            background: #f8fafc;
        }
        .dark .sel-table thead { background: #0f172a; }

        .sel-table th {
            padding: .75rem 1.1rem;
            text-align: left;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #64748b;
            border-bottom: 1.5px solid #e2e8f0;
            white-space: nowrap;
        }
        .dark .sel-table th {
            color: #94a3b8;
            border-color: #334155;
        }

        .sel-table td {
            padding: .85rem 1.1rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .dark .sel-table td {
            color: #cbd5e1;
            border-color: #1e293b;
        }

        .sel-table tbody tr {
            transition: background .12s;
        }
        .sel-table tbody tr:hover {
            background: #f8fafc;
        }
        .dark .sel-table tbody tr:hover { background: #0f172a; }

        .sel-table tbody tr:last-child td { border-bottom: none; }

        /* ── Supplier pill ── */
        .cell-supplier {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: #f5f3ff;
            color: #6d28d9;
            font-size: .78rem;
            font-weight: 600;
            padding: .2rem .6rem;
            border-radius: 999px;
        }
        .dark .cell-supplier { background: #2e1065; color: #a78bfa; }

        /* ── Total badge ── */
        .cell-total {
            font-weight: 700;
            color: #0f172a;
            font-size: .88rem;
        }
        .dark .cell-total { color: #f1f5f9; }

        /* ── Date cell ── */
        .cell-date {
            font-size: .78rem;
            color: #94a3b8;
        }

        /* ── Action buttons ── */
        .actions { display: flex; gap: .4rem; }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: .4rem;
            border: 1.5px solid transparent;
            cursor: pointer;
            background: transparent;
            transition: background .12s, border-color .12s, transform .1s;
            text-decoration: none;
        }
        .btn-icon:active { transform: scale(.93); }

        .btn-edit {
            color: #7c3aed;
            border-color: #ddd6fe;
            background: #f5f3ff;
        }
        .btn-edit:hover { background: #ede9fe; border-color: #c4b5fd; }
        .dark .btn-edit { background: #2e1065; border-color: #6d28d9; color: #a78bfa; }

        .btn-del {
            color: #dc2626;
            border-color: #fecaca;
            background: #fff5f5;
        }
        .btn-del:hover { background: #fee2e2; border-color: #f87171; }
        .dark .btn-del { background: #3b0a0a; border-color: #991b1b; color: #f87171; }

        /* ── Empty state ── */
        .sel-empty {
            text-align: center;
            padding: 3.5rem 1rem;
            color: #94a3b8;
        }
        .sel-empty svg { margin: 0 auto 1rem; opacity: .45; }
        .sel-empty p { font-size: .85rem; margin-top: .3rem; }

        /* ── Alert ── */
        .sel-alert {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .75rem 1.1rem;
            border-radius: .6rem;
            font-size: .82rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
            animation: fadeSlideDown .3s ease both;
        }
        .sel-alert-success { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
        .sel-alert-error   { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /* ── Modal ── */
        .modal-backdrop {
            display: none;
            position: fixed; inset: 0;
            background: rgba(15,23,42,.5);
            backdrop-filter: blur(3px);
            z-index: 50;
            align-items: center;
            justify-content: center;
        }
        .modal-backdrop.open { display: flex; }

        .modal-box {
            background: #fff;
            border-radius: 1rem;
            width: 100%;
            max-width: 22rem;
            padding: 1.75rem;
            box-shadow: 0 20px 60px rgba(0,0,0,.18);
            animation: slideUp .2s ease;
        }
        .dark .modal-box { background: #1e293b; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .modal-del-body {
            text-align: center;
            padding: .5rem 0 .25rem;
        }
        .modal-del-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: #fef2f2;
            color: #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .modal-del-title {
            font-size: .95rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: .35rem;
        }
        .dark .modal-del-title { color: #f1f5f9; }
        .modal-del-desc { font-size: .82rem; color: #64748b; }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: .6rem;
            margin-top: 1.5rem;
        }

        .btn-cancel-modal {
            padding: .5rem 1.1rem;
            border-radius: .5rem;
            border: 1.5px solid #e2e8f0;
            background: #fff;
            color: #475569;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .12s;
        }
        .dark .btn-cancel-modal { background: #0f172a; border-color: #334155; color: #94a3b8; }
        .btn-cancel-modal:hover { background: #f1f5f9; }

        .btn-del-confirm {
            padding: .5rem 1.3rem;
            border-radius: .5rem;
            border: none;
            background: #dc2626;
            color: #fff;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .12s;
            box-shadow: 0 2px 8px rgba(220,38,38,.25);
        }
        .btn-del-confirm:hover { background: #b91c1c; }

        @keyframes fadeSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="sel-wrapper">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="sel-alert sel-alert-success">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="sel-alert sel-alert-error">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="sel-header">
                <div style="display:flex;align-items:center;gap:.5rem">
                    <span class="sel-title">Seles</span>
                    <span class="sel-count">{{ $seles->count() }}</span>
                </div>
                <a href="{{ route('seles.create') }}" class="btn-add">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    Tambah Seles
                </a>
            </div>

            {{-- Card --}}
            <div class="sel-card">
                {{-- Search --}}
                <div class="sel-search-wrap">
                    <input
                        class="sel-search"
                        type="text"
                        id="tableSearch"
                        placeholder="Cari seles..."
                        oninput="filterTable(this.value)"
                    >
                </div>

                {{-- Table --}}
                <div class="sel-table-wrap">
                    <table class="sel-table" id="selesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @forelse($seles as $i => $s)
                                <tr data-search="{{ strtolower(($s->supplier->name ?? '') . ' ' . $s->total) }}">
                                    <td style="color:#94a3b8;font-size:.78rem">{{ $i + 1 }}</td>
                                    <td>
                                        <span class="cell-supplier">
                                            <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                            {{ $s->supplier->name ?? '—' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="cell-total">Rp {{ number_format($s->total, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <span class="cell-date">{{ $s->created_at->format('d M Y, H:i') }}</span>
                                    </td>
                                    <td>
                                        <div class="actions" style="justify-content:flex-end">
                                            <a href="{{ route('seles.edit', $s->id) }}" class="btn-icon btn-edit" title="Edit">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/></svg>
                                            </a>
                                            <button class="btn-icon btn-del" title="Hapus"
                                                onclick="openDeleteModal({{ $s->id }}, '{{ addslashes($s->supplier->name ?? 'Seles') }}')">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr id="emptyRow">
                                    <td colspan="5">
                                        <div class="sel-empty">
                                            <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>
                                            <strong style="font-size:.9rem;color:#475569">Belum ada seles</strong>
                                            <p>Klik "Tambah Seles" untuk memulai.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- No search result row (hidden by default) --}}
                    <div id="noResult" style="display:none" class="sel-empty">
                        <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z"/></svg>
                        <strong style="font-size:.88rem;color:#475569">Tidak ditemukan</strong>
                        <p>Coba kata kunci lain.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Modal Hapus ===== --}}
    <div class="modal-backdrop" id="deleteModal">
        <div class="modal-box">
            <div class="modal-del-body">
                <div class="modal-del-icon">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                </div>
                <div class="modal-del-title">Hapus Seles?</div>
                <div class="modal-del-desc">Data seles dari <strong id="deleteName"></strong> akan dihapus permanen dan tidak bisa dikembalikan.</div>
            </div>
            <form id="deleteForm" method="POST" style="margin-top:1.5rem">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
                    <button type="submit" class="btn-del-confirm">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // ── Routes ──────────────────────────────────────────
        const routeBase = "{{ url('seles') }}";

        // ── Delete Modal ────────────────────────────────────
        function openDeleteModal(id, name) {
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteForm').action = routeBase + '/' + id;
            document.getElementById('deleteModal').classList.add('open');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('open');
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });

        // ── Search ──────────────────────────────────────────
        function filterTable(q) {
            const rows = document.querySelectorAll('#tableBody tr[data-search]');
            const term = q.toLowerCase().trim();
            let visible = 0;

            rows.forEach(row => {
                const match = !term || row.dataset.search.includes(term);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });

            document.getElementById('noResult').style.display = (visible === 0 && term) ? 'block' : 'none';
        }
    </script>
</x-app-layout>
