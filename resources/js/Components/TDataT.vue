<script setup>
import { computed } from "vue";
const props = defineProps(['type', 'label', 'per']);

const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
});

const label = formatter.format(props.label)

const classes = computed(() => {
    if (props.type === "first") {
        return "w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6"
    }
    if (props.type === "normal") {
        return "hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
    }
    if (props.type === "action") {
        return "py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6"
    }
    if (props.type === "dynamic" && Math.sign(props.label) === -1) {
        return "hidden px-3 py-4 text-red-600 text-sm text-gray-500 lg:table-cell"
    }
    if (props.type === "dynamic" && Math.sign(props.label) === 1) {
        return "hidden px-3 py-4 text-green-600 text-sm text-gray-500 lg:table-cell"
    }
})
</script>

<template>
    <td :class="classes">
        {{props.symbol}}{{label}}{{props.per}}
    </td>
</template>
