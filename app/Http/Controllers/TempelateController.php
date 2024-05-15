<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TempelateController extends Controller
{
    public function index(){
        $allProducts=Product::all();
        // $Decor=Product::where('category','decor')->get();
        // $Art=Product::where('category','decor')->get();
        // $Gift=Product::where('category','decor')->get();
        // dd($allProducts);
        return view('frontend.hom', compact('allProducts'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function signup(){
        return view('auth.register');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function products(){
        $allProducts=Product::all();
        return view('frontend.products', compact('allProducts'));
    }
    public function singleproduct($id){
        $product=Product::find($id);
        // dd($id);
        return view('frontend.singleproduct')->with('product' , $product);
    }
    public function cart(){
        $cartitems=DB::table('products')
        ->join('carts','carts.productid','products.id')
        ->select('products.name','products.image','products.category','products.price','carts.*')
        ->get();
        return view('frontend.cart')->with('cartitems' , $cartitems);
    }
    public function addtocart(Request $data)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Please login first');
        }
    
        // Check if item already exists in cart
        $item = Cart::where('productid', $data->input('id'))
                    ->where('customerid', auth()->id())
                    ->first();
    
        if ($item) {
            // Update the quantity of existing cart item
            $item->quantity += $data->input('quantity');
            $item->save();
        } else {
            // Create a new cart item
            $item = new Cart();
            $item->quantity = $data->input('quantity');
            $item->productid = $data->input('id');
            $item->customerid = auth()->id();
            $item->save();
        }
    
        return redirect()->back()->with('success', 'Congratulations! Your product has been added to cart');
    }
    
    public function deletecartitem($id){
        $item=Cart::find($id);
        $item->delete();
        // dd($id);
        return redirect()->back();
    }
    public function updatecartitem(Request $data){
       
        $item=Cart::find($data->input('id'));
        $item->quantity=$data->input('quantity');
        $item->save();
        return redirect()->back()->with('success','Cogratulations! your product added to cart');
   }
   public function checkout(Request $data)
   {
       // Check if user is logged in
       if (!auth()->check()) {
        return redirect()->back()->with('error', 'Please login first');
    }
        else{
            $order=new order();
            $order->status="paid";
            $order->customerid = auth()->id();
            $order->bill = (float) $data->input('bill');
            $order->fullname=$data->input('fullname');
            $order->phone=$data->input('phone');
            $order->address=$data->input('address');
        }
            if($order->save())
            {
                $carts=Cart::where('customerid',auth()->id())->get();
                  foreach($carts as $item){

                    $product=Product::find($item->productid);
                    $orderitem= new orderitem();
                    $orderitem->productid=$item->productid;
                    $orderitem->quantity=$item->quantity;
                    $orderitem->price=$product->price;
                    $orderitem->orderid=$order->id;
                    $orderitem->save();
                    $item->delete();
                  }
            }
        
       
   
       return redirect()->back()->with('success', 'Congratulations! Your order has been placed successfully');
   }
 
   public function myorders(){

    if(auth()->check()){
        $orders=order::where('customerid',auth()->id())->get();
         $items=DB::table('products')
         ->join('orderitems','orderitems.productid','products.id')
         ->select('products.name','products.image','orderitems.*')
         ->get();
        return view('frontend.myorders' , compact('orders' , 'items'));
    }else{
        return redirect()->back()->with('error', 'Please login first');
    }
}

}

