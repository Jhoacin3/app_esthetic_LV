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
                <center> Agregar agenda</center>
              </div>
              <form @submit.prevent="submitForm" class="mt-10 px-4 space-y-4">
                <div>
                  <label for="fullName" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                  <input v-model="form.fullName" id="fullName" name="fullName" type="text" required
                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex flex-col">

                  <label for="service" class="text-sm mt-4 font-medium text-gray-700 mb-1">Tipo de Cita:</label>
                  <select v-model="form.service" id="service" name="service" required
                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="Maquillaje">Efecto Rimel</option>
                    <option value="Uñas acrílicas">Diseño de cejas </option>
                    <option value="Peinados">Alaciado</option>
                    <option value="Corte de cabello">Botox capilar</option>
                    <option value="Diseño de cejas">Uñas</option>
                    <option value="Tintes">Maquillaje</option>
                  </select>
                </div>
                <div class="flex mt-4 flex-col">
                  <label for="day" class="text-sm font-medium text-gray-700 mb-1">Día:</label>
                  <input type="date" v-model="form.day" id="day" name="day" required
                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex mt-4 flex-col">
                  <label for="hour" class="text-sm font-medium text-gray-700 mb-1">Hora:</label>
                  <input type="time" v-model="form.hour" id="hour" name="hour" min="00:00" max="23:59" required
                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
  import axios from 'axios';
  import Swal from 'sweetalert2';

  export default {
    data() {
      return {
        form: {
          fullName: '',
          service: '',
          day: '',
          hour: '',
        },
      };
    },
    props: {
      // Asegúrate de tener un array de servicios en tu componente padre o pasarlo desde la ruta
      services: Array,
    },
    methods: {
      async submitForm() {
        try {
          // Ojo, no necesitas asignar "this.form.permission = this.selectedPermissions;"
          // Puedes eliminar esa línea

          // Ojo, estoy utilizando $inertia.post para hacer la llamada
          await this.$inertia.post(route('agendas.store'), this.form);

          // seccion de que si funciono:) mensaje de éxito
          await Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Agenda agregado correctamente',
          });

          // Redirigir al usuario a la página principal de servicios
          this.$router.push('/agendas');
        } catch (error) {
          console.error('Error al enviar el formulario', error.response.status, error.response.statusText, error.response.data);

          let errorMessage = 'Hubo un error al agregar la agenda';

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
