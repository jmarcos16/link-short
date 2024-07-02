<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { CheckIcon, ClockIcon, EllipsisVerticalIcon, PencilSquareIcon, EyeIcon } from '@heroicons/vue/24/outline'
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Pagination from '@/Components/Pagination.vue';
import moment from 'moment';
defineProps(['tickets']);
</script>
<template>
    <AuthenticatedLayout>
      <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="overflow-hidden rounded-lg border border-gray-200">
          <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">#</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Updated At</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Assigned To</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr v-for="ticket in tickets.data" :key="ticket.id">
                    <td class="px-6 py-4">{{ ticket.id }}</td>
                    <td class="px-6 py-4">{{ ticket.title }}</td>
                    <td class="px-6 py-4">
                    <span :class="ticket.status == 'closed' ? 'bg-green-50 text-green-600 border border-green-200' : 'bg-yellow-50 text-yellow-600 border border-yellow-200'"
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold">
                        <CheckIcon v-if="ticket.status == 'closed'" class="h-3 w-3" />
                        <ClockIcon v-else class="h-3 w-3" />
                        {{ ticket.status }}
                    </span>
                    </td>
                    <td class="px-6 py-4">{{ moment(ticket.updated_at).format('MMM DD, YYYY') }}</td>
                    <td class="px-6 py-4">{{ ticket.assigned_to }}</td>
                    <td class="px-6 py-4">
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
                    </td>
                </tr>
            </tbody>
          </table>
          <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              <Pagination :pagination="tickets" />
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  