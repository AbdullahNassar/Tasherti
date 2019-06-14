<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contacts;
use DB;

class ContactsController extends Controller {

	public function getContacts()
    {
        $contacts = DB::table('contacts')
            ->select('contacts.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.contact', compact('contacts','con'));
    }


    public function updateContacts(Request $request)
    {

        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $linkedin = $request->input('linkedin');
        $address_ar = $request->input('address_ar');
        $address_en = $request->input('address_en');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $data = array('facebook' => $facebook ,'twitter' => $twitter,'google' => $google ,'linkedin' => $linkedin,'phone' => $phone ,'email' => $email,'address_ar' => $address_ar ,'address_en' => $address_en);

        $c = DB::table('contacts')->where('id', 1)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }
}
