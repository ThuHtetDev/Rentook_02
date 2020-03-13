<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->{$this['type']}();
    }

    private function getType1(){
        return [
            'id' => $this['user']->id,
            'cus_name' => $this['user']->name,
            'email' => $this['user']->email,
            'bookCount' => count($this['user']->ratings),
            'memberDate' => $this['user']->created_at,
        ];
    }

    private function getType2(){
        return [
            'id' => $this['user']->id,
            'cus_name' => $this['user']->name . '2',
            'email' => $this['user']->email . '2',
            'bookCount' => count($this['user']->ratings),
            'memberDate' => $this['user']->created_at,
        ];;
    }


}
