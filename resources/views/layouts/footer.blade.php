<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<footer class="bg-img">
    <div class="footer-col col-lg-1 col-md-1 col-sm-6 col-xs-12">
        <img id="logo-ft" src="{{ asset('imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg') }}" alt="Logo">
        <div class="logo-col">
            <div class="social-icons">
                <a href="#"><img src="{{ asset('imagenes/facebook.png') }}" alt="logo FB"></a>
                <a href="#"><img src="{{ asset('imagenes/gorjeo.png') }}" alt="logo TW"></a>
                <a href="#"><img src="{{ asset('imagenes/instagram.png') }}" alt="Logo IG"></a>
            </div>
        </div>
    </div>
    <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
        <h3>¿Por qué elegirnos?</h3>
        <p>How it works</p>
        <br>
        <p>Featured</p>
        <br>
        <p>Partnership</p>
    </div>
    <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
        <h3>Contactos</h3>
        <p class="font-email">Correo: laarboledafincacalarca@gmail.com</p>
        <br>
        <p>Teléfono: +57 7383738</p>
        <br>
        <p>Celular: 312 526 77 26</p>
    </div>
    <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
        <h3>Danos tu opinión</h3>

        <button class="contactButton" onclick="redirectToCreate()"> PQRS</button>
    </div>
    <div class="footer_copyright">
        <div class="copy">©2023 Todos los derechos reservados</div>
        <div class="copy">Diseñado por ADSI - 205 SENA</div>
        <div class="copy">Terminos y Condiciones</div>
    </div>
</footer>
<div class="bg-ft"></div>


<script>

function redirectToCreate(){
    window.location.href = "{{ Route('pqrs.create') }}";
}

</script>
