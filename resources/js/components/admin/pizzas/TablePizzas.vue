<template>
    <div>
        <div class="w-full text-right block">
            <button @click="handleCreate()"
                class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                CREAR
            </button>
        </div>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Nombre</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Precio</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <tr v-for="(pizza, index) in data" :key="index">
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full bg-gray-200 border" :src="pizza.image">
                            </div>

                            <div class="ml-4">
                                <div class="text-2xl leading-5 font-medium text-gray-900">
                                    {{ pizza.name }}
                                </div>
                                <div class="flex -mx-2 mt-2">
                                    <span class="bg-gray-200 px-2 mx-2 rounded-full" v-for="(ingredient, index) in pizza.ingredients">
                                        {{ ingredient.name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-2xl leading-5 text-gray-900">
                            USD {{ pizza.price }}
                        </div>
                        <!-- <div class="text-sm leading-5 text-gray-500">Web dev</div> -->
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium -mx-1">
                        <button
                            @click="handleEdit(pizza)"
                            class="bg-gray-500 rounded text-white p-2 mx-1">
                            Editar
                        </button>
                        <button
                            @click="handleRemove(pizza)"
                            class="bg-red-500 rounded text-white p-2 mx-1">
                            Remover
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="w-full text-center pt-5 block">
            <button @click="getPizzas()" v-if="next_page_url"
                class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                VER MÁS
            </button>
        </div>
    </div>
</template>

<script>
    import PizzasMixin from '../../../mixins/pizzas.mixin'
    import PizzasServices from '../../../services/pizzas.services'

    export default {
        mixins: [PizzasMixin],
        methods: {
            handleEdit (pizza) {
                this.$bus.emit('crud:pizza:edit', pizza);
            },
            handleRemove (pizza) {
                PizzasServices.destroy(pizza.id).then((resp) => {
                    this.$bus.emit('pizza:list:refresh')
                })
            },
            handleCreate () {
                this.$bus.emit('crud:pizza:create');
            }
        }
    }
</script>


