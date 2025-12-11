<?php

namespace App\Repositories;

use App\Models\PromoCode;
use App\Repositories\Contracts\PromoCodeRepositoryInterface;

class PromoCodeRepository implements PromoCodeRepositoryInterface
{
    public function getAllPromoCodes()
    {
        return PromoCode::latest()->get();
    }

    public function findByCode($code)
    {
        return PromoCode::where('code', $code)->first();
    }
}
