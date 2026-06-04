<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Designation IDs (from DesignationSeeder order):
         *  1=CTO, 2=Eng Manager, 3=Sr SW Eng, 4=SW Eng, 5=Assoc SW Eng,
         *  6=DevOps Eng, 7=UI/UX Dev, 8=CPO, 9=Sr PM, 10=PM,
         * 11=UI/UX Designer, 12=Business Analyst, 13=HR Manager,
         * 14=HR Executive, 15=Talent Acquisition, 16=HR Intern,
         * 17=CFO, 18=Finance Manager, 19=Accountant, 20=Accounts Exec,
         * 21=VP Sales, 22=Sales Manager, 23=Sales Exec, 24=Digital Mkt,
         * 25=CS Manager, 26=CS Specialist,
         * 27=Sr Backend Eng, 28=Backend Eng, 29=Mobile Dev,
         * 30=QA Lead, 31=QA Eng, 32=Automation Test Eng,
         * 33=Sr Frontend Eng, 34=Frontend Eng, 35=API Integration Eng,
         * 36=Data Scientist, 37=Data Eng, 38=BI Analyst
         *
         * Branch IDs: 1=Colombo, 2=Kandy, 3=Galle
         * Dept IDs:   1=Eng(Col), 2=PM(Col), 3=HR(Col), 4=Finance(Col),
         *             5=Sales(Col), 6=CS(Col), 7=Eng(Knd), 8=QA(Knd),
         *             9=Eng(Galle), 10=Data(Galle)
         */

        $employees = [
            // ── Colombo HQ Leadership ──────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-001',
                'first_name'          => 'Ashan',
                'last_name'           => 'Perera',
                'email'               => 'ashan.perera@nexasync.lk',
                'phone'               => '+94 77 100 0001',
                'dob'                 => '1985-03-12',
                'gender'              => 'Male',
                'address'             => '45 Dharmapala Mawatha, Colombo 07',
                'join_date'           => '2019-01-15',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 1, // CTO
                'reporting_manager_id'=> null,
            ],
            [
                'employee_code'       => 'EMP-COL-002',
                'first_name'          => 'Dilnoza',
                'last_name'           => 'Rajapaksha',
                'email'               => 'dilnoza.rajapaksha@nexasync.lk',
                'phone'               => '+94 77 100 0002',
                'dob'                 => '1987-07-22',
                'gender'              => 'Female',
                'address'             => '18 Park Road, Colombo 05',
                'join_date'           => '2019-03-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 2,
                'designation_id'      => 8, // CPO
                'reporting_manager_id'=> null,
            ],
            [
                'employee_code'       => 'EMP-COL-003',
                'first_name'          => 'Kavinda',
                'last_name'           => 'Fernando',
                'email'               => 'kavinda.fernando@nexasync.lk',
                'phone'               => '+94 77 100 0003',
                'dob'                 => '1986-11-05',
                'gender'              => 'Male',
                'address'             => '72 Galle Road, Colombo 03',
                'join_date'           => '2019-06-10',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 4,
                'designation_id'      => 17, // CFO
                'reporting_manager_id'=> null,
            ],

            // ── Engineering – Colombo ──────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-004',
                'first_name'          => 'Tharindu',
                'last_name'           => 'Silva',
                'email'               => 'tharindu.silva@nexasync.lk',
                'phone'               => '+94 77 100 0004',
                'dob'                 => '1990-04-18',
                'gender'              => 'Male',
                'address'             => '9 Thurstan Road, Colombo 03',
                'join_date'           => '2020-02-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 2, // Eng Manager
                'reporting_manager_id'=> 1, // reports to CTO
            ],
            [
                'employee_code'       => 'EMP-COL-005',
                'first_name'          => 'Nadeesha',
                'last_name'           => 'Wickramasinghe',
                'email'               => 'nadeesha.w@nexasync.lk',
                'phone'               => '+94 77 100 0005',
                'dob'                 => '1992-08-30',
                'gender'              => 'Female',
                'address'             => '33 Havelock Road, Colombo 05',
                'join_date'           => '2020-06-15',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 3, // Sr SW Eng
                'reporting_manager_id'=> 4,
            ],
            [
                'employee_code'       => 'EMP-COL-006',
                'first_name'          => 'Rusiru',
                'last_name'           => 'Bandara',
                'email'               => 'rusiru.bandara@nexasync.lk',
                'phone'               => '+94 77 100 0006',
                'dob'                 => '1994-01-14',
                'gender'              => 'Male',
                'address'             => '5 Reid Avenue, Colombo 07',
                'join_date'           => '2021-03-10',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 4, // SW Eng
                'reporting_manager_id'=> 4,
            ],
            [
                'employee_code'       => 'EMP-COL-007',
                'first_name'          => 'Isuru',
                'last_name'           => 'Dissanayake',
                'email'               => 'isuru.d@nexasync.lk',
                'phone'               => '+94 77 100 0007',
                'dob'                 => '1996-05-20',
                'gender'              => 'Male',
                'address'             => '88 Nawala Road, Nugegoda',
                'join_date'           => '2022-07-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 5, // Assoc SW Eng
                'reporting_manager_id'=> 5,
            ],
            [
                'employee_code'       => 'EMP-COL-008',
                'first_name'          => 'Sampath',
                'last_name'           => 'Kumarasiri',
                'email'               => 'sampath.k@nexasync.lk',
                'phone'               => '+94 77 100 0008',
                'dob'                 => '1991-12-03',
                'gender'              => 'Male',
                'address'             => '21 Flower Road, Colombo 07',
                'join_date'           => '2021-01-05',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 6, // DevOps Eng
                'reporting_manager_id'=> 4,
            ],
            [
                'employee_code'       => 'EMP-COL-009',
                'first_name'          => 'Priyanka',
                'last_name'           => 'Jayakodi',
                'email'               => 'priyanka.j@nexasync.lk',
                'phone'               => '+94 77 100 0009',
                'dob'                 => '1993-09-25',
                'gender'              => 'Female',
                'address'             => '14 Stratford Avenue, Colombo 06',
                'join_date'           => '2021-09-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 7, // UI/UX Dev
                'reporting_manager_id'=> 4,
            ],

            // ── Product Management – Colombo ───────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-010',
                'first_name'          => 'Malsha',
                'last_name'           => 'Weerasinghe',
                'email'               => 'malsha.w@nexasync.lk',
                'phone'               => '+94 77 100 0010',
                'dob'                 => '1988-06-17',
                'gender'              => 'Female',
                'address'             => '56 Lauries Road, Colombo 04',
                'join_date'           => '2020-04-15',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 2,
                'designation_id'      => 9, // Sr PM
                'reporting_manager_id'=> 2, // reports to CPO
            ],
            [
                'employee_code'       => 'EMP-COL-011',
                'first_name'          => 'Chathura',
                'last_name'           => 'Mendis',
                'email'               => 'chathura.m@nexasync.lk',
                'phone'               => '+94 77 100 0011',
                'dob'                 => '1992-02-11',
                'gender'              => 'Male',
                'address'             => '7 Torrington Avenue, Colombo 07',
                'join_date'           => '2021-11-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 2,
                'designation_id'      => 11, // UI/UX Designer
                'reporting_manager_id'=> 10,
            ],

            // ── Human Resources – Colombo ──────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-012',
                'first_name'          => 'Sandya',
                'last_name'           => 'Ranasinghe',
                'email'               => 'sandya.r@nexasync.lk',
                'phone'               => '+94 77 100 0012',
                'dob'                 => '1989-10-08',
                'gender'              => 'Female',
                'address'             => '42 Dharmapala Place, Colombo 07',
                'join_date'           => '2019-08-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 3,
                'designation_id'      => 13, // HR Manager
                'reporting_manager_id'=> null,
            ],
            [
                'employee_code'       => 'EMP-COL-013',
                'first_name'          => 'Nimal',
                'last_name'           => 'Gunasekara',
                'email'               => 'nimal.g@nexasync.lk',
                'phone'               => '+94 77 100 0013',
                'dob'                 => '1995-03-29',
                'gender'              => 'Male',
                'address'             => '3 Rosmead Place, Colombo 07',
                'join_date'           => '2022-01-10',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 3,
                'designation_id'      => 14, // HR Executive
                'reporting_manager_id'=> 12,
            ],
            [
                'employee_code'       => 'EMP-COL-014',
                'first_name'          => 'Thilini',
                'last_name'           => 'Amarasinghe',
                'email'               => 'thilini.a@nexasync.lk',
                'phone'               => '+94 77 100 0014',
                'dob'                 => '1999-07-04',
                'gender'              => 'Female',
                'address'             => '20 Kynsey Road, Colombo 08',
                'join_date'           => '2024-06-01',
                'employment_type'     => 'INTERN',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 3,
                'designation_id'      => 16, // HR Intern
                'reporting_manager_id'=> 13,
            ],

            // ── Finance – Colombo ──────────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-015',
                'first_name'          => 'Chamari',
                'last_name'           => 'Jayasuriya',
                'email'               => 'chamari.j@nexasync.lk',
                'phone'               => '+94 77 100 0015',
                'dob'                 => '1990-12-22',
                'gender'              => 'Female',
                'address'             => '68 Ward Place, Colombo 07',
                'join_date'           => '2020-09-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 4,
                'designation_id'      => 18, // Finance Manager
                'reporting_manager_id'=> 3, // reports to CFO
            ],
            [
                'employee_code'       => 'EMP-COL-016',
                'first_name'          => 'Dilan',
                'last_name'           => 'Senanayake',
                'email'               => 'dilan.s@nexasync.lk',
                'phone'               => '+94 77 100 0016',
                'dob'                 => '1993-05-16',
                'gender'              => 'Male',
                'address'             => '11 Maitland Place, Colombo 07',
                'join_date'           => '2021-05-15',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 4,
                'designation_id'      => 19, // Accountant
                'reporting_manager_id'=> 15,
            ],

            // ── Sales & Marketing – Colombo ────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-017',
                'first_name'          => 'Harsha',
                'last_name'           => 'Alwis',
                'email'               => 'harsha.alwis@nexasync.lk',
                'phone'               => '+94 77 100 0017',
                'dob'                 => '1985-09-01',
                'gender'              => 'Male',
                'address'             => '4 Gregory Road, Colombo 07',
                'join_date'           => '2020-11-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 5,
                'designation_id'      => 21, // VP Sales
                'reporting_manager_id'=> null,
            ],
            [
                'employee_code'       => 'EMP-COL-018',
                'first_name'          => 'Amali',
                'last_name'           => 'Pathirana',
                'email'               => 'amali.p@nexasync.lk',
                'phone'               => '+94 77 100 0018',
                'dob'                 => '1991-04-27',
                'gender'              => 'Female',
                'address'             => '29 Horton Place, Colombo 07',
                'join_date'           => '2021-07-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 5,
                'designation_id'      => 23, // Sales Exec
                'reporting_manager_id'=> 17,
            ],
            [
                'employee_code'       => 'EMP-COL-019',
                'first_name'          => 'Dinusha',
                'last_name'           => 'Karunaratne',
                'email'               => 'dinusha.k@nexasync.lk',
                'phone'               => '+94 77 100 0019',
                'dob'                 => '1994-11-11',
                'gender'              => 'Female',
                'address'             => '60 Buller Lane, Colombo 05',
                'join_date'           => '2022-03-14',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 5,
                'designation_id'      => 24, // Digital Mkt Specialist
                'reporting_manager_id'=> 17,
            ],

            // ── Customer Success – Colombo ─────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-020',
                'first_name'          => 'Lahiru',
                'last_name'           => 'Thilakarathna',
                'email'               => 'lahiru.t@nexasync.lk',
                'phone'               => '+94 77 100 0020',
                'dob'                 => '1990-06-15',
                'gender'              => 'Male',
                'address'             => '77 Union Place, Colombo 02',
                'join_date'           => '2021-01-20',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 6,
                'designation_id'      => 25, // CS Manager
                'reporting_manager_id'=> null,
            ],
            [
                'employee_code'       => 'EMP-COL-021',
                'first_name'          => 'Kasuni',
                'last_name'           => 'Madushani',
                'email'               => 'kasuni.m@nexasync.lk',
                'phone'               => '+94 77 100 0021',
                'dob'                 => '1996-08-09',
                'gender'              => 'Female',
                'address'             => '35 De Fonseka Road, Colombo 04',
                'join_date'           => '2022-05-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 1,
                'department_id'       => 6,
                'designation_id'      => 26, // CS Specialist
                'reporting_manager_id'=> 20,
            ],

            // ── Engineering – Kandy ────────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-KND-001',
                'first_name'          => 'Ruwan',
                'last_name'           => 'Seneviratne',
                'email'               => 'ruwan.s@nexasync.lk',
                'phone'               => '+94 77 200 0001',
                'dob'                 => '1988-02-19',
                'gender'              => 'Male',
                'address'             => '14 Peradeniya Road, Kandy',
                'join_date'           => '2020-08-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 7,
                'designation_id'      => 27, // Sr Backend Eng
                'reporting_manager_id'=> 1, // reports to CTO
            ],
            [
                'employee_code'       => 'EMP-KND-002',
                'first_name'          => 'Buddhika',
                'last_name'           => 'Rathnayake',
                'email'               => 'buddhika.r@nexasync.lk',
                'phone'               => '+94 77 200 0002',
                'dob'                 => '1993-07-07',
                'gender'              => 'Male',
                'address'             => '89 Katugastota Road, Kandy',
                'join_date'           => '2021-04-12',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 7,
                'designation_id'      => 28, // Backend Eng
                'reporting_manager_id'=> 22,
            ],
            [
                'employee_code'       => 'EMP-KND-003',
                'first_name'          => 'Sachini',
                'last_name'           => 'Herath',
                'email'               => 'sachini.h@nexasync.lk',
                'phone'               => '+94 77 200 0003',
                'dob'                 => '1995-03-23',
                'gender'              => 'Female',
                'address'             => '55 Mahaiyawa, Kandy',
                'join_date'           => '2022-01-03',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 7,
                'designation_id'      => 29, // Mobile Dev
                'reporting_manager_id'=> 22,
            ],

            // ── QA – Kandy ─────────────────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-KND-004',
                'first_name'          => 'Asanka',
                'last_name'           => 'Kodithuwakku',
                'email'               => 'asanka.k@nexasync.lk',
                'phone'               => '+94 77 200 0004',
                'dob'                 => '1990-09-14',
                'gender'              => 'Male',
                'address'             => '3 Bogambara Road, Kandy',
                'join_date'           => '2021-02-15',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 8,
                'designation_id'      => 30, // QA Lead
                'reporting_manager_id'=> 22,
            ],
            [
                'employee_code'       => 'EMP-KND-005',
                'first_name'          => 'Kumudini',
                'last_name'           => 'Athukorala',
                'email'               => 'kumudini.a@nexasync.lk',
                'phone'               => '+94 77 200 0005',
                'dob'                 => '1994-12-30',
                'gender'              => 'Female',
                'address'             => '44 Getambe, Kandy',
                'join_date'           => '2022-08-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 8,
                'designation_id'      => 31, // QA Eng
                'reporting_manager_id'=> 25, // reports to QA Lead (Asanka, emp 25)
            ],
            [
                'employee_code'       => 'EMP-KND-006',
                'first_name'          => 'Prabath',
                'last_name'           => 'Wijayakantha',
                'email'               => 'prabath.w@nexasync.lk',
                'phone'               => '+94 77 200 0006',
                'dob'                 => '1992-04-05',
                'gender'              => 'Male',
                'address'             => '17 Ampitiya Road, Kandy',
                'join_date'           => '2021-11-15',
                'employment_type'     => 'CONTRACT',
                'status'              => 'ACTIVE',
                'branch_id'           => 2,
                'department_id'       => 8,
                'designation_id'      => 32, // Automation Test Eng
                'reporting_manager_id'=> 25, // reports to QA Lead (Asanka, emp 25)
            ],

            // ── Engineering – Galle ────────────────────────────────────────────────
            [
                'employee_code'       => 'EMP-GAL-001',
                'first_name'          => 'Chamath',
                'last_name'           => 'Liyanage',
                'email'               => 'chamath.l@nexasync.lk',
                'phone'               => '+94 77 300 0001',
                'dob'                 => '1989-05-17',
                'gender'              => 'Male',
                'address'             => '8 Lighthouse Road, Galle',
                'join_date'           => '2020-10-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 3,
                'department_id'       => 9,
                'designation_id'      => 33, // Sr Frontend Eng
                'reporting_manager_id'=> 1,
            ],
            [
                'employee_code'       => 'EMP-GAL-002',
                'first_name'          => 'Dilani',
                'last_name'           => 'Amaradasa',
                'email'               => 'dilani.a@nexasync.lk',
                'phone'               => '+94 77 300 0002',
                'dob'                 => '1995-01-28',
                'gender'              => 'Female',
                'address'             => '22 Closenberg Road, Galle',
                'join_date'           => '2022-02-07',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 3,
                'department_id'       => 9,
                'designation_id'      => 34, // Frontend Eng
                'reporting_manager_id'=> 28, // reports to Sr Frontend Eng (Chamath, emp 28)
            ],

            // ── Data & Analytics – Galle ───────────────────────────────────────────
            [
                'employee_code'       => 'EMP-GAL-003',
                'first_name'          => 'Niluka',
                'last_name'           => 'Gunawardena',
                'email'               => 'niluka.g@nexasync.lk',
                'phone'               => '+94 77 300 0003',
                'dob'                 => '1987-10-12',
                'gender'              => 'Female',
                'address'             => '5 Fort Road, Galle',
                'join_date'           => '2021-06-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 3,
                'department_id'       => 10,
                'designation_id'      => 36, // Data Scientist
                'reporting_manager_id'=> 1,
            ],
            [
                'employee_code'       => 'EMP-GAL-004',
                'first_name'          => 'Saman',
                'last_name'           => 'Jayaweera',
                'email'               => 'saman.j@nexasync.lk',
                'phone'               => '+94 77 300 0004',
                'dob'                 => '1993-08-22',
                'gender'              => 'Male',
                'address'             => '33 Wakwella Road, Galle',
                'join_date'           => '2022-09-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'ACTIVE',
                'branch_id'           => 3,
                'department_id'       => 10,
                'designation_id'      => 37, // Data Eng
                'reporting_manager_id'=> 30, // reports to Data Scientist (Niluka, emp 30)
            ],

            // ── Resigned / Past Employees ──────────────────────────────────────────
            [
                'employee_code'       => 'EMP-COL-022',
                'first_name'          => 'Roshan',
                'last_name'           => 'Pushpakumara',
                'email'               => 'roshan.p.ex@nexasync.lk',
                'phone'               => '+94 77 100 0022',
                'dob'                 => '1991-03-30',
                'gender'              => 'Male',
                'address'             => '90 Bullers Lane, Colombo 07',
                'join_date'           => '2021-04-01',
                'employment_type'     => 'FULL_TIME',
                'status'              => 'RESIGNED',
                'branch_id'           => 1,
                'department_id'       => 1,
                'designation_id'      => 4, // SW Eng
                'reporting_manager_id'=> 4,
            ],
        ];

        foreach ($employees as $emp) {
            DB::table('employees')->insert(array_merge($emp, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
