<template>
    <form @submit.prevent="$emit('submit')" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Supplier</label>
            <select v-model="form.supplier_id" class="input">
                <option value="">Select a supplier</option>
                <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
                    {{ supplier.name }}
                </option>
            </select>
            <p v-if="errors.supplier_id" class="text-red-500 text-xs mt-1">{{ errors.supplier_id }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input v-model="form.name" type="text" class="input" />
            <p v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea v-model="form.description" rows="3" class="input resize-none"></textarea>
            <p v-if="errors.description" class="text-red-500 text-xs mt-1">{{ errors.description }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Price (₱)</label>
            <input v-model="form.price" type="number" step="0.01" min="0" class="input" />
            <p v-if="errors.price" class="text-red-500 text-xs mt-1">{{ errors.price }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
            <input v-model="form.sku" type="text" class="input font-mono" />
            <p v-if="errors.sku" class="text-red-500 text-xs mt-1">{{ errors.sku }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select v-model="form.status" class="input">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <p v-if="errors.status" class="text-red-500 text-xs mt-1">{{ errors.status }}</p>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-medium">
                Save
            </button>
            <Link :href="route('admin.products.index')"
                class="text-gray-500 px-4 py-2 rounded-lg border border-gray-300 text-sm hover:bg-gray-50 transition">
                Cancel
            </Link>
        </div>
    </form>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ form: Object, suppliers: Array, errors: Object });
defineEmits(['submit']);
</script>

<style scoped>
.input {
    @apply w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400;
}
</style>