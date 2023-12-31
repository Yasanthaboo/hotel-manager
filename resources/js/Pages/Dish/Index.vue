<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";

const headers = ["id", "name", "description", "actions"];

const alldishes = usePage().props.dishes;
</script>

<template>
    <Head title="Menus" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menu
            </h2>
        </template>

        <div class="py-12">
            <Table
                :items="alldishes"
                :headers="headers"
                :actions="[{ label: 'Edit', route: '/menuItem/:id' },{ label: 'Delete', route: '/menuItem/:id' }]"
            ></Table>
        </div>
    </AuthenticatedLayout>
</template>
