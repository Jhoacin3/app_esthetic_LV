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
                            <!-- ... Campos del formulario ... -->
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
                            <!-- VERIFICAR EL INPUT ANTERIOR -->
                            <div>
                                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmar
                                    Contraseña</label>
                                <input v-model="form.confirmPassword" id="confirm-password" name="confirm-password"
                                    type="password" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <!-- Cambiado a un campo de selección para los roles -->
                                <label for="roles" class="block text-sm font-medium text-gray-700">Rol</label>
                                <select v-model="form.name" id="roles" name="roles" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <!-- Opciones de roles aquí -->
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 mt-2 text-white px-3 py-1 rounded hover:shadow-md">
                                    Agregar
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


const form = ref({
    name: '',
    email: '',
    password: '',
    confirmPassword: '',
    roles: ''
});
const submitForm = async () => {
    try {
        const response = await axios.post('/users', form.value);
        // console.log('Formulario enviado con éxito', response.data);

        // Mostrar SweetAlert2 de éxito
        await Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Usuario agregado correctamente',
        });

        // Redirigir al usuario a la página principal de usuarios
        window.location.href = '/users';

    } catch (error) {
        console.error('Error al enviar el formulario', error.response.status, error.response.statusText, error.response.data);

        let errorMessage = 'Hubo un error al agregar el usuario';

        // Manejar errores de validación específicamente
        if (error.response && error.response.status === 422) {
            const validationErrors = error.response.data.errors;

            // Construir un mensaje de error específico para errores de validación
            errorMessage = Object.values(validationErrors).flat().join('<br>');
        }

        // Mostrar SweetAlert2 de error con mensaje específico
        await Swal.fire({
            icon: 'error',
            title: 'Error',
            html: errorMessage,
        });
    }
};

</script>
