<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Home page
Route::get('/', function () {
    return view('pages.homepage');
})->name('home');

// lista libri
Route::get('/books', function () {
    $books = DB::select('SELECT books.id, books.title, authors.name AS author, books.publication_year, books.available FROM books JOIN authors ON books.author_id = authors.id');
    return view('pages.books.index', ['books' => $books]);
});

// form libro
Route::get('/books/createbook', function () {
    return view('pages.books.createBook');
})->name('book.create');

// libro singolo
Route::get('/books/{id}', function ($id) {
    $book = DB::select('SELECT books.*, authors.name AS author FROM books JOIN authors ON books.author_id = authors.id WHERE books.id = ?', [$id]);
    $loans = DB::select('SELECT * FROM loans WHERE book_id = ?', [$id]);
    return view('pages.books.show', ['book' => $book[0], 'loans' => $loans]);
});

// autori
Route::get('/authors', function () {
    $authors = DB::select('SELECT * FROM authors');
    return view('pages.authors', ['authors' => $authors]);
});

// prestiti
Route::get('/loans', function () {
    $loans = DB::select('SELECT loans.*, books.title FROM loans JOIN books ON loans.book_id = books.id');
    return view('pages.loans', ['loans' => $loans]);
});

// inserimento libro
Route::post('/books/store', function (Request $request) {
    // se va a buon fine tutto parte altrimenti non inserisce niente
    // DB::beginTransaction();

    //se esiste non fa niente altrimenti lo crea
    $author = DB::table('authors')->where('name', $request->name)->first();

    if (!$author) {
        $authorId = DB::table('authors')->insertGetId(['name' => $request->name]);
    } else {
        $authorId = $author->id;
    }

    DB::table('books')->insert([
        'title' => $request->title,
        'author_id' => $authorId,
        'publication_year' => $request->publication_year
    ]);

    // Se tutto va bene commetti fa partite il tutto
    // DB::commit();


    return redirect()->route('home')->with('success', 'Libro e autore salvati con successo!');
})->name('books.store');

Route::post('/user', function (Request $request) {
    DB::table('users')->insert([
        "name" => $request->name,
        "email" => $request->email,
        "password" => $request->password
    ]);
    return redirect()->route('home');
})->name('users.store');
