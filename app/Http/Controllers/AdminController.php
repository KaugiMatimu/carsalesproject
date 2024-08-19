<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Order;
use App\Models\products;

class AdminController extends Controller
{
    public function view_category(){
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function delete_category($id){
        $data = category:: find($id);
        $data -> delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_products(){
        $categories = Category::all();
        return view('admin.products', compact('categories'));
    }

    public function add_products(Request $request){
        $products = new products;
        $products ->title = $request->title;
        $products ->description = $request->description;
        $products ->price = $request->price;
        $products ->quantity = $request->quantity;
        $products ->discount_price = $request-> discount_price;
        $products ->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $products->image = $imagename;
        
        $products->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }
    public function show_products (){
        $products = products::all();
        return view('admin.show_products',compact('products'));
    }
    public function delete_product($id){
        $product = products:: find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function update_product($id){
        $product = products:: find($id);
        $categories = Category:: all();
        return view('admin.update_product', compact('product', 'categories'));
    }
    public function update_product_confirm(Request $request, $id){
        $product = products:: find($id);
        $product ->title = $request->title;
        $product ->description = $request->description;
        $product ->price = $request->price;
        $product ->quantity = $request->quantity;
        $product ->discount_price = $request->discount_price;
        $product ->category = $request->category;
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product ->image = $imagename;
        }
        
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function order(){
        $order = order::all();
        return view('admin.order', compact('order'));
    }
}
