@extends('welcome')

@section('content')
    @component('components.navbar', ['indexActive' => 'active'])
    @endcomponent

    <div class="d-flex flex-column mt-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 ">
                <h1>Modifier l'ancien keyword</h1>
            </div>

            <div class="mt-8">
                <form action="{{ route('keyword.update', ['keyword' => $keyword['id']]) }}" method="post"
                    class="form bg-white p-6 border-1">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 keyword_form">
                        {{-- <label for="keyword-text" class="form-label text-sm">keyword-text</label> --}}
                        <div class="d-flex">
                            <input id="keyword-text" type="text" name="keyword-text" value="{{ $keyword['word'] }}"
                                class="form-control">
                            @error('keyword-text')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-success ml-4 ms-3">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- myKeyword --}}

        <div class="d-flex flex-column mt-4">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8  mt-4 my_keyword_div">
                <div class="flex justify-center pt-8  text-center ">
                    <h1>Keywords</h1>
                </div>

                <div class="mt-8">
                    @if (count($motCle) > 0)
                        <ul>
                            @foreach ($motCle as $keyword)
                                <div class="d-flex align-items-center px-3 py-2 my-2 keyword_div justify-content-between">
                                    <li><a href="{{'#' /*route('keyword.show', [$keyword['id']]) */}}"> {{ $keyword['word'] }} </a>
                                    </li>
                                    <a class="btn btn-primary me-0" href="{{ route('keyword.edit', $keyword['id']) }}">Edit</a>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <h4 class="mt-3  lh-base">il n'y a rien à montrer.<br>
                            merci d'ajouter nouveau keyword
                        </h4>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
