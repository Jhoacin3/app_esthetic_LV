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
        height: 110vh;
        /* Cambia la altura para dispositivos más pequeños */
        background-size: cover;
        /* Ajusta el tamaño de la imagen para que cubra el contenedor */
    }
}
</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">

        <AuthenticatedLayout>

            <template #table-content-Roles>


                <div class="py-10 ">

                    <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class=" text-3xl font-bold text-black">Servicios</div>
                        <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                        <!-- Botón de Agregar -->
                        <br>
                        <a :href="route('services.create')"
                            class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                            Agregar
                        </a>
                        <br>
                        <br>
                        <!-- Tabla -->
                        <div class="overflow-x-auto border-yellow-500">
                            <table class="min-w-full bg-zinc-50 border-yellow-500">
                                <thead class="sm:table-header-group bg-red-300 ">

                                    <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                    <tr>
                                        <th class="py-2 px-4 border-b hidden lg:table-cell">ID</th>
                                        <th class="py-2 px-4 border-b sm:table-cell">Nombre</th>
                                        <th class="py-2 px-4 border-b hidden lg:table-cell">Descripcion</th>
                                        <th class="py-2 px-4 border-b sm:table-cell">Precio</th>
                                        <th class="py-2 px-4 border-b sm:table-cell">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="sm:table-row-group ">
                                    <!-- Contenido de la tabla -->
                                    <!-- Ejemplo de una fila, repite según tus datos -->
                                    <tr class="sm:table-row">
                                        <td class="py-2 px-4 border-b hidden lg:table-cell">1</td>
                                        <td class="py-2 px-4 border-b sm:table-cell">Nombre Ejemplo</td>
                                        <td class="py-2 px-4 border-b hidden lg:table-cell ">planchado</td>
                                        <td class="py-2 px-4 border-b sm:table-cell ">$100</td>
                                        <td class="py-2 px-4 border-b sm:table-cell space-x-2">
                                            <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                <!-- <a :href="route('services.edit')"
                                                    class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                                    actualziar
                                                </a> -->
                                                <button
                                                    class="bg-red-500 text-white px-2 py-1 rounded  hover:shadow-md">Borrar</button>
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
</template>

