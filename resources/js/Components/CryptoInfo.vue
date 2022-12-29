<script setup>
import { ref } from "vue";

const props = defineProps(['crypto']);
const classPer = ref('')
const price = ref('')
const percent24hrs = ref('')

const api_url = "https://api.coincap.io/v2/assets/" + props.crypto.id;

async function getCryptoPrice() {
    const response = await fetch(api_url);
    const data = await response.json();

    price.value = '$' + parseFloat(data['data']['priceUsd']).toFixed(2);
    percent24hrs.value = parseFloat(data['data']['changePercent24Hr']).toFixed(2) + '%';

    classPer.value = Math.sign(percent24hrs) === 1
        ? 'bg-green-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded'
        : 'bg-red-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded'

    setTimeout(() => getCryptoPrice(), 15000)
}

getCryptoPrice();
</script>

<template>
    <div class="container mt-8">
        <div class="grid grid-cols-2 gap-4 static">
            <div>
                <p class="text-2xl">{{ crypto.name }}
                    <span
                        class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                        {{ crypto.symbol }}
                    </span>
                </p>
            </div>

            <div class="place-self-end">
                <span id="cryptoPrice" class="text-2xl pr-4">{{ price }}</span>
                <span id="changePercent24Hr" :class="classPer">{{ percent24hrs }}</span>
            </div>

            <div>
                <p class="mt-2">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Rank
                        #{{ crypto.rank }}</span>
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Coin</span>
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Wishlist</span>
                </p>
            </div>
        </div>
    </div>


</template>
