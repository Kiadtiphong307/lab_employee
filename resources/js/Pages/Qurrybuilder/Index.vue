<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(['titles_name','employees_age','gender_count', 'dept_managers','emp_salaries',
            'dept_emp_count','dept_avg_salaries','dept_d010','edit_salary','salary_emp_10001']);

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

                    <div class="p-6 text-gray-900"> <strong>1.บริษัทมีตำแหน่งงานใดบ้าง</strong>
                        <li v-for="index in titles_name" :key="index">ตำแหน่ง : {{ index.title }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>2.พนักงานแต่ละคนมีอายุเท่าไหร่</strong>
                        <li v-for="index in employees_age" :key="index">รหัสประจำตัว : {{ index.emp_no }} ปีปัจจุบัน : {{ index.now_year }}
                            ปีเกิด : {{ index.birth_date }} อายุ : {{ index.age }}</li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>3.จำนวนพนักงานชาย/หญิง</strong>
                        <li v-for="index in gender_count" :key="index">เพศ : {{ index.gender }} จำนวน =  {{ index.count }} คน </li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>4.หัวหน้าแผนกคนปัจจุบัน</strong>
                        <li v-for="index in dept_managers" :key="index"> รหัสประจำตัว : {{ index.emp_no }} รหัสแผนก : {{ index.dept_no }}
                            วันที่เริ่มงาน : {{ index.from_date }} วันที่ปัจจุบัน {{ index.to_date }} </li>
                    </div>

                    <div class="p-6 text-gray-900"> <strong>5.เงินเดือนล่าสุดของพนักงานแต่ละคน</strong>
                        <li v-for="index in emp_salaries" :key="index"> รหัสประจำตัว : {{ index.emp_no }} เงินเดือน : {{ index.salary }} บาท </li>
                     </div>

                     <div class="p-6 text-gray-900"> <strong>6.จำนวนพนักงานในแต่ละแผนก</strong>
                        <li v-for="index in dept_emp_count" :key="index">  รหัสแผนก : {{ index.dept_no }}  จำนวน :  {{ index.count }} คน</li>
                     </div>

                     <div class="p-6 text-gray-900"> <strong>7.ค่าเฉลี่ยเงินเดือนพนักงานแต่ละแผนก</strong>
                        <li v-for="index in dept_avg_salaries" :key="index">  รหัสแผนก : {{ index.dept_no }}  จำนวน :  {{ index.average_salary }} บาท </li>
                     </div>

                     <div class="p-6 text-gray-900"> <strong>9.แก้ไขข้อมูลเงินเดือนปัจจุบันให้เพิ่มขึ้น 10%</strong>
                        <li v-for="index in edit_salary" :key="index"> รหัสประจำตัว : {{ index.emp_no }} เงินเดือน : {{ index.salary }} บาท </li>
                     </div>

                     <div class="p-6 text-gray-900"> <strong>10.ลบข้อมูลเงินเดือนเก่าของพนักงานรหัส 10001 </strong>
                        <li v-for="index in salary_emp_10001" :key="index"> รหัสประจำตัว : {{ index.emp_no }} เงินเดือน : {{ index.salary }} บาท
                            วันที่เริ่มงาน : {{ index.from_date }} วันที่ปัจจุบัน {{ index.to_date }}</li>
                     </div>






                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


