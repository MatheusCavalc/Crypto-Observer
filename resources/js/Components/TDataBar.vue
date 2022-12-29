<script setup>
import { computed } from "vue";
const props = defineProps(['crypto']);
const FractionDigits = 0

const classBar = computed(() => {
    if (props.crypto.maxSupply != null && props.crypto.maxSupply != 0) {
        return "w-full bg-gray-200 rounded-full h-1.5 mb-4"
    }
})
const classPer = computed(() => {
    if (props.crypto.maxSupply != null && props.crypto.maxSupply != 0) {
        return "bg-blue-600 h-1.5 rounded-full"
    }
})
const style = computed(() => {
    if (props.crypto.maxSupply != null && props.crypto.maxSupply != 0) {
        return "width:" + (props.crypto.supply / props.crypto.maxSupply) * 100 + "%"
    }
})
const supply = Number(props.crypto.supply).toLocaleString('pt-BR', {minimumFractionDigits: FractionDigits, maximumFractionDigits: FractionDigits})


</script>

<template>
    <td class="hidden px-1 py-2 text-sm text-gray-500 lg:table-cell">
        {{ supply }} {{crypto.symbol}}
        <div :class="classBar">
            <div :class="classPer" :style="style"></div>
        </div>
    </td>
</template>
