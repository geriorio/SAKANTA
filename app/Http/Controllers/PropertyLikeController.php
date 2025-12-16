<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyLikeController extends Controller
{
    /**
     * Toggle like/unlike property
     */
    public function toggle(Request $request, $propertyId)
    {
        $user = Auth::user();
        $property = Property::findOrFail($propertyId);

        // Check apakah sudah like
        $existingLike = PropertyLike::where('user_id', $user->id)
                                    ->where('property_id', $propertyId)
                                    ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
            $message = 'Property removed from your favorites';
        } else {
            // Like
            PropertyLike::create([
                'user_id' => $user->id,
                'property_id' => $propertyId,
            ]);
            $liked = true;
            $message = 'Property added to your favorites';
        }

        // Get total likes untuk property ini
        $totalLikes = PropertyLike::where('property_id', $propertyId)->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'message' => $message,
            'total_likes' => $totalLikes,
        ]);
    }
}
