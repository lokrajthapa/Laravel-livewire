<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    
    <section class="bg-gray-50 dark:bg-gray-900">

        <div class="items-center justify-center  mx-auto md:h-screen lg:py-0">
            
           <livewire:item-list>     
        </div>
        </div>
    </section>

    

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
