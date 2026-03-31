<template>
    <Head title="Add Supplier" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800">Add Supplier</h2>
        </template>
        <div class="py-10 max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <SupplierForm :form="form" :errors="form.errors" @submit="submit" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SupplierForm from '@/Components/SupplierForm.vue';

const form = useForm({
    name: '', email: '', phone: '', address: '', contact_person: '', status: 'active',
});

function submit() {
    form.post(route('admin.suppliers.store'));
}
</script>
