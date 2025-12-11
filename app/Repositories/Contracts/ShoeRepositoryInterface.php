<?php

namespace App\Repositories\Contracts;

interface ShoeRepositoryInterface
{
    public function getAllProducts($limit);

    public function getLimitProducts(int $limit);

    public function getDetailProduct($slug);

    public function getRelatedProduct($productName, $currentProductId);

    public function find($d);

    public function getPrice($shoeId);


}
