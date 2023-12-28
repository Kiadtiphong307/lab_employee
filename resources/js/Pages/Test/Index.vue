<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(['emp','emp2'])

</script>

<template>
    <Head title="Testing" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Test</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900"> <strong>Welocome to test System</strong>
                        <li v-for="(employee,index) in emp " :key="employee">{{ index+1 }} {{ employee.first_name }} {{ employee.last_name }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>Welocome to test System</strong>
                        <li v-for="(employee,index) in emp2 " :key="employee">{{ index+1 }} {{ employee.first_name }} {{ employee.last_name }}</li>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


