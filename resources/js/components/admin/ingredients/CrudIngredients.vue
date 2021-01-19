<template>
    <div>
        <tableIngredients
            v-show="isVisible('table')"/>

        <CreateIngredient
            v-show="isVisible('create')"/>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                showComponent: 'table',
                currentIngredient: null
            }
        },
        beforeMount() {
            this.$bus.on('crud:ingredient:list', this.initial);
            this.$bus.on('crud:ingredient:create', this.handleCreateIngredient);
        },
        methods: {
            initial () {
                this.$bus.emit('ingredient:list:refresh')
                this.currentPizza = null;
                this.showComponent = 'table';
            },
            isVisible (name) {
                return this.showComponent === name;
            },
            handleCreateIngredient () {
                this.showComponent = 'create';
            }
        }
    }
</script>
