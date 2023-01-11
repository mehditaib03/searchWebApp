@extends('welcome')

@section('content')
<div class="container">
    <div class="grp1">
            {{-- Ajouter --}}
            <a class="ajouter_btn" href="{{ route('keyword.create') }}" rel="noopener noreferrer">Ajouter</a>
            {{-- Rechercher --}}
            <a class="rechercher_btn" href="{{ route('find') }}" rel="noopener noreferrer">Rechercher</a>
            {{-- Keyword --}}
            <a class="rechercher_btn" href="{{ route('keyword.index') }}" rel="noopener noreferrer">Keyword</a>
        </div>

    </div>
@endsection
