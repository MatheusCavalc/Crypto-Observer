<script setup>
const props = defineProps(['id']);

const api_url = "https://api.coincap.io/v2/assets/" + props.id;
const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0
});

async function getCryptoPrice() {
    const response = await fetch(api_url);
    const data = await response.json();
    const marketCap = data['data']['marketCapUsd'];
    const price = data['data']['priceUsd']
    const maxSupply = data['data']['maxSupply']
    const supply = data['data']['supply']

    const volumeUsd24Hr = data['data']['volumeUsd24Hr']

    document.getElementById('marketCap').textContent = formatter.format(marketCap);
    document.getElementById('FDMC').textContent = maxSupply != null ? formatter.format(price * maxSupply) : formatter.format(price * supply)
    document.getElementById('volumeUsd24Hr').textContent = formatter.format(volumeUsd24Hr);


    setTimeout(() => getCryptoPrice(), 15000)
}

getCryptoPrice();

</script>

<template>
    <div class="col-span-2">
        <p>Market Cap</p>
        <p id="marketCap"></p>
    </div>

    <div class="col-span-2">
        <p>Fully Diluted Market Cap</p>
        <p id="FDMC"></p>
    </div>

    <div class="col-span-2">
        <p>Volume
            <span class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                24h
            </span>
        </p>
        <p id="volumeUsd24Hr"></p>
    </div>

</template>
