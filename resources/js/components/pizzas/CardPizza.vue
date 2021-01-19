<template>
    <div class="flex flex-col justify-center items-center px-4 my-8 w-full sm:w-1/2 md:w-1/3">
        <a
            :href="url"
            v-bind:style="{ backgroundImage: 'url(' + image + ')' }"
            class="bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center">
        </a>
        <div class="w-9/12 md:w-64 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden">
            <div class="py-2 text-center font-bold uppercase tracking-wide text-gray-800 px-2">
                {{ pizza.name }}
            </div>
            <div class="flex items-center justify-between py-2 px-3 bg-gray-400 -mx-1">
                <h1 class="text-gray-800 font-bold px-1">
                    USD {{ pizza.price }}
                </h1>
                <button class="bg-red-600 text-xs text-white px-2 py-1 font-semibold rounded uppercase hover:bg-gray-700 px-1">
                    comprar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pizza: {
            type: Object,
            required: true
        }
    },
    computed: {
        url () {
            return `/pizzas/${this.pizza.slug}`;
        },
        image () {
            return this.pizza.image ? this.pizza.image : 'img/empy.jpg'
        }
    }
}

</script>
