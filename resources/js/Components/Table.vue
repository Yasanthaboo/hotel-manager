<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    items: { type: Array, required: true },
    headers: { type: Array, required: true },
    actions: { type: Array, required: false },
});

const GetActionUrl = (action,item)=>{
    var actionArray = action.route.split(":");
    return actionArray[0] + item[actionArray[1]];
}
</script>

<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <thead>
                                    <tr>
                                        <th
                                            scope="col"
                                            v-for="(header, index) in headers"
                                            :key="index"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            {{ header }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-gray-200 dark:divide-gray-700"
                                >
                                    <tr
                                        v-for="(item, index) in items"
                                        :key="index"
                                    >
                                        <td
                                            v-for="(header, index) in headers"
                                            :key="index"
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"
                                        >
                                            {{ item[header] }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium"
                                        >
                                            <Link
                                                v-for="(action, index) in actions"
                                                :key="index"

                                                type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                :href="GetActionUrl(action,item)"
                                            >
                                                {{ action.label }}
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
