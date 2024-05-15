<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\order;
use App\Models\orderitem;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $orders = Order::all();
        $products = Product::all();
        $users = User::all();
        return view('dashboard.index', compact('orders', 'products','users'));
    }
    public function adminproduct(){
         $products=Product::all();

        return view('dashboard.product' , compact('products'));
    }
    public function addnewproduct(Request $data){
        $product= new Product();
        $product->SKU=$data->input('SKU');
        $product->name=$data->input('name');
        $product->description=$data->input('description');
        $product->category=$data->input('category');
        $product->quantity=$data->input('quantity');
        $product->price=$data->input('price');
        $product->size=$data->input('size');
        $product->color=$data->input('color');
        $product->image=$data->file('image')->getClientOriginalName();
        $data->file('image')->move('uploads/products/' , $product->image);
        $product->save();
        return redirect()->back();
    }

    public function updateproduct(Request $data){
        $product= Product::find($data->input('id'));
        $product->SKU=$data->input('SKU');
        $product->name=$data->input('name');
        $product->description=$data->input('description');
        $product->category=$data->input('category');
        $product->quantity=$data->input('quantity');
        $product->price=$data->input('price');
        $product->size=$data->input('size');
        $product->color=$data->input('color');
        if($data->file('image')!=null){
            $product->image=$data->file('image')->getClientOriginalName();
        $data->file('image')->move('uploads/products/' , $product->image);
        }
        $product->save();
        return redirect()->back();
    }
    public function deleteproduct($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back();
    }
    public function customers(Request $data){
        $users = User::where('type', 'customer')->get();
        return view('dashboard.customer', ['users' => $users]);
    }
    public function changestatus($status, $id)
    {
        if (auth()->user()->type === 'admin') {
            $user = User::find($id);
            $user->status = $status;
            $user->save();
            return redirect()->back();
        }
        
        return redirect()->back();
    }
    public function orders(Request $data){
        $orders = order::all();
        return view('dashboard.orders', ['orders' => $orders]);
    }

    public function orderitems(Request $data){
        $orderitems = orderitem::all();
        return view('dashboard.orderitems', ['orderitems' => $orderitems]);
    }
}
