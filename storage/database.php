<?php
/* Yolk migration
 ********************************************************
 * NOTE: what ever is here is what shows in your database.
 *  if you remove a table or a field  and you  lauch the migration route in your browser,
 * it affect your database.
 * *************************************************************************************.
 * to migrate your database tables , open your websitename/migration.
 */
// addtable(
//     'customers',
//     [
//         addColumn('id', 'int', 11, false, true, true),
//         addColumn('fname', 'string', 50, false, false, false),
//         addColumn('lname', 'string', 50, false, false, false),
//         addColumn('email', 'string', 50, false, false, false),
//         addColumn('phone', 'string', 50, false, false, false),
//         addColumn('gender', 'string', 50, false, false, false),
//         addColumn('dob', 'string', 50, false, false, false),
//         addColumn('password', 'string', 50, false, false, false),
//     ]
// );

addtable('faculty', [
    addColumn('fid', 'int', 11, false, true, true),
    addColumn('faculty_name', 'string', 100),
    addColumn('faculty_code', 'string', 100),
    addColumn('faculty_description', 'string', 100, true),
    addColumn('name_of_factory', 'string', 100, true),
    addColumn('product_production', 'string', 100, true),
    addColumn('license_code', 'string', 100, true),
    addColumn('business_address', 'text', null, true),
    addColumn('faculty_status', 'string', 100, true),
    addColumn('created_at', 'string', 100, true),
]);
addTable('department', [
    addColumn('did', 'int', 11, false, true, true),
    addColumn('department_name', 'string', 100),
    addColumn('department_code', 'string', 100),
    addColumn('department_description', 'string', 100),
    addColumn('department_status', 'string', 100),
    addColumn('created_at', 'string', 100),
    addColumn('faculty', 'int', 100),
]);
addTable('programme', [
    addColumn('pid', 'int', 11, false, true, true),
    // addColumn('faculty_id', 'int', 11),
    addColumn('department_id', 'int', 11),
    addColumn('programme_name', 'string', 100),
    addColumn('programme_code', 'string', 100),
    addColumn('programme_description', 'string', 100),
    addColumn('programme_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addTable('course', [
    addColumn('cid', 'int', 11, false, true, true),
    addColumn('programme_id', 'int', 11),
    addColumn('course_name', 'string', 100),
    addColumn('course_code', 'string', 100),
    addColumn('course_credit', 'int', 100),
    addColumn('course_description', 'string', 100),
    addColumn('course_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addTable('departmentreps', [
    addColumn('dr_id', 'int', 11, false, true, true),
    addColumn('department_id', 'int', 11),
    addColumn('position', 'string', 100),
    addColumn('dr_name', 'string', 100),
    addColumn('dr_email', 'string', 100),
    addColumn('dr_phone', 'string', 100),
    addColumn('dr_password', 'string', 100),
    addColumn('dr_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addtable('facultyreps', [
    addColumn('fr_id', 'int', 11, false, true, true),
    addColumn('faculty_id', 'int', 11),
    addColumn('position', 'string', 100),
    addColumn('fr_name', 'string', 100),
    addColumn('fr_email', 'string', 100),
    addColumn('fr_phone', 'string', 100),
    addColumn('fr_password', 'string', 100),
    addColumn('fr_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addtable('administrator', [
    addColumn('admin_id', 'int', 11, false, true, true),
    addColumn('title', 'string', 100),
    addColumn('first_name', 'string', 100),
    addColumn('middle_name', 'string', 100),
    addColumn('last_name', 'string', 100),
    addColumn('email', 'string', 100),
    addColumn('phone', 'string', 100),
    addColumn('gender', 'string', 100),
    addColumn('dob', 'string', 100),
    addColumn('password', 'string', 100),
    addColumn('house_number', 'text', null, true),
    addColumn('street', 'text', null, true),
    addColumn('city', 'text', null, true),
    addColumn('district', 'text', null, true),
    addColumn('region', 'text', null, true),
    addColumn('country', 'text', null, true),
    addColumn('nationality', 'text', null, true),
    addColumn('school_attend', 'string', 100, true),
    addColumn('programme_offer', 'string', 100, true),
    addColumn('start_date', 'string', 100, true),
    addColumn('end_date', 'string', 100, true),
    addColumn('id_num', 'text', null, true),
    addColumn('id_pic', 'text', null, true),
    addColumn('campus_region', 'string', 100, true),
    addColumn('created_at', 'string', 100),
    addColumn('admin_status', 'string', 100),
 ]);

 addTable('students', [
    addColumn('sid', 'int', 11, false, true, true),
    addColumn('student_id', 'string', 100),
    addColumn('department_id', 'int', 100),
    addColumn('title', 'string', 100),
    addColumn('first_name', 'string', 100),
    addColumn('middle_name', 'string', 100),
    addColumn('last_name', 'string', 100),
    addColumn('email', 'string', 100),
    addColumn('phone', 'string', 100),
    addColumn('gender', 'string', 100),
    addColumn('dob', 'string', 100),
    addColumn('password', 'string', 100),
    addColumn('house_number', 'text', null, true),
    addColumn('street', 'text', null, true),
    addColumn('city', 'text', null, true),
    addColumn('district', 'text', null, true),
    addColumn('region', 'text', null, true),
    addColumn('country', 'text', null, true),
    addColumn('nationality', 'text', null, true),
    addColumn('school_attend', 'string', 100, true),
    addColumn('programme_offer', 'string', 100, true),
    addColumn('start_date', 'string', 100, true),
    addColumn('end_date', 'string', 100, true),
    addColumn('id_num', 'text', null, true),
    addColumn('id_pic', 'text', null, true),
    addColumn('campus_region', 'string', 100, true),
    addColumn('created_at', 'string', 100),
    addColumn('student_status', 'string', 100),
]);

addtable('course_registration', [
    addColumn('cr_id', 'int', 11, false, true, true),
    addColumn('student_id', 'int', 11),
    addColumn('course_id', 'int', 11),
    addColumn('course_status', 'string', 100),
    addColumn('year_added', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addTable('course_result', [
    addColumn('cr_id', 'int', 11, false, true, true),
    addColumn('student_id', 'int', 11),
    addColumn('course_id', 'int', 11),
    addColumn('course_status', 'string', 100),
    addColumn('year_added', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addTable('staff', [
    addColumn('staff_id', 'int', 11, false, true, true),
    addColumn('stf_id', 'string', 100, true),
    // addColumn('faculty_id', 'int', 11),
    addColumn('department_id', 'int', 11),
    addColumn('position_id', 'int', 100),
    addColumn('role', 'int', 100),
    addColumn('title', 'string', 100),
    addColumn('first_name', 'string', 100),
    addColumn('middle_name', 'string', 100),
    addColumn('last_name', 'string', 100),
    addColumn('email', 'string', 100),
    addColumn('phone', 'string', 100),
    addColumn('gender', 'string', 100),
    addColumn('dob', 'string', 100),
    addColumn('password', 'string', 100),
    addColumn('house_number', 'text', null, true),
    addColumn('street', 'text', null, true),
    addColumn('city', 'text', null, true),
    addColumn('district', 'text', null, true),
    addColumn('region', 'text', null, true),
    addColumn('country', 'text', null, true),
    addColumn('nationality', 'text', null, true),
    addColumn('school_attend', 'string', 100, true),

    addColumn('start_date', 'string', 100, true),
    addColumn('end_date', 'string', 100, true),
    addColumn('id_num', 'text', null, true),
    addColumn('id_pic', 'text', null, true),
    addColumn('campus_region', 'string', 100, true),
    addColumn('created_at', 'string', 100),
    addColumn('staff_status', 'string', 100),
]);

addtable('role', [
    addColumn('role_id', 'int', 11, false, true, true),
    addColumn('role_name', 'string', 100),
    addColumn('role_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);

addtable('pos', [
    addColumn('position_id', 'int', 11, false, true, true),
    addColumn('position_name', 'string', 100),
    addColumn('position_status', 'string', 100),
    addColumn('created_at', 'string', 100),
]);
