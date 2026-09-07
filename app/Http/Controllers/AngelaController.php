<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;

class AngelaController extends Controller
{
    public function home(): View
    {
        return view('members.angela.home', ['profile' => config('angela')]);
    }

    public function contact(): View
    {
        return view('members.angela.contact', ['contact' => config('angela.contact')]);
    }

    public function projects(): View
    {
        $projects = collect([
            ['title' => 'CLARITAS', 'role' => 'Chief of Product Officer', 'year' => '2025 - Present', 'type' => 'project', 'summary' => 'Platform AI health-tech untuk skrining risiko Alzheimer.', 'image_path' => 'images/projects/claritas_mockup.png'],
            ['title' => 'TAPPCOM', 'role' => 'Product Developer / UI-UX Designer', 'year' => '2023', 'type' => 'project', 'summary' => 'Aplikasi Android untuk digitalisasi UMKM jasa tailor.', 'image_path' => 'images/projects/tappcom_mockup.png'],
        ])->map(fn (array $project): object => (object) $project);

        return view('members.angela.projects.index', compact('projects'));
    }

    public function project(string $project): View
    {
        $projects = [
            'claritas' => ['title' => 'CLARITAS', 'role' => 'Chief of Product Officer', 'year' => '2025 - Present', 'type' => 'project', 'description' => 'Platform AI health-tech untuk skrining risiko Alzheimer melalui analisis linguistik.', 'image_path' => 'images/projects/claritas_mockup.png', 'link' => null],
            'tappcom' => ['title' => 'TAPPCOM', 'role' => 'Product Developer / UI-UX Designer', 'year' => '2023', 'type' => 'project', 'description' => 'Aplikasi Android untuk mendigitalisasi UMKM jasa tailor lokal.', 'image_path' => 'images/projects/tappcom_mockup.png', 'link' => null],
        ];
        abort_unless(isset($projects[$project]), 404);
        return view('members.angela.projects.show', ['project' => (object) $projects[$project]]);
    }

    public function collection(): View
    {
        $achievements = collect([
            2026 => [['title' => 'Top 8 National Finalist — Hult Prize Indonesia', 'organizer' => 'Hult Prize Indonesia', 'rank' => 'Top 8', 'image_path' => 'images/achievements/ach_2026_hultprize.png']],
            2025 => [['title' => 'Top 50 National Finalist — Digihack', 'organizer' => 'Telkom Indonesia', 'rank' => 'Top 50', 'image_path' => 'images/achievements/ach_2025_digihack.png']],
        ])->map(fn ($items) => collect($items)->map(fn (array $item): object => (object) $item));

        return view('members.angela.collection', compact('achievements'));
    }

    public function resume(): Response
    {
        return response('Resume Angela Vania Sugiyono is available from the personal website source.', 200, ['Content-Type' => 'text/plain']);
    }
}
