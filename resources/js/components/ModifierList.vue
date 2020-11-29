<template>
    <ol class="p-0">
        <li
            class="inline-block mr-2 mb-2 px-3 py-1 bg-grey-light rounded-full text-sm font-semibold text-grey-darkest"
            v-for="modifier, key in modifiers"
            :key="key"
        >
            {{ modifier }}
            <button
                v-on:click="removeModifier(key)"
                v-if="showRemove"
                type="button"
                class="text-red font-bold"
            >
                ✖
            </button>
        </li>
    </ol>
</template>

<script>
export default {
    props: {
        modifiers: {
            type: Array,
            default: [],
        },
        showRemove: {
            type: Boolean,
            default: false,
        },
    },

    methods: {
        removeModifier(key) {
            this.$emit('remove-modifier', key);
        }
    }
}
</script>
