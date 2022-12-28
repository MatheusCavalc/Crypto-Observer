<script setup>
const props = defineProps(['label'])
</script>

<template>
    <button type="button"
        class="py-2 px-3 text-xs font-medium text-center text-black bg-gray-200 hover:bg-gray-500 focus:bg-gray-400">
            {{ label }}
    </button>

</template>
