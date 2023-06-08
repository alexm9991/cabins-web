<nav>
    <div class="nav-logo">
        <img src="imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg" alt="Logo">
    </div>

    <button id="shopin-car-btn" onclick="redirectShoppingCar()" ><img src="imagenes/carrito-de-compras.png" alt="Cesta"></button>

    <button id="burger-btn"><img src="imagenes/menu.png" alt="Menú"></button>
    <div class="nav-cont">
        <div class="nav-links">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav center">
                    <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="#"><span>Inicio</span></a></li>
                    <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="{{ route('services.servicesviews') }}"><span>Servicios</span></a></li>
                    <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="{{ route('products.productsviews') }}"><span>Productos</span></a></li>

                    <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="{{ url('/contact') }}"><span>Contáctanos</span></a></li>

                </ul>
            </div>
        </div>

        <button id="register-btn" onclick="register()" >Registrarse</a></button>
        <button id="login-btn" onclick="login()" >Iniciar sesión</button>

        <button id="profile-btn" onclick="redirectUserInfo()" >Mi cuenta<img class="subM-arrow" src="imagenes/down-arrow.png" alt=""></a></button>
        <button id="log-out-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out<img class="logout-icon" src="imagenes/logout.png" alt="Logout"></button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>
</nav>

<script>

function redirectUserInfo(){
    window.location.href = "{{ url('user-info') }}";
}

function redirectShoppingCar(){
    window.location.href = "{{ url('shoppingCar') }}";
}

function register(){
    window.location.href = "{{ url('register') }}";
}

function login(){
    window.location.href = "{{ url('login') }}";
}

</script>
