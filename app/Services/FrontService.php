<?php

namespace App\Services;

use App\Repositories\BannerImageRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ShoeRepository;

class FrontService
{
    protected $categoryRepository;
    protected $bannerImageRepository;
    protected $shoeRepository;


    public function __construct(CategoryRepository $categoryRepository, BannerImageRepository $bannerImageRepository,
    ShoeRepository $shoeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->bannerImageRepository = $bannerImageRepository;
        $this->shoeRepository = $shoeRepository;
    }

    public function getFrontPage()
    {
        $bannerImages = $this->bannerImageRepository->getAllBannerImages();
        $categories = $this->categoryRepository->getAllCategories();
        $productsLimit = $this->shoeRepository->getLimitProducts(8);

        return compact('bannerImages', 'categories', 'productsLimit');
    }

    public function getProductsPage()
    {
        $products = $this->shoeRepository->getAllProducts(12);
        $bannerImages = $this->bannerImageRepository->getAllBannerImages();
        $categories = $this->categoryRepository->getAllCategories();

        return compact('products', 'bannerImages', 'categories');
    }

    public function getDetailPage($shoe)
    {
        $productDetail = $this->shoeRepository->getDetailProduct($shoe);
        $productRelated = $this->shoeRepository->getRelatedProduct($productDetail[0]->name, $productDetail[0]->id);

        return compact('productDetail', 'productRelated');
    }

}
