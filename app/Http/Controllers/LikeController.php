<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, Ebook $ebook)
    {
        $user = auth()->user();
    
        // Check if the user has already liked the eBook
        $existingLike = Like::where('user_id', $user->id)->where('ebook_id', $ebook->id)->first();
    
        if ($existingLike) {
            // If the user has already liked the eBook, unlike it
            $existingLike->delete();
            $message = 'You have unliked the eBook.';
        } else {
            // If the user has not liked the eBook, create a new like
            $like = new Like();
            $like->user_id = $user->id;
            $like->ebook_id = $ebook->id;
            $like->save();
            $message = 'You have liked the eBook.';
        }
    
        return redirect()->route('ebooks.showX', $ebook)->with('success', $message);
    }
    
}

