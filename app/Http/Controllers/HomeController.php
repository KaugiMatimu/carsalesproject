<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        $products = Products::paginate(9);
        return view('home.userpage', compact('products'));
    }

    public function redirect(){
        $usertype=Auth::user() ->usertype;
        if($usertype == '1'){
            return view('admin.home');
        }else{
            $products = Products::paginate(9); 
            return view('home.userpage', compact('products'));
        }
    }
    public function product_details($id){
        $product = Products::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id){
        // check if user is logged
        if(Auth::id()){
            $user = Auth::user();
            $product = products::find($id);
            $cart = new cart();

            $cart ->name =$user->name;
            $cart ->email =$user->email;
            $cart ->address =$user->address;
            $cart ->phone =$user->phone;
            $cart->user_id = $user->id;
            $cart ->product_id=$user->product_id;
            if($product->discount_price!= null){
                $cart->price = $product->discount_price * $request->quantity;
            }else{
                $cart-> price = $product->price * $request->quantity;
            }

            $cart ->product_title = $product->title;
            $cart -> image = $product->image;
            $cart -> product_id = $product->id;
            $cart ->quantity =$request->quantity;

            $cart -> save();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }
    public function show_cart(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        }else{
            return redirect('login');
        }
        
    }
    public function remove_cart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_pay(){
        $user = Auth::user();
        $user_id = $user->id;
        $data = cart::where ('user_id', '=', $user_id)->get();
        
        foreach($data as $data){
            $order = new order;
            $order -> name = $data ->name;
            $order -> email = $data ->email;
            $order -> phone = $data -> phone;
            $order->address = $data->address;
            $order -> user_id = $data->user_id;
            $order ->product_title = $data->product_title;
            $order ->price = $data->price;
            $order ->quantity = $data->quantity;
            $order ->image = $data->image;
            $order ->product_id = $data->product_id;
            $order ->payment_status = 'Paid';
            $order-> delivery_status = 'processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'Thank You, We Have Received Your Order, We Will Connect With You Soon');
    }

    public function stripe($totalprice){
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "kes",
                "source" => $request->stripeToken,
                "description" => "Thank Your For Payment..." 
        ]);
        $user = Auth::user();
        $user_id = $user->id;
        $data = cart::where ('user_id', '=', $user_id)->get();
        
        foreach($data as $data){
            $order = new order;
            $order -> name = $data ->name;
            $order -> email = $data ->email;
            $order -> phone = $data -> phone;
            $order->address = $data->address;
            $order -> user_id = $data->user_id;
            $order ->product_title = $data->product_title;
            $order ->price = $data->price;
            $order ->quantity = $data->quantity;
            $order ->image = $data->image;
            $order ->product_id = $data->product_id;
            $order ->payment_status = 'cash on delivery';
            $order-> delivery_status = 'processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
