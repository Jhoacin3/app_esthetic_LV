<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>

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

/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .background-container {
        height: auto; /* Cambiado a auto para permitir que el contenido expanda según sea necesario */
    }

    .imgen2 {
        position: relative; /* Cambiado a relativo para que fluya con el contenido */
        width: 100%; /* La imagen ocupa el 100% del ancho del contenedor padre */
        max-width: 500px; /* Establece un límite máximo para el ancho de la imagen */
        height: auto; /* La altura se ajusta automáticamente según el ancho */
        margin-top: 20px; /* Agregado espacio entre la imagen y el texto */
        margin-right: 10px; /* Agregado espacio a la derecha de la imagen */
    }

    p,
    h1 {
        text-align: center; /* Centrar el texto en dispositivos más pequeños */
    }
}

p {
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
    color: #333;
    text-align: center;
    line-height: 1.5;
}

h1 {
    font-size: 30px;
    color: goldenrod;
    font-family: 'Brush Script MT', cursive;
    text-align: center;
    line-height: 1.5;
}


</style>


<template>
    <Head title="Dashboard" />
     <div class="background-container">

    <AuthenticatedLayout>
        <!-- <template #header>

        </template> -->
        
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16 py-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <!-- Mueve la imagen a la derecha en dispositivos grandes -->
                        <div class="md:col-span-1 md:order-2">
                            <div class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl">
                                <div class="imgen2">
                                    <img src="@/img/03.webp" alt="imagen 2">
                                </div>
                                
                            </div>
                        </div>
                        <!-- Mueve el texto a la izquierda en dispositivos grandes -->
                        <div class="md:col-span-1 md:order-1">
                            <div class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl">
                                <p>PUEDES LLEGAR A SER LA</p>
                                <h1>MEJOR</h1>
                                <p>VERSION DE TI</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
    </div>
</template>
