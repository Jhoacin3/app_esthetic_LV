<script setup>
import AuthenticatedLayoutCliente from '@/Layouts/AuthenticatedLayoutCliente.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayoutCliente>
        <template #header>

        </template>

        <div>
           <center> <div class=" text-gray-900 font-extrabold italic text-7xl" style="font-family: 'Brush Script MT', cursive;">
                Beauty Studio
            </div></center>
            <div class="mt-9 button-container">
                <!-- Primer botón con fondo rosa -->
                <a href="#" class="dual-color-button pink" @click="selectService('Uñas')">
                    <img src="/img/uñas1.jpg" alt="Diseño de uñas" class="button-image" />
                    <span class="button-label">Uñass</span>
                </a>

                <!-- Segundo botón con fondo azul -->
                <a href="#" class="dual-color-button blue" @click="selectService('Maquillaje')">
                    <img src="/img/maquillage1.jpg" alt="Maquillaje" class="button-image" />
                    <span class="button-label">Maquillaje</span>
                </a>

                <!-- Tercer botón con fondo rosa -->
                <a href="#" class="dual-color-button pink" @click="selectService('Cabello')">
                    <img src="/img/peinado.jpg" alt="Peinados" class="button-image" />
                    <span class="button-label">Cabello</span>
                </a>

                <!-- Cuarto botón con fondo azul -->
                <a href="#" class="dual-color-button blue" @click="selectService('Cejas')">
                    <img src="/img/Cejas.jpg" alt="Diseño de Cejas" class="button-image" />
                    <span class="button-label">Cejas</span>
                </a>
            </div>

        </div>


    </AuthenticatedLayoutCliente>
</template>


<script>
export default {
    data() {
        return {
            selectedServiceImages: [],
            services: {
                Uñas: [
                    { url: 'img/uñas_rosadas.png', alt: 'Diseño de uñas 1', link: 'https://www.ejemplo.com/ordenar-unas-1' },
                    { url: 'img/Uñas_multicolor.jpg', alt: 'Diseño de uñas 2', link: 'https://www.ejemplo.com/ordenar-unas-2' },
                    // Agrega más imágenes según sea necesario
                ],
                Maquillaje: [
                    { url: 'img/Maquillaje_azul.jpg', alt: 'Maquillaje 1', link: 'https://www.ejemplo.com/ordenar-maquillaje-1' },
                    { url: 'img/Maquillaje_ojos_creativo.webp', alt: 'Maquillaje 2', link: 'https://www.ejemplo.com/ordenar-maquillaje-2' },
                    // Agrega más imágenes según sea necesario
                ],
                Cabello: [
                    { url: 'img/Peinado_lazoazul.jpg', alt: 'Cabello 1', link: 'https://www.ejemplo.com/ordenar-cabello-1' },
                    { url: 'img/Peinados.jpg', alt: 'Cabello 2', link: 'https://www.ejemplo.com/ordenar-cabello-2' },
                    // Agrega más imágenes según sea necesario
                ],
                Cejas: [
                    { url: 'img/Cejas.jpg', alt: 'Diseño de cejas 1', link: 'https://www.ejemplo.com/ordenar-cejas-1' },
                    { url: 'img/maquillaje_ojos_individual.jpg', alt: 'Diseño de cejas 2', link: 'https://www.ejemplo.com/ordenar-cejas-2' },
                    // Agrega más imágenes según sea necesario
                ],
            },
            images: [
                'img/Peinado_lazoazul.jpg',
                'img/Cara_Crema.jpg',
                'img/Cara_estetica_Maquina.jpg',
            ],
            currentIndex: 0,
        };
    },
    methods: {
        changeSlide(index) {
            this.currentIndex = index;
            this.showSlide();
        },
        selectService(service) {
            this.selectedServiceImages = this.services[service];
            this.$refs.carouselInner.style.transform = 'translateY(0)';
        },
        showSlide() {
            const carouselInner = this.$refs.carouselInner;
            if (carouselInner) {
                const translateValue = -this.currentIndex * 100 + '%';
                carouselInner.style.transform = 'translateY(' + translateValue + ')';
            }
        },
    },
    mounted() {
        console.log(this.$refs.carouselInner); // Verifica el valor de carouselInner
        setInterval(() => {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
            this.showSlide();
        }, 5000);
    },
};
</script>

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
    font-size: 1rem; /* Ajustar el tamaño de la fuente */
    text-decoration: none;
    color: #fff;
    border: 2px solid #fff; /* Aumentar el grosor del borde */
    border-radius: 5px; /* Ajustar el radio de borde */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}


.dual-color-button img {
    width: 140px; /* Ajusta el ancho de la imagen */
    height: 140px; /* Ajusta la altura de la imagen */
    border-radius: 90%; /* Hace que la imagen sea redonda */
    margin-bottom: 50px; /* Espacio entre la imagen y el texto */
}

.dual-color-button.pink {
    background: linear-gradient(to right, #ff80bf 20%, #fff 20%, #fff 80%, #ff80bf 80%);
    /* Gradiente de color rosa */
}

.dual-color-button.blue {
    background: linear-gradient(to right, #80bfff 20%, #fff 20%, #fff 80%, #80bfff 80%);
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