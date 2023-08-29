<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nama' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'role_name' => $this->getRoleNames()->first(),
            'nip' => $this->employee->nip,
            'npwp' => $this->employee->npwp,
            'ttl' => $this->employee->ttl,
            'address' => $this->employee->address,
            'ktp_address' => $this->employee->ktp_address,
            'gender' => $this->employee->gender,
            'religion' => $this->employee->religion,
            'blood_type' => $this->employee->blood_type,
            'golongan' => $this->employee->golongan,
            'status' => $this->employee->status,
            'date_start' => $this->employee->date_start,
            'tenure' => $this->employee->tenure,
            'contact_type' => $this->employee->contact_type,
            // 'contact_type' => $this->employee->tenure,
            'subsatker' => $this->subsatker->subsatker,
            'satker' => $this->satker->satker,
            // 'subsatker' => $this->subsatker->subsatker,
            // 'satker' => $this->subsatker->satker->satker,
        ];
    }
}
