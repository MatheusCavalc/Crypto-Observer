<script setup>
import VueApexCharts from "vue3-apexcharts";

const props = defineProps(['labels', 'data', 'id'])
const labels = props.labels
const data = props.data

const options = {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: labels
        },
        title: {
          text: 'Price in One Year',
          align: 'left'
        },
        yaxis: {
          title: {
            text: 'Price USD'
          },
        }
}

const series = [{
        name: 'Price($)',
        data: data
}]


</script>

<template>
    <p class="text-xl">{{props.id}} to USD Chart</p>
    <div>
        <VueApexCharts type="line" :options="options" :series="series"></VueApexCharts>
    </div>
</template>