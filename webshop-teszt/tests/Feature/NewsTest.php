<?php

namespace Tests\Feature;

use App\News;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function egy_hir_hozzaadasa_adatokkal()
    {
        $response = $this->from('news')->post('/addNews',$this->data());

        $this->assertCount(1, News::all());
        $response->assertRedirect('news');
    }

    /** @test */
    public function egyezo_cim_hozzaadasa_nem_lehetseges()
    {
        $data = array_merge($this->data(), [
            "title" => "egyezik"
        ]);
        $this->post('/addNews',$data);
        $response = $this->post('/addNews',$data);

        $this->assertCount(1, News::all());
        $response->assertSessionHasErrors("title");
    }

    /** @test */
    public function egy_hir_hozzaadasa_cim_nelkul_nem_lehetseges()
    {
        $response = $this->post('/addNews',array_merge($this->data(), [
            "title" => ""
        ]));

        $this->assertCount(0, News::all());
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function egy_hir_hozzaadasa_szoveg_nelkul_nem_lehetseges()
    {
        $response = $this->post('/addNews',array_merge($this->data(), [
            "text" => ""
        ]));

        $this->assertCount(0, News::all());
        $response->assertSessionHasErrors('text');
    }

    /** @test */
    public function egy_letezo_hir_torlese(){
        $this->withoutExceptionHandling();
        $this->from('news')->post('/addNews',$this->data());
        $response = $this->from('news')->delete('/removeNew/'. News::first()->id,$this->data());

        $this->assertCount(0, News::all());
        $response->assertRedirect('news');
    }
    
    private function data(){
        $faker = Factory::create();
        return [
            "title" => $faker->sentence,
            "text" => $faker->sentence
        ];
    }
}
