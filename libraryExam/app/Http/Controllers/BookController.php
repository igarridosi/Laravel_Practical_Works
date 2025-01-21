<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    // Show details of a specific book
    public function show(Books $book)
    {
        return response()->json($book);
    }

    // Create a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Books::create($validated);

        return response()->json([
            'message' => 'Book created successfully.',
            'book' => $book,
        ], 201);
    }

    // Update an existing book
    public function update(Request $request, Books $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'release_date' => 'sometimes|date',
            'author_id' => 'sometimes|exists:authors,id',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully.',
            'book' => $book,
        ]);
    }

    // Delete a book
    public function destroy(Books $book)
    {
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully.']);
    }
}
