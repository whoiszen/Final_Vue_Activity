<template>
    <form @submit.prevent="$emit('submit')" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input v-model="form.name" type="text" class="input" />
            <p v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input v-model="form.email" type="email" class="input" />
            <p v-if="errors.email" class="text-red-500 text-xs mt-1">{{ errors.email }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input v-model="form.phone" type="text" class="input" />
            <p v-if="errors.phone" class="text-red-500 text-xs mt-1">{{ errors.phone }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <input v-model="form.address" type="text" class="input" />
            <p v-if="errors.address" class="text-red-500 text-xs mt-1">{{ errors.address }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Person</label>
            <input v-model="form.contact_person" type="text" class="input" />
            <p v-if="errors.contact_person" class="text-red-500 text-xs mt-1">{{ errors.contact_person }}</p>
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
            <Link :href="route('admin.suppliers.index')"
                class="text-gray-500 px-4 py-2 rounded-lg border border-gray-300 text-sm hover:bg-gray-50 transition">
                Cancel
            </Link>
        </div>
    </form>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ form: Object, errors: Object });
defineEmits(['submit']);
</script>

<style scoped>
.input {
    @apply w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400;
}
</style>
