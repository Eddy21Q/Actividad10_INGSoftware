@extends('layouts.app')

@section('content')
    <h1>Crear animal</h1>
    <p>Raza seleccionada: <strong>{{ $raza->nombre() }}</strong></p>
    <p>{{ $raza->descripcion() }}</p>
@endsection

