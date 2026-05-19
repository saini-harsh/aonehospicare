<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $quantity = (int) $request->input('quantity', 1);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = (int) $cart[$product->id]['quantity'] + $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => $product->total_price, // Store total price including GST
                "base_price" => $product->price,
                "gst_percentage" => $product->gst_percentage,
                "image" => $product->image,
                "slug" => $product->slug
            ];
        }

        session()->put('cart', $cart);
        
        if($request->ajax()) {
            return response()->json(['success' => true, 'cart_count' => count($cart), 'message' => 'Product added to cart!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = (int) $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(['success' => true]);
        }
    }

    public function getCartData()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $subtotal = 0;
        $gstTotal = 0;

        foreach($cart as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
            
            // Re-calculate base and GST for display if needed
            $base = $item['base_price'] * $item['quantity'];
            $subtotal += $base;
            $gstTotal += ($itemTotal - $base);
        }

        return response()->json([
            'cart' => $cart,
            'total' => $total,
            'subtotal' => $subtotal,
            'gst_total' => $gstTotal,
            'count' => count($cart)
        ]);
    }
}
