<?php

namespace App\Http\Controllers;

use App\Models\Yacht;
use App\Models\YachtLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YachtLikeController extends Controller
{
    /**
     * Toggle like/unlike yacht
     */
    public function toggle(Request $request, $yachtId)
    {
        $user = Auth::user();
        $yacht = Yacht::findOrFail($yachtId);

        // Check apakah sudah like
        $existingLike = YachtLike::where('user_id', $user->id)
                                    ->where('yacht_id', $yachtId)
                                    ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
            $message = 'Yacht removed from your favorites';
        } else {
            // Like
            YachtLike::create([
                'user_id' => $user->id,
                'yacht_id' => $yachtId,
            ]);
            $liked = true;
            $message = 'Yacht added to your favorites';
        }

        // Get total likes untuk yacht ini
        $totalLikes = YachtLike::where('yacht_id', $yachtId)->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'message' => $message,
            'total_likes' => $totalLikes,
        ]);
    }
}
