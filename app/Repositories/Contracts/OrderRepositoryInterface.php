<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createTransaction(array $data);

    public function findByTrxIdAndPhoneNumber($bookingTrx, $phoneNumber);

    public function saveToSession(array $data);

    public function updateToSession(array $data);

    public function getOrderDataFromSession();
};
