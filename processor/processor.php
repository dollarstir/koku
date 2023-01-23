<?php

require '../loader/autoloader.php';
require '../fragement/admin.php';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        // ***********************************
        // * Pit
        // ***********************************\
        case 'addtrip':
            extract($_POST);
    $admin = new admin();
    $fu = customfetch('pit', [['pid', '=', $pid]]);
    $fuel = $fu[0]['fuel'];
    $data = [
                'pid' => $pid,
                'tid' => $tid,
                'gross' => $gross,
                'tare' => $tare,
                'net' => floatval($gross) - floatval($tare),
                'time_in' => $time_in,
                'time_out' => $time_out,
                'fuel' => $fuel,
                'date_created' => date('Y-m-d'), ];
    if (empty($gross) || empty($tare) || empty($pid) || empty($tid) || empty($time_in) || empty($time_out)) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } else {
        echo   json_encode($admin->addrecord('trips', '', $data, 'success', 'AND', ['table' => 'tblfaculty', 'action' => 'gettrips', 'modalid' => 'addfacultymodal']));
    }
    break;

    case 'gettrips':
            $admin = new Admin();
    $admin->gettrips();
    break;

    case 'counttrips':
            echo countall('trips');
    break;

    case 'counttrucks':
            echo countall('trucks');
    break;

    case 'countpits':
            echo countall('pit');
    break;

    case 'sumfuel':
            echo sumall('trips', 'fuel');
    break;

    case 'gettrip':
            extract($_POST);
    $admin = new admin();
    $admin->gettrip($tripid);
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

    case 'edittrip':
            extract($_POST);
    $admin = new admin();
    $fu = customfetch('pit', [['pid', '=', $pid]]);
    $fuel = $fu[0]['fuel'];
    echo json_encode($admin->editrecord('trips', [
                'pid' => $pid,
                'tid' => $tid,
                'time_in' => $time_in,
                'gross' => $gross,
                'tare' => $tare,
                'time_out' => $time_out,
                'net' => floatval($gross) - floatval($tare),
                'fuel' => $fuel,
                ], ['tripid' => $tripid], 'updated', ['table' => 'tblfaculty', 'action' => 'gettrips', 'modalid' => 'editfaculty']));
    break;
    case 'deletefaculty':
            extract($_POST);
    $admin = new admin();
    echo json_encode($admin->deleterecord('faculty', [['fid', '=', $fid]], '', 'deleted', ['table' => 'tblfaculty', 'action' => 'getfaculties']));
    break;

    // addPits
    case 'addpit':
            extract($_POST);
    $admin = new admin();

    $data = [
                'pit_name' => $pit_name,
                'fuel' => $fuel,
                'date_created' => date('Y-m-d'), ];
    if (empty($pit_name) || empty($fuel)) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } else {
        echo   json_encode($admin->addrecord('pit', '', $data, 'success', 'AND', ['table' => 'tblpit', 'action' => 'getpit', 'modalid' => 'addpit']));
    }

    break;

    case 'getpit':
            $admin = new admin();
    $admin->getpits();
    break;

    case 'getsinglepit':
            $admin = new admin();
    extract($_POST);
    $admin->getpit($pid);

    break;

    case 'editpit':
            extract($_POST);
    $admin = new admin();
    echo json_encode($admin->editrecord('pit', [
                'pit_name' => $pit_name,
                'fuel' => $fuel,
                ], ['pid' => $pid], 'updated', ['table' => 'tblpit', 'action' => 'getpit', 'modalid' => 'editpit']));
    break;

    // ***********************************
    // * Trucks
    // ***********************************\
    case 'addtruck':
            extract($_POST);
    $admin = new admin();
    if (empty($truck_name) || empty($truck_number)) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } else {
        $data = [
                    'truck_name' => $truck_name,
                    'truck_number' => $truck_number,
                    'date_created' => date('Y-m-d'), ];
        echo   json_encode($admin->addrecord('trucks', '', $data, 'success', 'AND', ['table' => 'tbltruck', 'action' => 'gettruck', 'modalid' => 'addtruck']));
    }
    break;

    case 'gettruck':
            $admin = new admin();
    $admin->gettrucks();

    break;

    case 'getsingletruck':
            $admin = new admin();
    extract($_POST);
    $admin->gettruck($tid);

    break;

    case 'edittruck':
            extract($_POST);
    $admin = new admin();
    echo json_encode($admin->editrecord('trucks', [
                'truck_name' => $truck_name,
                'truck_number' => $truck_number,
                ], ['tid' => $tid], 'updated', ['table' => 'tbltruck', 'action' => 'gettruck', 'modalid' => 'edittruck']));
    break;
    // ***********************************
    // * Admins
    // ***********************************\

    case 'addadmin':
            extract($_POST);
    $admin = new admin();
    if (empty(trim($username)) || empty(trim($password)) || empty(trim($contact))) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } elseif (trim($repass) != trim($password)) {
        echo json_encode(['type' => 'warning', 'msg' => 'Password does not match']);
    } else {
        $data = [
                    'name' => $name,
                    'username' => $username,
                    'password' => md5($password),

                    'contact' => $contact,
                    'role' => $role,
                    'status' => $status,
                    'date_created' => date('Y-m-d'), ];
        echo   json_encode($admin->addrecord('cmd', [['username', '=', $username]], $data, 'success', 'AND', ['table' => 'tbladmin', 'action' => 'getadmins', 'modalid' => 'addadmin']));
    }
    break;
    case 'getadmins':
            $admin = new admin();
    $admin->getadmins();
    break;

    case 'getadminpass':
            $admin = new admin();
    extract($_POST);
    $admin->getadminpass($admin_id);
    break;

    case 'editpassword':
            extract($_POST);
    $admin = new admin();
    if (empty(trim($newpass))) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } else {
        echo json_encode($admin->editrecord('cmd', [
                    'password' => md5($newpass),
                    ], ['admin_id' => $admin_id], 'updated', ['table' => 'tbladmin', 'action' => 'getadmins', 'modalid' => 'changepassword']));
    }
    break;

    case 'getsingleadmin':
            $admin = new admin();
    extract($_POST);
    $admin->getadmin($admin_id);
    break;

    case 'editadmin':
            extract($_POST);
    $admin = new admin();
    if (empty(trim($username)) || empty(trim($contact)) || empty(trim($role)) || empty(trim($status)) || empty(trim($name))) {
        echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
    } else {
        echo json_encode($admin->editrecord('cmd', [
                    'name' => $name,
                    'username' => $username,
                    'contact' => $contact,
                    'role' => $role,
                    'status' => $status,
                    ], ['admin_id' => $admin_id], 'updated', ['table' => 'tbladmin', 'action' => 'getadmins', 'modalid' => 'editadmin']));
    }
    break;

    case 'deleteadmin':
            extract($_POST);
    $admin = new admin();
    echo json_encode($admin->deleterecord('cmd', [['admin_id', '=', $admin_id]], '', 'deleted', ['table' => 'tbladmin', 'action' => 'getadmins']));
    break;

    // ***********************************
    // * Reports
    // ***********************************\
    case 'getpitreport':
            $admin = new admin();
            extract($_POST);
            $admin->pitreport($pid, $from, $to);

            break;

    case 'gettruckreport':
            $admin = new admin();
            extract($_POST);
            $admin->truckreport($tid, $from, $to);

            break;
    // admin login***********************************
    case 'adminlogin':
            $admin = new admin();
            session_start();
            extract($_POST);
            if (empty(trim($username)) || empty(trim($password))) {
                echo json_encode(['type' => 'warning', 'msg' => 'All fields are required']);
            } else {
                echo json_encode($admin->adminlogin($username, $password));
            }
            break;

    // ***********************************logout
    case 'logout':
            $admin = new admin();
            echo json_encode($admin->logout());
            break;
    default:

            break;
}
}
