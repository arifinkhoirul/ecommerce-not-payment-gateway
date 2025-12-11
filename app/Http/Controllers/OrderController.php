<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerDataReuest;
use App\Http\Requests\storeOrderRequest;
use App\Http\Requests\storePaymentRequest;
use App\Models\ProductTransaction;
use App\Models\Shoe;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;


    public function __construct(OrderService $orderService)
    {
        return $this->orderService = $orderService;
    }

    public function saveOrder(storeOrderRequest $request ,Shoe $shoe)
    {
        $validated = $request->validated();
        $validated['shoe_id'] = $shoe->id;
        $this->orderService->beginOrder($validated);
        // dd($validated);

        return redirect()->route('cart.view', $shoe->slug);
    }

    public function cartView()
    {
        // dd($shoe->slug);
        $data = $this->orderService->getOrderDetail();
        // dd($data);
        // dd($shoe->name);
        return view('shopping-cart', $data);
    }

    public function cartCustomerData()
    {
        $data = $this->orderService->getOrderDetail();
        // dd($data);
        return view('shopping-cart-data-cust', $data);
    }

    public function saveOrderCust(StoreCustomerDataReuest $request)
    {
        $validated = $request->validated();
        $this->orderService->updateCustomerShopping($validated);

        $data = $this->orderService->getOrderDetail();

        // dd($data);

        return redirect()->route('final.payment');
    }

    public function finalPayment()
    {
        $data = $this->orderService->getOrderDetail();
        // dd($data);
        return view('final-payment', $data);
    }

    public function orderConfirm(storePaymentRequest $request)
    {
        $validated = $request->validated();
        // $data = $this->orderService;
        $productTransactionBookingTrx = $this->orderService->paymentConfirm($validated);
        // dd($productTransactionBookingTrx);
        if($productTransactionBookingTrx) {
            return redirect()->route('success.payment', $productTransactionBookingTrx);
        }

        return redirect()->route('dashboard');
    }

    public function successPayment(ProductTransaction $productTrasaction)
    {
        // dd($productTrasaction);
        return view('success-payment', compact('productTrasaction'));
    }
}
