<template>
    <Head title="Inventories" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Dashboard / Inventories</p>
                    <h2 class="font-semibold text-xl text-gray-800">Inventories</h2>
                </div>
                <Link :href="route('dashboard')"
                    class="border border-gray-300 text-gray-600 text-sm px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                    Back to Dashboard
                </Link>
            </div>
        </template>
        <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <FlashMessage />
            <div class="bg-white rounded-2xl shadow-sm overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">Product</th>
                            <th class="px-6 py-4">SKU</th>
                            <th class="px-6 py-4">Supplier</th>
                            <th class="px-6 py-4">Quantity</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="inv in inventories.data" :key="inv.id" class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ inv.product?.name }}</td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ inv.product?.sku }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ inv.product?.supplier?.name }}</td>
                            <td class="px-6 py-4">
                                <span :class="['font-semibold', inv.quantity < 20 ? 'text-red-600' : 'text-gray-800']">
                                    {{ inv.quantity }}
                                </span>
                                <span v-if="inv.quantity < 20" class="ml-2 text-xs text-red-400">Low stock</span>
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="route('admin.inventories.edit', inv.id)"
                                    class="text-indigo-600 hover:underline">Update Stock</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="inventories.links" class="mt-6" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({ inventories: Object });
</script>
