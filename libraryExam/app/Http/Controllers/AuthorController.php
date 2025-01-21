<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // List all authors
    public function index()
    {
        $authors = Authors::all();
        return response()->json($authors);
    }

    // Show details of a specific author
    public function show(Authors $author)
    {
        return response()->json($author);
    }

    public function authorBooks($authorId)
    {
        $author = Authors::with('books')->find($authorId);

        if (!$author) {
            return response()->json(['message' => 'Author not found.'], 404);
        }

        return response()->json([
            'author' => $author->name,
            'books' => $author->books,
        ]);
        /*
        $author = Authors::find($authorId);

        if (!$author) {
            return response()->json(['message' => 'Author not found.'], 404);
        }
    
        // Retrieve books via the relationship
        $books = $author->books;
    
        return response()->json([
            'author' => $author->name,
            'books' => $books,
        ]);
        */
    }


    // Create a new author
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'genre' => 'required|string|max:255',
        ]);

        $author = Authors::create($validated);

        return response()->json([
            'message' => 'Author created successfully.',
            'author' => $author,
        ], 201);
    }

    // Update an existing author
    public function update(Request $request, Authors $author)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:0',
            'genre' => 'sometimes|string|max:255',
        ]);

        $author->update($validated);

        return response()->json([
            'message' => 'Author updated successfully.',
            'author' => $author,
        ]);
    }

    // Delete an author
    public function destroy(Authors $author)
    {
        $author->delete();

        return response()->json(['message' => 'Author deleted successfully.']);
    }
}
