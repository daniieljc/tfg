console.log('%cJobSierra.com', 'color: #5E72E5; font-size: 25px; font-weight: bold;');

if (!window.matchMedia("(min-width: 480px)").matches) {
    $('.menu-movil').append("<li><a href='{{route('login')}}' class='current'>Iniciar Sesión</a></li>")
    $('.menu-movil').append('<li><a href="" class="current">Regístrate</a></li>')
}

