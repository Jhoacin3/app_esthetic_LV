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

      <template #table-content-Inventarios>


        <div class="py-10 ">
          <div class="bg-opacity-0 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-3xl font-bold text-black">
              Agenda
            </div>
            <br>
            <br>
            <div class="mb-4">
              <a :href="route('agendas.create')" class="mt-8 bg-green-500 text-white px-4 py-2 rounded hover:shadow-md">
                Agregar
              </a>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto   border-yellow-50">
              <table class="min-w-full bg-zinc-50 border-yellow-50">
                <thead class="sm:table-header-group bg-red-300">
                  <!-- Encabezados de las columnas (solo los primeros tres para pantallas pequeñas) -->
                  <tr>
                    <th class="py-2 px-4 border-b hidden lg:table-cell">
                      ID
                    </th>
                    <th class="py-2 px-4 border-b hidden lg:table-cell">
                      Nombre
                    </th>
                    <th class="py-2 px-4 border-b sm:table-cell">
                      Servicio
                    </th>
                    <th class="py-2 px-4 border-b sm:table-cell">
                      Dia
                    </th>
                    <th class="py-2 px-4 border-b sm:table-cell">
                      Hora
                    </th>
                    <th class="py-2 px-4 border-b sm:table-cell">
                      Acciones
                    </th>

                  </tr>
                </thead>

                <tbody class="sm:table-row-group">
                  <tr v-for="agenda in $page.props.agendas.data" :key="agenda.id">
                    <!-- Contenido de la tabla -->
                    <!-- Ejemplo de una fila, repite según tus datos -->
                    <td class="py-2 px-4 border-b hidden lg:table-cell">{{ agenda.id }}</td>

                    <td class="py-2 px-4 border-b sm:table-cell">{{ agenda.fullName }}</td>
                    <td class="py-2 px-4 border-b sm:table-cell">{{ agenda.service }}</td>
                    <td class="py-2 px-4 border-b sm:table-cell">{{ agenda.day }}</td>
                    <td class="py-2 px-4 border-b sm:table-cell">{{ agenda.hour }}</td>

                    <td class="py-2 px-4 border-b sm:table-cell">
                      <div class="flex flex-col sm:flex-row sm:gap-x-2">
                        <a :href="route('agendas.edit', agenda.id)"
                          class="bg-sky-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                          Editar
                        </a>

                        <button @click="confirmDelete(agenda.id)"
                          class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md focus:outline-none">
                          Eliminar
                        </button>

                      </div>
                    </td>
                  </tr>
                </tbody>

              </table>
            </div>
           
              <!-- SECCION PAR ALA PAGINACION -->
              <div class="flex justify-center  bg-red-300 p-0.2">
                            <nav aria-label="Page navigation">
                                <ul class="flex list-none p-0 m-0">
                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.prev_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetcAgendas(pagination.current_page - 1)" href="#"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <li v-for="page in pagination.last_page" :key="page"
                                        :class="{ 'bg-sky-500 text-white': pagination.current_page === page }" class="mr-2">
                                        <a @click.prevent="fetchAgendas(page)" href="#" class="block p-2">{{ page }}</a>
                                    </li>

                                    <li :class="{ 'opacity-50 pointer-events-none': !pagination.next_page_url }"
                                        class="mr-2">
                                        <a @click.prevent="fetchAgendas(pagination.current_page + 1)" href="#"
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
    agendas: {
      type: Object,
      required: true,
    },
    pagination: {
      type: Object,
      required: true,
    },
  },

  methods: {
    async confirmDelete(agendaID) {
      // Mostrar la confirmación antes de realizar la solicitud DELETE
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

      // Si el usuario confirma la eliminación, realizar la solicitud DELETE
      if (confirmation.isConfirmed) {
        try {
          // Realizar la solicitud DELETE
          await this.$inertia.delete(`/agendas/${agendaID}`);
          this.fetchAgendas(this.pagination.current_page);

          // Mostrar un mensaje de eliminación con SwitchAlert2
          await this.$swal({
            title: 'Eliminado',
            text: 'Inventario eliminado exitosamente.',
            icon: 'success',
          });
        } catch (error) {
          // En caso de error al eliminar
          console.error('Error al eliminar el inventario', error);

          // Mostrar un mensaje de error con SwitchAlert2
          await this.$swal({
            title: 'Error',
            text: 'Hubo un error al eliminar el inventario.',
            icon: 'error',
          });
        }
      }
    },
    fetchAgendas(page) {
      this.$inertia.get(`/agendas?page=${page}`);
    },
  },
};
</script>
