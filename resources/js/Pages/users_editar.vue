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
                        <center> Editar Empleados</center>
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
                            <select v-model="form.roles" id="roles" name="roles">
                                <option v-for="role in roles" :key="role.id" :value="role.name">{{ role.name }}</option>
                            </select>
                            
                            <div>
                                <button type="submit" class="bg-blue-500 mt-2 text-white px-3 py-1 rounded hover:shadow-md">
                                    Agregar
                                </button>
                            </div>
                        </form>

                </div></div>
            </template>
        </AuthenticatedLayout>

    </div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
    props: {
        user: Object,
        roles: Array,

    },
    data() {
        return {
            form: {
                name: this.user.name,
                email: this.user.email,
                password: this.user.password,
                confirmPassword: this.user.confirmPassword,
                roles: this.user.roles,
            },
        };
    },
    methods: {
        async submitForm() {
            try {
                // Asignamos los permisos seleccionados al formulario
                this.form.permission = this.selectedPermissions;

                // Ojo, estoy utilizando $inertia.post para hacer la llamada
                await this.$inertia.put(route('inventories.update', this.user.id), this.form);
                

                // this.$inertia.visit(route('roles.index'));


                // seccion de que si funciono:) mensaje de éxito
                await Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Servicio agregado correctamente',
                });
                // VERIFICAR
                // Redirigir al usuario a la página principal de roles
                this.$router.push('/inventories');
            } catch (error) {
                console.error('Error al enviar el formulario', error.response.status, error.response.statusText, error.response.data);

                let errorMessage = 'Hubo un error al agregar el rol';

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

<!-- <script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password: '',
            },
        };
    },
    props: {
        permissions: Array,
    },
    methods: {
        async submitForm() {
            try {
                // Asignamos los permisos seleccionados al formulario
                this.form.permission = this.selectedPermissions;

                // Ojo, estoy utilizando $inertia.post para hacer la llamada
                this.$inertia.post(route('inventories.store'), this.form);
                // this.$inertia.visit(route('roles.index'));


                // seccion de que si funciono:) mensaje de éxito
                await Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Rol agregado correctamente',
                });
                // VERIFICAR
                // Redirigir al usuario a la página principal de roles
                this.$router.push('/inventories');
            } catch (error) {
                console.error('Error al enviar el formulario', error.response.status, error.response.statusText, error.response.data);

                let errorMessage = 'Hubo un error al agregar el rol';

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
</script> -->
