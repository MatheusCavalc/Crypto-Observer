<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import CryptoInfo from '@/Components/CryptoInfo.vue';
import CryptoStats from '@/Components/CryptoStats.vue';
import TDataBarStats from '@/Components/TDataBarStats.vue';
import Chart from '@/Components/Chart.vue';

const props = defineProps(['crypto'])

</script>

<template>

    <Head>
        <title>
            {{ name }} price today, {{ crypto.data.symbol }} to USD live, marketcap and chart |
        </title>
    </Head>

    <MainLayout>
        <div class="py-12 bg-gray-50">
            <div class="sm:px-6 lg:px-8">
                <Breadcrumb :coin="crypto.data.name">
                </Breadcrumb>
                <CryptoInfo :crypto="crypto.data">
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
                            <Chart :name="crypto.data.name" :id="crypto.data.id">
                            </Chart>
                        </div>
                        <div class="col-span-2"></div>

                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>

