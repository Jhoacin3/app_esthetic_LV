<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
// const users = $page.props.users;
// const users = computed(() => $page.props.users)
// const changePage = (url) => {
//     Inertia.visit(url)
// }
// import { Inertia } from '@inertiajs/inertia';

// const redirectToAgregar = () => {
//   Inertia.visit(route('users_agregar'));
// };


</script>
<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height: 140vh;
    background-image: url("@/img/rum.jpg");
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
                <template #table-content>
                    <div class="py-10">
                        <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="text-3xl font-bold text-black">
                                Empleados
                            </div>
                            <br>
                            <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                            <!-- Botón de Agregar -->
                            <div class="mb-4">
                                <a :href="route('users.create')"
                                    class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                    Agregar
                                </a>

                            </div>

                            <!-- Tabla -->
                            <div class="overflow-x-auto border-t-4 border-yellow-500">
                                <table class="min-w-full bg-opacity-50 border-yellow-500">
                                    <thead class="sm:table-header-group bg-yellow-50">
                                        <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                        <tr>
                                            <th class="py-2 px-4 border-b sm:table-cell">
                                                ID
                                            </th>
                                            <th class="py-2 px-4 border-b hidden lg:table-cell">
                                                Nombre
                                            </th>
                                            <th class="py-2 px-4 border-b sm:table-cell">
                                                Correo
                                            </th>
                                            <!-- El resto de las columnas para pantallas más grandes -->

                                            <th class="py-2 px-4 border-b hidden lg:table-cell">
                                                Rol
                                            </th>
                                            <th class="py-2 px-4 border-b sm:table-cell">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="sm:table-row-group">
                                        <!-- <tr v-for="user in $page.props.users" :key="user.id"> -->
                                        <tr v-for="user in $page.props.users.data" :key="user.id">


                                            <td class="py-2 px-4 border-b sm:table-cell">
                                                {{ user.id }}
                                            </td>
                                            <td class="py-2 px-4 border-b hidden lg:table-cell">
                                                {{ user.name }}
                                            </td>
                                            <td class="py-2 px-4 border-b sm:table-cell">
                                                {{ user.email }}
                                            </td>
                                            <td class="py-2 px-4 border-b hidden lg:table-cell">
                                                <span v-for="role in user.roles" :key="role.id"
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ role.title }}
                                                </span>
                                            </td>
                                            <td class="py-2 px-4 border-b sm:table-cell space-x-2">

                                                <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                    <a :href="route('users.edit', user.id)" class="btn btn-info">
                                                        Editar
                                                    </a>

                                                    <button
                                                        class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                                                        Borrar
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </template>
            </AuthenticatedLayout>
        </div>
    </div>
</template>
