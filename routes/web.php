<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.homepage');
})->name('home');

Route::get('/books', function () {
    $books = DB::select('SELECT books.id, books.title, authors.name AS author, books.publication_year, books.available FROM books JOIN authors ON books.author_id = authors.id');
    return view('pages.books.index', ['books' => $books]);
});

Route::get('/books/{id}', function ($id) {
    $book = DB::select('SELECT books.*, authors.name AS author FROM books JOIN authors ON books.author_id = authors.id WHERE books.id = ?', [$id]);
    $loans = DB::select('SELECT * FROM loans WHERE book_id = ?', [$id]);
    return view('pages.books.show', ['book' => $book[0], 'loans' => $loans]);
});

Route::get('/authors', function () {
    $authors = DB::select('SELECT * FROM authors');
    return view('pages.authors', ['authors' => $authors]);
});

Route::get('/loans', function () {
    $loans = DB::select('SELECT loans.*, books.title FROM loans JOIN books ON loans.book_id = books.id');
    return view('pages.loans', ['loans' => $loans]);
});
