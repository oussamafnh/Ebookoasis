<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();

        return view('ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        return view('dashboard.ebookcreate');
    }

    public function store(Request $request)
    {
        Ebook::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'cover_image' => $request->input('cover_image'),
            'file_path' => $request->input('file_path'),
            'published_at' => $request->input('published_at'),
        ]);

        return redirect()->route('dashboard.ebooks')->with('success', 'Ebook added successfully.');
    }




    public function show(Ebook $ebook)
    {
        $likes = Like::where('ebook_id', $ebook->id)->count();
        $comments = Review::where('ebook_id', $ebook->id)->get();
        if (auth()->user()) {
            $liketrue =  Like::where('ebook_id', $ebook->id)->where('user_id', auth()->user()->id)->get();
        } else {
            $liketrue = false;
        }
        // dd( $liketrue);
        return view('ebooks.show', compact('ebook', 'likes', 'comments', 'liketrue'));
    }

    public function edit(Ebook $ebook)
    {
        return view('ebooks.edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $ebook->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'cover_image' => $request->input('cover_image'),
            'file_path' => $request->input('file_path'),
            'published_at' => $request->input('published_at'),
        ]);
    
        return redirect()->route('dashboard.ebooks')->with('success', 'Ebook updated successfully.');
    }
    


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query using the "title" or "author" fields
        $ebooks = Ebook::where('title', 'LIKE', "%$query%")
            ->orWhere('author', 'LIKE', "%$query%")
            ->get();

        // Pass the search results to the view
        return view('ebooks.search', ['ebooks' => $ebooks, 'query' => $query]);
    }

    public function destroy(Ebook $ebook)
    {
        // Delete the associated likes
        $ebook->likes()->delete();

        // Delete the associated reviews
        $ebook->reviews()->delete();

        // Delete the book
        $ebook->delete();

        return redirect()->route('dashboard.index')->with('success', 'Ebook deleted successfully.');
    }
}
