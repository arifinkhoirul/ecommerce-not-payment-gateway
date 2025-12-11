<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\Category;
use App\Models\Shoe;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;


    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }


    public function index()
    {
        $data = $this->frontService->getFrontPage();
        // dd($data);

        return view('dashboard', $data);
    }

    public function products()
    {
        $dataProductsPage = $this->frontService->getProductsPage();

        return view('all-products', $dataProductsPage);
    }

    public function detail($shoe)
    {
        $dataProductDetail = $this->frontService->getDetailPage($shoe);
        // dd($dataProductDetail);

        return view('detail-product', $dataProductDetail);
    }

    public function pofileAkun()
    {
        return view('akun-profile');
    }
}
