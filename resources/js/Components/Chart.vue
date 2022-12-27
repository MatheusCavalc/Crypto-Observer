<script setup>
import VueApexCharts from "vue3-apexcharts";

const props = defineProps(['labels', 'data', 'id'])

const options = {
        chart: {
          id: props.id + 'PriceInAYear',
          zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
              }
        },
        xaxis: {
          categories: props.labels
        },
        title: {
          text: 'Price in a year',
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
        data: props.data
}]


</script>

<template>
    <p class="text-xl">{{props.id}} to USD Chart</p>
    <div>
        <VueApexCharts type="line" :options="options" :series="series"></VueApexCharts>
    </div>
</template>
