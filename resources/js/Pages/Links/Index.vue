<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps(['links']);
</script>

<template>
  <AuthenticatedLayout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Short URL</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Original URL</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Visits</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr v-for="link in links" :key="link.id">
              <td class="px-6 py-4">{{ link.title }}</td>
              <td class="px-6 py-4">{{ link.original_url }}</td>
              <td class="px-6 py-4">helen@sailboatui.com</td>
              <td class="px-6 py-4">
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3">
                    <path fill-rule="evenodd"
                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                      clip-rule="evenodd" />
                  </svg>
                  Paid
                </span>
              </td>
              <td class="flex justify-end gap-4 px-6 py-4 font-medium"><a href="">Delete</a><a href=""
                  class="text-primary-700">Edit</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>