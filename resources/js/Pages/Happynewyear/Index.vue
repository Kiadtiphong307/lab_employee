<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(['dept','emp','emp_one','emp_two',
    'emp_three','emp_four','emp_five','emp_six','emp_seven','emp_eight',]);

</script>

<template>
    <Head title="employees" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employees</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 1</strong>
                        <li v-for="department in dept" :key="department">{{ department }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 2 </strong>
                        <li v-for="employees in emp" :key="employees">{{ employees }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 3</strong>
                        <li v-for="employees_one in emp_one" :key="employees_one">{{ employees_one }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 4</strong>
                        <li v-for="employees_two in emp_two" :key="employees_tewo">{{ employees_two }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 5</strong>
                        <li v-for="employees_three in emp_three" :key="employees_three">{{ employees_three }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 6</strong>
                        <li v-for="employees_four in emp_four" :key="employees_four">{{ employees_four }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 7</strong>
                        <li v-for="employees_five in emp_five" :key="employees_five">{{ employees_five }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 8</strong>
                        <li v-for="employees_six in emp_six" :key="employees_six">{{ employees_six }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 9</strong>
                        <li v-for="employees_seven in emp_seven" :key="employees_seven">{{ employees_seven }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>โจทย์ 10</strong>
                        <li v-for="employees_eight in emp_eight" :key="employees_eight">{{ employees_eight }}</li>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


