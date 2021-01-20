<template>
    <div>
        <tableIngredients
            v-show="isVisible('table')"/>

        <CreateIngredient
            v-show="isVisible('create')"/>

        <EditIngredient
            :ingredient="currentIngredient"
            v-show="isVisible('edit')"/>

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
            this.$bus.on('crud:ingredient:edit', this.handleEditIngredient);
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
            handleEditIngredient (ingredient) {
                this.currentIngredient = ingredient;
                this.showComponent = 'edit';
            },
            handleCreateIngredient () {
                this.showComponent = 'create';
            }
        }
    }
</script>
