<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('authors', [AuthorController::class, 'index']);
Route::get('/authors/{author}', [AuthorController::class, 'show']); // Show details of a specific author

Route::get('authors/{author}/books', [AuthorController::class, 'authorBooks']);

Route::post('authors/create', [AuthorController::class, 'store']);

Route::put('/authors/{author}', [AuthorController::class, 'update']); // Update an author
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']); // Delete an author



// Books
Route::get('books', [BookController::class, 'index']); // List all books
Route::get('books/{book}', [BookController::class, 'show']); // Show details of a specific book
Route::post('books/create', [BookController::class, 'store']); // Create a new book
Route::put('/books/{book}', [BookController::class, 'update']); // Update a book
Route::delete('/books/{book}', [BookController::class, 'destroy']); // Delete a book