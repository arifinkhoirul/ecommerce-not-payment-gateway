<?php

namespace App\Repositories;

use App\Models\BannerImage;
use App\Repositories\Contracts\BannerImageRepositoryInterface;

class BannerImageRepository implements BannerImageRepositoryInterface
{
    public function getAllBannerImages()
    {
        return BannerImage::latest()->get();
    }
}
