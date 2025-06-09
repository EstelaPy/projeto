<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <main >
        <div class="sidebar">
        
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"> <a href="{{route('projeto.index')}}" class="nav-link {{ Route::is('projeto.index') ? 'active' : 'text-white' }}"><i class="fa-regular fa-file menu-icons"></i>Projetos</a></li>
                <li> <a href="{{route('tarefa.index')}}" class="nav-link {{ Route::is('tarefa.index') ? 'active' : 'text-white' }}"><i class="fa-regular fa-calendar menu-icons"></i>Tarefas</a> </li>
                <li> <a href="{{route('user.index')}}" class="nav-link {{ Route::is('user.index') ? 'active' : 'text-white' }}"><i class="fa-solid fa-gear menu-icons"></i>Configurações</a> </li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar bg-body-tertiary">
              <div class="container-fluid">
                    <a class="navbar-brand textTitle" href="#">
                         <img src="https://cdn-teams-slug.flaticon.com/stickers.jpg" alt="Logo" class="d-inline-block align-text-top imgTitle">
                        Task Manager
                    </a>
              </div>
            </nav>
            <div>
                @yield("content")
            </div>
        </div>
    </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
@stack('scripts')

</body>
</html>