<?php

use App\Http\Controllers\KamalController;
use App\Http\Controllers\AngelaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/project-idea', [PageController::class, 'project'])->name('project');
Route::get('/project', [PageController::class, 'project'])->name('project.alias');
Route::get('/calculator', [PageController::class, 'calculator'])->name('calculator');
Route::get('/kalkulator', [PageController::class, 'calculator'])->name('calculator.alias');
Route::get('/calculator/submit', [PageController::class, 'submit'])->name('calculator.submit');
Route::get('/hitung/{angka1}/{angka2}/{operasi}', [PageController::class, 'hitung'])->name('calculate');

Route::prefix('anggota/angela')->name('angela.')->group(function (): void {
    Route::get('/', [AngelaController::class, 'home'])->name('home');
    Route::get('/contact', [AngelaController::class, 'contact'])->name('contact');
    Route::get('/projects', [AngelaController::class, 'projects'])->name('projects');
    Route::get('/projects/{project}', [AngelaController::class, 'project'])->name('project');
    Route::get('/collection', [AngelaController::class, 'collection'])->name('collection');
    Route::get('/resume/download', [AngelaController::class, 'resume'])->name('resume');
});
// Imported profiles use separate URLs and route names to avoid collisions.
foreach (['adrian', 'shifa', 'fathiya'] as $member) {
    foreach (['' => 'home', '/about' => 'about', '/project-idea' => 'project'] as $path => $page) {
        Route::get("/anggota/$member$path", [MemberController::class, 'page'])
            ->defaults('member', $member)->defaults('page', $page)->name("$member.$page");
    }
    Route::get("/anggota/$member/hitung/{angka1}/{angka2}/{operasi}", [MemberController::class, 'calculate'])
        ->defaults('member', $member)->name("$member.calculate");
}
foreach (['' => ['index', 'home'], '/about' => ['about', 'about'], '/project-idea' => ['project', 'project'], '/projects' => ['projects', 'projects'], '/contact' => ['contact', 'contact'], '/collection' => ['collection', 'collection'], '/blog' => ['blog', 'blog'], '/blog/{slug}' => ['article', 'article'], '/kalkulator' => ['calculator', 'calculator'], '/kalkulator/submit' => ['calculateForm', 'calculator.submit'], '/hitung/{angka1}/{angka2}/{operasi}' => ['hitung', 'calculate']] as $path => [$method, $name]) {
    Route::get('/anggota/kamal'.$path, [KamalController::class, $method])->name('kamal.'.$name);
}
