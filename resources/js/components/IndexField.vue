<template>
    <nova-carbon-modifier-list :modifiers="modifiers" />
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    computed: {
        modifiers() {
            return this.field.value.split(',');
        }
    },
}
</script>
