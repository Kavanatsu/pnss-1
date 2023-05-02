<?php

namespace Controller;

use Model\Address;
use Src\View;

class Addresses
{
    public function showAddresses(): string
    {  
        $addresses = Address::all()->toArray();
        return (new View())->render('site.addresses', ['addresses' => $addresses]);
    }
}