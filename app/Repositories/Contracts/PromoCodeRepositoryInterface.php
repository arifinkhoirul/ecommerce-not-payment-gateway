<?php

namespace App\Repositories\Contracts;

interface PromoCodeRepositoryInterface
{
    public function getAllPromoCodes();

    public function findByCode($code);
}
