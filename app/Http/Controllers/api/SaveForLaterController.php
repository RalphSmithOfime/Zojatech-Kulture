<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    public function saveBeatForLater(Beat $beat)
    {
        $user = Auth::user();

        // Check if the user has already saved this beat
        if ($user->savedBeats()->where('beat_id', $beat->id)->exists()) {
            return response()->json(['message' => 'You have already saved this beat.']);
        }

        // Record the save-for-later action
        $saveForLater = new SaveForLater();
        $saveForLater->user_id = $user->id;
        $saveForLater->beat_id = $beat->id;
        $saveForLater->save();

        // Notify the beat owner
        if ($beat->user->id !== $user->id) {
            $beat->user->notify(new BeatSavedForLater($beat, $user->name));
        }

        return response()->json(['message' => 'Beat saved for later successfully!']);
    }
}
