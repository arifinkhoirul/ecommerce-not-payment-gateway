<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Services\OrderService;
use Livewire\Component;

use function Pest\Laravel\session;

class OrderForm extends Component
{
    public Shoe $shoe;
    public $orderdata;
    public $subTotalAmount;
    public $promoCode = null;
    public $promoCodeId = null;
    public $quantity = 1;
    public $grandTotalAmount;
    public $discount = 0;
    public $totalDiscountAmount = 0;
    public $totalTax;

    public $alertPromoMessage = '';

    protected $orderService;


    public function mount(Shoe $shoe)
    {
        $this->shoe = $shoe;
        $this->subTotalAmount = $shoe->price;
        $this->totalTax = $shoe->price * 0.11;
        $this->grandTotalAmount = $shoe->price + $this->totalTax;
    }

    public function boot(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function incrementQty()
    {
        if($this->quantity < $this->shoe->stock)
        {
            $this->quantity++;
            $this->calculateTotal();
        }
    }

    public function decrementQty()
    {
        if($this->quantity > 1)
        {
            $this->quantity--;
            $this->calculateTotal();
        }
    }

    public function calculateTotal()
    {
        $this->subTotalAmount = $this->shoe->price * $this->quantity;
        $this->totalTax = $this->subTotalAmount * 0.11;
        $this->grandTotalAmount = $this->subTotalAmount + $this->totalTax - $this->discount;
    }

    public function updatedPromoCode()
    {
        $this->inputPromoCode();
    }


    public function inputPromoCode()
    {
        if(!$this->promoCode) {
            $this->resetDiscount();
            $this->alertPromoMessage = '';
            return;
        }

        $result = $this->orderService->applyPromoCode($this->promoCode, $this->subTotalAmount);
        // dd($result);

        if(isset($result['error'])) {
            // session()->flash('error', $result['error']);
            $this->alertPromoMessage = $result['error'];
            $this->resetDiscount();
        } else {
            // session()->flash('message', 'kode promo tersedia yeay');
            $this->alertPromoMessage = $result['message'];
            $this->discount = $result['discount'];
            $this->promoCodeId = $result['promoCodeId'];
            $this->totalDiscountAmount = $result['discount'];
            $this->calculateTotal();
        }

    }

    public function resetDiscount()
    {
        $this->discount = 0;
        $this->promoCodeId = null;
        $this->totalDiscountAmount = 0;
        // $this->alertPromoMessage = '';
        $this->calculateTotal();
    }

    public function submit()
    {
        $dataShopProduct = [
            'quantity' => $this->quantity,
            'sub_total_amount' => $this->subTotalAmount,
            'tax_total' => $this->totalTax,
            'grand_total_amount' => $this->grandTotalAmount,
            'promo_code_id' => $this->promoCodeId,
            'promo_code_name' => $this->promoCode,
            'discount' => $this->discount,

        ];
        // dd($dataShopProduct);
        $this->orderService->updateCustomerShopping($dataShopProduct);

        return redirect()->route('cart.customer.data');
    }


    public function render()
    {
        return view('livewire.order-form');
    }
}
