<script setup>
import { computed } from "vue";
const props = defineProps(['crypto']);
const FractionDigits = 0

const per = computed(() => {
    if (props.crypto.maxSupply != null && props.crypto.maxSupply != 0) {
        return Math.round((props.crypto.supply / props.crypto.maxSupply) * 100) + '%'
    }
})
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
const haveMaxSupply = computed(() => {
    if (props.crypto.maxSupply) {
        return Number(props.crypto.maxSupply).toLocaleString('pt-BR', {minimumFractionDigits: FractionDigits,
                maximumFractionDigits: FractionDigits})
    } else {
        return '--'
    }
})

const supply = Number(props.crypto.supply).toLocaleString('pt-BR', {minimumFractionDigits:
            FractionDigits, maximumFractionDigits: FractionDigits})
</script>

<template>
    <p>Circulating Supply</p>
    <div class="flex justify-between">
        <span>
            {{ supply }}
            {{ crypto.symbol }}
        </span>
        <span class="pl-auto">
            {{ per }}
        </span>
    </div>

    <div class="mt-3">
        <div :class="classBar">
            <div :class="classPer" :style="style"></div>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <span>Max Supply</span>
            <span>{{ haveMaxSupply }}</span>
        </div>
        <div class="flex justify-between">
            <span>Total Supply</span>
            <span>{{ supply }}</span>
        </div>
    </div>
</template>
