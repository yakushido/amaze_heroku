@extends('layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\genre.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\genre.css') }}">
@endif
    
<div class="top_title">
    <h1>【 Menu 】</h1>
</div>

<div class="genres">   
    @foreach( $menus as $menu )
        @foreach( $genres as $genre )
            @if( $genre['id'] === $menu['genre_id'] )
                <a href="{{ $gender['id'] }}/genre/{{ $genre['id']  }}" class="genre">
                    <div>
                        <h2>{{ $genre['e-name'] }}</h2>
                        <h3>{{ $genre['j-name'] }}</h3>
                    </div>
                    <div>
                        <img src="/storage/img/amaze_logo2.jpeg" alt="">
                    </div>
                </a>
            @endif
        @endforeach
    @endforeach

</div>

<div class="back_button">
    <button type="button" onClick="history.back()">戻る</button>
</div>


@endsection