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
            default:

            break;
    }
}
