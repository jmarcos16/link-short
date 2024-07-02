<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    pagination: Object,
})
</script>
<template>
    <div v-if="pagination.total > 0"
        class="flex justify-between items-center">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ pagination.from }}</span>
                    to
                    <span class="font-medium">{{ pagination.to }}</span>
                    of
                    <span class="font-medium">{{ pagination.total }}</span>
                    results
                </p>
            </div>
            <div>
                <nav aria-label="Pagination">
                    <ul class="relative flex justify-center divide-x border rounded overflow-hidden">
                        <template v-for="(page, index) in pagination.links">
                            <li>
                                <Link
                                    :key="index"
                                    :href="page.url"
                                    class="flex items-center justify-center px-4 py-2 text-sm"
                                    v-html="page.label"
                                    :class="page.active ? 'bg-gray-50' : 'bg-white'" />
                            </li>
                        </template>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
