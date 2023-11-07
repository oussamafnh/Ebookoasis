<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Ebook $ebook)
    {
        // Validate the form data
        $request->validate([
            'content' => 'required|string',
        ]);
    
        // Create a new review instance
        $review = new Review();
        $review->review_text = $request->input('content');
        $review->ebook_id = $ebook->id;
        // Set the authenticated user ID as the reviewer
        $review->user_id = auth()->user()->id;
    
        // Save the review in the database
        $review->save();
    
        // Redirect back to the eBook details page
        return redirect()->route('ebooks.showX', $ebook)->with('success', 'Review added successfully.');
    }
    

    public function edit(Ebook $ebook, Review $review)
    {
        // Only allow editing the review if it belongs to the authenticated user
        if ($review->user_id !== auth()->user()->id) {
            return redirect()->route('ebooks.show', $ebook)->with('error', 'You are not authorized to edit this review.');
        }

        return view('reviews.edit', compact('ebook', 'review'));
    }

    public function update(Request $request, Ebook $ebook, Review $review)
    {
        // Only allow updating the review if it belongs to the authenticated user
        if ($review->user_id !== auth()->user()->id) {
            return redirect()->route('ebooks.show', $ebook)->with('error', 'You are not authorized to edit this review.');
        }

        // Validate the form data
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review_text' => 'nullable|string',
        ]);

        // Update the review with the new values
        $review->rating = $request->input('rating');
        $review->review_text = $request->input('review_text');

        // Save the updated review in the database
        $review->save();

        // Redirect back to the eBook details page
        return redirect()->route('ebooks.show', $ebook)->with('success', 'Review updated successfully.');
    }

    public function destroy(Ebook $ebook, Review $review)
    {
        // Only allow deleting the review if it belongs to the authenticated user
        if ($review->user_id !== auth()->user()->id) {
            return redirect()->route('ebooks.show', $ebook)->with('error', 'You are not authorized to delete this review.');
        }

        // Delete the review from the database
        $review->delete();

        // Redirect back to the eBook details page
        return redirect()->route('ebooks.show', $ebook)->with('success', 'Review deleted successfully.');
    }
}
