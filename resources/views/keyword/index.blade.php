@extends('welcome')

@section('content')
    @component('components.navbar', ['indexActive' => 'active'])
    @endcomponent

    <div class="d-flex flex-column mt-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8  mt-4 my_keyword_div">
            <div class="flex justify-center pt-8 text-center">
                <h1> Keywords</h1>
            </div>

            <div class="mt-8">
                @if (count($keywords) > 0)
                    <ul>
                        @foreach ($keywords as $keyword)
                            <div class="d-flex align-items-center px-3 py-2 my-2 keyword_div justify-content-between">
                                <div>
                                    <li><a href="{{ route('keyword.show', [$keyword['id']]) }}"> {{ $keyword['word'] }} </a>
                                    </li>
                                </div>
                                <div class="d-flex">
                                    <a class="btn btn-primary me-2 "
                                        href="{{ route('keyword.edit', $keyword['id']) }}">Modifier</a>
                                    {{-- Delete Btn --}}
                                    <form action="{{ route('keyword.destroy', $keyword['id'])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger me-0" type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <h4 class="mt-3 text-center lh-base">il n'y a rien à montrer.<br>
                        merci d'ajouter nouveau keyword
                    </h4>
                @endif
            </div>

        </div>
    </div>

@endsection
