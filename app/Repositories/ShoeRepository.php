<?php

namespace App\Repositories;

use App\Models\Shoe;
use App\Repositories\Contracts\ShoeRepositoryInterface;

class ShoeRepository implements ShoeRepositoryInterface
{
    public function getAllProducts($limit)
    {
        return Shoe::latest()->paginate($limit);
    }

    public function getLimitProducts(int $limit)
    {
        return Shoe::latest()->take($limit)->get();
    }

    public function getDetailProduct($shoe)
    {
        return Shoe::where('slug', $shoe)->get();
    }

    public function getRelatedProduct($productName, $currentProductId)
    {
          // Pisahkan nama berdasarkan spasi atau tanda minus
        $keywords = preg_split('/[\s-]+/', $productName);

        return Shoe::where('id', '!=', $currentProductId) // <-- exclude product sekarang
            ->where(function ($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $q->orWhere('name', 'LIKE', '%' . $word . '%');
                }
            })
        ->get();
    }


    public function find($id)
    {
        return Shoe::find($id);
    }

    public function getPrice($shoeId)
    {
        $shoe = $this->find($shoeId);
        return $shoe ? $shoe->price : 0;
    }
}
