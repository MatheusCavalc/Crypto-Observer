<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Table from '@/Components/Table.vue';
import THead from '@/Components/THead.vue';
import TData from '@/Components/TData.vue';
import TDataBar from '@/Components/TDataBar.vue';
import TablePagination from '@/Components/TablePagination.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['cryptos', 'offset'])

console.log(props.offset)
</script>

<template>

    <MainLayout>
        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <Table>
                    <template #headColumns>
                        <THead type="first" label="#" />
                        <THead type="first" label="Name" />
                        <THead type="normal" label="Price" />
                        <THead type="normal" label="24h %" />
                        <THead type="normal" label="Market Cap" />
                        <THead type="normal" label="Circulating Supply" />
                    </template>
                    <template #tableRows>
                        <tr v-for="crypto in cryptos.data" :key="crypto.rank">
                            <TData type="first">
                                {{ crypto.rank }}
                            </TData>

                            <TData type="first">
                                <Link :href="route('show.crypto', crypto.id)">
                                {{ crypto.name }}
                                </Link>
                            </TData>

                            <TData type="normal">
                                ${{ Number(crypto.priceUsd).toLocaleString('pt-BR', { maximumFractionDigits: 2 }) }}
                            </TData>

                            <TData type="dynamic" :label="crypto.changePercent24Hr">
                                {{ Number(crypto.changePercent24Hr).toLocaleString('pt-BR', {
                                        maximumFractionDigits: 2
                                    })
                                }}%
                            </TData>

                            <TData type="normal">
                                ${{ Number(crypto.marketCapUsd).toLocaleString('pt-BR', { maximumFractionDigits: 0 }) }}
                            </TData>

                            <TDataBar :crypto="crypto">
                            </TDataBar>
                        </tr>
                    </template>
                </Table>
                <TablePagination :page="offset"></TablePagination>
            </div>
        </div>
    </MainLayout>
</template>

