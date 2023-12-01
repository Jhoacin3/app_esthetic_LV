<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height: 140vh;
    background-image: url('@/img/rum.jpg');
    background-size: 100% 100%;
    /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat;
    /* Evita que la imagen se repita */
}
</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
        <div class="py-1">
            <AuthenticatedLayout>

                <template #table-content-Inventarios>


                    <div class="py-10 ">

                        <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                            <h1 class="text-3xl font-bold text-black">Servicios</h1>
                            <h1 class="text-1xl font-bold text-black">ruby, comente casi todo lo que programe en esta vista, vuelve a copiar y pegar una tabla con los campos predeterminado que les puse, luego yo los programo</h1>
                            <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                            <!-- Botón de Agregar -->
                            <br>
                            <div class="mb-4">
                                <!-- <a :href="route('inventories.create')"
                                    class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                    Agregar
                                </a> -->
                            </div>


                            <!-- Tabla -->
                            <div class="overflow-x-auto border-t-4 border-yellow-500">
                                <table class="min-w-full  bg-opacity-50 border-yellow-500">
                                    <thead class="sm:table-header-group bg-yellow-50 ">

                                        <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                        <tr>
                                            <th class="py-2 px-4 border-b sm::table-cell">ID</th>
                                            <th class="py-2 px-4 border-b sm::table-cell">Nombre</th>
                                            <th class="py-2 px-4 border-b sm::table-cell">Descripcion</th>
                                            <th class="py-2 px-4 border-b sm::table-cell">Cantidad</th>
                                            <th class="py-2 px-4 border-b sm:table-cell">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sm:table-row-group ">
                                        <!-- <tr v-for="inventorie in $page.props.inventories.data" :key="inventorie.id"> 
                                             Contenido de la tabla -->
                                            <!-- <td class="py-2 px-4 border-b hidden lg:table-cell">{{ inventorie.id }}</td>

                                            <td class="py-2 px-4 border-b sm:table-cell">{{ inventorie.name }}</td>
                                            <td class="py-2 px-4 border-b sm:table-cell">{{ inventorie.description }}</td>
                                            El resto de las columnas para pantallas más grandes
                                            <td class="py-2 px-4 border-b sm::table-cell ">{{ inventorie.quantity }}</td> -->
                                            <td class="py-2 px-4 border-b  sm:table-cell space-x-2">
                                                <!-- <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                    <a :href="route('inventories.edit', inventorie.id)" class="btn btn-info">
                                                        Editar
                                                    </a>

                                                    <button
                                                        class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                                                        Borrar
                                                    </button>
                                                </div> -->
                                            </td>

                                        <!-- </tr> -->
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

