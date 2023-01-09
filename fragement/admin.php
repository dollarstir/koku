<?php

class admin
{
    // *****************************************************
    //add record function
    // *****************************************************
    public function addrecord($table, $check = '', $data, $feedback = 'success', $operator = '', $tblquery = [], $files = null, $uploadto = 'yolkassets/upload')
    {
        $insert = new add();
        $auth = new auth();
        if ($check == '') {
            if ($insert->insert($table, $data, $files, $uploadto) == 'success') {
                $msg = ['type' => 'success', 'msg' => $feedback, 'tbl' => $tblquery['table'], 'action' => $tblquery['action'], 'modalid' => $tblquery['modalid']];
            } else {
                $msg = ['type' => 'error', 'msg' => 'Failed to add record'];
            }
        } else {
            if ($auth->authenticate($table, $check, $operator) == 'success') {
                $msg = ['type' => 'warning', 'msg' => 'Record already exist'];
            } else {
                if ($insert->insert($table, $data, $files, $uploadto) == 'success') {
                    $msg = ['type' => 'success', 'msg' => $feedback, 'tbl' => $tblquery['table'], 'action' => $tblquery['action'], 'modalid' => $tblquery['modalid']];
                } else {
                    $msg = ['type' => 'error', 'msg' => 'Failed to add record'];
                }
            }
        }

        return $msg;
    }

    // *****************************************************
    //Editrecord function
    // *****************************************************

    public function editrecord($table, $data, $compare, $feedback, $tblquery = [], $files = null, $uploadto = 'yolkassets/upload')
    {
        $update = new upd();
        if ($update->update($table, $data, $compare, $files, $uploadto) == 'success') {
            $msg = ['type' => 'success', 'msg' => $feedback, 'tbl' => $tblquery['table'], 'action' => $tblquery['action'], 'modalid' => $tblquery['modalid']];
        } else {
            $msg = ['type' => 'error', 'msg' => 'Failed to edit record'];
        }

        return $msg;
    }

    //  *****************************************************
    // Delete record function
    // *****************************************************

    public function deleterecord($table, $compare, $operator = '', $feedback, $tblquery = [])
    {
        $delete = new del();
        if ($delete->delete($table, $compare) == 'success') {
            $msg = ['type' => 'success', 'msg' => $feedback, 'tbl' => $tblquery['table'], 'action' => $tblquery['action']];
        } else {
            $msg = ['type' => 'error', 'msg' => 'Failed to delete record'];
        }

        return $msg;
    }

