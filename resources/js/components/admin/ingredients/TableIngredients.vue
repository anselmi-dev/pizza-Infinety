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
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <tr v-for="(ingredient, index) in data" :key="index">
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">

                            <div class="ml-4">
                                <div class="text-2xl leading-5 font-medium text-gray-900">
                                    {{ ingredient.name }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium -mx-1">
                        <button
                            @click="handleRemove(ingredient)"
                            class="bg-red-500 rounded text-white p-2 mx-1">
                            Remover
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import IngredientServices from '../../../services/ingredient.services'

    export default {
        data () {
            return {
                isLoading: true,
                data: []
            }
        },
        beforeMount() {
            this.getIngredients()
            this.$bus.on('ingredient:list:refresh', () => {
                this.data = []
                this.getIngredients()
            });
        },
        methods: {
            getIngredients () {
                this.isLoading = true
                IngredientServices.all().then((resp) => {
                    this.data = resp
                })
                .finally (() => {
                    this.isLoading = false
                })
            },
            handleRemove (ingredient) {
                IngredientServices.destroy(ingredient.id).then((resp) => {
                    this.$bus.emit('ingredient:list:refresh')
                })
            },
            handleCreate () {
                this.$bus.emit('crud:ingredient:create');
            }
        }
    }
</script>


