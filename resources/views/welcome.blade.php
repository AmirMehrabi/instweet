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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
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
            <form class="w-full">
                <div class="flex flex-reverse items-center py-2 m-2">
                    <input class="shadow rounded-lg appearance-none bg-transparent border-none w-full text-gray-700 ml-3 py-1 px-2 leading-tight focus:outline-none h-12" type="text" placeholder="لینک توییت" aria-label="لینک توییت">
                    <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-600 text-sm text-white py-1 px-4 rounded-lg h-12" type="button">
                    تولید قالب
                  </button>
                </div>
            </form>
        </div>
    </header>

    <!-- Topic Nav -->
    <!-- <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology <i</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
            </div>
        </div>
    </nav> -->


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center mx-auto  max-w-3xl">
            <div class="flex flex-wrap w-full justify-between">
                <div class="w-2/5 items-center">
                    <div class="text-gray-700 text-center">
                        <img src="post.png" alt="" class="mx-auto">
                    </div>
                </div>
                <div class="w-2/5 items-center">
                    <div class="text-gray-700 text-center">
                        <img src="{{ asset('images/story.png') }}" alt="" class="mx-auto">
                    </div>
                </div>
            </div>


        </section>


    </div>



</body>

</html>