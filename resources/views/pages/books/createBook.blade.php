@extends('layouts.app')

@section('content')
    <form action="{{ route('books.store') }}" method="post" class="flex flex-col max-w-sm mx-auto gap-5">
        @csrf
        <label class="font-bold text-2xl">Inserisci libro</label>

        <!-- Titolo del libro -->
        <input class="border p-2 rounded-md" type="text" name="title" placeholder="Titolo" required>

        <!-- Autore -->
        <input class="border p-2 rounded-md" type="text" name="name" placeholder="Autore" required>

        <!-- Anno di pubblicazione -->
        <input
            class="border p-2 rounded-md appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
            type="number" name="publication_year" placeholder="Anno di pubblicazione" required>

        <button class="bg-blue-600 rounded-md py-2 px-4">Invio</button>
    </form>
@endsection
