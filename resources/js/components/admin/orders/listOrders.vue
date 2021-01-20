<template>
    <div class="w-full mb-6 lg:mb-0 mt-10 px-4 flex flex-col">
        <div
            class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
            <div class="border-b">
                <div class="flex justify-between px-6 -mb-px">
                  <h3
                    class="text-blue-dark py-4 font-normal text-lg">
                      Ordenes
                  </h3>
                </div>
            </div>
            <div v-if="data.length">
                <cardOrder
                    :status="options"
                    v-for="(order, index) in data" :key="index" :order="order"/>
            </div>
            <div v-else class="text-center py-2 bg-gray-100 rounded">
                SIN ORDENES
            </div>
            <div class="px-6 py-4 text-center">
                <button
                    @click="getOrders()" v-if="next_page_url"
                    class="text-center text-grey">
                    <strong>Cargar más</strong>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import OrdersServices from '../../../services/orders.services'

    export default {
        data () {
            return {
                isLoading: true,
                next_page_url: null,
                data: [],
                options: []
            }
        },
        beforeMount() {
            this.getOrders()
            this.$bus.on('orders:list:refresh', () => {
                this.data = []
                this.next_page_url = null
                this.getPizzas()
            });
        },
        methods: {
            getOrders () {
                this.isLoading = true
                OrdersServices.all({
                    next_page_url: this.next_page_url
                }).then((resp) => {
                    this.data = [
                        ...this.data,
                        ...resp.data
                    ]
                    this.next_page_url = resp.next_page_url
                })
                .finally (() => {
                    this.isLoading = false
                })
            }
        }
    }
</script>
