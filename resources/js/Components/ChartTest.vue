<script setup>
import { Line } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, LinearScale, PointElement, CategoryScale } from 'chart.js'

ChartJS.register(Title,  Tooltip, Legend, LineElement, LinearScale, PointElement, CategoryScale)

const props = defineProps(['labels', 'data', 'id'])
const labels = props.labels
const data = props.data

const chartOptions = {
      responsive: true,
      maintainAspectRatio: false
}
const chartData = {
      labels: labels,
      datasets: [
        {
          label: 'Price',
          backgroundColor: '#ffdbdb',
          borderColor: '#ff6385',
          data: data
        }
      ]
}
const chartId = 'line-chart'
const width = 400
const height = 400
const cssClasses = ''
const styles = {}
const plugins = []
</script>

<template>
    <p class="text-xl">{{props.id}} to USD Chart</p>
    <Line
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
    />
</template>
