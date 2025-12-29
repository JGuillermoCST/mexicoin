<script>
    const openCart = document.getElementById('openCart');
    const closeCart = document.getElementById('closeCart');
    const cartPanel = document.getElementById('cartPanel');
    const cartOverlay = document.getElementById('cartOverlay');

    openCart.addEventListener('click', () => {
        cartPanel.classList.remove('translate-x-full');
        cartOverlay.classList.remove('hidden');
    });

    closeCart.addEventListener('click', () => {
        cartPanel.classList.add('translate-x-full');
        cartOverlay.classList.add('hidden');
    });

    cartOverlay.addEventListener('click', () => {
        cartPanel.classList.add('translate-x-full');
        cartOverlay.classList.add('hidden');
    });
    </script>

    <script>
    const toggleMenu = document.getElementById('toggleMenu');
    const menu = document.getElementById('menu');

    toggleMenu.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>  

<script>
    // Ocultar alerta de error después de 5 segundos
    setTimeout(function() {
        var errAlert = document.getElementById('errAlert');
        if (errAlert) {
            errAlert.style.display = 'none';
        }
    }, 5000);
</script>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

<script src="./node_modules/preline/dist/preline.js"></script>

<script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
