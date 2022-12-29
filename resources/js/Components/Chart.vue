<script setup>
import { ref } from "vue";
import moment from "moment";
import axios from "axios";
import VueApexCharts from "vue3-apexcharts";
import ChartButton from "@/Components/ChartButton.vue";

const props = defineProps(['name', 'id'])

const labelsChart = ref([])
const dataChart = ref([])
const timeChart = ref('')

const historyChart = (interval, key, timeC, format) => {
    const url = 'https://api.coincap.io/v2/assets/' + props.id + '/history?interval=' + interval
    axios.get(url).then(res => {
        const response = res.data
        const data = response.data.map(index => parseFloat(index.priceUsd).toFixed(2))
        const time = response.data.map(index => moment(index.date).format(format))

        dataChart.value = data.slice(key)
        labelsChart.value = time.slice(key)
        timeChart.value = timeC
    })
}

const options = (labels, time) => {
    return {
        chart: {
            id: props.name + ' Price in the last ' + time,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            }
        },
        xaxis: {
            categories: labels
        },
        title: {
            text: 'Price in the last ' + time,
            align: 'left'
        },
        yaxis: {
            title: {
                text: 'Price USD'
            },
        }
    }
}

const series = [{
    name: 'Price($)',
    data: dataChart
}]

historyChart('m30', 563, '1 day', 'h:mm')
</script>

<template>
    <div class="flex justify-between">
        <div>
            <p class="text-xl">{{ props.name }} to USD Chart</p>
        </div>
        <div>
            <ChartButton label="1D" @click="historyChart('m30', 563, '1 day', '[day] D, h:mm')" />
            <ChartButton label="7D" @click="historyChart('h1', 535, '7 days', '[day] D, h:mm')" />
            <ChartButton label="1M" @click="historyChart('h2', 363, '1 month', 'MMM D, h:mm')" />
            <ChartButton label="3M" @click="historyChart('h12', 545, '3 months', 'MMM D, h:mm')" />
            <ChartButton label="1Y" @click="historyChart('d1', 0, '1 Year', 'DD/MM/YYYY, h:mm')" />
        </div>
    </div>
    <div class="mt-3">
        <VueApexCharts type="line" :options="options(labelsChart, timeChart)" :series="series"></VueApexCharts>
    </div>
</template>
