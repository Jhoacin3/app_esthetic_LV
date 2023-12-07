
<template>
    <div class="background-container">
        <AuthenticatedLayoutCliente>
            <div class="py-70">
                <div class="py-70">
                    <center>
                        <div class="text-gray-900 font-extrabold italic text-7xl"
                            style="font-family: 'Brush Script MT', cursive;">
                            Maquillajes
                        </div>
                    </center>
                    <div class="flex flex-col items-center justify-center mt-8 sm:flex-row sm:items-center sm:justify-between">
    <!-- Descripción y Agendar Cita -->
    <div class="w-full sm:w-1/2 px-10 p-4 rounded-lg shadow-lg mb-8 sm:mb-0">
        <div class="texto-nails">
            <p class="text-lg font-medium text-gray-800">
                En nuestra sección especializada en maquillaje, nos complace ofrecerte una experiencia única y personalizada para realzar tu belleza natural.<br><br>
            </p>
            <h1 class="text-xl font-bold mb-2">Servicios Exclusivos:</h1>
            <p class="text-lg font-medium text-gray-800">
                ° Maquillaje para eventos<br>
                ° Maquillaje fantasía<br>
                ° Maquillaje para eventos<br>
                ° Maquillaje para fotografías <br>
            </p>
                                <br>
                                <h1 class="text-xl font-bold mb-2">Precio:</h1>
                                <p class="text-lg font-medium text-gray-800">200</p>
                            </div>
                            <div class="flex mt-4 sm:mt-8 space-x-4">
                                <a href='/agendas-cliente'
                                    class="bg-blue-500 text-white mt-5 px-4 py-2 rounded-md shadow-md hover:shadow-lg">
                                    Agendar Cita
                                </a>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="w-full sm:w-1/3 overflow-hidden mx-auto">
                            <img src="@/img/Maquillaje_ojos_creativo.webp" alt="Descripción de la imagen"
                                class="w-full h-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayoutCliente>
    </div>
</template>
  
<script setup>
import AuthenticatedLayoutCliente from '@/Layouts/AuthenticatedLayoutCliente.vue';
import { Head } from '@inertiajs/vue3';
</script>
  
<style>
/* Estilos para el fondo */
.background-container {
    position: relative;
    width: 100%;
    height: auto;
    background-image: url('@/img/01.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

/* Estilos para secciones */
/* ... Tus estilos adicionales ... */
</style>

