<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps(['links']);
</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <h1>Links</h1>
            <ul>   
                <li v-for="link in links" :key="link.id">
                    <a :href="link.url" target="_blank">{{ link.url }}</a>
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>