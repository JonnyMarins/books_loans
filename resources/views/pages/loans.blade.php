@extends('layouts.app')

@section('title', 'Loan List')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Loans</h1>
    <div class="space-y-4">
        @foreach ($loans as $loan)
            <div class="p-4 border rounded-lg">
                <div class="font-semibold">Book Title:</div>
                <span>{{ $loan->title }}</span>
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
