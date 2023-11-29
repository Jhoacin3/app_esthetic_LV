<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>

.background-container {
    position: relative;
    width: 100%;
    height:140vh; 
    background-image: url('@/img/rum.jpg');
    background-size: 100% 100%; /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat; /* Evita que la imagen se repita */
}


</style>
<template>
    <Head title="Usuarios" />
    <div class="background-container">
    <div class="py-1">
    <AuthenticatedLayout>

        <template #table-content>


            <div class="py-10 ">

                <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-3xl font-bold text-black">Empleados</div>
                    <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                    <!-- Botón de Agregar -->
                    <div class="mb-4">
                        <button class="mt-8 bg-blue-500 text-white px-4 py-2 rounded hover:shadow-md">Agregar</button>

                    </div>

                    <!-- Tabla -->
                  <div class="overflow-x-auto border-t-4 border-yellow-500">
                    <table class="min-w-full  bg-opacity-50 border-yellow-500">
                    <thead class="sm:table-header-group bg-yellow-50 ">
                                
                                <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                <tr>
                                    <th class="py-2 px-4 border-b sm:table-cell">ID</th>
                                    <th class="py-2 px-4 border-b hidden lg:table-cell">Nombre</th>
                                    <th class="py-2 px-4 border-b sm:table-cell">Correo</th>
                                    <!-- El resto de las columnas para pantallas más grandes -->
                                    <th class="py-2 px-4 border-b hidden lg:table-cell">Contraseña</th>
                                    <th class="py-2 px-4 border-b hidden lg:table-cell ">Rol</th>
                                    <th class="py-2 px-4 border-b  sm:table-cell">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="sm:table-row-group ">
                                <!-- Contenido de la tabla -->
                                <!-- Ejemplo de una fila, repite según tus datos -->
                                <tr class="sm:table-row">
                                    <td class="py-2 px-4 border-b sm:table-cell">1</td>
                                    <td class="py-2 px-4 border-b hidden lg:table-cell">Nombre Ejemplo</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">correo@example.com</td>
                                    <!-- El resto de las columnas para pantallas más grandes -->
                                    <td class="py-2 px-4 border-b hidden lg:table-cell ">********</td>
                                    <td class="py-2 px-4 border-b hidden lg:table-cell ">Rol Ejemplo</td>
                                    <td class="py-2 px-4 border-b  sm:table-cell space-x-2">
                                        <button class="bg-green-500 text-white  px-2 py-1 rounded  hover:shadow-md">Editar</button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded  hover:shadow-md">Borrar</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </template>
    
    </AuthenticatedLayout>
</div>
</div>
</template>



