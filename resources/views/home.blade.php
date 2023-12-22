<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-full h-48 pt-5 relative px-7 bg-blue-600 text-white flex-wrap flex justify-between items-center pb-24">
        <h1 id="logo" class="text-2xl font-bold">MyBlogHub</h1>
        <nav class="uppercase">
          <a class="mx-2  font-bold" href="{{ url('/') }}">Home</a>
          <a class="mx-2  font-bold" href="{{ url('/about') }}">About</a>

          @if(auth()->user())
          <a class="mx-2 font-bold" href="{{ route('dashboard') }}">Dashboard</a>
          @else
          <a class="mx-2 font-bold" href="{{ route('login') }}">Login</a>
        @endif

        </nav>
      
      </header>
    
@foreach ($articles as $article)
<div class="mt-24 mx-auto max-w-screen-xl px-6">
    <div class="md:flex rounded-lg py-6 px-4 border-2 border-r-8 border-b-8 rounded-br-none mb-10 bg-indigo-100 border-indigo-800">
        <img alt="Boiler plate" src="{{ asset($article->image) }}" class="h-56 w-96 border border-gray-50 rounded rounded-lg mx-auto md:mr-6">
        <div class="text-center md:text-left">
            <h2 class="text-3xl">{{ $article->title }}</h2>
            <span class="text-gray-500 py-1">{{ $article->created_at }}</span>
            <p class="text-lg">{!! $article->description !!}</p>
        </div>
    </div>
    <a href="{{ route('article.show', $article->id) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Read More</a>
</div>
@endforeach
  
  
</body>
</html>