@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">Articles de blog</h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 px-5 block">
                {{session()->get('message')}}
            </p>
        </div>
    @endif

@if (Auth::check())

    <div class="pt-15 w-4/5 m-auto">
        <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs px-5 font-extrabold py-3 rounded-3xl">
            Crée Un post
        </a>
    </div>

@endif
@foreach ($posts as $post)
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div class="">
        <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{ $post->title}}
        </h2>
        <span class="text-gray-500">
            Par <span class="font-bold italic text-gray-800"> {{ $post->user->name}}</span>
        </span>, Crée le {{date('d-m-y h:i:s')}}

        <p class="text-xl text-gray-700 pt-8 pb-10 leading font-light">
            {{ $post->description }}
        </p>
        <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Continue de lire
        </a>

        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <span class="float-right">
                <a href="/blog/{{ $post->slug }}/edit"
                    class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                    Edit
                </a>

            </span>
        @endif
    </div>
</div>
@endforeach



@endsection
