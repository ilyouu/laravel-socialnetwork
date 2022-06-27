@extends('webview.trangchu.index')

@section('content')
    @switch($route)
        @case('trang-chu')
            {{-- @include('app.app.carousel')--}}
            @include('webview.trangchu.body') 
            @break

            
        @default
            {{-- @include('app.app.body') --}}
            
    @endswitch
    
@endsection