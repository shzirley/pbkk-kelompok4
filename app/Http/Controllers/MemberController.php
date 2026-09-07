<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function page(Request $request): View
    {
        $member = $request->route('member');
        $page = $request->route('page');
        abort_unless(in_array($member, ['adrian', 'shifa', 'fathiya'], true) && in_array($page, ['home', 'about', 'project'], true), 404);

        $profile = collect(config('group.members'))->firstWhere('route', $member.'.home');

        return view("members.$member.$page", [
            'nama' => $profile['name'], 'nrp' => $profile['nrp'],
            'profile_dept' => config('group.department_description'), 'project_plan' => 'Ide proyek belum ditentukan.',
        ]);
    }

    public function calculate(Request $request, Calculator $calculator): Response
    {
        $member = $request->route('member');
        abort_unless(in_array($member, ['adrian', 'shifa', 'fathiya'], true), 404);
        $angka1 = $request->route('angka1');
        $angka2 = $request->route('angka2');
        $operasi = $request->route('operasi');
        $data = $calculator->calculate($angka1, $angka2, $operasi);
        $hasil = $data['calculationError'] ?? $data['result'];
        $simbol = $data['symbol'];
        $page = $member === 'adrian' ? 'hitung' : 'calculator';

        return response()->view("members.$member.$page", compact('angka1', 'angka2', 'operasi', 'hasil', 'simbol'), $data['calculationError'] ? 422 : 200);
    }
}
