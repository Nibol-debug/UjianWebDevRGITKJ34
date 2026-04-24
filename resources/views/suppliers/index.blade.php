<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── Container ── */
        .sup-wrapper {
            padding: 2rem 0 3rem;
        }

        /* ── Header bar ── */
        .sup-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .sup-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -.5px;
        }
        .dark .sup-title { color: #f1f5f9; }

        .sup-count {
            font-size: .78rem;
            font-weight: 600;
            color: #64748b;
            background: #f1f5f9;
            padding: .2rem .65rem;
            border-radius: 999px;
            margin-left: .5rem;
        }
        .dark .sup-count { background: #1e293b; color: #94a3b8; }

        /* ── Add button ── */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: #2563eb;
            color: #fff;
            font-size: .82rem;
            font-weight: 600;
            padding: .5rem 1.1rem;
            border-radius: .5rem;
            border: none;
            cursor: pointer;
            transition: background .15s, transform .1s, box-shadow .15s;
            box-shadow: 0 2px 8px rgba(37,99,235,.25);
            text-decoration: none;
        }
        .btn-add:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(37,99,235,.35);
        }
        .btn-add:active { transform: translateY(0); }

        /* ── Card ── */
        .sup-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.07), 0 4px 20px rgba(0,0,0,.05);
            overflow: hidden;
        }
        .dark .sup-card {
            background: #1e293b;
            box-shadow: 0 1px 3px rgba(0,0,0,.3), 0 4px 20px rgba(0,0,0,.2);
        }

        /* ── Search bar ── */
        .sup-search-wrap {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .dark .sup-search-wrap { border-color: #334155; }

        .sup-search {
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
        .dark .sup-search {
            background-color: #0f172a;
            border-color: #334155;
            color: #f1f5f9;
        }
        .sup-search:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
        }

        /* ── Table ── */
        .sup-table-wrap { overflow-x: auto; }
        .sup-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .84rem;
        }

        .sup-table thead {
            background: #f8fafc;
        }
        .dark .sup-table thead { background: #0f172a; }

        .sup-table th {
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
        .dark .sup-table th {
            color: #94a3b8;
            border-color: #334155;
        }

        .sup-table td {
            padding: .85rem 1.1rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .dark .sup-table td {
            color: #cbd5e1;
            border-color: #1e293b;
        }

        .sup-table tbody tr {
            transition: background .12s;
        }
        .sup-table tbody tr:hover {
            background: #f8fafc;
        }
        .dark .sup-table tbody tr:hover { background: #0f172a; }

        .sup-table tbody tr:last-child td { border-bottom: none; }

        /* ── Name cell ── */
        .cell-name {
            display: flex;
            align-items: center;
            gap: .65rem;
        }
        .cell-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: .45rem;
            background: #eff6ff;
            color: #2563eb;
            font-size: .75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .dark .cell-avatar { background: #1e3a5f; color: #60a5fa; }

        .cell-name-text { font-weight: 600; color: #0f172a; }
        .dark .cell-name-text { color: #f1f5f9; }

        /* ── Pill / badge ── */
        .cell-pill {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: #f1f5f9;
            color: #475569;
            font-size: .75rem;
            padding: .2rem .6rem;
            border-radius: 999px;
        }
        .dark .cell-pill { background: #1e293b; color: #94a3b8; }

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
            color: #2563eb;
            border-color: #bfdbfe;
            background: #eff6ff;
        }
        .btn-edit:hover { background: #dbeafe; border-color: #93c5fd; }
        .dark .btn-edit { background: #1e3a5f; border-color: #1d4ed8; color: #60a5fa; }

        .btn-del {
            color: #dc2626;
            border-color: #fecaca;
            background: #fff5f5;
        }
        .btn-del:hover { background: #fee2e2; border-color: #f87171; }
        .dark .btn-del { background: #3b0a0a; border-color: #991b1b; color: #f87171; }

        /* ── Empty state ── */
        .sup-empty {
            text-align: center;
            padding: 3.5rem 1rem;
            color: #94a3b8;
        }
        .sup-empty svg { margin: 0 auto 1rem; opacity: .45; }
        .sup-empty p { font-size: .85rem; margin-top: .3rem; }

        /* ── Alert ── */
        .sup-alert {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .75rem 1.1rem;
            border-radius: .6rem;
            font-size: .82rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
        }
        .sup-alert-success { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
        .sup-alert-error   { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

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
            max-width: 28rem;
            padding: 1.75rem;
            box-shadow: 0 20px 60px rgba(0,0,0,.18);
            animation: slideUp .2s ease;
        }
        .dark .modal-box { background: #1e293b; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .modal-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1.25rem;
        }
        .dark .modal-title { color: #f1f5f9; }

        .form-group { margin-bottom: 1rem; }
        .form-label {
            display: block;
            font-size: .75rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: .35rem;
            text-transform: uppercase;
            letter-spacing: .05em;
        }
        .dark .form-label { color: #94a3b8; }

        .form-input {
            width: 100%;
            padding: .5rem .8rem;
            border: 1.5px solid #e2e8f0;
            border-radius: .5rem;
            font-size: .85rem;
            color: #0f172a;
            background: #f8fafc;
            outline: none;
            transition: border .15s, box-shadow .15s;
            box-sizing: border-box;
        }
        .dark .form-input {
            background: #0f172a;
            border-color: #334155;
            color: #f1f5f9;
        }
        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
        }
        .form-input.is-invalid { border-color: #dc2626; }

        .form-error { font-size: .72rem; color: #dc2626; margin-top: .25rem; }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: .6rem;
            margin-top: 1.5rem;
        }

        .btn-cancel {
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
        .dark .btn-cancel { background: #0f172a; border-color: #334155; color: #94a3b8; }
        .btn-cancel:hover { background: #f1f5f9; }

        .btn-save {
            padding: .5rem 1.3rem;
            border-radius: .5rem;
            border: none;
            background: #2563eb;
            color: #fff;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .12s, transform .1s;
            box-shadow: 0 2px 8px rgba(37,99,235,.25);
        }
        .btn-save:hover { background: #1d4ed8; }
        .btn-save:active { transform: scale(.97); }

        /* ── Delete confirm modal ── */
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
    </style>

    <div class="sup-wrapper">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="sup-alert sup-alert-success">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="sup-alert sup-alert-error">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="sup-header">
                <div style="display:flex;align-items:center;gap:.5rem">
                    <span class="sup-title">Suppliers</span>
                    <span class="sup-count">{{ $suppliers->count() }}</span>
                </div>
                <button class="btn-add" onclick="openAddModal()">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    Tambah Supplier
                </button>
            </div>

            {{-- Card --}}
            <div class="sup-card">
                {{-- Search --}}
                <div class="sup-search-wrap">
                    <input
                        class="sup-search"
                        type="text"
                        id="tableSearch"
                        placeholder="Cari supplier..."
                        oninput="filterTable(this.value)"
                    >
                </div>

                {{-- Table --}}
                <div class="sup-table-wrap">
                    <table class="sup-table" id="suppliersTable">
                        <thead>
                            <tr>
                                <th>Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @forelse($suppliers as $s)
                                <tr data-search="{{ strtolower($s->name . ' ' . $s->email . ' ' . $s->phone) }}">
                                    <td>
                                        <div class="cell-name">
                                            <div class="cell-avatar">{{ strtoupper(substr($s->name, 0, 2)) }}</div>
                                            <span class="cell-name-text">{{ $s->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $s->address ?: '—' }}</td>
                                    <td>
                                        @if($s->phone)
                                            <span class="cell-pill">
                                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                                                {{ $s->phone }}
                                            </span>
                                        @else
                                            <span style="color:#cbd5e1">—</span>
                                        @endif
                                    </td>
                                    <td>{{ $s->email ?: '—' }}</td>
                                    <td>
                                        <div class="actions" style="justify-content:flex-end">
                                            <a href="{{ route('suppliers.edit', $s->id) }}" class="btn-icon btn-edit" title="Edit">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/></svg>
                                            </a>
                                            <button class="btn-icon btn-del" title="Hapus"
                                                onclick="openDeleteModal({{ $s->id }}, '{{ addslashes($s->name) }}')">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr id="emptyRow">
                                    <td colspan="5">
                                        <div class="sup-empty">
                                            <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                            <strong style="font-size:.9rem;color:#475569">Belum ada supplier</strong>
                                            <p>Klik "Tambah Supplier" untuk memulai.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- No search result row (hidden by default) --}}
                    <div id="noResult" style="display:none" class="sup-empty">
                        <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z"/></svg>
                        <strong style="font-size:.88rem;color:#475569">Tidak ditemukan</strong>
                        <p>Coba kata kunci lain.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Modal Tambah / Edit ===== --}}
    <div class="modal-backdrop" id="formModal">
        <div class="modal-box">
            <div class="modal-title" id="modalTitle">Tambah Supplier</div>

            <form id="supplierForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <div class="form-group">
                    <label class="form-label">Nama <span style="color:#dc2626">*</span></label>
                    <input class="form-input" type="text" name="name" id="inputName" placeholder="PT. Maju Bersama" required>
                    @error('name')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <input class="form-input" type="text" name="address" id="inputAddress" placeholder="Jl. Sudirman No. 1, Jakarta">
                </div>

                <div class="form-group">
                    <label class="form-label">Telepon</label>
                    <input class="form-input" type="text" name="phone" id="inputPhone" placeholder="0812-3456-7890">
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-input" type="email" name="email" id="inputEmail" placeholder="supplier@example.com">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeFormModal()">Batal</button>
                    <button type="submit" class="btn-save" id="saveBtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== Modal Hapus ===== --}}
    <div class="modal-backdrop" id="deleteModal">
        <div class="modal-box" style="max-width:22rem">
            <div class="modal-del-body">
                <div class="modal-del-icon">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                </div>
                <div class="modal-del-title">Hapus Supplier?</div>
                <div class="modal-del-desc">Data <strong id="deleteName"></strong> akan dihapus permanen dan tidak bisa dikembalikan.</div>
            </div>
            <form id="deleteForm" method="POST" style="margin-top:1.5rem">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                    <button type="submit" class="btn-del-confirm">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // ── Routes (passed from Blade) ──────────────────────
        const routeStore  = "{{ route('suppliers.store') }}";
        const routeBase   = "{{ url('suppliers') }}"; // used as /suppliers/{id}

        // ── Form Modal ──────────────────────────────────────
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Tambah Supplier';
            document.getElementById('supplierForm').action = routeStore;
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('inputName').value    = '';
            document.getElementById('inputAddress').value = '';
            document.getElementById('inputPhone').value   = '';
            document.getElementById('inputEmail').value   = '';
            document.getElementById('saveBtn').textContent = 'Simpan';
            document.getElementById('formModal').classList.add('open');
        }

        function openEditModal(id, name, address, phone, email) {
            document.getElementById('modalTitle').textContent = 'Edit Supplier';
            document.getElementById('supplierForm').action = routeBase + '/' + id;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('inputName').value    = name;
            document.getElementById('inputAddress').value = address;
            document.getElementById('inputPhone').value   = phone;
            document.getElementById('inputEmail').value   = email;
            document.getElementById('saveBtn').textContent = 'Update';
            document.getElementById('formModal').classList.add('open');
        }

        function closeFormModal() {
            document.getElementById('formModal').classList.remove('open');
        }

        // ── Delete Modal ─────────────────────────────────────
        function openDeleteModal(id, name) {
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteForm').action = routeBase + '/' + id;
            document.getElementById('deleteModal').classList.add('open');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('open');
        }

        // Close on backdrop click
        document.getElementById('formModal').addEventListener('click', function(e) {
            if (e.target === this) closeFormModal();
        });
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });

        // ── Search ───────────────────────────────────────────
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

        // ── Open modal if validation fails ───────────────────
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', () => openAddModal());
        @endif
    </script>
</x-app-layout>
