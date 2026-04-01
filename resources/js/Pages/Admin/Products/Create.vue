<template>
    <Head title="Add Product" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-500">Dashboard / Products / Add Product</p>
                    <h2 class="font-semibold text-xl text-gray-800">Add Product</h2>
                </div>
                <Link :href="route('admin.products.index')"
                    class="border border-gray-300 text-gray-600 text-sm px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                    Return to Products
                </Link>
            </div>
        </template>
        <div class="py-10 max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <ProductForm :form="form" :suppliers="suppliers" :errors="form.errors" @submit="submit" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProductForm from '@/Components/ProductForm.vue';

defineProps({ suppliers: Array });

const form = useForm({
    supplier_id: '', name: '', description: '', price: '', sku: '', status: 'active',
});

function submit() {
    form.post(route('admin.products.store'));
}
</script>
