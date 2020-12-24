<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsTweet</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <meta name="author" content="Amir Maso'ud Mehrabian">
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="{{ 'styles/main.css' }}" rel="stylesheet">

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" ></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body class="bg-white">

    <!-- Top Bar Nav -->
    <nav class="w-full">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between shadow-lg rounded-lg m-8 py-4 text-blue-800">

                <ul class="flex items-center justify-between font-bold text-sm no-underline">
                    <li><h1 class="hover:text-gray-700 px-4">اینستوییت</h1></li>
                </ul>

            <div class="flex items-center text-lg no-underline pr-6">
                <a class="pl-6 hover:text-gray-700" href="https://twitter.com/AmirMehrabian">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto  max-w-3xl">
    @if ($errors->any())
        <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <p>لینکی که وارد کردید معتبر نیست</p>
                {{-- <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                </span> --}}
        </div>
    @endif
    
        <div class="flex flex-col items-center py-12">
            <h1 class="font-bold text-gray-800 hover:text-gray-700 text-2xl">
                لینک توییت را وارد کنید و قالب استوری برای اینستاگرام تحویل بگیرید
            </h1>
            {!! Form::open(['route' => 'createStory', 'method' => 'post', 'class' => 'w-full']) !!}

                <div class="flex flex-reverse items-center py-2 m-2">
                    @csrf
                    {!! Form::text('tweet', null, ['aria-label' => 'لینک توییت', 'placeholder' => 'لینک توییت', 'class' => 'shadow rounded-lg appearance-none bg-transparent border-none w-full text-gray-700 ml-3 py-1 px-2 leading-tight focus:outline-none h-12']) !!}
                    {!! Form::submit('تولید قالب', ['class' => 'flex-shrink-0 bg-blue-500 hover:bg-blue-600 text-sm text-white py-1 px-4 rounded-lg h-12']) !!}    

                </div>
            {!! Form::close() !!}
            </div>
    </header>

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center mx-auto  max-w-3xl">
        
            <div class="flex flex-wrap w-full justify-cetner">
                <div class="w-2/5 items-center mx-auto">
                    <div class="text-gray-700 text-center flex flex-col">
                    @if (!empty($fileName))
                    <img src="{{ asset("images/tweets/$fileName") }}" alt="" class="mx-auto rounded-lg border border-gray-400">
                    <a href={{ asset("images/tweets/$fileName") }} class="px-3 py-2 rounded border mx-auto mt-2 bg-blue-400 text-white hover:text-blue-400 hover:bg-white">دانلود</a>
                    @endif
                        {{-- <img src="{{ asset('images/story.png') }}" alt="" class="mx-auto"> --}}
                    </div>
                </div>
            </div>


        </section>


    </div>



</body>

</html>