<?php

namespace App\Http\Controllers;
use App\Models\Beat;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchBeats(Request $request)
    {
        $query = $request->input('query');

        $beats = Beat::where('title', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        // $users = User::where('name', 'LIKE', "%$query%")
        //     ->orWhere('email', 'LIKE', "%$query%")
        //     ->get();

        return response()->json([
            'message' => 'Searched beats successfully',
            'beats' => $beats,
            'data' => BeatResources::collection($beats)
            // 'users' => $users,
        ]);
    }

}
