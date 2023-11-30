<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>

.background-container {
    position: relative;
    width: 100%;
    height:140vh; 
    background-image: url('@/img/Fondo1.webp');
    background-size: 100% 100%; /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat; /* Evita que la imagen se repita */
   
}
/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .background-container {
        height: 100vh; /* Cambia la altura para dispositivos más pequeños */
        background-size: cover; /* Ajusta el tamaño de la imagen para que cubra el contenedor */
    }
}

</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
    <div class="py-1">
    <AuthenticatedLayout>

        <template #table-content-Roles>


            <div class="py-10 ">

                <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" text-3xl font-bold text-black">Rol de Empleados</div>
                    <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                    <!-- Botón de Agregar -->
                    <div class="mb-4">
                        <button class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">Agregar</button>

                    </div>

                    <!-- Tabla -->
                  <div class="overflow-x-auto border-yellow-500">
                    <table class="min-w-full bg-zinc-50 border-yellow-500">
                    <thead class="sm:table-header-group bg-red-300 ">
                                
                                <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                <tr>
                                    <th class="py-2 px-4 border-b sm:table-cell">ID</th>
                                    <th class="py-2 px-4 border-b sm:table-cell">Nombre</th>
                                    <th class="py-2 px-4 border-b hidden lg:table-cell">Correo</th>
                                    <th class="py-2 px-4 border-b sm:table-cell">Rol</th>
                                    <th class="py-2 px-4 border-b sm:table-cell">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="sm:table-row-group ">
                                <!-- Contenido de la tabla -->
                                <!-- Ejemplo de una fila, repite según tus datos -->
                                <tr class="sm:table-row">
                                    <td class="py-2 px-4 border-b sm:table-cell">1</td>
                                    <td class="py-2 px-4 border-b sm:table-cell">Nombre Ejemplo</td>
                                    <td class="py-2 px-4 border-b hidden lg:table-cell ">mrubi366@gmail.com</td>
                                    <td class="py-2 px-4 border-b sm:table-cell ">Rol Ejemplo</td>
                                    <td class="py-2 px-4 border-b sm:table-cell space-x-2">
                                        <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                        <button class="bg-sky-500 text-white  px-2 py-1 rounded  hover:shadow-md">Editar</button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded  hover:shadow-md">Borrar</button>
                                    </div>
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

