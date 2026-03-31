<template>
    <div v-if="flash.success"
        class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-2">
        ✅ {{ flash.success }}
    </div>
    <div v-if="flash.error"
        class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-2">
        ❌ {{ flash.error }}
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const flash = computed(() => usePage().props.flash);
</script>
