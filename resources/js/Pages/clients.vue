<script setup>
import AuthenticatedLayoutCliente from "@/Layouts/AuthenticatedLayoutCliente.vue";
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
        height: 100vh;
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
                            <a :href="route('clients.create')"
                                class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                Agregar
                            </a>

                        </div>

                        <!-- Tabla -->
                        <div class="overflow-x-auto   border-yellow-50">
                            <table class="min-w-full bg-zinc-50 border-yellow-50">
                                <thead class="sm:table-header-group bg-red-300">
                                    <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                    <tr>
                                        <th class="py-2 px-4 border-b sm:table-cell">
                                            ID
                                        </th>
                                        <th class="py-2 px-4 border-b sm:table-cell">
                                            Nombre
                                        </th>
                                        <th class="py-2 px-4 border-b hidden lg:table-cell">
                                            Correo
                                        </th>
                                        <th class="py-2 px-4 border-b sm:table-cell">
                                            Rol
                                        </th>
                                        <th class="py-2 px-4 border-b sm:table-cell">
                                            Acciones
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="sm:table-row-group">
                                    <!-- <tr v-for="user in $page.props.users" :key="user.id"> -->
                                    <tr v-for="user in $page.props.clients.data" :key="client.id">


                                        <td class="py-2 px-4 border-b sm:table-cell">
                                            {{ client.id }}
                                        </td>
                                        <td class="py-2 px-4 border-b sm:table-cell">
                                            {{ client.name }}
                                        </td>
                                        <td class="py-2 px-4 border-b hidden lg:table-cell">
                                            {{ client.email }}
                                        </td>
                                        <td class="py-2 px-4 border-b sm:table-cell space-x-2">

                                            <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                <a :href="route('clients.edit', client.id)"
                                                    class="btn bg-sky-500 text-white px-1.5 py-1 rounded hover:shadow-md btn-info">
                                                    Editar
                                                </a>

                                                <button @click="confirmDeleteClient(client.id)"
                                                class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                                                    Borrar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- SECCION PAR ALA PAGINACION -->
                        <div class="flex justify-center bg-pink-300 p-1">
                            <nav aria-label="Page navigation">
                                <ul class="flex list-none p-0 m-0">
                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.prev_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetchClients(pagination.current_page - 1)" href="#"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <li v-for="page in pagination.last_page" :key="page"
                                        :class="{ 'bg-sky-500 text-white': pagination.current_page === page }" class="mr-2">
                                        <a @click.prevent="fetchClients(page)" href="#" class="block p-2">{{ page }}</a>
                                    </li>

                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.next_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetchClients(pagination.current_page + 1)" href="#"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </template>
        </AuthenticatedLayout>

    </div>
</template>


<!-- SCRIPT PARA LA PAGINACION -->
<script>
import Swal from 'sweetalert2';

export default {
  props: {
    clients: {
      type: Object,
      required: true,
    },
    pagination: {
      type: Object,
      required: true,
    },
  },
  methods: {
    async confirmDeleteClient(clientID) {
      const confirmation = await Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'Cancelar',
      });

      if (confirmation.isConfirmed) {
        try {
          await this.$inertia.delete(`/clients/${clientID}`);
          this.fetchUsers(this.pagination.current_page); // Actualizar la lista de usuarios después de eliminar

          await Swal.fire({
            title: 'Eliminado',
            text: 'Usuario eliminado exitosamente.',
            icon: 'success',
          });
        } catch (error) {
          console.error('Error al eliminar el usuario', error);

          await Swal.fire({
            title: 'Error',
            text: 'Hubo un error al eliminar el usuario.',
            icon: 'error',
          });
        }
      }
    },
    fetchUsers(page) {
      this.$inertia.get(`/clients?page=${page}`);
    },
  },
};
</script>