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
                            <center> Actualizar producto o herramienta</center>
                        </div>
                        <form @submit.prevent="submitForm" class="mt-10 px-4 space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input v-model="form.name" id="name" name="name" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <input v-model="form.description" id="description" name="description" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                                <input v-model="form.quantity" id="quantity" name="quantity" type="number" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
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
    props: {
        inventory: Object,
    },
    data() {
        return {
            form: {
                name: this.inventory.name,
                description: this.inventory.description,
                quantity: this.inventory.quantity,
            },
        };
    },
    methods: {
        async submitForm() {
            try {
                // Asignamos los permisos seleccionados al formulario
                this.form.permission = this.selectedPermissions;

                // Ojo, estoy utilizando $inertia.post para hacer la llamada
                await this.$inertia.put(route('inventories.update', this.inventory.id), this.form);
                

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
