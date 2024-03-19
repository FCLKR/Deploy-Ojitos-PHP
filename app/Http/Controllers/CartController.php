<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductoVacuna;


class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        try {
            $cart = session()->get('cart', []);

            // Check if the product is a vaccine
            $productoVacuna = ProductoVacuna::where('producto_id', $productId)->first();

            if ($productoVacuna) {
                // If the product is a vaccine, use the vaccine details
                $vacuna = $productoVacuna->vacuna;

                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity']++;
                } else {
                    $cart[$productId] = [
                        "product_name" => $vacuna->nombre,
                        "quantity" => 1,
                        "product_price" => $productoVacuna->price,
                        "img" => null
                    ];
                }
            } else {
                // If the product is not a vaccine, use the generic product details
                $product = Product::findOrFail($productId);

                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity']++;
                } else {
                    $cart[$productId] = [
                        "product_name" => $product->product_name,
                        "quantity" => 1,
                        "product_price" => $product->product_price,
                        "img" => $product->img
                    ];
                }
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the product to the cart.');
        }
    }

    public function update(Request $request)
    {
        try {
            if ($request->id && $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
            }
            return response()->json(['success' => 'Cart updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the cart.']);
        }
    }

    public function remove(Request $request)
    {
        try {
            if ($request->id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
            }
            return response()->json(['success' => 'Product removed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while removing the product from the cart.']);
        }
    }

    public function showCart()
    {
        return view('ProductUser.cart');
    }
}
