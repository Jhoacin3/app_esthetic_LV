<script setup>
import AuthenticatedLayoutCliente from '@/Layouts/AuthenticatedLayoutCliente.vue';
import { Head } from '@inertiajs/vue3';
</script>

<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height:140vh; 
    background-image: url('@/img/Fondo1.webp');
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
}

@media screen and (max-width: 768px) {
    .background-container {
        height: 100vh;
        background-size: cover;
    }
}
</style>

<template>
    <Head title="Beauty Studio" />
    <div class="background-container">
        <div class="py-1">
            <AuthenticatedLayout>
                <template #table-content-Appointments>
                    <div class="py-10 ">
                        <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="text-3xl font-bold text-black">Citas</div>
                            <br>
                            <div class="mb-4">
                                <a :href="route('appointments.create')"
                                    class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                    Agregar
                                </a>
                            </div>
                            <div class="overflow-x-auto border-yellow-500">
                                <table class="min-w-full bg-zinc-50 border-yellow-500">
                                    <thead class="sm:table-header-group bg-red-300 ">
                                        <tr>
                                            <th class="py-2 px-4 border-b hidden lg:table-cell">ID</th>
                                            <th class="py-2 px-4 border-b sm::table-cell">Nombre</th>
                                            <th class="py-2 px-4 border-b hidden lg:table-cell">Descripción</th>
                                            <th class="py-2 px-4 border-b sm::table-cell">Cantidad</th>
                                            <th class="py-2 px-4 border-b sm:table-cell">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sm:table-row-group ">
                                        <tr v-for="appointment in $page.props.appointments.data" :key="appointment.id">
                                            <td class="py-2 px-4 border-b hidden lg:table-cell">{{ appointment.id }}</td>
                                            <td class="py-2 px-4 border-b sm:table-cell">{{ appointment.name }}</td>
                                            <td class="py-2 px-4 border-b hidden lg:table-cell">{{ appointment.description }}</td>
                                            <td class="py-2 px-4 border-b sm::table-cell ">{{ appointment.quantity }}</td>
                                            <td class="py-2 px-4 border-b  sm:table-cell space-x-2">
                                                <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                    <a :href="route('appointments.edit', appointment.id)" class="bg-sky-500 text-white  px-1.5 py-1 rounded  hover:shadow-md">
                                                        Editar
                                                    </a>
                                                    <button class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                                                        Borrar
                                                    </button>
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
