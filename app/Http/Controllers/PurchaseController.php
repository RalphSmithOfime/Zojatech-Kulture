<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseBeat(User $user, Beat $beat)
    {
        $user = Auth::user();

        // Check if the user has already purchased the beat
        if ($user->purchases()->where('beat_id', $beat->id)->exists()) 
        {
            return redirect()->back()->with('error', 'You have already purchased this beat.');
        }

        // Record the purchase in the database
        $purchase = new Purchase();
        $purchase->user_id = $user->id;
        $purchase->beat_id = $beat->id;
        $purchase->save();

        // Notify the beat owner
        $beat->user->notify(new BeatPurchased($beat));

        return redirect()->back()->with('success', 'Beat purchased successfully!');
    }
}
