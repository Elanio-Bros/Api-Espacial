<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportResource;
use App\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listReports(Request $request)
    {

        // $apiUrl = 'https://spaceflightnewsapi.net/api/v2/';

        $apiUrl = 'https://api.spaceflightnewsapi.net/v3/';

        $guzzle = new Client([
            'base_uri' => $apiUrl
        ]);

        $response = json_decode($guzzle->get('articles')->getBody()->getContents(), true);

        $filter = $request->get('filter');
        $data = array();
        foreach ($response as $value) {
            Report::FirstOrCreate([
                'external_id' => $value['id'],
                'title' => $value['title'],
                'url' => $value['url'],
                'summary' => $value['summary']
            ]);
            if (strpos(json_encode($value), $filter) === false) {
                continue;
            }
            array_push($data, $value);
        }
        return response()->json(compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function createReport(Request $request)
    {
        $report = Report::create([
            'external_id' => $request->post('external_id'),
            'title' => $request->post('title'),
            'url' => $request->post('url'),
            'summary' => $request->post('summary')
        ]);

        return (new ReportResource($report))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * TODO: Implement it
     *
     * @param $reportId
     */
    public function deleteReport($reportId)
    {
        // Implementar esse endpoint.
    }
}
