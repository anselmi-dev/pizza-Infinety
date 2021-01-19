<template>
    <div class="w-full md:w-4/5 lg:w-1/2 mx-auto">
        <div class="px-8 pt-6 pb-8 mb-4 bg-white rounded" v-if="ingredient">
            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="name">
                    Nombre
                </label>
                <input
                    id="name"
                    type="text"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': $v.ingredient.name.$error}"
                    name="name"
                    placeholder="Nombre de la pizza"
                    v-model.trim.lazy="ingredient.name"
                    required>

                    <p class="text-red-500" v-if="$v.ingredient.name.$error">
                        El nombre del ingrediente debe tener al menos {{ $v.ingredient.name.$params.minLength.min }}
                    </p>
            </div>

            <div class="w-full -m-1 mb-4 mt-10">
                <button class="px-6 py-1 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none mx-2" @click="$bus.emit('crud:ingredient:list')">
                    Cancelar
                </button>
                <button class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full bg-red-600 hover:bg-red-700  text-white focus:outline-none mx-1" @click="submit">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import { required, minLength } from 'vuelidate/lib/validators'
    import IngredientServices from '../../../services/ingredient.services'

    export default {
        data () {
            return {
                ingredient: {},
                options: []
            }
        },
        methods: {
            submit () {
                this.$v.$touch()
                if (!this.$v.$invalid) {
                    IngredientServices.store(this.ingredient)
                    .then((resp) => {
                        this.$bus.emit('crud:ingredient:list');
                    })
                    .catch((error) => {})
                }
            }
        },
        validations: {
            ingredient: {
                name: {
                    required,
                    minLength: minLength(4)
                }
            }
        }
    }
</script>
