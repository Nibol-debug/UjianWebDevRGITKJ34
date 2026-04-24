<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Supplier') }}
        </h2>
    </x-slot>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

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

        .cr-breadcrumb a:hover {
            color: #0891b2;
        }

        .cr-breadcrumb span {
            color: #cbd5e1;
        }

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
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(8, 145, 178, .3);
            flex-shrink: 0;
        }

        .cr-hero-text h1 {
            font-size: 1.45rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -.6px;
            margin: 0 0 .15rem;
        }

        .dark .cr-hero-text h1 {
            color: #f1f5f9;
        }

        .cr-hero-text p {
            font-size: .8rem;
            color: #94a3b8;
            margin: 0;
        }

        /* ── ID badge ── */
        .cr-id-badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: #f0fdfa;
            border: 1px solid #99f6e4;
            color: #0f766e;
            font-size: .7rem;
            font-weight: 700;
            padding: .2rem .65rem;
            border-radius: 999px;
            margin-left: .6rem;
            letter-spacing: .03em;
        }

        .dark .cr-id-badge {
            background: #042f2e;
            border-color: #134e4a;
            color: #2dd4bf;
        }

        /* ── Card ── */
        .cr-card {
            background: #fff;
            border-radius: 1.1rem;
            box-shadow:
                0 0 0 1px rgba(15, 23, 42, .05),
                0 4px 6px rgba(15, 23, 42, .04),
                0 16px 40px rgba(15, 23, 42, .07);
            overflow: hidden;
            animation: fadeSlideUp .4s .1s ease both;
        }

        .dark .cr-card {
            background: #1e293b;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .06),
                0 4px 6px rgba(0, 0, 0, .15),
                0 16px 40px rgba(0, 0, 0, .25);
        }

        /* ── Preview strip ── */
        .cr-preview {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .9rem 1.75rem;
            background: #ecfeff;
            border-bottom: 1px solid #a5f3fc;
            animation: fadeSlideUp .42s .15s ease both;
        }

        .dark .cr-preview {
            background: #083344;
            border-color: #0e7490;
        }

        .preview-avatar {
            width: 2.6rem;
            height: 2.6rem;
            border-radius: .55rem;
            background: #0891b2;
            color: #fff;
            font-size: .85rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all .2s;
        }

        .preview-info {
            flex: 1;
            min-width: 0;
        }

        .preview-name {
            font-size: .88rem;
            font-weight: 700;
            color: #0e7490;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dark .preview-name {
            color: #22d3ee;
        }

        .preview-meta {
            font-size: .72rem;
            color: #6b93a3;
            margin-top: .1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dark .preview-meta {
            color: #67e8f9;
        }

        .preview-changed {
            font-size: .68rem;
            font-weight: 700;
            color: #f59e0b;
            background: #fffbeb;
            border: 1px solid #fde68a;
            padding: .15rem .5rem;
            border-radius: 999px;
            display: none;
            flex-shrink: 0;
        }

        .preview-changed.visible {
            display: inline-flex;
        }

        .dark .preview-changed {
            background: #292524;
            border-color: #78350f;
            color: #fbbf24;
        }

        /* ── Section label ── */
        .cr-section {
            padding: 1.35rem 1.75rem .1rem;
        }

        .cr-section-label {
            font-size: .65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #0891b2;
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

        .dark .cr-section-label::after {
            background: #334155;
        }

        /* ── Form body ── */
        .cr-form-body {
            padding: .25rem 1.75rem 1.75rem;
        }

        .cr-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 520px) {
            .cr-row {
                grid-template-columns: 1fr;
            }
        }

        /* ── Form group ── */
        .fg {
            display: flex;
            flex-direction: column;
            gap: .35rem;
        }

        .fg-label {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #475569;
        }

        .dark .fg-label {
            color: #94a3b8;
        }

        .fg-required {
            color: #ef4444;
            margin-left: .15rem;
        }

        /* ── Input ── */
        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            display: flex;
        }

        .input-wrap.has-icon .fg-input {
            padding-left: 2.2rem;
        }

        .fg-input {
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

        .dark .fg-input {
            background: #0f172a;
            border-color: #334155;
            color: #f1f5f9;
        }

        .fg-input::placeholder {
            color: #cbd5e1;
        }

        .fg-input:focus {
            border-color: #0891b2;
            background: #fff;
            box-shadow: 0 0 0 3.5px rgba(8, 145, 178, .13);
        }

        .dark .fg-input:focus {
            background: #0f172a;
        }

        .fg-input.is-invalid {
            border-color: #ef4444;
            background: #fff5f5;
        }

        .fg-input.is-changed {
            border-color: #f59e0b;
            background: #fffdf0;
        }

        .dark .fg-input.is-changed {
            background: #1c1505;
            border-color: #d97706;
        }

        .fg-hint {
            font-size: .72rem;
            color: #94a3b8;
        }

        .fg-error {
            font-size: .72rem;
            color: #ef4444;
            font-weight: 500;
        }

        /* ── Divider ── */
        .cr-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 0 1.75rem;
        }

        .dark .cr-divider {
            background: #334155;
        }

        /* ── Footer ── */
        .cr-footer {
            padding: 1.25rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: #f8fafc;
        }

        .dark .cr-footer {
            background: #0f172a;
        }

        .cr-footer-left {
            font-size: .75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .cr-footer-right {
            display: flex;
            align-items: center;
            gap: .6rem;
        }

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

        .dark .btn-cancel {
            background: #1e293b;
            border-color: #334155;
            color: #94a3b8;
        }

        .btn-cancel:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        .btn-cancel:active {
            transform: scale(.97);
        }

        .btn-submit {
            padding: .55rem 1.5rem;
            border-radius: .55rem;
            border: none;
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: #fff;
            font-size: .82rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            transition: opacity .12s, transform .1s, box-shadow .15s;
            box-shadow: 0 3px 12px rgba(8, 145, 178, .3);
            font-family: inherit;
        }

        .btn-submit:hover {
            opacity: .9;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(8, 145, 178, .35);
        }

        .btn-submit:active {
            transform: scale(.97);
            opacity: 1;
        }

        .btn-submit:disabled {
            opacity: .5;
            cursor: not-allowed;
            transform: none;
        }

        /* ── Spinner ── */
        .spinner {
            display: none;
            width: 13px;
            height: 13px;
            border: 2px solid rgba(255, 255, 255, .35);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ── Original values tooltip strip ── */
        .cr-original {
            padding: .65rem 1.75rem;
            background: #fafafa;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .dark .cr-original {
            background: #0f172a;
            border-color: #1e293b;
        }

        .cr-original-label {
            font-size: .68rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .06em;
            flex-shrink: 0;
        }

        .cr-orig-chip {
            font-size: .7rem;
            color: #64748b;
            background: #f1f5f9;
            padding: .15rem .55rem;
            border-radius: 999px;
        }

        .dark .cr-orig-chip {
            background: #1e293b;
            color: #94a3b8;
        }

        /* ── Animations ── */
        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="cr-page">
        <div class="cr-container">

            {{-- Breadcrumb --}}
            <nav class="cr-breadcrumb">
                <a href="{{ route('suppliers.index') }}">Suppliers</a>
                <span>›</span>
                <span>Edit</span>
                <span>›</span>
                <span>{{ $supplier->name }}</span>
            </nav>

            {{-- Hero --}}
            <div class="cr-hero">
                <div class="cr-hero-inner">
                    <div class="cr-hero-icon">
                        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="cr-hero-text">
                        <h1>
                            Edit Supplier
                            <span class="cr-id-badge"># {{ $supplier->id }}</span>
                        </h1>
                        <p>Perbarui informasi supplier. Perubahan yang belum disimpan akan berwarna kuning.</p>
                    </div>
                </div>
            </div>

            {{-- Card --}}
            <div class="cr-card">

                {{-- Live preview --}}
                <div class="cr-preview">
                    <div class="preview-avatar" id="prevAvatar">
                        {{ strtoupper(substr($supplier->name, 0, 2)) }}
                    </div>
                    <div class="preview-info">
                        <div class="preview-name" id="prevName">{{ $supplier->name }}</div>
                        <div class="preview-meta" id="prevMeta">
                            {{ implode(' · ', array_filter([$supplier->email, $supplier->phone])) ?: 'Email & telepon' }}
                        </div>
                    </div>
                    <span class="preview-changed" id="prevChanged">● Ada perubahan</span>
                </div>

                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" id="editForm" novalidate>
                    @csrf
                    @method('PUT')

                    {{-- Informasi Utama --}}
                    <div class="cr-section">
                        <div class="cr-section-label">Informasi Utama</div>
                    </div>

                    <div class="cr-form-body" style="padding-top:0">
                        <div style="display:grid;gap:1rem">

                            {{-- Nama --}}
                            <div class="fg">
                                <label class="fg-label" for="name">Nama Supplier <span
                                        class="fg-required">*</span></label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </span>
                                    <input class="fg-input {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                        id="name" name="name" value="{{ old('name', $supplier->name) }}"
                                        placeholder="Contoh: PT. Maju Bersama" autocomplete="off" autofocus
                                        data-original="{{ $supplier->name }}">
                                </div>
                                @error('name')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="fg">
                                <label class="fg-label" for="address">Alamat</label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                    </span>
                                    <input class="fg-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        type="text" id="address" name="address"
                                        value="{{ old('address', $supplier->address) }}"
                                        placeholder="Jl. Sudirman No. 1, Jakarta Pusat"
                                        data-original="{{ $supplier->address }}">
                                </div>
                                @error('address')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="cr-divider"></div>

                    {{-- Kontak --}}
                    <div class="cr-section">
                        <div class="cr-section-label">Kontak</div>
                    </div>

                    <div class="cr-form-body" style="padding-top:0">
                        <div class="cr-row">

                            {{-- Telepon --}}
                            <div class="fg">
                                <label class="fg-label" for="phone">Nomor Telepon</label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </span>
                                    <input class="fg-input {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                        id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}"
                                        placeholder="0812-3456-7890" data-original="{{ $supplier->phone }}">
                                </div>
                                @error('phone')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="fg">
                                <label class="fg-label" for="email">Alamat Email</label>
                                <div class="input-wrap has-icon">
                                    <span class="input-icon">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                    </span>
                                    <input class="fg-input {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                        id="email" name="email" value="{{ old('email', $supplier->email) }}"
                                        placeholder="supplier@perusahaan.com" data-original="{{ $supplier->email }}">
                                </div>
                                @error('email')
                                    <span class="fg-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="cr-divider"></div>

                    {{-- Original values strip --}}
                    <div class="cr-original" id="origStrip" style="display:none">
                        <span class="cr-original-label">Nilai asli:</span>
                        <span class="cr-orig-chip" id="origChips"></span>
                    </div>

                    {{-- Footer --}}
                    <div class="cr-footer">
                        <div class="cr-footer-left">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Dibuat: {{ $supplier->created_at->format('d M Y') }}
                        </div>
                        <div class="cr-footer-right">
                            <a href="{{ route('suppliers.index') }}" class="btn-cancel">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                Batal
                            </a>
                            <button type="submit" class="btn-submit" id="submitBtn">
                                <span class="spinner" id="spinner"></span>
                                <svg id="submitIcon" width="14" height="14" fill="none" stroke="currentColor"
                                    stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Update Supplier
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>
        // ── Track changes ─────────────────────────────────────
        const inputs = document.querySelectorAll('.fg-input[data-original]');
        const prevAvatar = document.getElementById('prevAvatar');
        const prevName = document.getElementById('prevName');
        const prevMeta = document.getElementById('prevMeta');
        const prevChanged = document.getElementById('prevChanged');
        const origStrip = document.getElementById('origStrip');
        const origChips = document.getElementById('origChips');

        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');

        function getInitials(name) {
            const words = name.trim().split(' ').filter(Boolean);
            return words.length >= 2
                ? (words[0][0] + words[1][0]).toUpperCase()
                : name.substring(0, 2).toUpperCase();
        }

        function checkChanges() {
            let hasChange = false;
            const changedItems = [];

            inputs.forEach(input => {
                const changed = input.value.trim() !== (input.dataset.original || '').trim();
                input.classList.toggle('is-changed', changed && !input.classList.contains('is-invalid'));
                if (changed) {
                    hasChange = true;
                    const label = input.previousElementSibling?.textContent?.trim()
                        || input.closest('.fg')?.querySelector('.fg-label')?.textContent?.trim()
                        || input.name;
                    changedItems.push(`${label}: "${input.dataset.original || '(kosong'}" → "${input.value || '(kosong)'}`);
                }
            });

            // Preview badge
            prevChanged.classList.toggle('visible', hasChange);

            // Original strip
            if (hasChange) {
                origStrip.style.display = 'flex';
                origChips.textContent = changedItems.map(i => i.split(':')[0]).join(', ') + ' diubah';
            } else {
                origStrip.style.display = 'none';
            }

            // Update preview
            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();

            prevAvatar.textContent = name ? getInitials(name) : '—';
            prevName.textContent = name || 'Nama supplier';

            const metaParts = [];
            if (email) metaParts.push(email);
            if (phone) metaParts.push(phone);
            prevMeta.textContent = metaParts.length ? metaParts.join(' · ') : 'Email & telepon';
        }

        inputs.forEach(input => input.addEventListener('input', checkChanges));

        // ── Submit loading state ──────────────────────────────
        document.getElementById('editForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');
            const icon = document.getElementById('submitIcon');
            btn.disabled = true;
            spinner.style.display = 'block';
            icon.style.display = 'none';
        });
    </script>
</x-app-layout>