    // *****************************************************
    //Faculty section
    // *****************************************************
    public function getfaculties()
    {
        $select = new sel();
        $res = fetchall('faculty');
        foreach ($res as $value) {
            if ($value['faculty_status'] == 'active') {
                $value['faculty_status'] = '<span class="badge badge-success">Active</span>';
            }
            if ($value['faculty_status'] == 'inactive') {
                $value['faculty_status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
        <td>'.$value['fid'].'</td>
        <td>'.$value['faculty_name'].'</td>
        <td>'.$value['faculty_code'].'</td>
        <td>'.$value['name_of_factory'].'</td>
        <td>'.$value['faculty_status'].'</td>
        <td><button class="btn btn-primary viewfaculty" id="'.$value['fid'].'"   data-izimodal-open="#viewfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button> <button class="btn btn-secondary btngetfaculty" id="'.$value['fid'].'"  data-izimodal-open="#editfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> <button class="btn btn-danger deletefaculty" id="'.$value['fid'].'"><i class="fa fa-trash"></i></button></td>
        </tr>';
        }
    }

    public function getfaculty($fid)
    {
        $select = new sel();
        $res = $select->select('faculty', [['fid', '=', $fid]]);
        $row = $res[0];
        echo '<div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Name of Faculty</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="faculty_name" value="'.$row['faculty_name'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Faculty Code</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="faculty_code" value="'.$row['faculty_code'].'">
        </div>

        

        <div class="form-group">
        <label for="exampleInputEmail1">Faculty Description</label>
        <textarea  class="form-control" id="exampleInputEmail1" name="faculty_description">'.$row['faculty_description'].'</textarea>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Factory Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name_of_factory" value="'.$row['name_of_factory'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Product production</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="product_production" value="'.$row['product_production'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">License Code</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="license_code" value="'.$row['license_code'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Business Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="business_address" value="'.$row['business_address'].'">
        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="fid" value="'.$row['fid'].'">
        </div>


        

        <div class="form-group">
        <label>Faculty status</label>
        <select class="form-control select2" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="faculty_status">
        <option value="'.$row['faculty_status'].'">'.$row['faculty_status'].'</option>
        <option value="active">Active</option>
          <option value="inactive">Inactive</option>
          
        </select>
        <!--  -->
      </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>';
    }

    public function facultydetails($fid)
    {
        $select = new sel();
        $res = $select->select('faculty', [['fid', '=', $fid]]);
        $row = $res[0];
        if ($row['faculty_status'] == 'active') {
            $status = '<span class="badge badge-success">Active</span>';
        } else {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }

        echo '<tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Name</td>
        <td id="viewname">'.$row['faculty_name'].'</td>
    </tr>
    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>License Code</td>
        <td id="viewcode">'.$row['license_code'].'</td>
    </tr>
    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Description</td>
        <td id="viewfactory">'.$row['faculty_description'].'</td>
    </tr>
    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Factory</td>
        <td id="viewstatus">'.$row['name_of_factory'].'</td>
    </tr>
    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Product Production</td>
        <td id="viewstatus">'.$row['product_production'].'</td>
    </tr>
    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Business Address</td>
        <td id="viewstatus">'.$row['business_address'].'</td>
    </tr>

    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Status</td>
        <td id="viewstatus">'.$status.'</td>
    </tr>

    <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Created on</td>
        
        <td id="viewstatus">'.$row['created_at'].'</td>
    </tr>';
    }

    public function facultyoptions()
    {
        $select = new sel();
        $res = $select->select('faculty', [['faculty_status', '=', 'active']]);
        $msg = '';
        foreach ($res as $row) {
            $msg .= '<option value="'.$row['fid'].'">'.$row['faculty_name'].'</option>';
        }

        return $msg;
    }

    // *********************************************************************************************************************
    // *********************************************************************************************************************
    // department section
    // *********************************************************************************************************************
    // *********************************************************************************************************************
    public function getdepartments()
    {
        $select = new sel();
        $res = $select->getall('department');
        foreach ($res as $row) {
            $fc = $select->select('faculty', [['fid', '=', $row['faculty']]]);
            $faculty = $fc[0]['faculty_name'];
            if ($row['department_status'] == 'active') {
                $status = '<span class="badge badge-success">Active</span>';
            } else {
                $status = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
            <td>'.$row['did'].'</td>
            <td>'.$row['department_name'].'</td>
            <td>'.$row['department_code'].'</td>
            <td>'.$faculty.'</td>
            
            <td>'.$status.'</td>
           
            <td><button class="btn btn-primary viewdepartment" id="'.$row['did'].'"   data-izimodal-open="#viewdepartment" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button> <button class="btn btn-secondary btngetdepartment" id="'.$row['did'].'"  data-izimodal-open="#editdepartment" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> <button class="btn btn-danger deletedepartment" id="'.$row['did'].'"><i class="fa fa-trash"></i></button></td>
            </td>';
        }
    }

    public function viewdepartmentform($did)
    {
        $admin = new Admin();
        $select = new sel();
        $res = $select->select('department', [['did', '=', $did]]);
        $row = $res[0];
        $fc = $select->select('faculty', [['fid', '=', $row['faculty']]]);
        $faculty = $fc[0]['faculty_name'];
        if ($row['department_status'] == 'active') {
            $status = '<span class="badge badge-success">Active</span>';
        } else {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }

        echo '<div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Name of Department</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="department_name" value="'.$row['department_name'].'">
        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="did" value="'.$row['did'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Department Code</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="department_code" value="'.$row['department_code'].'">
        </div>

        

        <div class="form-group">
        <label for="exampleInputEmail1">Department Description</label>
        <textarea  class="form-control" id="exampleInputEmail1" name="department_description">'.$row['department_description'].'</textarea>
        </div>

        
        
        <div class="form-group">
        <label>Faculty Name</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="1" tabindex="-1" aria-hidden="true" name="faculty">
            <option value="'.$row['faculty'].'">'.$faculty.'</option>
            
            

            '.$admin->facultyoptions().'
            
        </select>
        <!--  -->
        </div>


        <div class="form-group">
        <label>Department status</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="4" tabindex="-1" aria-hidden="true" name="department_status">
            <option value="'.$row['department_status'].'">'.$status.'</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            
        </select>
        <!--  -->
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>';
    }

    public function departmentdetails($did)
    {
        $select = new sel();
        $res = $select->select('department', [['did', '=', $did]]);
        $row = $res[0];
        $fc = $select->select('faculty', [['fid', '=', $row['faculty']]]);
        $faculty = $fc[0]['faculty_name'];
        if ($row['department_status'] == 'active') {
            $status = '<span class="badge badge-success">Active</span>';
        } else {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }

        echo '<tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Department Name</td>

        <td id="viewstatus">'.$row['department_name'].'</td>
        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Department Code</td>

        <td id="viewstatus">'.$row['department_code'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Department Description</td>

        <td id="viewstatus">'.$row['department_description'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Faculty Name</td>

        <td id="viewstatus">'.$faculty.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Department Status</td>

        <td id="viewstatus">'.$status.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Created on</td>

        <td id="viewstatus">'.$row['created_at'].'</td>
        </tr>
        ';
    }

    public function departmentoptions()
    {
        $select = new sel();
        $res = $select->select('department', [['department_status', '=', 'active']]);
        $msg = '';
        foreach ($res as $row) {
            $msg .= '<option value="'.$row['did'].'">'.$row['department_name'].'</option>';
        }

        return $msg;
    }

    // *********************************** Programme ***********************************
    // *********************************** Programme ***********************************
    // *********************************** Programme ***********************************

    public function getprogrammes()
    {
        $select = new sel();
        $res = fetchall('programme');
        foreach ($res as $value) {
            $dp = $select->select('department', [['did', '=', $value['department_id']]]);
            $department = $dp[0]['department_name'];
            if ($value['programme_status'] == 'active') {
                $value['programme_status'] = '<span class="badge badge-success">Active</span>';
            }
            if ($value['programme_status'] == 'inactive') {
                $value['programme_status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
        <td>'.$value['pid'].'</td>
        <td>'.$value['programme_name'].'</td>
        <td>'.$value['programme_code'].'</td>
        <td>'.$department.'</td>
        <td>'.$value['programme_status'].'</td>
        <td><button class="btn btn-primary viewprogramme" id="'.$value['pid'].'"   data-izimodal-open="#viewprogramme" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button> <button class="btn btn-secondary btngetprogramme" id="'.$value['pid'].'"  data-izimodal-open="#editprogramme" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> <button class="btn btn-danger deleteprogramme" id="'.$value['pid'].'"><i class="fa fa-trash"></i></button></td>
        </tr>';
        }
    }

    public function viewprogrammeform($pid)
    {
        $select = new sel();
        $res = $select->select('programme', [['pid', '=', $pid]]);
        $row = $res[0];
        $dp = $select->select('department', [['did', '=', $row['department_id']]]);

        $department = $dp[0]['department_name'];
        $admin = new admin();
        echo '<div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Name of Programme</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="programme_name" value="'.$row['programme_name'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Programme Code</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="programme_code" value="'.$row['programme_code'].'">

        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="pid" value="'.$row['pid'].'">
        </div>

        

        <div class="form-group">
        <label for="exampleInputEmail1">Programme Description</label>
        <textarea  class="form-control" id="exampleInputEmail1" name="programme_description">'.$row['programme_description'].'</textarea>
        </div>

        
        
        <div class="form-group">
        <label>Department Name</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="2" tabindex="-1" aria-hidden="true" name="department_id">
            <option value="'.$row['department_id'].'">'.$department.'</option>
           

            '.$admin->departmentoptions().'
            
        </select>
        <!--  -->
        </div>


        <div class="form-group">
        <label>Programme status</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="1" tabindex="-1" aria-hidden="true" name="programme_status">
            <option value="'.$row['programme_status'].'">'.$row['programme_status'].'</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            
        </select>
        <!--  -->
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>';
    }

    public function programmedetails($pid)
    {
        $select = new sel();
        $res = $select->select('programme', [['pid', '=', $pid]]);
        $row = $res[0];
        $dp = $select->select('department', [['did', '=', $row['department_id']]]);

        $department = $dp[0]['department_name'];
        $admin = new admin();
        if ($row['programme_status'] == 'active') {
            $status = '<span class="badge badge-success">Active</span>';
        }
        if ($row['programme_status'] == 'inactive') {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }
        echo '<tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Programme Name</td>

        <td id="viewstatus">'.$row['programme_name'].'</td>
        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Programme Code</td>

        <td id="viewstatus">'.$row['programme_code'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Programme Description</td>

        <td id="viewstatus">'.$row['programme_description'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Department Name</td>

        <td id="viewstatus">'.$department.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Programme Status</td>

        <td id="viewstatus">'.$status.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Created on</td>

        <td id="viewstatus">'.$row['created_at'].'</td>
        </tr>
        ';
    }

    public function programmeoptions()
    {
        $select = new sel();
        $res = $select->select('programme', [['programme_status', '=', 'active']]);
        $msg = '';
        foreach ($res as $row) {
            $msg .= '<option value="'.$row['pid'].'">'.$row['programme_name'].'</option>';
        }

        return $msg;
    }

    // ************** COURSE ***********************************************
    // ************** COURSE ***********************************************
    // ************** COURSE ***********************************************
    public function getcourses()
    {
        $select = new sel();
        $res = fetchall('course');
        foreach ($res as $value) {
            $dp = $select->select('programme', [['pid', '=', $value['programme_id']]]);
            $programme = $dp[0]['programme_name'];
            if ($value['course_status'] == 'active') {
                $value['course_status'] = '<span class="badge badge-success">Active</span>';
            }
            if ($value['course_status'] == 'inactive') {
                $value['course_status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
            <td>'.$value['cid'].'</td>
            <td>'.$value['course_name'].'</td>
            <td>'.$value['course_code'].'</td>
            <td>'.$value['course_credit'].'</td>
            <td>'.$programme.'</td>
            <td>'.$value['course_status'].'</td>
            <td><button class="btn btn-primary viewcourse" id="'.$value['cid'].'"   data-izimodal-open="#viewcourse" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button> <button class="btn btn-secondary btngetcourse" id="'.$value['cid'].'"  data-izimodal-open="#editcourse" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> <button class="btn btn-danger deletecourse" id="'.$value['cid'].'"><i class="fa fa-trash"></i></button></td>
            </tr>';
        }
    }

    public function viewcourseform($cid)
    {
        $select = new sel();
        $res = $select->select('course', [['cid', '=', $cid]]);
        $row = $res[0];
        $dp = $select->select('programme', [['pid', '=', $row['programme_id']]]);

        $programme = $dp[0]['programme_name'];
        $admin = new admin();

        if ($row['course_status'] == 'active') {
            $status = 'Active';
        }
        if ($row['course_status'] == 'inactive') {
            $status = 'Inactive';
        }

        echo '<div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Name of Course</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="course_name" value="'.$row['course_name'].'">
        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="cid" value="'.$row['cid'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Course Code</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="course_code" value="'.$row['course_code'].'">
        </div>

        

        <div class="form-group">
        <label for="exampleInputEmail1">Course Description</label>
        <textarea  class="form-control" id="exampleInputEmail1" name="course_description">'.$row['course_description'].'</textarea>
        </div>

        
        
        <div class="form-group">
        <label>Programme Name</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="1" tabindex="-1" aria-hidden="true" name="programme_id">
            <option value="'.$row['programme_id'].'" selected>'.$programme.'</option>
            '.$admin->programmeoptions().'
            
        </select>
        <!--  -->
        </div>


        <div class="form-group">
        <label>Credit Hours</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="2" tabindex="-1" aria-hidden="true" name="course_credit">
            <option value="'.$row['course_credit'].'" selected>'.$row['course_credit'].'</option>
            <option value="1">1 credit Hour</option>
            <option value="2">2 Credit Hours</option>
            <option value="3">3 Credit Hours</option>
            <option value="4">4 Credit Hours</option>
            <option value="5">5 Credit Hours</option>
            
        </select>
        <!--  -->
        </div>


        <div class="form-group">
        <label>Course status</label>
        <select class="form-control select2 " style="width: 100%;"
            data-select2-id="3" tabindex="-1" aria-hidden="true" name="course_status">
            <option value="'.$row['course_status'].'" selected>'.$status.'</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            
        </select>
        <!--  -->
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>';
    }

    public function coursedetails($cid)
    {
        $select = new sel();
        $res = $select->select('course', [['cid', '=', $cid]]);
        $row = $res[0];
        $dp = $select->select('programme', [['pid', '=', $row['programme_id']]]);
        $programme = $dp[0]['programme_name'];
        $admin = new admin();

        if ($row['course_status'] == 'active') {
            $status = '<span class="badge badge-success">Active</span>';
        }
        if ($row['course_status'] == 'inactive') {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }

        echo '<tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Course Name</td>

        <td id="viewstatus">'.$row['course_name'].'</td>
        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Course Code</td>

        <td id="viewstatus">'.$row['course_code'].'</td>

        </tr>


        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Course Credit</td>

        <td id="viewstatus">'.$row['course_credit'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Course Description</td>

        <td id="viewstatus">'.$row['course_description'].'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Programme Name</td>

        <td id="viewstatus">'.$programme.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Course Status</td>

        <td id="viewstatus">'.$status.'</td>

        </tr>

        <tr style="border:1px solid #3F474E;height:60px; border-left:none;border-right:none;">
        <td>Created on</td>

        <td id="viewstatus">'.$row['created_at'].'</td>
        </tr>';
    }

    public function getpositions()
    {
        $select = new sel();
        $res = fetchall('pos');
        foreach ($res as $value) {
            if ($value['position_status'] == 'active') {
                $value['position_status'] = '<span class="badge badge-success">Active</span>';
            }
            if ($value['position_status'] == 'inactive') {
                $value['position_status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
            <td>'.$value['position_id'].'</td>
            <td>'.$value['position_name'].'</td>
            
            <td>'.$value['position_status'].'</td>
            <td> <button class="btn btn-secondary btngetposition" id="'.$value['position_id'].'"  data-izimodal-open="#editposition" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> <button class="btn btn-danger deleteposition" id="'.$value['position_id'].'"><i class="fa fa-trash"></i></button></td>
            </tr>';
        }
    }

    public function viewpositionform($position_id)
    {
        $select = new sel();
        $res = $select->select('pos', [['position_id', '=', $position_id]]);
        $row = $res[0];
        if ($row['position_status'] == 'active') {
            $status = 'Active';
        }
        if ($row['position_status'] == 'inactive') {
            $status = 'Inactive';
        }
        echo '<div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name of Position</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="position_name" value="'.$row['position_name'].'">
          <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="position_id" value="'.$row['position_id'].'">
        </div>

        <div class="form-group">
          <label>Position status</label>
          <select class="form-control select2 " style="width: 100%;"
            data-select2-id="1" tabindex="-1" aria-hidden="true" name="position_status">
            <option value="'.$row['position_status'].'">'.$status.'</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            
          </select>
          <!--  -->
        </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>';
    }

    // ************************************************************
    // .Fleet manager
    //****************************************** */

    // listpits
    public function listpits()
    {
        $res = fetchall('pit');
        $result ='';
        foreach ($res as $row) {
            $result .= '<option value="'.$row['pid'].'">'.$row['pit_name'].' -'.$row['fuel'].'L</option>';
        }

        return $result;
    }

    // listtruck
    public function listrucks()
    {
        $res = fetchall('trucks');
        $result ='';
        foreach ($res as $row) {
            $result .= '<option value="'.$row['tid'].'">'.$row['truck_name'].'</option>';
        }
        return $result;
    }

    // trips

    public function gettrips()
    {
        $res = fetchall('trips', ['tripid' => 'DESC']);

        foreach ($res as $row) {
            $pit = customfetch('pit', [['pid', '=', $row['pid']]]);
            $truck = customfetch('trucks', [['tid', '=', $row['tid']]]);
            $truck = $truck[0]['truck_name'];
            $pit = $pit[0]['pit_name'];
            echo '<tr>
            <td>'.$row['tripid'].'</td>
            <td>'.$pit.'</td>
            <td>'.$truck.'</td>
            <td>'.$row['gross'].'</td>
            <td>'.$row['tare'].'</td>
            <td>'.$row['net'].'</td>
            <td>'.$row['fuel'].'L</td>
            <td>'.$row['time_in'].'</td>
            <td>'.$row['time_out'].'</td>
            <td>'.$row['date_created'].'</td>
            <td><!--<button class="btn btn-primary viewfaculty" id="'.$row['tripid'].'"   data-izimodal-open="#viewfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button>--> <button class="btn btn-secondary btngettrip" id="'.$row['tripid'].'"  data-izimodal-open="#editfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> </td>
            </tr>';
        }
    }


    public function gettrip($tripid){
        $res = customfetch('trips',[['tripid','=',$tripid]]);
        $row = $res[0];
        $pit = customfetch('pit',[['pid','=',$row['pid']]]);
        $pit = $pit[0]['pit_name'];
        $truck = customfetch('trucks',[['tid','=',$row['tid']]]);
        $truck = $truck[0]['truck_name'];
        

        echo '<div class="card-body">


        <div class="form-group">
          <label>Select Pit</label>
          <select class="form-control select2 " style="width: 100%;"
              data-select2-id="1" tabindex="-1" aria-hidden="true" name="pid">

              <option value="'.$row['pid'].'">'.$pit.'</option>
               '.$this->listpits().'
              
          </select>
          <!--  -->
        </div>



        <div class="form-group">
          <label>Select Truck</label>
          <select class="form-control select2 " style="width: 100%;"
              data-select2-id="1" tabindex="-1" aria-hidden="true" name="tid">
              <option value="'.$row['tid'].'">'.$truck.'</option>
              '.$this->listrucks().'
              
          </select>
          <!--  -->
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Gross Weight (weight of truck + weight of load)</label>
          <input type="number" class="form-control" id="gw" placeholder="" name="gross" value="'.$row['gross'].'">
          <input type="hidden" class="form-control" id="gw" placeholder="" name="tripid" value="'.$row['tripid'].'">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Tare Weight( Weight of truck only)</label>
          <input type="number" class="form-control" id="tw" placeholder="" name="tare" value="'.$row['tare'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Net weight</label>
        <input type="number" class="form-control" id="netwaight" placeholder="" name="netw" disabled value="'.$row['net'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Time in</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="time_in" value="'.$row['time_in'].'">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Time Out</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="time_out" value="'.$row['time_out'].'">
        </div>

        

        

        


        

        

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>';

    }

}
