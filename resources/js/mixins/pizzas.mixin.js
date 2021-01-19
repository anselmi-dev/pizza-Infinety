import PizzasServices from '../services/pizzas.services'

export default {
    data () {
        return {
            isLoading: true,
            next_page_url: null,
            data: []
        }
    },
    beforeMount() {
        this.getPizzas()
        this.$bus.on('pizza:list:refresh', () => {
            this.data = []
            this.next_page_url = null
            this.getPizzas()
        });
    },
    beforeDestroy() {
        this.$bus.off('pizza:list:refresh');
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
            })
            .finally (() => {
                this.isLoading = false
            })
        }
    }
}
