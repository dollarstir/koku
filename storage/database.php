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
