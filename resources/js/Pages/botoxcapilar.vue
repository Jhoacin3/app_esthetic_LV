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

                    <div class="flex mt-8 items-center justify-center">
                        <!-- Imagen grande a la derecha -->
                        <div class="w-1/3  rounded-full overflow-hidden  mx-10 ">
                            <img src="@/img/botox-capilar.webp" alt="Descripción de la imagen" class="w-full h-auto" />
                        </div>

                        <!-- Descripción a la izquierda dentro de un cuadro con bordes difuminados -->
                        <div class="w-1/2 px-10 p-4 rounded-lg shadow-lg">
                            <!-- Título "Efecto rímel" -->
                            <h2 class="text-2xl md:text-4xl font-bold mb-2">Botox Capilar</h2>
          <!-- Precio (Ejemplo: $29.99) -->
          <p class="text-lg md:text-xl font-medium text-gray-600 mb-4">$29.99</p>
          <!-- Descripción -->
          <p class="text-base md:text-lg font-medium text-gray-800">
            El botox capilar es un tratamiento cosmético para el cabello que utiliza ingredientes como colágeno y queratina para hidratar, reparar y rejuvenecer el cabello. Aunque se llama "botox", no contiene toxina botulínica. Este tratamiento busca reducir el frizz, restaurar la salud del cabello y mejorar su apariencia, dejándolo más suave, brillante y manejable.
          </p>

                            <div class="flex mt-4 space-x-4">
                                <a href='/agendas-cliente' class="bg-blue-500 text-white mt-5 px-4 py-2 rounded-md shadow-md hover:shadow-lg"
                                    >
                                    Agendar Cita
                                </a>
                            </div>
                        </div>
                    </div>
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
