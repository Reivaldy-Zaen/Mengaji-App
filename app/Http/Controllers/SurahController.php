<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class SurahController extends Controller
{

    // Halaman Daftar Surah (Sesuai kode kamu sebelumnya)
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $type = $request->query('type', '');
        $juz = $request->query('juz', '');

        // API untuk Daftar Surah
        $response = Http::get('https://api.npoint.io/99c279bb173a6e28359c/data');

        if ($response->failed()) {
            return view('surah.index', ['surahs' => collect([]), 'search' => '', 'type' => '', 'juz' => '']);
        }

        $surahs = collect($response->json());

        if ($search !== '') {
            $surahs = $surahs->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['nama']), strtolower($search)) ||
                    $item['nomor'] == $search;
            });
        }

        if ($type !== '') {
            $surahs = $surahs->where('type', strtolower($type));
        }

        if ($juz === '30') {
            $surahs = $surahs->whereBetween('nomor', [78, 114]);
        }

        return view('surah.index', compact('surahs', 'search', 'type', 'juz'));
    }

    public function show($nomor)
    {
        $response = Http::get("https://equran.id/api/v2/surat/{$nomor}");

        if ($response->failed()) {
            return redirect()->route('surah.index')
                ->with('error', 'Gagal memuat data surah.');
        }

        $surah = $response->json()['data'];

        $history = null;
        if (Auth::check()) {
            $history = History::where('user_id', Auth::id())
                ->where('surah_number', $nomor)
                ->first();
        }

        return view('surah.show', compact('surah', 'history'));
    }

    public function bookmarks()
    {
        return view('surah.bookmarks');
    }

    public function riwayat()
    {
        $histories = History::where('user_id', Auth::id())
            ->orderBy('last_read_at', 'desc')
            ->get();

        $api = Http::get('https://api.npoint.io/99c279bb173a6e28359c/data');
        $surahs = collect($api->json());

        $data = $histories->map(function ($history) use ($surahs) {
            $surah = $surahs->firstWhere('nomor', (string)$history->surah_number);

            if (!$surah) return null;

            // Format waktu di controller
            $timeAgo = '';
            if ($history->last_read_at->isToday()) {
                $timeAgo = 'Hari ini';
            } elseif ($history->last_read_at->isYesterday()) {
                $timeAgo = 'Kemarin';
            } else {
                $daysDiff = $history->last_read_at->diffInDays(now());
                $timeAgo = $daysDiff . ' hari yang lalu';
            }

            return [
                'nama' => $surah['nama'],
                'arti' => $surah['arti'],
                'ayat' => $surah['ayat'],
                'nomor' => $surah['nomor'],
                'last_ayat' => $history->last_ayat,
                'is_complete' => $history->is_complete,
                'last_read_at' => $history->last_read_at,
                'time_ago' => $timeAgo, // Tambah field ini
            ];
        })->filter();

        $grouped = $data->groupBy(function ($item) {
            $date = \Carbon\Carbon::parse($item['last_read_at']);

            if ($date->isToday()) return 'Hari Ini';
            if ($date->isYesterday()) return 'Kemarin';
            return 'Sebelumnya';
        });

        return view('surah.riwayat', compact('grouped'));
    }

    public function saveHistory(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'surah_number' => 'required',
            'last_ayat' => 'required|integer'
        ]);

        $history = History::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'surah_number' => $request->surah_number,
            ],
            [
                'last_ayat' => $request->last_ayat,
                'is_complete' => false,
                'last_read_at' => now(),
            ]
        );

        return response()->json([
            'status' => 'ok',
            'data' => $history
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
