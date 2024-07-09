<?php

namespace App\Http\Resources\Indices;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MdeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        // return [
        //     'data_base' => $this->data_base,
        //     'receita_bc' => $this->receita_bc,
        //     'despesa_bc' => $this->despesa_bc,
        //     'perc_minimo' => $this->perc_minimo,
        //     'perc_apurado' => $this->perc_apurado,
        //     'vl_minimo' => $this->vl_minimo,
        //     'vl_diferenca' => $this->vl_diferenca,
        //     'fonte' => $this->fonte,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
    }
}
