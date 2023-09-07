<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cartrequest;
use App\Http\Resources\CartResource;
use App\Models\Beat;
use App\Models\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class Cartcontroller extends Controller
{
    //
    public function add(Request $request): JsonResponse
    {
        $beat = Beat::findOrFail($request->beat_id);
        $cart = Cart::where('user_id', auth()->user()->id)->first();

        if(!$cart) {     
            $cart = Cart::create(['user_id' => auth()->user()->id, 'items' => []]);
        }

        if (in_array($beat->id, $cart->items)) {
            return response()->json(
                [
                    'message' => 'Beat already in cart',
                    'data' => new CartResource($cart)
                ], 409
            );
        }
        
        $cart->items = array_merge($cart->items, [$beat->id]);

        $cart->total_price += $beat->price;
        
        $cart->save();


        return response()->json([
            'message' => 'Beat added successfully',
            'data' => new CartResource($cart)
        ], 201);
    }
    public function destroy(Request $request): JsonResponse
    {
        // Find the beat
        $beat = Beat::findOrFail($request->beat_id);
        $cart = Cart::where('user_id', auth()->user()->id)->first();

        $cart->total_price -= $beat->price;
        // Remove beat from cart
        $cart->items = array_diff($cart->items, [$beat->id]);

        // $cart->update(['items' => $items]);
        $cart->save();
        return response()->json(['message' => 'Beat removed from cart'], 200);
    }

    public function view(Request $request): JsonResponse
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
       
        return response()->json(
            [
                'message' => 'All beats in the cart viewed successfully',
                'data' =>  new CartResource($cart)
            ],
            200
        );
    }
}
