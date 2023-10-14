<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Firehouse Tattoo Puerto Vallarta</title>

        {{-- SEO --}}
        <!-- Meta Description -->
        <meta name="description" content="Welcome to Firehouse Tattoo in Puerto Vallarta, where artistry meets passion! Carlos Munguía, with 8 years of tattoo experience and a focus on vibrant colors and intricate micro-realism, brings your dream tattoo to life. Descubre tatuajes de calidad y diseños surrealistas en nuestro estudio de tatuajes en Puerto Vallarta.">
        
        <!-- Meta Keywords (English and Spanish) -->
        <meta name="keywords" content="Tattoo shop Puerto Vallarta, Tattoo artist Carlos Munguía, Micro-realism tattoos, Colorful tattoos, Surrealistic designs, Puerto Vallarta tattoo studio, Tattoo artistry, Puerto Vallarta ink, Firehouse Tattoo Puerto Vallarta, Tattoo studio in Jalisco, Estudio de tatuajes Puerto Vallarta, Tatuador Carlos Munguía, Tatuajes de micro realismo, Tatuajes coloridos, Diseños surrealistas, Estudio de tatuajes en Puerto Vallarta, Arte del tatuaje, Tinta en Puerto Vallarta, Estudio de tatuajes en Jalisco">
        
        <!-- Author -->
        <meta name="author" content="Carlos Munguía">
        
        <!-- Robots Meta Tag (To control indexing and following) -->
        <meta name="robots" content="index, follow">

        <!-- Canonical URL (If necessary, to specify the preferred version of a page) -->
        <link rel="canonical" href="https://www.firehousetattoo.mx">
        
        <!-- Open Graph Meta Tags (For social media sharing) -->
        <meta property="og:title" content="Firehouse Tattoo Puerto Vallarta">
        <meta property="og:description" content="Welcome to Firehouse Tattoo in Puerto Vallarta, where artistry meets passion! Carlos Munguía, with 8 years of tattoo experience and a focus on vibrant colors and intricate micro-realism, brings your dream tattoo to life. Descubre tatuajes de calidad y diseños surrealistas en nuestro estudio de tatuajes en Puerto Vallarta.">
        <meta property="og:image" content="{{asset('img/firehouse-logo.jpg')}}">
        <meta property="og:url" content="https://www.firehousetattoo.mx">
        <meta property="og:type" content="website">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        
        <!-- MDB -->
        <link rel="stylesheet" href="css/mdb.min.css" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-77FBRQ9HBW"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-77FBRQ9HBW');
        </script>
    </head>
<body>
    @include('nav.nav')
    
    <main class="vh-100- container-">
        <div id="app">
            @yield('content')
        </div>
    </main>

    @include('footer.footer')
            
          
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <script>
		new WOW().init();
	</script>
</body>
</html>
