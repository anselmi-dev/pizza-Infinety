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
    import PizzasServices from '../../services/pizzas.services'

    export default {
        components: {
            CardPizza
        },
        data () {
            return {
                isLoading: true,
                data: [],
                next_page_url: null
            }
        },
        beforeMount() {
            this.getPizzas()
        },
        methods: {
            getPizzas () {
                this.isLoading = true
                PizzasServices.all({
                    next_page_url: this.next_page_url
                }).then((resp) => {
                    this.data = [
                        ...this.data,
                        ...resp.data
                    ]
                    this.next_page_url = resp.next_page_url
                    console.log({resp})
                })
                .finally (() => {
                    this.isLoading = false
                })
            }
        }
    }
</script>
