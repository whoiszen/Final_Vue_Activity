<template>
    <div v-if="links.length > 3" class="flex flex-wrap gap-1">
        <template v-for="link in links" :key="link.label">
            <Link v-if="link.url" :href="link.url"
                :class="['px-3 py-1.5 rounded-lg text-xs font-medium transition',
                    link.active
                        ? 'bg-indigo-600 text-white'
                        : 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50']"
                v-html="link.label" />
            <span v-else
                class="px-3 py-1.5 rounded-lg text-xs font-medium text-gray-300 border border-gray-200"
                v-html="link.label" />
        </template>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ links: Array });
</script>