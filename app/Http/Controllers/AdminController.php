<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChef;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function user()
    {
        $userData = user::all();
        return view("admin.users", compact('userData'));
    }
    public function deleteUser($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodMenu()
    {
        $data = food::all();
        return view('admin.food_menu', compact('data'));
    }

    public function updateFoodMenu($id)
    {
        $data = food::find($id);
        return view('admin.update_food_menu', compact('data'));
    }
    public function updateFoodItem(Request $request, $id)
    {
        $data = food::find($id);
        $photo = $request->image;
        $imageName = time() . '.' . $photo->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    public function upload(Request $request)
    {
        $data = new Food;
        $photo = $request->image;
        $imageName = time() . '.' . $photo->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    public function deleteFoodMenu($id)
    {
        $data = Food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $data = new Reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back();

    }
    public function reservationPage()
    {
        $data = Reservation::all();
        return view('admin.admin_reservation', compact('data'));
    }
    public function viewChef()
    {
        $data = FoodChef::all();

        return view('admin.admin_chef', compact('data'));
    }
    public function uploadChef(Request $request)
    {
        $data = new FoodChef;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefImage', $imageName);
        $data->image = $imageName;

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();

    }
    public function updateChef($id)
    {
        $data = FoodChef::find($id);
        return view('admin.update_chef', compact('data'));
    }
    public function updateFoodChef(Request $request, $id)
    {
        $data = FoodChef::find($id);

        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('chefImage', $imageName);
            $data->image = $imageName;
        }
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();

    }
    public function deleteFoodChef($id)
    {
        $data = FoodChef::find($id);
        $data->delete();

        return redirect()->back();
       
    }
}