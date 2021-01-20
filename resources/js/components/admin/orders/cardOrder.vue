<template>
    <div
        class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4 relative">
        <loading :active.sync="isLoading" :is-full-page="false" :height="20"></loading>
        <div class="w-1/2 px-2">
            <div class="block text-lg">
                #{{ order.id }}
                <strong>{{ note.name }}</strong>
            </div>
            <div class="flex -mx-1 flex-wrap">
                <strong class="mx-1">{{ order.user.name }}</strong> | <span class="mx-1">{{ order.user.email }}</span>
            </div>
            <div class="flex -mx-1 flex-wrap">
                <div v-for="(ingredient, index) in note.ingredients" :key="index" class="bg-gray-200 px-1 m-1 rounded">
                    {{ ingredient.name }}
                </div>
            </div>
        </div>
        <div class="flex w-3/5 md:w/12">
            <div class="w-1/2 px-4">
                <div class="text-right">
                    <span class="block">
                        Creada: {{ order.created_at | date }}
                    </span>
                    USD {{ note.price }}
                </div>
            </div>
            <div class="w-1/2 px-4">
                <div class="text-right text-gray-800">
                    <select
                        class="py-1 px-3 rounded-md bg-gray-300 space-x-2"
                        :disabled="is_disabled"
                        v-on:change="onChangeStatus"
                        v-model.trim.lazy="order.status">
                        <option :value="option.value" v-for="(option, index) in options" :key="index">
                            {{ option.label }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrdersServices from '../../../services/orders.services'
import Loading from 'vue-loading-overlay';

export default {
    components: {
        Loading
    },
    props: {
        order: {
            type: Object,
            required: true
        }
    },
    data () {
        return {
            isLoading: false,
            options: [
                {
                    value: 'pending',
                    label: 'Pendiente'
                },
                {
                    value: 'completed',
                    label: 'Entregado'
                },
                {
                    value: 'cancel',
                    label: 'Cancelado'
                },
            ]
        }
    },
    filters: {
        date (value) {
            let current_datetime = new Date(value)
            return current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear()
        }
    },
    computed: {
        is_disabled () {
            return this.order.status == 'completed' || this.order.status == 'cancel'
        },
        note () {
            return JSON.parse(this.order.note)
        }
    },
    methods: {
        onChangeStatus (e) {
            this.isLoading = true
            this.order.status = e.target.value
            OrdersServices.update(this.order).then((resp) => {
                this.isLoading = false
            }).catch((err) => {
                this.$notification.error("Ocurrio un error al actualizar el estado de la orden.", {  timer: 10 });
                this.isLoading = false
            })
        }
    }
}
</script>
