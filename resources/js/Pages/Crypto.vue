<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Breadcrumb from '@/Components/Breadcrumb.vue';
    import CryptoInfo from '@/Components/CryptoInfo.vue';
    import ChartTest from '@/Components/ChartTest.vue';
    import CryptoStats from '@/Components/CryptoStats.vue';
    import TDataBarStats from '@/Components/TDataBarStats.vue';

    const props = defineProps(['crypto', 'labels', 'data'])

</script>

<template>

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Breadcrumb :coin="crypto.data.name">
                </Breadcrumb>
                <CryptoInfo :coin="crypto" :id="crypto.data.id">
                </CryptoInfo>
                <div class="mt-6">
                    <div class="grid grid-cols-8 gap-4">

                        <CryptoStats :id="crypto.data.id">
                        </CryptoStats>
                        <div class="col-span-2">
                            <TDataBarStats type="stats" :label="crypto.data.supply" minimumFractionDigits="0" maximumFractionDigits="0" :crypto=" crypto.data.symbol" :supply="crypto.data.supply" :maxSupply="crypto.data.maxSupply">
                            </TDataBarStats>
                        </div>

                        <div class="col-span-6">
                            <ChartTest :labels="labels" :data="data" :id="crypto.data.name">
                            </ChartTest>
                        </div><div class="col-span-2"></div>

                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

