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

          <a class="mx-2 font-bold" href="{{ route('dashboard') }}">Dashboard</a>
        </nav>
      
      </header>
    
<div class="mt-24 mx-auto max-w-screen-xl px-6">
    <div class="md:flex rounded-lg py-6 px-4 border-2 border-r-8 border-b-8 rounded-br-none mb-10 bg-indigo-100 border-indigo-800">
        <div class="text-center md:text-left">
            <h2 class="text-3xl">This page is under constaction!</h2>
           
        </div>
    </div>
    <a href="{{ url('/') }}" class="btn btn-outline btn-info">Go Back</a>
</div>
  
  
</body>
</html>