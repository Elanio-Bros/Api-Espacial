<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use GuzzleHttp\Client;

/**
 * Class ReportTest
 * @package Tests\Feature
 */
class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListReport()
    {
        $response = $this->get('/api/v1/reports');

        $apiUrl = 'https://api.spaceflightnewsapi.net/v3/';
        $guzzle = new Client([
            'base_uri' => $apiUrl
        ]);

        $responseApi = json_decode($guzzle->get('articles')->getBody()->getContents(), true);
        $response->assertStatus(200);
        $response = json_decode($response->getContent(), true);
        $this->assertEquals($responseApi, $response);
    }
    public function testCreateArticlePut()
    {
        $response = $this->put('/api/v1/reports', [
            'external_id' => '1',
            'title' => 'NEWS TITLE',
            'url' => 'http://www.test.com',
            'summary' => 'test test test test test test test test test test test test test test test'
        ]);

        $response->assertStatus(201);
    }
    public function testCreateArticlePost()
    {
        $response = $this->post('/api/v1/reports', [
            'external_id' => '2',
            'title' => 'NEWS TITLE',
            'url' => 'http://www.test.com',
            'summary' => 'test test test test test test test test test test test test test test test'
        ]);

        $response->assertStatus(201);
    }
    public function testDeleteArticle()
    {
        $response = $this->delete('/api/v1/reports/1');
        $response->assertStatus(202);
    }
    public function testDeleteArticlePost()
    {
        $response = $this->post('/api/v1/reports/2');
        $response->assertStatus(202);
    }
}
