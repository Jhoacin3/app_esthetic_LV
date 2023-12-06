<script setup>
const selectService = (service) => {
  // Lógica para seleccionar el servicio si es necesario
  // Puedes redirigir a la página correspondiente según el servicio seleccionado

  if (service === 'Agendar Cita') {
    window.location.href = '/agendar-cita'; // Reemplaza con la ruta de tu página de agendar cita
  } else if (service === 'Cancelar') {
    window.location.href = '/cancelar'; // Reemplaza con la ruta de tu página de cancelar
  }
};
</script>

<template>
  <Head title="Dashboard" />

  <authentication-card-logo>
    <div class="py-70">
      <center>
        <div class="text-gray-900 font-extrabold italic text-7xl" style="font-family: 'Brush Script MT', cursive;">
          Beauty Studio
        </div>
      </center>

      <div class="flex mt-8 items-center justify-center">
        <!-- Imagen grande a la derecha -->
        <div class="w-1/3  rounded-full overflow-hidden">
          <img src="@/img/Efecto_rimmel.webp" alt="Descripción de la imagen" class="w-full h-auto" />
        </div>

        <!-- Descripción a la izquierda dentro de un cuadro con bordes difuminados -->
        <div class="w-1/2 p-4 rounded-lg shadow-lg">
          <!-- Título "Efecto rímel" -->
          <h2 class="text-2xl md:text-4xl font-bold mb-2">Rimel</h2>
          <!-- Precio (Ejemplo: $29.99) -->
          <p class="text-lg md:text-xl font-medium text-gray-600 mb-4">$29.99</p>
          <!-- Descripción -->
          <p class="text-base md:text-lg font-medium text-gray-800">
            El "efecto rímel" se refiere a los resultados estéticos al aplicar máscara de pestañas en las pestañas. Los efectos comunes incluyen alargamiento, volumen, curvatura, color y definición. La máscara de pestañas resalta la belleza natural de las pestañas y destaca la expresión de los ojos, logrando un aspecto más definido y atractivo.
        </p>
          <!-- Botones para agendar y cancelar con color y difuminado -->
          <div class="flex mt-4 space-x-4">
            <!-- Botón para Agendar Cita -->
            <button @click="selectService('Agendar Cita')" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:shadow-lg">Agendar Cita</button>
            
            <!-- Botón para Cancelar -->
            <button @click="selectService('Cancelar')" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:shadow-lg">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </authentication-card-logo>
</template>
