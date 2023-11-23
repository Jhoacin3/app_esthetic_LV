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
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-100 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Iniciar sesion</Link>

                <Link v-if="canRegister" :href="route('register')"
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
                    <!-- Imagen a la derecha -->
                    <div class="md:col-span-1">
                        <img src="@/img/logo.svg" alt="Logo" class="logo block h-40 w-auto fill-current text-gray-600">
                    </div>
                    <!-- Acomoden todo a su gusto, que tenga color, estilo, etc.. -->
                    <!-- los del front: Texto de bienvenida a la izquierda -->
                    <div class="md:col-span-1">
                        <h2 class="text-3xl font-semibold mb-4">¡Hola de nuevo!</h2>
                        <p class="text-gray-600">
                            Estimdo Empleado, favor de registrase o iniciar sesión en la parte superior.
                        </p>
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
    background-image: url("./img/fondo_welcome.svg");
}
</style>
