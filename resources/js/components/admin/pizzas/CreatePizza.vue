<template>
    <div class="w-full md:w-4/5 lg:w-1/2 mx-auto">
        <div class="px-8 pt-6 pb-8 mb-4 bg-white rounded" v-if="pizza">
            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="name">
                    Nombre
                </label>
                <input
                    id="name"
                    type="text"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': $v.pizza.name.$error}"
                    name="name"
                    placeholder="Nombre de la pizza"
                    v-model.trim.lazy="pizza.name"
                    required>

                    <p class="text-red-500" v-if="$v.pizza.name.$error">
                        El nombre de la pizza debe tener al menos {{ $v.pizza.name.$params.minLength.min }}
                    </p>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="price">
                    Price
                </label>
                <input
                    id="price"
                    type="text"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': $v.pizza.price.$error}"
                    name="price"
                    placeholder="USD 00.00"
                    v-model.trim.lazy="pizza.price"
                    required>

                    <p class="text-red-500" v-if="$v.pizza.price.$error">
                        Debe colocar un valor válido.
                    </p>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="price">
                    Ingredientes
                </label>
                    <multiselect
                        v-model.trim.lazy="pizza.ingredients"
                        placeholder="Ingredientes"
                        :searchable="false"
                        track-by="name"
                        label="name"
                        :class="{'border-red-500': $v.pizza.ingredients.$error}"
                        :multiple="true"
                        :hide-selected="true"
                        :options="options">
                        <template slot="singleLabel" slot-scope="{ option }">
                            <strong>{{ option.name }}</strong>
                        </template>
                    </multiselect>

                    <p class="text-red-500" v-if="$v.pizza.ingredients.$error">
                        Debe seleccionar por lo menos un ingrediente.
                    </p>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="image">
                    {{ pizza.image ? 'Actualizar imagen' :'Subir imagen' }}
                    <input
                        id="image"
                        type="file"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="image"
                        v-on:change="onChangeImage">
                </label>
            </div>

            <div class="w-full -m-1 mb-4 mt-10">
                <button class="px-6 py-1 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none mx-2" @click="$bus.emit('crud:pizza:list')">
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
    import Multiselect from 'vue-multiselect'
    import PizzasServices from '../../../services/pizzas.services'

    export default {
        components: { Multiselect },
        data () {
            return {
                pizza: {},
                options: []
            }
        },
        beforeMount () {
            PizzasServices.getIngredients().then((resp) => {
                console.log(resp)
                this.options = resp
            })
        },
        methods: {
            onChangeImage (e) {
                this.pizza.file = e.target.files[0];
            },
            submit () {
                this.$v.$touch()
                if (!this.$v.$invalid) {
                    PizzasServices.store(this.pizza)
                    .then((resp) => {
                        this.$bus.emit('crud:pizza:list');
                    })
                    .catch((error) => {})
                }
            }
        },
        validations: {
            pizza: {
                name: {
                    required,
                    minLength: minLength(4)
                },
                price: {
                    required,
                },
                ingredients: {
                    required,
                    minLength: minLength(1)
                },
            }
        }
    }
</script>
