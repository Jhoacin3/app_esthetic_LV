<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Usuarios" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">agregar usuario</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Agrega los inputs y ajusta esta vista Ruby!</div>
                    <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                    <!-- Botón de Agregar -->
                    <div class="mb-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Agregar</button>
                    </div>

                   
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
