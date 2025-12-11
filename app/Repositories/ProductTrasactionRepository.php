<?php

namespace App\Repositories;

use App\Models\ProductTransaction;
use App\Repositories\Contracts\ProductTrasactionInterface;

class ProductTrasactionRepository implements ProductTrasactionInterface{
    public function detailProductBuyingUser($id)
    {
        return ProductTransaction::where('user_id', $id)->latest()->get();
    }
}

?>
