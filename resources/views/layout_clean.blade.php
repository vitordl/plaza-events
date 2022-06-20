<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">   

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto:ital,wght@0,100;0,400;1,100;1,300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Noto+Sans&family=Roboto:ital,wght@0,100;0,400;1,100;1,300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kdam+Thmor+Pro&family=Montserrat:wght@100&family=Noto+Sans&family=Poppins:wght@100&family=Roboto:ital,wght@0,100;0,400;1,100;1,300&display=swap" rel="stylesheet">


    


    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbar">
            <a href="" class="navbar-brand"><ion-icon name="chevron-back-outline"></ion-icon> Plaza <ion-icon name="chevron-forward-outline"></ion-icon></a>
        </div>

        <ul class="navbar-nav">

            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Eventos</a></li>
            <li class="nav-item"><a href="{{ route('new_event') }}" class="nav-link">Criar Evento</a></li>
            @guest
            <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
            <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
            @endguest

            @auth
            <form action="/logout" method="post">
                @csrf
                <li class="nav-item"><a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>           
            </form>
            @endauth
        </ul>

        {{-- {{ route('login')}}   {{ route('register')}}   --}}
    </nav>


    @yield('conteudo_show')
    
    
    


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>