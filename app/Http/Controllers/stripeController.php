<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Tempelate;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderitem;
use Session;
use Stripe;
class stripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $data)
    {
        $fullname=$data->input('fullname');
        $phone=$data->input('phone');
        $address=$data->input('address');
        $bill=$data->input('bill');
        return view('stripe',compact('fullname','phone','address','bill'));
    }

    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('SECRET_KEY'));

    Stripe\Charge::create ([
            "amount" => $request->input('bill') * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "New order payment for handy crafts" 
    ]);

    if (auth()->check()) {
        $order=new order();
        $order->status="paid";
        $order->customerid = auth()->id();
        $order->bill = (float) $request->input('bill');
        $order->fullname=$request->input('fullname');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');

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
            return redirect('/cart')->with('success', 'Congratulations! payment goes  successfully');
        }
        else{
            $message = 'Please <a href="' . route('login') . '">login</a> first.';
            return redirect()->back()->with('error', $message);
        }
    }
    else{
        $message = 'Please <a href="' . route('login') . '">login</a> first.';
        return redirect()->back()->with('error', $message);
    }
}
}