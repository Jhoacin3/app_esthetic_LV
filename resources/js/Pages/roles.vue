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
                        <div class=" text-3xl font-bold text-black">Rol de Empleados</div>
                        <br>
                        <!-- *******************SECCION DE LA TABLA BORRADOR******************* -->
                        <!-- Botón de Agregar -->
                        <div class="mb-4">
                            <!-- <a :href="route('roles.create')"
                                class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                Agregar
                            </a> -->
                            <!-- <button v-if="hasPermission('crear-rol')" @click="redirectToAddRole" class="btn btn-warning">Nuevo</button> -->
                            <button v-if="can('crear-rol')" @click="createRole"
                                class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                                Agregar
                            </button>

                        </div>

                        <!-- Tabla -->
                        <div class="overflow-x-auto border-yellow-500">
                            <table class="min-w-full bg-zinc-50 border-yellow-500">
                                <thead class="sm:table-header-group bg-red-300 ">

                                    <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                                    <tr>
                                        <th class="py-2 px-4 border-b sm:table-cell">ID</th>
                                        <th class="py-2 px-4 border-b sm:table-cell">Rol</th>
                                        <th class="py-2 px-4 border-b sm:table-cell">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody class="sm:table-row-group ">
                                    <tr v-for="role in $page.props.roles.data" :key="role.id">
                                        <!-- Contenido de la tabla -->
                                        <!-- Ejemplo de una fila, repite según tus datos -->
                                        <td class="py-2 px-4 border-b sm:table-cell">{{ role.id }}</td>
                                        <td class="py-2 px-4 border-b sm:table-cell">{{ role.name }}</td>

                                        <td class="py-2 px-4 border-b sm:table-cell space-x-2">
                                            <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                <a :href="route('roles.edit', role.id)"
                                                    class="btn bg-sky-500 text-white px-1.5 py-1 rounded hover:shadow-md btn-info">
                                                    Editar
                                                </a>
                                                <!-- <button v-if="can('editar-rol')" @click="editRole"
                                                    class="mt-8 bg-blue-500 text-white px-4 py-2 rounded hover:shadow-md">
                                                    Editar
                                                </button> -->
                                                <button  @click="confirmDeleterole(role.id)"
                                                    class="bg-red-500 text-white px-2 py-1 rounded  hover:shadow-md">Borrar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        

                        <div class="flex justify-center bg-red-300 p-0.2">
                            <nav aria-label="Page navigation">
                                <ul class="flex list-none p-0 m-0">
                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.prev_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetchRoles(pagination.current_page - 1)" href="#"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <li v-for="page in pagination.last_page" :key="page"
                                        :class="{ 'bg-sky-500 text-white': pagination.current_page === page }" class="mr-2">
                                        <a @click.prevent="fetchRoles(page)" href="#" class="block p-2">{{ page }}</a>
                                    </li>

                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.next_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetchRoles(pagination.current_page + 1)" href="#"
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

<script>
import Swal from 'sweetalert2';

export default {
  props: {
    roles: {
      type: Object,
      required: true,
    },
    pagination: {
      type: Object,
      required: true,
    },
  },

  methods: {
    async confirmDeleterole(roleID) {
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
          await this.$inertia.delete(`/roles/${roleID}`);
          this.fetchRoles(this.pagination.current_page);
         
          await Swal.fire({
            title: 'Eliminado',
            text: 'Servicio eliminado exitosamente.',
            icon: 'success',
          });
        } catch (error) {
          console.error('Error al eliminar el servicio', error);

          await Swal.fire({
            title: 'Error',
            text: 'Hubo un error al eliminar el servicio.',
            icon: 'error',
          });
        }
      }
    },
   
    can(permission) {
      // Aquí deberías implementar la lógica real para verificar los permisos
      return true; // Ejemplo simple: siempre devuelve true para demostración
    },
    createRole() {
      if (this.can('create_role_permission')) {
        this.$inertia.get('/roles/create');
      } else {
        // Manejo de falta de permisos
        console.error('No tienes permiso para crear roles.');
        // Puedes mostrar un mensaje al usuario aquí si es necesario
      }
    },
    editRole() {
      if (this.can('edit_role_permission')) {
        this.$inertia.get('/roles/edit');
      } else {
        // Manejo de falta de permisos
        console.error('No tienes permiso para editar roles.');
        // Puedes mostrar un mensaje al usuario aquí si es necesario
      }
    },
    fetchRoles(page) {
      this.$inertia.get(`/roles?page=${page}`);
    },
  },
};
</script>