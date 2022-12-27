<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import CryptoInfo from '@/Components/CryptoInfo.vue';
import CryptoStats from '@/Components/CryptoStats.vue';
import TDataBarStats from '@/Components/TDataBarStats.vue';
import Chart from '@/Components/Chart.vue';

const props = defineProps(['crypto', 'labels', 'data'])

</script>

<template>

    <Head>
        <title>
            {{ crypto.data.name }} price today, {{ crypto.data.symbol }} to USD live, marketcap and chart |
        </title>
    </Head>

    <MainLayout>
        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <Breadcrumb :coin="crypto.data.name">
                </Breadcrumb>
                <CryptoInfo :coin="crypto">
                </CryptoInfo>
                <div class="mt-6">
                    <div class="grid grid-cols-8 gap-4">

                        <CryptoStats :id="crypto.data.id">
                        </CryptoStats>
                        <div class="col-span-2">
                            <TDataBarStats :crypto="crypto.data">
                            </TDataBarStats>
                        </div>

                        <div class="col-span-6">
                            <Chart :labels="labels" :data="data" :id="crypto.data.name">
                            </Chart>
                        </div>
                        <div class="col-span-2"></div>

                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>

