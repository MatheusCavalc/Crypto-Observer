<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['page'])

const previous = parseInt(props.page) - 20 < 0 ? '/?offset=0' : '/?offset=' + (parseInt(props.page) - 20)

const next = parseInt(props.page) + 20 > 80 ? '/?offset=80' : '/?offset=' + (parseInt(props.page) + 20)

const classes = (page) => {
    if (page) {
        return "px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700"
    } else {
        return "px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
    }
}

const classPre = (page) => {
    if (page) {
        return 'px-3 py-2 ml-0 leading-tight border border-gray-300 rounded-l-lg bg-gray-100 text-gray-700'
    } else {
        return 'px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700'
    }
}

const classNext = (page) => {
    if (page) {
        return 'px-3 py-2 leading-tight border border-gray-300 rounded-r-lg bg-gray-100 text-gray-700'
    } else {
        return 'px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700'
    }
}
</script>

<template>
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px">
                <li>
                    <Link :href="previous" :class="classPre($page.url == '/?offset=0' || $page.url == '/')" disabled>Previous</Link>
                </li>
                <li>
                    <Link href="/?offset=0" :class="classes($page.url == '/?offset=0' || $page.url == '/')">1</Link>
                </li>
                <li>
                    <Link href="/?offset=20" :class="classes($page.url == '/?offset=20')">2</Link>
                </li>
                <li>
                    <Link href="/?offset=40" :class="classes($page.url == '/?offset=40')">3</Link>
                </li>
                <li>
                    <Link href="/?offset=60" :class="classes($page.url == '/?offset=60')">4</Link>
                </li>
                <li>
                    <Link href="/?offset=80" :class="classes($page.url == '/?offset=80')">5</Link>
                </li>
                <li>
                    <Link :href="next" :class="classNext($page.url == '/?offset=80')">Next</Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
