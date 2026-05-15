@extends('layouts.app')

@section('content')
    <h1>{{ $raza->nombre() }}</h1>
    <p>{{ $raza->descripcion() }}</p>
@endsection

