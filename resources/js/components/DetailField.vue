<template>
    <panel-item :field="field">
      <template v-slot:value>
        <nova-carbon-modifier-list :modifiers="modifiers" />
      </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    computed: {
        modifiers() {
            return this.field.value.split(',');
        }
    },
}
</script>
