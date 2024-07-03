<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { CheckIcon, ClockIcon, EllipsisVerticalIcon, PencilSquareIcon, EyeIcon, PlusIcon } from '@heroicons/vue/24/outline'
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Pagination from '@/Components/Pagination.vue';
import moment from 'moment';
import { Head } from '@inertiajs/vue3';
import Table from '@/Components/Table.vue';
import TableHeader from '@/Components/Table/TableHeader.vue';
import TableBody from '@/Components/Table/TableBody.vue';
import TableHead from '@/Components/Table/TableHead.vue';
import TableRow from '@/Components/Table/TableRow.vue';
import TableCell from '@/Components/Table/TableCell.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { watch, ref } from 'vue';
import debounce from 'lodash.debounce'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    tickets: Object,
    filters: Object,
});

const search = ref(props.filters.search ?? '');
watch(search, debounce((value) => {
    router.get(route('tickets.index', { search: value }), {
        preserveState: true,
        replace: true,
    });
}, 500));

</script>
<template>
    <AuthenticatedLayout>
    <Head title="Tickets" />
      <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-2">
            <h1 class="text-2xl font-semibold text-gray-900">Tickets</h1>
            <span class="text-sm text-gray-500">Manage your tickets</span>
        </div>
        <div class="py-2 flex justify-between items-top">
            <TextInput
                v-model="search"
                class="sm:w-1/3"
                placeholder="Search tickets..." />

            <PrimaryButton  href="route('tickets.create')">
                <div class="flex items center gap-2">
                    <PlusIcon class="h-4 w-4" />
                    Create Ticket
                </div>
            </PrimaryButton>
        </div>
        <Table>
            <TableHeader class="bg-gray-50">
                <TableHead class="px-6 py-4">#</TableHead>
                <TableHead class="px-6 py-4">Title</TableHead>
                <TableHead class="px-6 py-4">Status</TableHead>
                <TableHead class="px-6 py-4">Updated At</TableHead>
                <TableHead class="px-6 py-4">Assigned To</TableHead>
                <TableHead class="px-6 py-4">Actions</TableHead>
            </TableHeader>
            <TableBody>
                <TableRow v-for="ticket in tickets.data" :key="ticket.id">
                    <TableCell class="px-6 py-4">{{ ticket.id }}</TableCell>
                    <TableCell class="px-6 py-4">{{ ticket.title }}</TableCell>
                    <TableCell class="px-6 py-4">
                    <span :class="ticket.status == 'closed' ? 'bg-green-50 text-green-600 border border-green-200' : 'bg-yellow-50 text-yellow-600 border border-yellow-200'"
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold">
                        <CheckIcon v-if="ticket.status == 'closed'" class="h-3 w-3" />
                        <ClockIcon v-else class="h-3 w-3" />
                        {{ ticket.status }}
                    </span>
                    </TableCell>
                    <TableCell class="px-6 py-4">{{ moment(ticket.updated_at).format('MMM DD, YYYY') }}</TableCell>
                    <TableCell class="px-6 py-4">{{ ticket.assigned_to }}</TableCell>
                    <TableCell class="px-6 py-4">
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <Dropdown align="right">
                                <template #trigger>
                                    <button class="flex items-center gap-1 text-gray-500 hover:text-gray-700">
                                        <EllipsisVerticalIcon class="h-4 w-4" />
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        <div class="flex items center gap-2">
                                            <EyeIcon class="h-4 w-4" />
                                            Edit
                                        </div>
                                    </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')">
                                        <div class="flex items-center gap-2">
                                            <PencilSquareIcon class="h-4 w-4" />
                                            Edit
                                        </div>
                                    </DropdownLink>
                                    <template v-if="ticket.status == 'open'">
                                        <DropdownLink :href="route('profile.edit')"> 
                                            <div class="flex items center gap-2">
                                                <CheckIcon class="h-4 w-4" />
                                                Close
                                            </div>    
                                        </DropdownLink>
                                    </template>
                                </template>
                            </Dropdown>
                        </div>
                    </TableCell>
                </TableRow>
                <template v-if="tickets.data.length == 0">
                    <TableRow>
                        <TableCell class="px-6 py-4 text-center" :colspan="6">No tickets found.</TableCell>
                    </TableRow>
                </template>
            </TableBody>
        </Table>
            <div v-if="tickets.total > tickets.per_page" class="p-2">
                <Pagination :pagination="tickets" />
            </div>
      </div>
    </AuthenticatedLayout>
  </template>
  