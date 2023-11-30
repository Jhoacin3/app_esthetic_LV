<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>

.background-container {
    position: relative;
    width: 100%;
    height:140vh; 
    background-image: url('@/img/inicio.webp');
    background-size: 100% 100%; /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat; /* Evita que la imagen se repita */
}

  #miTexto {
    font-style: italic;
    font-weight: bold;
    color:#0f0f0f;
    font-size: 45px; /* Puedes ajustar el tamaño del texto según tus necesidades */
}


</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
    <AuthenticatedLayout>
        <template #header>
            <center><p id="miTexto" class="text-center text-gray-500 dark:text-gray-400">
                «Bienvenido al sistema».</p></center>
        </template>     
    </AuthenticatedLayout>
    </div>
</template>
