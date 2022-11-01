<script setup>
import { computed } from "vue";
const props = defineProps(['supply', 'maxSupply', 'type', 'label', 'minimumFractionDigits', 'maximumFractionDigits', 'symbol', 'per', 'crypto']);
const per = (props.supply / props.maxSupply) * 100

const classesF = computed(() => {
    if (props.maxSupply != null && props.maxSupply != 0) {
        return "w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700"
    }
})
const classesS = computed(() => {
    if (props.maxSupply != null && props.maxSupply != 0) {
        return "bg-blue-600 h-1.5 rounded-full dark:bg-blue-500"
    }
})
const styles = computed(() => {
    if (props.maxSupply != null && props.maxSupply != 0) {
        return "width:" + per + "%"
    }
})
const classes = computed(() => {
    if (props.type === "normal") {
        return "hidden px-1 py-2 text-sm text-gray-500 lg:table-cell"
    }
})
</script>

<template>
    <td :class="classes">
        {{props.symbol}}{{Number(props.label).toLocaleString('pt-BR', {minimumFractionDigits: props.maximumFractionDigits, maximumFractionDigits: props.maximumFractionDigits})}}{{props.per}} {{props.crypto}}
        <div :class="classesF">
            <div :class="classesS" :style="styles"></div>
        </div>
    </td>
</template>
