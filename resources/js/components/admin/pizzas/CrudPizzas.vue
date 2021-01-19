<template>
    <div>
        <tablePizzas
            v-show="isVisible('table')"/>

        <CreatePizza
            v-show="isVisible('create')"/>

        <EditPizza
            v-show="isVisible('edit')"
            :pizza="currentPizza"/>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                showComponent: 'table',
                currentPizza: null
            }
        },
        beforeMount() {
            this.$bus.on('crud:pizza:list', this.initial);
            this.$bus.on('crud:pizza:edit', this.handleEditPizza);
            this.$bus.on('crud:pizza:create', this.handleCreatePizza);
        },
        methods: {
            initial () {
                this.$bus.emit('pizza:list:refresh')
                this.currentPizza = null;
                this.showComponent = 'table';
            },
            isVisible (name) {
                return this.showComponent === name;
            },
            handleEditPizza (pizza) {
                this.currentPizza = pizza;
                this.showComponent = 'edit';
            },
            handleCreatePizza (pizza) {
                this.showComponent = 'create';
            }
        }
    }
</script>
