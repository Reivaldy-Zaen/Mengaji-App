@extends('layouts.app')

@section('title', 'Riwayat Bacaan')

@section('content')

    <style>
        /* =========================
                        RIWAYAT PAGE
                ========================= */

        /* title */
        .page-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* tabs */
        .tab-link {
            position: relative;
            padding-bottom: .75rem;
            color: var(--text-muted);
            font-weight: 500;
            transition: color .2s ease;
        }

        .tab-link:hover {
            color: var(--teal-primary);
        }

        .tab-link.active {
            color: var(--teal-primary);
        }

        .tab-link.active::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -1px;
            height: 2px;
            background-color: var(--teal-primary);
            border-radius: 2px;
        }

        /* section label (Hari ini, Kemarin, dll) */
        .history-group-title {
            font-size: .75rem;
            letter-spacing: .05em;
            color: var(--text-muted);
        }

        /* history item */
        .history-item {
            padding: 1.25rem 0;
            border-bottom: 1px solid var(--border-color);
            transition: background-color .15s ease;
        }

        /* icon */
        .history-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background-color: var(--teal-light);
            color: var(--teal-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        /* title text */
        .history-item .fw-semibold {
            font-size: .95rem;
            color: var(--text-main);
        }

        /* status text */
        .history-status {
            font-size: .85rem;
            color: var(--teal-primary);
        }

        /* progress bar */
        .progress {
            height: 4px;
            background-color: var(--border-color);
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-bar {
            background-color: var(--teal-primary);
        }

        /* action buttons */
        .history-item .btn {
            font-size: .85rem;
            border-radius: 999px;
        }

        .btn-success {
            background-color: var(--teal-primary);
            border-color: var(--teal-primary);
        }

        .btn-success:hover {
            background-color: color-mix(in srgb, var(--teal-primary) 85%, black);
        }

        /* empty state */
        .empty-state i {
            font-size: 3rem;
            opacity: .6;
        }

        /* =========================
                       DARK MODE FIX
                    ========================= */
        [data-bs-theme="dark"] .history-item:hover {
            background-color: rgba(255, 255, 255, .03);
        }

        [data-bs-theme="dark"] {

            /* history item divider */
            .history-item {
                border-bottom-color: rgba(255, 255, 255, .08);
            }

            /* icon background */
            .history-icon {
                background-color: rgba(32, 201, 151, .15);
                color: var(--teal-primary);
            }

            /* progress bar background */
            .progress {
                background-color: rgba(255, 255, 255, .12);
            }

            /* button outline secondary */
            .btn-outline-secondary {
                color: var(--text-main);
                border-color: rgba(255, 255, 255, .25);
            }

            .btn-outline-secondary:hover {
                background-color: rgba(255, 255, 255, .1);
            }

            /* three dot button */
            .btn-link.text-muted {
                color: var(--text-muted) !important;
            }

            .btn-link.text-muted:hover {
                color: var(--text-main) !important;
            }

        }


        /* =========================
                       RESPONSIVE
                    ========================= */
        @media (max-width: 576px) {
            .history-icon {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }

            .history-item {
                padding: 1rem 0;
            }

            .history-item .btn {
                font-size: .8rem;
            }
        }
    </style>
    <div class="container-fluid py-4">
        <div class="mx-auto" style="max-width: 1100px;">

            {{-- Header --}}
            <div class="mb-4">
                <h5 class="page-title mb-1">Riwayat Bacaan</h5>
                <small class="text-muted">Lanjutkan bacaan Al-Qur'an Anda</small>
            </div>
            
            {{-- <div class="d-flex gap-4 mb-4 border-bottom">
                <a href="#" class="text-decoration-none tab-link active text-success fw-medium">
                    Terbaru
                </a>
            </div> --}}

            {{-- List Riwayat --}}
            @foreach ($grouped as $groupName => $histories)
                @if ($histories->isNotEmpty())
                    <div class="mb-4">
                        <div class="text-uppercase text-secondary small fw-semibold mb-3"
                            style="font-size: 0.75rem; letter-spacing: 0.5px">
                            {{ $groupName }}
                        </div>

                        @foreach ($histories as $history)
                            @php
                                $progress = 0;
                                if ($history['is_complete']) {
                                    $progress = 100;
                                } elseif ($history['ayat'] > 0) {
                                    $progress = min(100, round(($history['last_ayat'] / $history['ayat']) * 100));
                                }
                            @endphp

                            <div class="d-flex gap-3 align-items-start history-item">
                                <div class="history-icon">
                                    <i class="bi bi-book"></i>
                                </div>

                                <div class="flex-grow-1 min-w-0">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold mb-1" style="color: var(--text-main)">
                                                {{ $history['nama'] }}
                                                <span class="text-muted fw-normal small">
                                                    - {{ $history['last_read_at']->diffForHumans() }}
                                                </span>
                                            </div>

                                            <small class="history-status">
                                                @if ($history['is_complete'])
                                                    <i class="bi bi-check-circle-fill me-1"></i>
                                                    Selesai Membaca
                                                @else
                                                    Terhenti di Ayat {{ $history['last_ayat'] }}
                                                @endif
                                            </small>
                                        </div>
                                        <button class="btn btn-sm btn-link text-muted p-0 ms-2">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" style="width: {{ $progress }}%"
                                            aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>

                                    @if ($history['is_complete'])
                                        <a href="{{ route('surah.show', $history['nomor']) }}"
                                            class="btn btn-sm btn-outline-secondary px-3">
                                            Baca Ulang
                                        </a>
                                    @else
                                        <a href="{{ route('surah.show', $history['nomor']) }}?startFrom={{ $history['last_ayat'] + 1 }}"
                                            class="btn btn-sm btn-success text-white px-3">
                                            Lanjutkan
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach

            {{-- Empty State --}}
            @if (empty($grouped) ||
                    (isset($grouped['Hari Ini']) &&
                        $grouped['Hari Ini']->isEmpty() &&
                        isset($grouped['Kemarin']) &&
                        $grouped['Kemarin']->isEmpty() &&
                        isset($grouped['Sebelumnya']) &&
                        $grouped['Sebelumnya']->isEmpty()))
                <div class="text-center py-5">
                    <i class="bi bi-book text-muted mb-3" style="font-size: 3rem;"></i>
                    <h6 class="text-muted mb-2">Belum ada riwayat bacaan</h6>
                    <p class="text-muted small">
                        Mulai baca Al-Qur'an untuk mencatat riwayat bacaanmu
                    </p>
                    <a href="{{ route('surah.index') }}" class="btn btn-success mt-2">
                        Mulai Membaca
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
