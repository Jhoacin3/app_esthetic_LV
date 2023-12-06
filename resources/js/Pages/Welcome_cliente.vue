<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head  title="Beauty Studio" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-100 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link v-if="$page.props.auth.user" :href="route('dashboard-cliente')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login-cliente')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Iniciar sesion</Link>

                <Link v-if="canRegister" :href="route('register-cliente')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Registrate</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <!-- Logo -->
                <!-- <img src="@/img/logo.svg" class="logo block h-40 w-auto fill-current text-gray-100"> -->
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <!-- Acomoden todo a su gusto, que tenga color, estilo, etc.. -->
                    <!-- los del front: Texto de bienvenida a la izquierda -->
                    <div class="md:col-span-1">
                        <div class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl">
                            <h2 id="textUno" class="text-gold-300 font-semibold mb-4">¡Bienvenido!</h2>
                            <br>
                            <h4 id="textoDos" class="text-gray-100 font-semibold mb-9">
                                "Una mujer que cambia su cabello esta por cambiar su vida"</h4>
                        </div>

                        <!-- <p class="mt-4">
                            <a href="#" class="text-red-500 hover:underline">Descubre nuestros servicios</a>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url("@/img/Inicio123.jpg");
    background-size: 100% 100%;
    background-position: center;

}

#textUno {
    font-weight: bold;
    color: #f11c99;
    font-size: 40px;
}

#textoDos {
    font-weight: bold;
    color: #090908;
    font-size: 25px;
    
}


</style>
