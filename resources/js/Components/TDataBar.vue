<script setup>
import { ref } from 'vue';
const props = defineProps(['crypto']);

let classBar = ref('')
let classPer = ref('')
let style = ref('')
let haveBar = ref(false)

const classs = () => {
    if (props.crypto.maxSupply != null && props.crypto.maxSupply != 0) {
        haveBar.value = true
        classBar.value = "w-full bg-gray-200 rounded-full h-1.5 mb-4"
        classPer.value = "bg-blue-600 h-1.5 rounded-full"
        style.value = "width:" + (props.crypto.supply / props.crypto.maxSupply) * 100 + "%"
    }
}
const supply = Number(props.crypto.supply).toLocaleString('pt-BR', {minimumFractionDigits: 0, maximumFractionDigits: 0})

classs()
</script>

<template>
    <td v-if="haveBar" class="hidden px-1 pt-3 text-sm text-gray-500 lg:table-cell">
        {{ supply }} {{crypto.symbol}}
        <div :class="classBar">
            <div :class="classPer" :style="style"></div>
        </div>
    </td>

    <td v-else class="hidden px-1 py-2 text-sm text-gray-500 lg:table-cell">
        {{ supply }} {{crypto.symbol}}
    </td>
</template>
