<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Seles') }}
        </h2>
    </x-slot>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }

        .cr-page {
            padding: 2.5rem 0 4rem;
            min-height: calc(100vh - 64px);
        }
        .cr-container {
            max-width: 680px;
            margin: 0 auto;
            padding: 0 1.25rem;
        }

        /* ── Breadcrumb ── */
        .cr-breadcrumb {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .75rem;
            color: #94a3b8;
            margin-bottom: 1.75rem;
            animation: fadeSlideDown .35s ease both;
        }
        .cr-breadcrumb a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: color .12s;
        }
        .cr-breadcrumb a:hover { color: #7c3aed; }
        .cr-breadcrumb span { color: #cbd5e1; }

        /* ── Hero ── */
        .cr-hero {
            margin-bottom: 2rem;
            animation: fadeSlideDown .38s .05s ease both;
        }
        .cr-hero-inner {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .cr-hero-icon {
            width: 3.25rem;
            height: 3.25rem;
            border-radius: .9rem;
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(124,58,237,.3);
            flex-shrink: 0;
        }
        .cr-hero-text h1 {
            font-size: 1.45rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -.6px;
            margin: 0 0 .15rem;
        }
        .dark .cr-hero-text h1 { color: #f1f5f9; }
        .cr-hero-text p {
            font-size: .8rem;
            color: #94a3b8;
            margin: 0;
        }

        /* ── Card ── */
        .cr-card {
            background: #fff;
            border-radius: 1.1rem;
            box-shadow:
                0 0 0 1px rgba(15,23,42,.05),
                0 4px 6px rgba(15,23,42,.04),
                0 16px 40px rgba(15,23,42,.07);
            overflow: hidden;
            animation: fadeSlideUp .4s .1s ease both;
        }
        .dark .cr-card {
            background: #1e293b;
            box-shadow:
                0 0 0 1px rgba(255,255,255,.06),
                0 4px 6px rgba(0,0,0,.15),
                0 16px 40px rgba(0,0,0,.25);
        }

        /* ── Preview strip ── */
        .cr-preview {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .9rem 1.75rem;
            background: #f5f3ff;
            border-bottom: 1px solid #ede9fe;
            animation: fadeSlideUp .42s .15s ease both;
        }
        .dark .cr-preview { background: #2e1065; border-color: #6d28d9; }

        .preview-avatar {
            width: 2.4rem;
            height: 2.4rem;
            border-radius: .5rem;
            background: #7c3aed;
            color: #fff;
            font-size: .85rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all .2s;
        }
        .preview-info { flex: 1; min-width: 0; }
        .preview-name {
            font-size: .85rem;
            font-weight: 700;
            color: #6d28d9;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .dark .preview-name { color: #a78bfa; }
        .preview-meta {
            font-size: .72rem;
            color: #8b5cf6;
            margin-top: .1rem;
        }
        .dark .preview-meta { color: #c4b5fd; }

        /* ── Section label ── */
        .cr-section { padding: 1.35rem 1.75rem .1rem; }
        .cr-section-label {
            font-size: .65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #7c3aed;
            display: flex;
            align-items: center;
            gap: .4rem;
            margin-bottom: 1.1rem;
        }
        .cr-section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        .dark .cr-section-label::after { background: #334155; }

        /* ── Form body ── */
        .cr-form-body { padding: .25rem 1.75rem 1.75rem; }

        .cr-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 520px) { .cr-row { grid-template-columns: 1fr; } }

        /* ── Form group ── */
        .fg { display: flex; flex-direction: column; gap: .35rem; }

        .fg-label {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #475569;
        }
        .dark .fg-label { color: #94a3b8; }
        .fg-required { color: #ef4444; margin-left: .15rem; }

        /* ── Input ── */
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            display: flex;
        }
        .input-wrap.has-icon .fg-input { padding-left: 2.2rem; }
        .input-wrap.has-icon .fg-select { padding-left: 2.2rem; }

        .fg-input, .fg-select {
            width: 100%;
            padding: .6rem .85rem;
            border: 1.5px solid #e2e8f0;
            border-radius: .6rem;
            font-size: .85rem;
            color: #0f172a;
            background: #f8fafc;
            outline: none;
            transition: border .15s, box-shadow .15s, background .15s;
            font-family: inherit;
        }
        .dark .fg-input, .dark .fg-select { background: #0f172a; border-color: #334155; color: #f1f5f9; }
        .fg-input::placeholder { color: #cbd5e1; }
        .fg-input:focus, .fg-select:focus {
            border-color: #7c3aed;
            background: #fff;
            box-shadow: 0 0 0 3.5px rgba(124,58,237,.13);
        }
        .dark .fg-input:focus, .dark .fg-select:focus { background: #0f172a; }
        .fg-input.is-invalid, .fg-select.is-invalid { border-color: #ef4444; background: #fff5f5; }

        .fg-hint  { font-size: .72rem; color: #94a3b8; }
        .fg-error { font-size: .72rem; color: #ef4444; font-weight: 500; }

        /* ── Divider ── */
        .cr-divider { height: 1px; background: #f1f5f9; margin: 0 1.75rem; }
        .dark .cr-divider { background: #334155; }

        /* ── Footer ── */
        .cr-footer {
            padding: 1.25rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: #f8fafc;
        }
        .dark .cr-footer { background: #0f172a; }

        .cr-footer-left {
            font-size: .75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .cr-footer-right { display: flex; align-items: center; gap: .6rem; }

        .btn-cancel {
            padding: .55rem 1.2rem;
            border-radius: .55rem;
            border: 1.5px solid #e2e8f0;
            background: #fff;
            color: #475569;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            transition: background .12s, border-color .12s, transform .1s;
            font-family: inherit;
        }
        .dark .btn-cancel { background: #1e293b; border-color: #334155; color: #94a3b8; }
        .btn-cancel:hover { background: #f1f5f9; border-color: #cbd5e1; }
        .btn-cancel:active { transform: scale(.97); }

        .btn-submit {
            padding: .55rem 1.5rem;
            border-radius: .55rem;
            border: none;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            color: #fff;
            font-size: .82rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            transition: opacity .12s, transform .1s, box-shadow .15s;
            box-shadow: 0 3px 12px rgba(124,58,237,.3);
            font-family: inherit;
        }
        .btn-submit:hover {
            opacity: .9;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(124,58,237,.35);
        }
        .btn-submit:active { transform: scale(.97); opacity: 1; }
        .btn-submit:disabled { opacity: .5; cursor: not-allowed; transform: none; }

        /* ── Spinner ── */
        .spinner {
            display: none;
            width: 13px; height: 13px;
            border: 2px solid rgba(255,255,255,.35);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .6s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ── Animations ── */
        @keyframes fadeSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="cr-page">
        <div class="cr-container">

            {{-- Breadcrumb --}}
            <nav class="cr-breadcrumb">
                <a href="{{ route('seles.index') }}">Seles</a>
                <span>›</span>
                <span>Tambah Baru</span>
            </nav>

            {{-- Hero --}}
            <div class="cr-hero">
                <div class="cr-hero-inner">
                    <div class="cr-hero-icon">
                        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>
                    </div>
                    <div class="cr-hero-text">
                        <h1>Tambah Seles</h1>
                        <p>Isi detail informasi seles baru di bawah ini.</p>
                    </div>
                </div>
            </div>

            {{-- Card --}}
            <div class="cr-card">

                {{-- Live Preview strip --}}
                <div class="cr-preview">
                    <div class="preview-avatar" id="prevAvatar">—</div>
                    <div class="preview-info">
                        <div class="preview-name" id="prevName">Pilih supplier</div>
                        <div class="preview-meta" id="prevMeta">Total akan muncul di sini</div>
                    </div>
                </div>

                <form action="{{ route('seles.store') }}" method="POST" id="createForm" novalidate>
                    @csrf

                    {{-- Informasi Seles --}}
                    <div class="cr-section">
                        <div class="cr-section-label">Informasi Seles</div>
                    </div>

                    <div class="cr-form-body" style="padding-top:0">
                        <div style="display:grid;gap:1rem">

                            {{-- Supplier --}}
                            <div class="fg">
                                <label class="fg-label" for="supplier_id">Supplier <span class="fg-required">*</span></label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                    </span>
                                    <select
                                        class="fg-select {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}"
                                        id="supplier_id"
                                        name="supplier_id"
                                    >
                                        <option value="">-- Pilih Supplier --</option>
                                        @foreach($suppliers as $sup)
                                            <option value="{{ $sup->id }}" {{ old('supplier_id') == $sup->id ? 'selected' : '' }}>
                                                {{ $sup->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('supplier_id')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Total --}}
                            <div class="fg">
                                <label class="fg-label" for="total">Total <span class="fg-required">*</span></label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                    </span>
                                    <input
                                        class="fg-input {{ $errors->has('total') ? 'is-invalid' : '' }}"
                                        type="number"
                                        id="total"
                                        name="total"
                                        value="{{ old('total') }}"
                                        placeholder="Contoh: 500000"
                                        min="0"
                                        autocomplete="off"
                                    >
                                </div>
                                @error('total')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                                <span class="fg-hint">Masukkan total dalam Rupiah (tanpa titik/koma)</span>
                            </div>

                        </div>
                    </div>

                    <div class="cr-divider"></div>

                    {{-- Footer --}}
                    <div class="cr-footer">
                        <div class="cr-footer-left">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                            Kolom bertanda <span style="color:#ef4444;font-weight:700">*</span> wajib diisi
                        </div>
                        <div class="cr-footer-right">
                            <a href="{{ route('seles.index') }}" class="btn-cancel">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                                Batal
                            </a>
                            <button type="submit" class="btn-submit" id="submitBtn">
                                <span class="spinner" id="spinner"></span>
                                <svg id="submitIcon" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                Simpan Seles
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>
        // ── Live preview ──────────────────────────────────────
        const supplierSelect = document.getElementById('supplier_id');
        const totalInput     = document.getElementById('total');
        const prevAvatar     = document.getElementById('prevAvatar');
        const prevName       = document.getElementById('prevName');
        const prevMeta       = document.getElementById('prevMeta');

        function formatRupiah(num) {
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }

        function getInitials(name) {
            const words = name.trim().split(' ').filter(Boolean);
            return words.length >= 2
                ? (words[0][0] + words[1][0]).toUpperCase()
                : name.substring(0, 2).toUpperCase();
        }

        function updatePreview() {
            const selectedOption = supplierSelect.options[supplierSelect.selectedIndex];
            const supplierName = selectedOption && selectedOption.value ? selectedOption.text.trim() : '';
            const total = totalInput.value.trim();

            if (supplierName) {
                prevAvatar.textContent = getInitials(supplierName);
                prevName.textContent = supplierName;
            } else {
                prevAvatar.textContent = '—';
                prevName.textContent = 'Pilih supplier';
            }

            prevMeta.textContent = total ? formatRupiah(total) : 'Total akan muncul di sini';
        }

        supplierSelect.addEventListener('change', updatePreview);
        totalInput.addEventListener('input', updatePreview);

        // ── Submit loading state ──────────────────────────────
        document.getElementById('createForm').addEventListener('submit', function() {
            const btn     = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');
            const icon    = document.getElementById('submitIcon');
            btn.disabled          = true;
            spinner.style.display = 'block';
            icon.style.display    = 'none';
        });

        // Pre-fill preview if old() values exist
        updatePreview();
    </script>
</x-app-layout>
