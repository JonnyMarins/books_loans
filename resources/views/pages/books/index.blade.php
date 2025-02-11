@extends('layouts.app')

@section('title', 'Book List')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Books</h1>
    <div class="space-y-4">
        @foreach ($books as $book)
            <div class="p-4 border rounded-lg">
                <div class="font-semibold">Title: <span class="text-blue-500">{{ $book->title }}</span></div>
                <div>Author: {{ $book->author }}</div>
                <div>Year: {{ $book->publication_year }}</div>
                <div>Status: {{ $book->available ? 'Available' : 'Not Available' }}</div>
                <a href="/books/{{ $book->id }}" class="text-blue-500 mt-2 inline-block">Details</a>
            </div>
        @endforeach
    </div>
@endsection
