<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //mudança pois o external_id não estava retornando correto
        $reponse = parent::toArray($request);
        $reponse['external_id'] = $request->external_id;
        return $reponse;
    }
}
