<script setup>
const props = defineProps(['coin', 'id']);

const api_url = "https://api.coincap.io/v2/assets/" + props.id;

async function getCryptoPrice() {
    const response = await fetch(api_url);
    const data = await response.json();
    const value = data['data']['priceUsd'];
    const percent24hrs = data['data']['changePercent24Hr']

    document.getElementById('cryptoPrice').textContent = '$' + parseFloat(value).toFixed(2);
    document.getElementById('changePercent24Hr').textContent = parseFloat(percent24hrs).toFixed(2) + '%';

    setTimeout(() => getCryptoPrice(), 15000)
}

getCryptoPrice();

</script>

<template>
   <div class="container mt-8">
        <div class="grid grid-cols-2 gap-4 static">
            <div>
                <span class="text-2xl">{{props.coin.data.name}}</span>
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">{{props.coin.data.symbol}}</span>
                <a href="">#</a>
            </div>

            <div class="place-self-end">
                <span id="cryptoPrice" class="text-2xl pr-4"></span>
                <span id="changePercent24Hr" :class="style"></span>
            </div>

            <div>
                <p class="mt-2">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Rank #{{ props.coin.data.rank }}</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Coin</span> <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Wishlist</span>
                </p>
            </div>
        </div>
    </div>


</template>
