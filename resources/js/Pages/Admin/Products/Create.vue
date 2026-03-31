<template>
    <Head title="Add Product" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800">Add Product</h2>
        </template>
        <div class="py-10 max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <ProductForm :form="form" :suppliers="suppliers" :errors="form.errors" @submit="submit" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
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
