@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">{{ $book->title }}</h1>
    <div class="mb-4">
        <div class="font-semibold">Author:</div>
        <span>{{ $book->author }}</span>
    </div>
    <div class="mb-4">
        <div class="font-semibold">Publication Year:</div>
        <span>{{ $book->publication_year }}</span>
    </div>
    <div class="mb-4">
        <div class="font-semibold">Availability:</div>
        <span>{{ $book->available ? 'Available' : 'Not Available' }}</span>
    </div>

    <h3 class="mt-6 font-semibold">Loans</h3>
    <div class="space-y-4">
        @foreach ($loans as $loan)
            <div class="p-4 border rounded-lg">
                <div class="font-semibold">Borrower:</div>
                <span>{{ $loan->borrower_name }}</span>
                <div class="font-semibold">Loan Date:</div>
                <span>{{ $loan->loan_date }}</span>
                <div class="font-semibold">Return Date:</div>
                <span>{{ $loan->return_date ?? 'Not returned' }}</span>
            </div>
        @endforeach
    </div>
@endsection
