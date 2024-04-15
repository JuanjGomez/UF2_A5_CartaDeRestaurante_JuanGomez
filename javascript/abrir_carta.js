const menu = document.getElementById('menu');
const navbar = document.querySelector('.navbar');
const carousel = document.getElementById('carouselExampleCaptions');
const boots = document.querySelectorAll('.boots');
const contenidoGeneral = document.getElementById('general');
let clickCount = 0;

// Ocultar el contenido general al cargar la página
contenidoGeneral.style.display = 'none';

// Ocultar todas las cartas al cargar la página
boots.forEach(card => {
    card.style.display = 'none';
});

menu.addEventListener('click', function() {
    clickCount++; // Incrementar el contador de clics
    if (clickCount === 5) {
        clickCount = 0;
        // Toggle (alternar) la clase 'open' en el menú
        this.classList.toggle('open');

        // Cambiar la visibilidad del menú y el navbar
        if (this.classList.contains('open')) {
            navbar.style.display = 'block';
            carousel.style.display = 'block'; // Mostrar el carousel cuando se abre el menú
            contenidoGeneral.style.display = 'block';

            // Mostrar todas las cartas cuando se abre el menú
            boots.forEach(card => {
                card.style.display = 'block';
            });
        } else {
            navbar.style.display = 'none';
            carousel.style.display = 'none'; // Ocultar el carousel cuando se cierra el menú
            contenidoGeneral.style.display = 'none';

            // Ocultar todas las cartas cuando se cierra el menú
            boots.forEach(card => {
                card.style.display = 'none';
            });
        }
    }
});