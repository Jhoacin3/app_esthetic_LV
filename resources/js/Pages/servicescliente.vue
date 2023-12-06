<script setup>
import AuthenticatedLayoutCliente from '@/Layouts/AuthenticatedLayoutCliente.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style scoped>

.background-container {
    position: relative;
    width: 100%;
    height: auto;
    background-image: url('@/img/01.webp');
    background-size: cover;
    background-position: center;
    
    margin: 0;
    padding: 0;
    overflow: hidden;
}

/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .background-container {
        height: auto; /* Cambiado a auto para permitir que el contenido expanda según sea necesario */
    }

    .imgen2 {
        position: relative; /* Cambiado a relativo para que fluya con el contenido */
        width: 100%; /* La imagen ocupa el 100% del ancho del contenedor padre */
        max-width: 500px; /* Establece un límite máximo para el ancho de la imagen */
        height: auto; /* La altura se ajusta automáticamente según el ancho */
        margin-top: 20px; /* Agregado espacio entre la imagen y el texto */
        margin-right: 10px; /* Agregado espacio a la derecha de la imagen */
    }

    p,
    h1 {
        text-align: center; /* Centrar el texto en dispositivos más pequeños */
    }
}

p {
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
    color: #333;
    text-align: center;
    line-height: 1.5;
}

h1 {
    font-size: 30px;
    color: goldenrod;
    font-family: 'Brush Script MT', cursive;
    text-align: center;
    line-height: 1.5;
}


</style>

<template>
    <Head title="Dashboard" />
    <div class="background-container">

    <AuthenticatedLayoutCliente>





        <div >
           <center> <div class=" text-black font-extrabold italic text-7xl" style="font-family: 'Brush Script MT', cursive;">
                Beauty Studio
            </div></center>
            <div class="mt-7 button-container">
                
                <!-- Primer botón con fondo rosa -->
                <a href='/efectorimel' class="dual-color-button pink" @click="selectService('efectorimel')">
                    <img src="@/img/Efecto_rimmel.webp" alt="" class="button-image" />
                    <span class="button-label">efectorimel</span>
                </a>

                <!-- Segundo botón con fondo azul -->
                <a href="/diseñodecejas" class="dual-color-button blue" @click="selectService('Maquillaje')">
                    <img src="@/img/diseño_cejas_herramientas.webp" alt="" class="button-image" />
                    <span class="button-label">Diseño de cejas</span>
                </a>

                <!-- Tercer botón con fondo rosa -->
                <a href='/alaciado' class="dual-color-button pink" @click="selectService('Cabello')">
                    <img src="@/img/alaciado.webp" alt="" class="button-image" />
                    <span class="button-label">Alaciado</span>
                </a>

                <!-- Cuarto botón con fondo azul -->

                <a href='/botoxcapilar' class="dual-color-button blue" @click="selectService('Cejas')">

                    <img src="@/img/botox-capilar.webp" alt="" class="button-image" />
                    <span class="button-label">Botox capilar</span>
                </a>
                <a href='/uñas' class="dual-color-button pink" @click="selectService('Cabello')">
                    <img src="@/img/uñas_rosadas.webp" alt="" class="button-image" />
                    <span class="button-label">Uñas</span>
                </a>
                <!-- Cuarto botón con fondo azul -->
                <a href='/maquillaje' class="dual-color-button blue" @click="selectService('Cejas')">
                    <img src="@/img/Maquillaje_ojos_creativo.webp" alt="" class="button-image" />
                    <span class="button-label">Maquillaje</span>
                </a>
            </div>

        </div>
        
    </AuthenticatedLayoutCliente>

    </div>
</template>

<style scoped>



.carousel-title {
    text-align: center;
    font-size: 1.5rem;
    margin-top: 20px;
}

.button-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    /* Espacio entre los botones */
}

.dual-color-button {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 40px; /* Aumentar el padding para hacer el botón más grande */
    font-size: 2rem; /* Ajustar el tamaño de la fuente */
    text-decoration: none;
    font-family: 'Brush Script MT', cursive;
    color: #131212;
    border: 2px solid #fff; /* Aumentar el grosor del borde */
    border-radius: 5px; /* Ajustar el radio de borde */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}


.dual-color-button img {
    width: 140px; /* Ajusta el ancho de la imagen */
    height: 140px; /* Ajusta la altura de la imagen */
    border-radius: 90%; /* Hace que la imagen sea redonda */
    margin-bottom: 40px; /* Espacio entre la imagen y el texto */
}

.dual-color-button.pink {
    background: linear-gradient(to right, #ff80bf 100%, #fff 20%, #fff 80%, #ff80bf 80%);
    /* Gradiente de color rosa */
}

.dual-color-button.blue {
    background: linear-gradient(to right, #80bfff 100%, #fff 20%, #fff 80%, #80bfff 80%);
    /* Gradiente de color azul */
}

.dual-color-button:hover {
    background-color: #555;
    /* Color de fondo al pasar el ratón */
    transform: scale(1.1);
}

.carousel-container {
    width: 60vw;
    /* Ancho ajustado según tus necesidades */
    margin: 0 auto;
    /* Centra el contenedor horizontalmente */
    overflow: hidden;
}

.carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
    overflow: hidden;
}

.carousel-item {
    box-sizing: border-box;
    margin-bottom: 20px;
    /* Espacio entre las imágenes */
}

.carousel-image {
    min-width: 100%;
    height: auto;
    border-radius: 8px;
    /* Ajusta el radio de borde según sea necesario */
}

.active {
    transform: scale(1.2);
    /* Puedes ajustar el tamaño de la imagen activa */
}</style>

  