<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        switch ($this->status) {
            case 0:
                $status = '<span class="badge bg-danger">Đã bị hủy</span>';
                break;
            case 1:
                $status = '<span class="badge bg-primary">Chờ xác nhận</span>';
                break;
            case 2:
                $status = '<span class="badge bg-warning">Đang chờ cắt</span>';
                break;
            case 3:
                $status = '<span class="badge bg-success">Đã cắt</span>';
                break;
            default:
                $status = '<span class="badge bg-danger">không xác định</span>';
        }
        return [
            'id' => $this->id,
            'user' => $this->user_phone,
            'date' => date('d/m/Y', strtotime($this->date)),
            'status' => $status,
            'stylist' => $this->stylist->name,
        ];
    }
}
