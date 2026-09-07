<?php

namespace Tests\Feature;

use App\Services\Calculator;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class GroupWebsiteTest extends TestCase
{
    public function test_all_page_routes_and_personal_navigation_work(): void
    {
        foreach (Route::getRoutes() as $route) {
            if (! str_starts_with($route->getActionName(), 'App\\Http\\Controllers\\')) {
                continue;
            }
            if (str_ends_with($route->getName(), '.submit')) {
                continue;
            }
            $parameters = [];
            foreach ($route->parameterNames() as $parameter) {
                $parameters[$parameter] = match ($parameter) {
                    'angka1' => '10', 'angka2' => '5', 'operasi' => 'kali',
                    'slug' => array_key_first(config('portfolio.articles')),
                };
            }
            $response = $this->get(route($route->getName(), $parameters));
            $response->assertOk();
            if (str_starts_with($route->uri(), 'anggota/')) {
                $response->assertSee('Kembali ke Kelompok 4');
            }
        }
    }

    public function test_home_contains_six_members_and_only_three_personal_links(): void
    {
        $response = $this->get('/')->assertOk();
        foreach (config('group.members') as $member) {
            $response->assertSee($member['name'])->assertSee($member['nrp']);
        }
        foreach (['kamal', 'angela', 'adrian', 'shifa', 'fathiya'] as $member) {
            $response->assertSee(route($member.'.home'));
            $this->get('/anggota/'.$member)->assertOk()->assertSee('Kembali ke Kelompok 4');
        }
        $this->assertSame(1, substr_count($response->getContent(), 'Personal website segera hadir'));
    }

    #[DataProvider('calculations')]
    public function test_calculation_results_and_errors(string $path, ?string $result, int $status): void
    {
        foreach (['', '/anggota/kamal', '/anggota/adrian', '/anggota/shifa'] as $prefix) {
            $response = $this->get($prefix.'/hitung/'.$path)->assertStatus($status);
            if ($result !== null) {
                $response->assertSee($result);
                if ($prefix === '') {
                    [$first, $second, $operation] = explode('/', $path);
                    $response->assertSee($first.' '.Calculator::OPERATIONS[$operation].' '.$second.' =');
                }
            }
        }
    }

    public static function calculations(): array
    {
        return [
            ['10/5/tambah', '15', 200], ['10/5/kurang', '5', 200],
            ['10/5/kali', '50', 200], ['10/4/bagi', '2.5', 200],
            ['-2.5/4/kali', '-10', 200], ['0/5/bagi', '0', 200],
            ['5/0/bagi', null, 422], ['abc/2/tambah', null, 422],
            ['2/3/pangkat', null, 422], ['1000000000001/2/tambah', null, 422],
        ];
    }

    public function test_form_redirects_and_invalid_input_is_rejected(): void
    {
        $this->get('/calculator/submit?angka1=-2.5&angka2=4&operasi=kali')->assertRedirect('/hitung/-2.5/4/kali');
        $this->from('/calculator')->get('/calculator/submit?angka1=abc&angka2=4&operasi=kali')
            ->assertRedirect('/calculator')->assertSessionHasErrors('angka1');
    }

    public function test_project_is_a_placeholder_and_unknown_routes_return_a_useful_404(): void
    {
        $this->get('/project-idea')->assertOk()->assertSee('Ide proyek akan diisi setelah brainstorming kelompok.');
        $this->get('/anggota/not-a-member')->assertNotFound()->assertSee('Kembali ke Home');
        $this->get('/anggota/kamal/blog/not-an-article')->assertNotFound();
    }
}
