<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class SurahController extends Controller
{

public function index(Request $request)
    {
        $search = $request->query('search', '');
        $type = $request->query('type', '');
        $juz = $request->query('juz', '');

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
