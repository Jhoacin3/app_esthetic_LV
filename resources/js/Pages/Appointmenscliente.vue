<script setup>
import AuthenticatedLayoutCliente from "@/Layouts/AuthenticatedLayoutCliente.vue";
import { Head } from "@inertiajs/vue3";

</script>
<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('@/img/01.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    overflow: hidden;
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

    <AuthenticatedLayoutCliente>
      
        <div class="py-5 px-15">
          <div class="bg-white px-5 py-8 overflow-hidden shadow-sm sm:rounded-lg">

            <div class="text-3xl  font-bold text-black">
              <center> Agregar cita</center>
            </div>
            <form class="mt-10 px-4 space-y-4 ">
              <div class="flex flex-col">

                <div class="flex flex-col">
                  <label for="nombre" class="text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                  <input type="text" v-model="nombre" id="nombre" name="nombre" required
                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <label for="tipoCita" class="text-sm mt-4 font-medium text-gray-700 mb-1">Tipo de Cita:</label>
                <select v-model="tipoCita" id="tipoCita" name="tipoCita" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                  <option value="Maquillaje">Efecto Rimel</option>
                  <option value="Uñas acrílicas">Diseño de cejas</option>
                  <option value="Peinados">Alaciados </option>
                  <option value="Corte de cabello">Botox capilar y Bluetox </option>
                  <option value="Diseño de cejas">Repolarizacion capilares</option>
                </select>
              </div>

              <div class="flex mt-4 flex-col">
                <label for="dia" class="text-sm font-medium text-gray-700 mb-1">Día:</label>
                <input type="date" v-model="dia" id="dia" name="dia" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              </div>

              <div class="flex mt-4 flex-col">
                <label for="hora" class="text-sm font-medium text-gray-700 mb-1">Hora:</label>
                <input type="time" v-model="hora" id="hora" name="hora" min="23:59" max="23:59" required
                  class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              </div>

              <div class=" flex mt-4 justify-between">
                <button class="bg-blue-500 text-white mt-4 px-4 py-2 rounded hover:shadow-md">
                  Agregar
                </button>
              </div>
            </form>

          </div>
        </div>
      
    </AuthenticatedLayoutCliente>

  </div>
</template>
