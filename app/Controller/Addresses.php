<?php

namespace Controller;

use Model\Address;
use Src\View;
use Src\Request;

class Addresses
{
    public function showAddresses(): string
    {  
        $addresses = Address::all()->toArray();
        return (new View())->render('site.addresses', ['addresses' => $addresses]);
    }

		public function createAddress(Request $request): string
    {  
				$addresses = Address::all();

        if ($request->method === 'GET') {
          return (new View())->render('site.createAddress', ['addresses' => $addresses]);
        }

        if ($request->method === 'POST') {
          // var_dump($request->all());die();
          Address::create([
            'region' => $request->region,
            'locality' => $request->locality,
            'street' => $request->street,
            'house' => $request->house,
            'corps' => $request->corps,
            'apartment' => $request->apartment
					]);
          app()->route->redirect('/addresses');
        }
    }
}
