<template>
    <div>
        <div class="px-4">
            <div class="flex flex-wrap -mx-4">
                <CardPizza :pizza="pizza" v-for="(pizza, index) in data" :key="index"/>
            </div>
        </div>
        <div class="w-full text-center pt-5 block">
            <button @click="getPizzas()" v-if="next_page_url"
                class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                VER MÁS
            </button>
        </div>
    </div>
</template>

<script>
    import CardPizza from './CardPizza'
    import PizzasMixin from '../../mixins/pizzas.mixin'

    export default {
        mixins: [PizzasMixin],
        components: {
            CardPizza
        },
    }
</script>
