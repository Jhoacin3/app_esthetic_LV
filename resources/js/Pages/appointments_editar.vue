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
              <center> Editar cita</center>
            </div>
            <form class="mt-10 px-4 space-y-4 ">
              <div class="flex flex-col">
                <label for="tipoCita" class="text-sm font-medium text-gray-700 mb-1">Tipo de Cita:</label>
                <select v-model="tipoCita" id="tipoCita" name="tipoCita" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                  <option value="Maquillaje">Maquillaje</option>
                  <option value="Uñas acrílicas">Uñas acrílicas</option>
                  <option value="Peinados">Peinados</option>
                  <option value="Corte de cabello">Corte de cabello</option>
                  <option value="Diseño de cejas">Diseño de cejas</option>
                  <option value="Tintes">Tintes</option>
                </select>
              </div>

              <div class="flex flex-col">
                <label for="dia" class="text-sm font-medium text-gray-700 mb-1">Día:</label>
                <input type="date" v-model="dia" id="dia" name="dia" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              </div>

              <div class="flex flex-col">
                <label for="hora" class="text-sm font-medium text-gray-700 mb-1">Hora:</label>
                <input type="time" v-model="hora" id="hora" name="hora" min="23:59" max="23:59" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              </div>

              <div class=" flex justify-between">
                <button class="bg-blue-500 text-white mt-4 px-4 py-2 rounded hover:shadow-md">
                  Guardar
                </button>
              </div>
            </form>

          </div>
        </div>
      </template>
    </AuthenticatedLayout>

  </div>
</template>
