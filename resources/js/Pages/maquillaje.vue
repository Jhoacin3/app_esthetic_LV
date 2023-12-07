<script setup>
import AuthenticatedLayoutCliente from '@/Layouts/AuthenticatedLayoutCliente.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
        <AuthenticatedLayoutCliente>
            <div class="py-70">



                <div class="py-70">
                    <center>
                        <div class="text-gray-900 font-extrabold italic text-7xl"
                            style="font-family: 'Brush Script MT', cursive;">
                            Beauty Studio
                        </div>
                    </center>
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">Maquillaje</h2>
                    <!-- Precio (Ejemplo: $29.99) -->
                    <p class="text-lg md:texl font-medium text-gray-600 mb-4">$29.99</p>
                     <!-- Descripción -->
                    <p class="text-base md:text-lg font-medium text-gray-800">
                        El maquillaje profesional es una técnica que implica la aplicación de productos cosméticos para realzar y embellecer el rostro. Se realiza con habilidades específicas, teniendo en cuenta la forma facial, colores y características individuales. Incluye técnicas como contorno, iluminación, sombreado y aplicación precisa de productos para lograr un aspecto natural o más dramático, dependiendo de la ocasión o preferencia. Los maquilladores profesionales utilizan productos de alta calidad y técnicas avanzadas para crear looks personalizados y duraderos.
                    </p>
                   
                </div>

            </div>
        </AuthenticatedLayoutCliente>
    </div>
</template>
<style>
.background-container {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('@/img/01.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

section {
    background-color: #9fe9ed;
    /* Cambia el color de fondo según tu preferencia */
    padding: 30px;
    /* Ajusta el espaciado interno según tu preferencia */
    text-align: center;
    /* Centra el texto horizontalmente */
    border-radius: 9px;
    /* Redondea las esquinas según tu preferencia */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* Agrega una sombra */
    margin: 100px;
    /* Agrega un margen exterior según tu preferencia */

}

@media (min-width: 640px) {

    section {
        margin: 20px;
    }
}

@media (min-width: 768px) {

    section {
        margin: 100px;
    }
}

h1 {
    color: #151313;
    /* Cambia el color del texto según tu preferencia */
    font-family: 'Brush Script MT', cursive;
    font-size: 2em;
    /* Ajusta el tamaño de las letras según tu preferencia */
}

h2 {
    color: #171111;
    /* Cambia el color del texto según tu preferencia */
}

p {
    color: #0a0202;
    /* Cambia el color del texto según tu preferencia */
    margin-bottom: 10px;
    /* Ajusta el margen inferior según tu preferencia */
}</style>
