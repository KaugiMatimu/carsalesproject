<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comments;
use App\Models\Reply;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        $products = Products::paginate(9);
        $comments = comments::orderby('id','desc')->get(); 
        $reply = reply::all();
        return view('home.userpage', compact('products', 'comments', 'reply'));
    }

    public function redirect(){
        $usertype=Auth::user() ->usertype;
        if($usertype == '1'){

            $total_products = products::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = order::all();


            $total_revenue = 0;
            foreach ($order as $order){
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivery = order::where('delivery_status', '=', 'Delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();
            return view('admin.home', compact('total_products', 'total_order', 'total_user', 'total_revenue', 'total_delivery', 'total_processing'));
        }else{
            $products = Products::paginate(9);
            $comments = comments::orderby('id','desc')->get(); 
            $reply = reply::all();
            return view('home.userpage', compact('products', 'comments', 'reply'));
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
    public function show_order(){
        if(Auth::id()){

            $user = Auth::user();
            $userid = $user->id;
            $order =order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        }else{
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $order = order::find($id);
        $order ->delivery_status = "Canceled";
        $order->save();
        return redirect()->back();
    }
    public function add_comment(Request $request){
        // Check if user is logged in
        if(Auth::id()){
            $comments = new Comments;
            $comments->name = Auth::user()->name;
            $comments->user_id = Auth::user()->id;
            $comments->comment = $request->comment;
            $comments->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function add_reply(Request $request){
        if(Auth::id()){
            // Debugging to ensure comment_id is being received
            // dd($request->all());

            $reply = new Reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->comment_id; // Ensure this matches the form field name
            $reply->reply = $request->reply;
            $reply->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
}
