<template>
    <div class="overflow-hidden rounded-lg border border-gray-200">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <slot/>
        </table>
        <slot name="pagination"/>
    </div>
</template>