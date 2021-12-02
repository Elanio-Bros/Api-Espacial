<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportResource;
use App\Report;
use Exception;
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
        //atualização da url para nova API
        $apiUrl = 'https://api.spaceflightnewsapi.net/v3/';


        $guzzle = new Client([
            'base_uri' => $apiUrl
        ]);

        $response = json_decode($guzzle->get('articles')->getBody()->getContents(), true);

        $filter = $request->get('filter');
        $data = array();
        /*refatoração de codigo para melhor 
        leitura e manutenção e atualização de registros já existentes*/
        foreach ($response as $value) {
            $report = Report::firstOrNew([
                'external_id' => $value['id']
            ]);
            $report['title'] = $value['title'];
            $report['url'] = $value['url'];
            $report['summary'] = $value['summary'];
            $report->save();
            if (strpos(json_encode($value), $filter) === false) {
                continue;
            }
            array_push($data, $value);
        }
        return response()->json($data, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function createReport(Request $request)
    {
        $request->validate([
            'external_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'url' => ['required', 'string'],
            'summary' => ['required', 'string'],
        ]);
        try {
            $report = Report::create([
                'external_id' => $request->post('external_id'),
                'title' => $request->post('title'),
                'url' => $request->post('url'),
                'summary' => $request->post('summary')
            ]);
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['error' => 'external_id duplicado'], 400);
            }
        }

        return (new ReportResource($report))->response()->setStatusCode(201);
    }

    /**
     * TODO: Implement it
     *
     * @param $reportId
     */

    public function deleteReport($reportId)
    {
        $report = Report::find($reportId);
        if ($report != null) {
            $report->delete();
            return response()->json(['result' => 'Value Delete'], 202);
        } else {
            return response()->json(['error' => 'Value Not Found'], 404);
        }
    }
}
