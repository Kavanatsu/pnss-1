<?php

namespace Controller;

use Model\Address;
use Model\Employee;
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
        $employees = Employee::all();

        if ($request->method === 'GET') {
          return (new View())->render('site.createAddress', ['addresses' => $addresses, 'employees' => $employees]);
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
          // var_dump($request->employee_id);die();
          // $fio = explode(' ', $request->employee);
          Employee::where('id', $request->employee_id)
                    // ->where('name', $fio[1])
                    // ->where('patronymic', $fio[2])
                    ->update(
          [
            'address_id' => Address::orderby('id', 'desc')->first()->id
          ]);
          app()->route->redirect('/addresses');
        }
    }

    public function updateAddress(Request $request): string
    {  
      if ($request->method === 'GET') {
        $addresses = Address::where('id', $request->id)->first();
      }
    
      if ($request->method === 'POST') {
        $payload = $request->all();
        $addresses = Address::where('id', $request->id)->update($payload);
        app()->route->redirect('/addresses');
      }
      return (new View())->render('site.updateAddress', ['addresses' => $addresses]);
    }

    public function deleteAddress(Request $request)
    {
        $address = Address::where('id', $request->id)->first();
        if ($address->delete()) {
            app()->route->redirect('/addresses');
        }
    }
}

