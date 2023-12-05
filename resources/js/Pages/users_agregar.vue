<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

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
                            <center> Agregar Empleados</center>
                        </div>
                        <form @submit.prevent="submitForm" method="post" class="mt-10 px-4 space-y-4">
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input v-model="form.name" id="name" name="name" type="text" required
          class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
        <input v-model="form.email" id="email" name="email" type="email" required
          class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input v-model="form.password" id="password" name="password" type="password" required
          class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
        <input v-model="form.confirmPassword" id="confirm-password" name="confirm-password" type="password" required
          class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <select v-model="form.roles" id="roles" name="roles">
        <option v-for="role in roles" :key="role.id" :value="role.name">{{ role.name }}</option>
      </select>

      <div>
        <button type="submit" class="bg-blue-500 mt-2 text-white px-3 py-1 rounded hover:shadow-md">
          {{ editing ? 'Editar' : 'Agregar' }}
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
import { ref } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  props: {
    roles: Array,
    user: Object, // Datos del usuario para editar
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
        roles: '',
      },
      editing: false,
    };
  },
  watch: {
    user: {
      handler(newVal) {
        if (newVal) {
          this.form = { ...newVal, confirmPassword: '' };
          this.editing = true;
        }
      },
      deep: true,
    },
  },
  methods: {
    async submitForm() {
      try {
        console.log('Roles en users_agregar.vue:', this.roles);
        console.log('Formulario enviado:', this.form);

        if (this.editing) {
          // Lógica de actualización
          const response = await axios.put(`/users/${this.user.id}`, this.form);
        } else {
          // Lógica de creación
          const response = await axios.post('/users', this.form);
        }

        // Restablecer el formulario después de la acción
        this.form = {
          name: '',
          email: '',
          password: '',
          confirmPassword: '',
          roles: '',
        };

        // seccion de que si funciono:) mensaje de éxito
        await Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: this.editing ? 'Usuario editado correctamente' : 'Usuario agregado correctamente',
        });

        // Redirigir al usuario a la página principal de usuarios
        this.$router.push('/users');
      } catch (error) {
        console.error('Error al enviar el formulario', error.response.status, error.response.statusText, error.response.data);

        let errorMessage = `Hubo un error al ${this.editing ? 'editar' : 'agregar'} el usuario`;

        if (error.response && error.response.status === 422) {
          const validationErrors = error.response.data.errors;
          errorMessage = Object.values(validationErrors).flat().join('<br>');
        }

        await Swal.fire({
          icon: 'error',
          title: 'Error',
          html: errorMessage,
        });
      }
    },
  },
};
</script>

