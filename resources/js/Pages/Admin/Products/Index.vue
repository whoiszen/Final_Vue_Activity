<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800">Products</h2>
                <Link :href="route('admin.products.create')"
                    class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    + Add Product
                </Link>
            </div>
        </template>

        <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <FlashMessage />
            <div class="bg-white rounded-2xl shadow-sm overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">SKU</th>
                            <th class="px-6 py-4">Supplier</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Stock</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="product in products.data" :key="product.id" class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ product.name }}</td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ product.sku }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ product.supplier?.name }}</td>
                            <td class="px-6 py-4 text-gray-800 font-semibold">₱{{ Number(product.price).toLocaleString() }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ product.inventory?.quantity ?? 0 }}</td>
                            <td class="px-6 py-4">
                                <span :class="['px-2 py-1 rounded-full text-xs font-medium',
                                    product.status === 'active'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-600']">
                                    {{ product.status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <Link :href="route('admin.products.edit', product.id)"
                                    class="text-indigo-600 hover:underline">Edit</Link>
                                <button @click="destroy(product.id)" class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="products.links" class="mt-6" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({ products: Object });

function destroy(id) {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('admin.products.destroy', id));
    }
}
</script>
