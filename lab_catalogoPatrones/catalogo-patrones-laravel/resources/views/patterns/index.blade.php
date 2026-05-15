@extends('layouts.app')

@section('content')
    <h1>Catalogo de Patrones</h1>

    <section class="pattern-list">
        @forelse ($patterns as $pattern)
            <article class="pattern-card">
                <h2>{{ $pattern->name }}</h2>
                <p><strong>Categoria:</strong> {{ $pattern->category }}</p>
                <p>{{ $pattern->intent }}</p>
            </article>
        @empty
            <p>No hay patrones registrados.</p>
        @endforelse
    </section>
@endsection

