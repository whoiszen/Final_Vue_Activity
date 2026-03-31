<template>
    <Head title="Edit Supplier" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800">Edit Supplier</h2>
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

const props = defineProps({ supplier: Object });

const form = useForm({ ...props.supplier });

function submit() {
    form.patch(route('admin.suppliers.update', props.supplier.id));
}
</script>
