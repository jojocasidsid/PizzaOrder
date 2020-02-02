<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Domino Pizza||Website</title>

    <!-- Scripts -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />

    
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top static-top">
        <div class="container">
                <a class="navbar-brand" href="#">
                        <img src="/img/domino.png" alt="" width="30px">
                        Domino's Pizza
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    
                      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto">
                  
                  
                   
                  
                        </ul>
              
                      </div>
        </div>
      
      </nav>
      
 
        <main class="">
            @yield('content')
        </main>
 



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    

        @yield('script')

</body>
</html>
