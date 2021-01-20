<template>
    <div class="p-4 max-w-full md:w-1/2 ">
        <div class="md:flex shadow-lg h-50">
            <div class="w-full md:w-1/3 h-50 rounded-lg rounded-r-none pb-5/6 bg-gray-200" v-bind:style="{backgroundImage: 'url(' + image + ')' }" style="background-position: center;background-size: cover;"></div>

            <div class="w-full md:w-2/3 px-4 py-4 bg-white rounded-lg" style="display: flex; flex-wrap: wrap; justify-content: space-between; flex-direction: column;">
                <div>
                    <div class="flex items-center">
                        <h2 class="text-2xl text-gray-800 font-medium mr-auto">{{ pizza.name }}</h2>
                    </div>
                    <p class="text-sm text-gray-700 mt-4 -mx-1">
                        <span class="mx-1 rounded bg-gray-200 p-2" v-for="(ingredient, index) in pizza.ingredients" :key="index">
                            {{ingredient.name}}
                        </span>
                    </p>
                </div>
                <div class="flex items-center justify-end mt-4 top-auto">
                    <p class="text-red-500 font-semibold tracking-tighter mr-auto ">
                        USD {{ pizza.price }}
                    </p>
                    <button class=" bg-red-400 hover:bg-red-600 text-gray-200 px-2 py-2 rounded-md " @click="addOrder()">Pidela!</button>
                </div>
           </div>
        </div>
    </div>
</template>

<script>
import OrdersServices from '../../services/orders.services'

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
    },
    methods: {
        addOrder () {
            if (document.querySelector('meta[name="USER_ID"]').content)  {
                OrdersServices.store(this.pizza).then((resp) => {
                    this.$notification.dark(`Su pizza ${this.pizza.name} ya está siendo procesada`, {  timer: 10 });
                })
            } else{
                this.$notification.error("Debe iniciar sesión para continuar", {  timer: 10 });
            }
        }
    }
}

</script>
