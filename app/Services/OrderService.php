<?php

namespace App\Services;

use App\Models\ProductTransaction;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PromoCodeRepository;
use App\Repositories\ShoeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    protected $categoryRepository;
    protected $orderRepository;
    protected $promoCodeRepository;
    protected $shoeRepository;


    public function __construct(CategoryRepository $categoryRepository, OrderRepository $orderRepository, PromoCodeRepository $promoCodeRepository, ShoeRepository $shoeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->orderRepository = $orderRepository;
        $this->promoCodeRepository = $promoCodeRepository;
        $this->shoeRepository = $shoeRepository;
    }


    public function beginOrder($data)
    {
        $orderData = [
            // 'shoe_size' => $data['shoe_size'],
            // 'size_id' => $data['size_id'],
            'shoe_id' => $data['shoe_id'],
        ];

        return $this->orderRepository->saveToSession($orderData);
    }

    public function getOrderDetail()
    {
        $orderData = $this->orderRepository->getOrderDataFromSession();
        $shoe = $this->shoeRepository->find($orderData['shoe_id']);

        return compact('shoe', 'orderData');
    }

    public function applyPromoCode($code, $subTotalAmount)
    {
        $promo = $this->promoCodeRepository->findByCode($code);

        if($promo){
            $discount = $promo->discount_amount;
            $grandTotalAmount = $subTotalAmount - $discount;
            $promoCodeId = $promo->id;
            // dd($discount);
            return ['discount' => $discount, 'grandTotalAmpunt' => $grandTotalAmount, 'promoCodeId' => $promoCodeId, 'message' => 'kode promo berhasil yeay'];
        }

        return ['error' => 'kode promo tidak tersedia'];
    }

    public function updateCustomerShopping($data)
    {
        $this->orderRepository->updateToSession($data);
    }

    public function paymentConfirm($validated)
    {
        $orderData = $this->orderRepository->getOrderDataFromSession();
        // dd($orderData);
        $productTransactionId = null;

        try {
            DB::transaction(function() use($validated, &$productTransactionBookingTrx, $orderData) {

                $dataShoe = $this->shoeRepository->find($orderData['shoe_id']);
                // dd($dataShoe);

                if($dataShoe->stock < $orderData['quantity']) {
                    return back()->with('error' , 'stock tidak mencuckupi');
                }
                $dataShoe->stock = $dataShoe->stock -  $orderData['quantity'];
                $dataShoe->save();



                if($validated['proof']) {
                    $proofPath = $validated['proof']->store('proofs', 'public');

                    $validated['proof'] = $proofPath;
                }


                // if ($orderData['shoe_size']) {
                //     $validated['shoe_size'] = $orderData['shoe_size'];
                // }

                // $validated['shoe_size'] = $orderData['shoe_size'];

                $validated['user_id'] = $orderData['user_id'];
                $validated['name'] = $orderData['name'];
                $validated['phone'] = $orderData['phone'];
                $validated['email'] = $orderData['email'];
                $validated['address'] = $orderData['address'];
                $validated['city'] = $orderData['city'];
                $validated['post_code'] = $orderData['post_code'];
                $validated['shoe_id'] = $orderData['shoe_id'];

                $validated['quantity'] = $orderData['quantity'];
                $validated['sub_total_amount'] = $orderData['sub_total_amount'];
                $validated['promo_code_id'] = $orderData['promo_code_id'];
                $validated['discount_amount'] = $orderData['discount'];
                $validated['grand_total_amount'] = $orderData['grand_total_amount'];
                $validated['is_paid'] = $orderData['is_paid'];

                $validated['booking_trx_id'] = ProductTransaction::generatedUniqueTrxId();

                $newTransaction =  $this->orderRepository->createTransaction($validated);

                // $productTransactionId = $newTransaction->id;
                $productTransactionBookingTrx = $newTransaction->booking_trx_id;
                // dd($productTransactionId)
                $this->orderRepository->clearSession();
            });
        } catch (\Exception $e) {
            Log::error('Error in payment confirmation' . $e->getMessage());
            return $e->getMessage();
        }

        return $productTransactionBookingTrx;
    }
}
