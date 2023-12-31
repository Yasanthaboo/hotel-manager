<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    status: String
});

const form = useForm({
    name: '',
    description: '',
    price: '',
    isAvailable: true
});
</script>

<template>
    <Head title="New dish" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Add Dish</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto px-4 py-4">
                        <form @submit.prevent="form.post(route('dishes.store'))" class="mt-6 space-y-6">
                            <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Dish</label>
                            <input id="name" type="text" v-model="form.name" required autofocus autocomplete="name"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="menu name">
                            <label for="description"
                                class="block text-sm font-medium mb-2 dark:text-white">Description</label>
                            <input id="description" type="text" v-model="form.description" required autofocus
                                autocomplete="description"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="description">
                            <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Price</label>
                            <input id="price" type="text" v-model="form.price" required autofocus autocomplete="price"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="price">

                            <div class="col-span-4 gap-2">
                                <button type="submit"
                                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
