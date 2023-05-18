<?php

namespace Controller;

use Model\Address;
use Model\Employee;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

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

        if ($request->method === 'POST') {

          $validator = new Validator($request->all(), [
            'region' => ['required', 'region'],
            'locality' => ['required', 'region'],
            'street' => ['required', 'region'],
            'house' => ['required'],
            'corps' => [],
            'apartment' => []
          ], [
            'required' => 'Поле :field пусто',
            'region' => 'Поле :field может состоять из нескольких слов, разделенных пробелом или тире'
          ]);
       
          if($validator->fails()){
            return new View('site.createAddress',
              ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'addresses' => $addresses, 'employees' => $employees]);
          }
         
          if($request->corps === ''){
            $request->corps = NULL;  
          } 
          if($request->apartment === ''){
            $request->apartment = NULL;
          } 
          
          if (Address::create([
            'region' => $request->region,
            'locality' => $request->locality,
            'street' => $request->street,
            'house' => $request->house,
            'corps' => $request->corps,
            'apartment' => $request->apartment
					])) {
            
            Employee::where('id', $request->employee_id)->update(
          [
            'address_id' => Address::orderby('id', 'desc')->first()->id
          ]);
          app()->route->redirect('/addresses');
          }
        }
    
        return (new View())->render('site.createAddress', ['addresses' => $addresses, 'employees' => $employees]);
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

