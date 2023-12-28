<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(['dept','male','female']);

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

                    <div class="p-6 text-gray-900"> <strong>แสดงรายชื่อแผนกทั้งหมด Department เรียงลำดับตามตัวอักษร</strong>
                        <li v-for="department in dept" :key="department">{{ department }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>แสดงรายชื่อพนักงาน ที่ชื่อขึ้นต้นด้วย ‘A’ และเป็นเพศชาย  (50คน)  </strong>
                        <li v-for="(employee, index) in male" :key="index">{{ index + 1 }}. {{ employee.first_name }} {{ employee.last_name }} เพศ: {{ employee.gender }}</li>
                    </div>

                    <div class="p-6 text-gray-900"><strong>แสดงรายชื่อพนักงาน หญิง อายุมากกว่า 50 ปี (50 คน)</strong>
                        <li v-for="(employee, index) in female" :key="index">{{ index + 1 }}. {{ employee.first_name }} {{ employee.last_name }} เพศ: {{ employee.gender }} อายุ :{{ employee.age }}</li>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


