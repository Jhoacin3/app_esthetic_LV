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
                                    <tr v-for="service in $page.props.services.data" :key="service.id">

                                    <!-- Contenido de la tabla -->
                                    <!-- Ejemplo de una fila, repite según tus datos -->
                                        <td class="py-2 px-4 border-b hidden lg:table-cell">{{ service.id }}</td>
                                        <td class="py-2 px-4 border-b sm:table-cell">{{ service.name }}</td>
                                        <td class="py-2 px-4 border-b hidden lg:table-cell ">{{ service.description }}</td>
                                        <td class="py-2 px-4 border-b sm:table-cell ">{{ service.price }}</td>
                                        <td class="py-2 px-4 border-b sm:table-cell space-x-2">
                                            <div class="flex flex-col sm:flex-row sm:gap-x-2">
                                                <a :href="route('services.edit', service.id)"
                                                    class="bg-sky-500 text-white px-1.5 py-1 rounded hover:shadow-md">
                                                    Editar
                                                </a>

                                                <button @click="confirmDelete(service.id)"
                                                    class="bg-red-500 text-white px-1.5 py-1 rounded hover:shadow-md focus:outline-none">
                                                    Eliminar
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
</template>
<script>
import Swal from 'sweetalert2';

export default {
  data() {
    return {
        services: [], // Asegúrate de tener la lista de inventarios
    };
  },
  methods: {
    async confirmDelete(serviceID) {
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
          await this.$inertia.delete(`/services/${serviceID}`);

          // Filtrar la lista de inventarios
          this.services.data = this.services.data.filter(i => i.id !== serviceID);

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
  },
};
</script>


