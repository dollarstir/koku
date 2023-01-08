<?php

require '../loader/autoloader.php';
require '../fragement/admin.php';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        // ***********************************
        // * Faculty
        // ***********************************\
        case 'addfaculty':
            extract($_POST);
            $admin = new admin();
            $data = [
                'faculty_name' => $faculty_name,
                'faculty_code' => $faculty_code,
                'faculty_description' => $faculty_description,
                'name_of_factory' => $name_of_factory,
                'product_production' => $product_production,
                'license_code' => $license_code,
                'business_address' => $business_address,
                'faculty_status' => $faculty_status,
                'created_at' => date('Y-m-d'), ];
                if (empty($faculty_name) || empty($faculty_code) || empty($name_of_factory) || empty($product_production) || empty($license_code) || empty($business_address) || empty($faculty_status)) {
                    echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
                } else {
                    echo   json_encode($admin->addrecord('faculty', [['faculty_code', '=', $faculty_code]], $data, 'success', 'AND', ['table' => 'tblfaculty', 'action' => 'getfaculties', 'modalid' => 'addfacultymodal']));
                }
            break;

        case 'getfaculty':
            extract($_POST);
            $admin = new admin();
             $admin->getfaculty($fid);
            break;

        case 'facultydetails':
            extract($_POST);
            $admin = new admin();
            $admin->facultydetails($fid);
            break;

        case 'getfaculties':
            $admin = new admin();
            $admin->getfaculties();
            break;

        case 'editfaculty':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->editrecord('faculty', [
                'faculty_name' => $faculty_name,
                'faculty_code' => $faculty_code,
                'faculty_description' => $faculty_description,
                'name_of_factory' => $name_of_factory,
                'product_production' => $product_production,
                'license_code' => $license_code,
                'business_address' => $business_address,
                'faculty_status' => $faculty_status,
                ], ['fid' => $fid], 'updated', ['table' => 'tblfaculty', 'action' => 'getfaculties', 'modalid' => 'editfaculty']));
            break;
        case 'deletefaculty':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->deleterecord('faculty', [['fid', '=', $fid]], '', 'deleted', ['table' => 'tblfaculty', 'action' => 'getfaculties']));
            break;
            // ***********************************
            // * Department
            // ***********************************
        case 'adddepartment':
            extract($_POST);
            if (empty(trim($department_name)) || empty(trim($department_code)) || empty(trim($department_description)) || empty(trim($faculty)) || empty(trim($department_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                $admin = new admin();
                echo json_encode($admin->addrecord('department', [['department_code', '=', $department_code]], [
                'department_name' => $department_name,
                'department_code' => $department_code,
                'department_description' => $department_description,
                'faculty' => $faculty,
                'department_status' => $department_status,
                'created_at' => date('Y-m-d'), ], 'success', 'AND', ['table' => 'tbldepartment', 'action' => 'getdepartments', 'modalid' => 'adddepartmentmodal']));
            }

            break;
        case 'getdepartments':
            extract($_POST);
            $admin = new admin();
            $admin->getdepartments();
            break;

        case 'getdepartment':
            extract($_POST);
            $admin = new admin();
            $admin->viewdepartmentform($did);

            break;

        case 'departmentdetails':
            extract($_POST);
            $admin = new admin();
            $admin->departmentdetails($did);
            break;

        case 'editdepartment':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->editrecord('department', [
                'department_name' => $department_name,
                'department_code' => $department_code,
                'department_description' => $department_description,
                'faculty' => $faculty,
                'department_status' => $department_status,
                ], ['did' => $did], 'updated', ['table' => 'tbldepartment', 'action' => 'getdepartments', 'modalid' => 'editdepartment']));

            break;

        case 'deletedepartment':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->deleterecord('department', [['did', '=', $did]], '', 'deleted', ['table' => 'tbldepartment', 'action' => 'getdepartments']));
            break;
            // ****************************************************************************
            // * Program
            // ****************************************************************************
        case 'adddprogramme':
            extract($_POST);
            $admin = new admin();
            if (empty(trim($programme_name)) || empty(trim($programme_code)) || empty(trim($programme_description)) || empty(trim($department_id)) || empty(trim($programme_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->addrecord('programme', [['programme_code', '=', $programme_code]],
                 ['programme_name' => $programme_name,
                'programme_code' => $programme_code,
                'programme_description' => $programme_description,
                'department_id' => $department_id,
                'programme_status' => $programme_status,
                'created_at' => date('Y-m-d'), ], 'success', 'AND', ['table' => 'tblprogramme', 'action' => 'getprogrammes', 'modalid' => 'addprogrammemodal']));
            }

            break;

        case 'getprogrammes':
            $admin = new admin();
            $admin->getprogrammes();
            break;

        case 'getprogramme':
            extract($_POST);
            $admin = new admin();
            $admin->viewprogrammeform($pid);
            break;

            case 'programmedetails':
            extract($_POST);
            $admin = new admin();
            $admin->programmedetails($pid);
            break;

        case 'editprogramme':
            extract($_POST);
            $admin = new admin();
            if (empty(trim($programme_name)) || empty(trim($programme_code)) || empty(trim($programme_description)) || empty(trim($department_id)) || empty(trim($programme_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->editrecord('programme', [
                    'programme_name' => $programme_name,
                    'programme_code' => $programme_code,
                    'programme_description' => $programme_description,
                    'department_id' => $department_id,
                    'programme_status' => $programme_status,
                    ], ['pid' => $pid], 'updated', ['table' => 'tblprogramme', 'action' => 'getprogrammes', 'modalid' => 'editprogramme']));
            }
            break;

        case 'deletedprogramme':
                extract($_POST);
                $admin = new admin();
                echo json_encode($admin->deleterecord('programme', [['pid', '=', $pid]], '', 'deleted', ['table' => 'tblprogramme', 'action' => 'getprogrammes']));
            break;

            // ****************************************************************************
            // * Course
            // ****************************************************************************
        case 'addcourse':
            extract($_POST);
            $admin = new admin();
            if (empty(trim($course_name)) || empty(trim($course_code)) || empty(trim($course_description)) || empty(trim($course_credit)) || empty(trim($programme_id)) || empty(trim($course_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->addrecord('course', [['course_code', '=', $course_code]],
                 ['course_name' => $course_name,
                'course_code' => $course_code,
                'course_credit' => $course_credit,
                'course_description' => $course_description,
                'programme_id' => $programme_id,
                'course_status' => $course_status,
                'created_at' => date('Y-m-d'), ], 'success', 'AND', ['table' => 'tblcourse', 'action' => 'getcourses', 'modalid' => 'addcoursemodal']));
            }

            break;
        case 'getcourses':
                    $admin = new admin();
                    $admin->getcourses();
            break;

        case 'getcourse':
            extract($_POST);
            $admin = new admin();
            $admin->viewcourseform($cid);
            break;

        case 'coursedetails':
            extract($_POST);
            $admin = new admin();
            $admin->coursedetails($cid);
            break;
            case'editcourse':
            extract($_POST);
            $admin = new admin();
            if (empty(trim($course_name)) || empty(trim($course_code)) || empty(trim($course_description)) || empty(trim($course_credit)) || empty(trim($programme_id)) || empty(trim($course_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->editrecord('course', [
                    'course_name' => $course_name,
                    'course_code' => $course_code,
                    'course_credit' => $course_credit,
                    'course_description' => $course_description,
                    'programme_id' => $programme_id,
                    'course_status' => $course_status,
                    ], ['cid' => $cid], 'updated', ['table' => 'tblcourse', 'action' => 'getcourses', 'modalid' => 'editcourse']));
            }
            break;
        case 'deletecourse':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->deleterecord('course', [['cid', '=', $cid]], '', 'deleted', ['table' => 'tblcourse', 'action' => 'getcourses']));

            break;

            // ****************************************************************************
            // * Position
            // ****************************************************************************

        case 'addposition':
            extract($_POST);
            $admin = new admin();
                if (empty(trim($position_name)) || empty(trim($position_status))) {
                    echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
                } else {
                    echo json_encode($admin->addrecord('pos', [['position_name', '=', $position_name]],
                     [
                        'position_name' => $position_name,
                        'position_status' => $position_status,
                        'created_at' => date('Y-m-d'), ], 'success', 'AND', ['table' => 'tblposition', 'action' => 'getpositions', 'modalid' => 'addpositionmodal']));
                }
            break;

        case 'getpositions':
                $admin = new admin();
                $admin->getpositions();
            break;

        case 'getposition':
            extract($_POST);

            $admin = new admin();
            $admin->viewpositionform($position_id);

            break;

        case 'editposition':
            extract($_POST);
            $admin = new admin();
            if (empty(trim($position_name)) || empty(trim($position_status))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->editrecord('pos', [
                    'position_name' => $position_name,
                    'position_status' => $position_status,
                    ], ['position_id' => $position_id], 'updated', ['table' => 'tblposition', 'action' => 'getpositions', 'modalid' => 'editposition']));
            }

            break;
        case 'deleteposition':
            extract($_POST);
            $admin = new admin();
            echo json_encode($admin->deleterecord('pos', [['position_id', '=', $position_id]], '', 'deleted', ['table' => 'tblposition', 'action' => 'getpositions']));
            break;
            default:

            break;
    }
}
