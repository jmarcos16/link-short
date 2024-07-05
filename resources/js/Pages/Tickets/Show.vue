<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { CheckIcon, ClockIcon } from '@heroicons/vue/24/outline';
import moment from 'moment';

defineProps({
    ticket: Object,
});

</script>
<template>
    <AuthenticatedLayout>
        <Head title="Ticket" />
        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="py-2">
                <h1 class="text-2xl font-semibold text-gray-900">Ticket</h1>
                <span class="text-sm text-gray-500">View ticket details</span>
            </div>
            <div class="py-2">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-sm text-gray-500 mr-2">Status:</span>
                        <span :class="ticket.status == 'closed' ? 'bg-green-50 text-green-600 border border-green-200' : 'bg-yellow-50 text-yellow-600 border border-yellow-200'"
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold">
                            <CheckIcon v-if="ticket.status == 'closed'" class="h-3 w-3" />
                            <ClockIcon v-else class="h-3 w-3" />
                            {{ ticket.status }}
                        </span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 mr-2">Updated At:</span>
                        <span class="text-sm text-gray-900">{{ moment(ticket.updated_at).format('MMM DD, YYYY') }}</span>
                    </div>
                </div>
            </div> 
            <!-- ticket content -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Ticket #{{ ticket.id }}</h2>
        
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ ticket.title }}
                    </p>
                </header>

                <div class="mt-6">
                    <div class="prose" v-html="ticket.content"></div>
                </div>
            </section>
            </div>

        </div>
    </AuthenticatedLayout>
</template>