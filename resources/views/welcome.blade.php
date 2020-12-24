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

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">اینستوییت</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto  max-w-3xl">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 hover:text-gray-700 text-2xl" href="#">
                لینک توییت را وارد کنید و قالب اینستاگرام تحویل بگیرید
            </a>
            {!! Form::open(['url' => '/create-story', 'method' => 'post', 'class' => 'w-full']) !!}

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
                    <img src="{{ asset("images/tweets/$fileName") }}" alt="" class="mx-auto rounded border">
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