<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height: 140vh;
    background-image: url('@/img/Fondo1.webp');
    background-size: 100% 100%;
    /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat;
    /* Evita que la imagen se repita */

}

/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .background-container {
        height: 100vh;
        /* Cambia la altura para dispositivos más pequeños */
        background-size: cover;
        /* Ajusta el tamaño de la imagen para que cubra el contenedor */
    }
}

#miTexto {
    font-style: italic;
    font-weight: bold;
    color: #0f0f0f;
    font-size: 45px;
    /* Puedes ajustar el tamaño del texto según tus necesidades */
}
#name {
    font-style: italic;
    font-weight: bold;
    color: rgb(186, 20, 20);
    font-size: 45px;
    /* Puedes ajustar el tamaño del texto según tus necesidades */
}

h2.text-4xl {
    font-size: 2.5rem;
    /* Ajusta el tamaño de la fuente */
    /* Otros estilos opcionales para mejorar la apariencia */
    font-weight: bold;
    /* Para hacerlo más audaz si lo deseas */
    color: #333;
    /* Cambia el color del texto si es necesario */
    /* Ajustes adicionales según tus preferencias */
}
</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
        <AuthenticatedLayout>
            <template #header>
                <center>
                    <p id="miTexto" class="text-center text-gray-500 dark:text-gray-400">
                        Bienvenido al sistema: 
                        <br/>
                    </p>
                    <p id="name" class="text-center text-gray-500 dark:text-gray-400">
                        {{ $page.props.auth.user.name }}
                    </p>
                </center>

            </template>


    </AuthenticatedLayout>
</div></template>
