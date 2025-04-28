@extends('layout.app')

@section('title', 'Home') 
@section('page_title', 'Selamat datang di Berita Batam')

@section('content') 
    @include('components.card', [ 
        'imgsrc' => 'images/gonggong.jpg', 
        'title' => 'Gonggong lezat mang reza kecap', 
        'description' => 'Kuliner unik satu ini wajib dicoba untuk menguji ketahanan mental.' 
    ]) 
@endsection