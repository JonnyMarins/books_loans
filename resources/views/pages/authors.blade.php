@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Authors</h1>
    <div class="space-y-4">
        @foreach ($authors as $author)
            <div class="p-4 border rounded-lg">
                <div class="font-semibold">Name:</div>
                <span>{{ $author->name }}</span>
                <div class="font-semibold">Birth Year:</div>
                <span>{{ $author->birth_year }}</span>
                <div class="font-semibold">Nationality:</div>
                <span>{{ $author->nationality }}</span>
            </div>
        @endforeach
    </div>
@endsection
