<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Food;
use App\Models\FoodChef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //passing all the list of food to the front
        $data = Food::all();
        $data2 = FoodChef::all();
        return view('home', compact('data','data2'));
    }
    public function redirects() //redirects to specific pages depending on the login whether its admin or user
    {
        $data = food::all();
        $data2 = FoodChef::all();
        $userType = Auth::user()->usertype;
        if($userType ==1){
            return view('admin.admin_home');
        }else
        {
           $user_id=Auth::id();
           $count1 = cart::where('user_id',$user_id)->count(); 
            return view('home', compact('data','data2','count1'));
        }
    }
    //redirects user to login page when he tired adding an item to cart without logging in
    public function addCart(Request $request,$id)
    {
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quanity;

            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->back();
        }
        else //returns the login page if no user id is found
        {
            return redirect('/login');
        }
    }
}
