<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Inicio" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bienvenido al sistema</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                    <!-- Botón de Agregar -->
                    <div class="mb-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Agregar</button>
                    </div>

                    <!-- Tabla -->
                    <div class="overflow-x-auto border-t-4 border-yellow-500">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="sm:table-header-group">
                                <tr>
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Nombre</th>
                                    <th class="py-2 px-4 border-b">Correo</th>
                                    <th class="py-2 px-4 border-b">Contraseña</th>
                                    <th class="py-2 px-4 border-b">Rol</th>
                                    <th class="py-2 px-4 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="sm:table-row-group">
                                <!-- Ejemplo de una fila, repite según tus datos -->
                                <tr class="sm:table-row">
                                    <td class="py-2 px-4 border-b sm:table-cell">1</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">Nombre Ejemplo</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">correo@example.com</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">********</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">Rol Ejemplo</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">
                                        <button class="bg-green-500 text-white px-2 py-1 rounded">Editar</button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded">Borrar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
