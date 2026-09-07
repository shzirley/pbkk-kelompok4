<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('home', ['members' => config('group.members')]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function project(): View
    {
        return view('project');
    }

    public function calculator(): View
    {
        return view('calculator', ['angka1' => '', 'angka2' => '', 'operasi' => 'tambah', 'result' => null, 'calculationError' => null]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $input = $request->validate([
            'angka1' => ['required', 'string', 'max:32', 'regex:/^-?(?:\d+(?:\.\d*)?|\.\d+)$/D'],
            'angka2' => ['required', 'string', 'max:32', 'regex:/^-?(?:\d+(?:\.\d*)?|\.\d+)$/D'],
            'operasi' => ['required', 'in:tambah,kurang,kali,bagi'],
        ]);

        return redirect()->route('calculate', $input);
    }

    public function hitung(string $angka1, string $angka2, string $operasi, Calculator $calculator): Response
    {
        $data = $calculator->calculate($angka1, $angka2, $operasi);

        return response()->view('calculator', array_merge(compact('angka1', 'angka2', 'operasi'), $data), $data['calculationError'] ? 422 : 200);
    }
}
