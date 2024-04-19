<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at ? Carbon::createFromFormat('Y-m-d H:i:s', $this->email_verified_at)->isoFormat('DD. MMM YYYY HH:mm:ss', 'cs') : null,
            'password' => $this->password,
            'is_organizer' => $this->is_Organizer,
            'remember_token' => $this->remember_token,
            'created_at'  => $this->created_at->formatLocalized('%d. %b %Y %H:%M:%S'),
            'updated_at' => $this->updated_at,
        ];
    }
}
