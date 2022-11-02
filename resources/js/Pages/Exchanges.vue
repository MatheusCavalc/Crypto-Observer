<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Table from '@/Components/Table.vue';
    import THead from '@/Components/THead.vue';
    import TData from '@/Components/TData.vue';
    import TDataT from '@/Components/TDataT.vue';
    import { Link } from '@inertiajs/inertia-vue3';

    const { filters } = defineProps(['exchanges'])

</script>

<template>

    <MainLayout>
        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <Table>
                    <template #headColumns>
                        <THead type="first" label="#"/>
                        <THead type="first" label="Name"/>
                        <THead type="normal" label="Volume(24h)"/>
                        <THead type="normal" label="Pairs"/>
                        <THead type="normal" label="Percent Total Volume (%)"/>
                    </template>
                    <template #tableRows>
                        <tr v-for="exchange in exchanges.data" :key="exchange.rank">
                            <TData type="first">
                                {{ exchange.rank }}
                            </TData>

                            <TData type="first">
                                {{ exchange.name }}
                            </TData>

                            <TDataT type="normal" :label="exchange.volumeUsd">
                            </TDataT>

                            <TData type="normal">
                                {{ exchange.tradingPairs }}
                            </TData>

                            <TDataT type="first" :label="exchange.percentTotalVolume" per="%">
                            </TDataT>
                        </tr>
                    </template>
                </Table>
            </div>
        </div>
    </MainLayout>
</template>

