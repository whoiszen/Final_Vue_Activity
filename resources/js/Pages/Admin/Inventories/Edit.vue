<template>
    <Head title="Update Stock" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-500">Dashboard / Inventories / Update Stock</p>
                    <h2 class="font-semibold text-xl text-gray-800">Update Stock</h2>
                </div>
                <Link :href="route('admin.inventories.index')"
                    class="border border-gray-300 text-gray-600 text-sm px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                    Return to Inventories
                </Link>
            </div>
        </template>
        <div class="py-10 max-w-md mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <div class="mb-6">
                    <p class="text-gray-500 text-sm">Product</p>
                    <p class="font-semibold text-gray-800 text-lg">{{ inventory.product?.name }}</p>
                    <p class="text-gray-400 text-xs font-mono">{{ inventory.product?.sku }}</p>
                </div>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                        <input v-model="form.quantity" type="number" min="0"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                        <p v-if="form.errors.quantity" class="text-red-500 text-xs mt-1">{{ form.errors.quantity }}</p>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-medium">
                            Save
                        </button>
                        <Link :href="route('admin.inventories.index')"
                            class="text-gray-500 px-4 py-2 rounded-lg border border-gray-300 text-sm hover:bg-gray-50 transition">
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({ inventory: Object });

const form = useForm({ quantity: props.inventory.quantity });

function submit() {
    form.patch(route('admin.inventories.update', props.inventory.id));
}
</script>
