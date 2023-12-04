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
            <template #content-Agregar>
                <div class="py-5 px-15">
                    <div class="bg-white px-5 py-8 overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="text-3xl  font-bold text-black">
                            <center> Editar Rol </center>
                        </div>
                         <!-- formulario -->
                         <form @submit.prevent="submitForm" class="mt-10 px-4 space-y-4">
      <!-- ... Campos del formulario ... -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input v-model="form.name" id="name" name="name" type="text" required
          class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <!-- SECCION DE LOS CHECK BOX PARA MOSTRAR LOS PERMISOS PARA EL ROL A CREAR-->
      <div class="form-group">
        <label>Permisos para este Rol:</label>
        <br />
        <br />
        <label v-for="permission in permissions" :key="permission.id" class="flex items-center mb-4">
          <input type="checkbox" v-model="form.permission" :value="permission.id"
            id="permission-checkbox-{{ permission.id }}"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
          <label :for="'permission-checkbox-' + permission.id" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-800">
            {{ permission.name }}
          </label>
        </label>    
      </div>
      <div>
        <button type="submit" class="bg-blue-500 mt-2 text-white px-3 py-1 rounded hover:shadow-md">
          Actualizar
        </button>
      </div>
    </form>
                    </div>
                </div>
            </template>
        </AuthenticatedLayout>

    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      form: {
        name: '',
        permission: [],
      },
    };
  },
  props: {
    permissions: Array,
  },
  methods: {
    async submitForm() {
      try {
        await this.$inertia.put(route('roles.update', this.$page.props.role.id), this.form);
        await Swal.fire({
          title: 'Éxito',
          text: 'Rol actualizado',
        });
      } catch (error) {
        Swal.fire({
          title: 'Error',
          text: 'Error al actualizar el rol',
        });
      }
    },
  },
};
</script>

  