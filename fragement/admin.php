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

    // ************************************************************
    // .Fleet manager
    //****************************************** */

    // listpits
    public function listpits()
    {
        $res = fetchall('pit');
        $result = '';
        foreach ($res as $row) {
            $result .= '<option value="'.$row['pid'].'">'.$row['pit_name'].' -'.$row['fuel'].'L</option>';
        }

        return $result;
    }

    // listtruck
    public function listrucks()
    {
        $res = fetchall('trucks');
        $result = '';
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

    public function gettrip($tripid)
    {
        $res = customfetch('trips', [['tripid', '=', $tripid]]);
        $row = $res[0];
        $pit = customfetch('pit', [['pid', '=', $row['pid']]]);
        $pit = $pit[0]['pit_name'];
        $truck = customfetch('trucks', [['tid', '=', $row['tid']]]);
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

    // pits***************************
    // function for getpits

    public function getpits()
    {
        $res = fetchall('pit');

        foreach ($res  as $row) {
            echo '<tr>
            <td>'.$row['pid'].'</td>
            <td>'.$row['pit_name'].'</td>
            <td>'.$row['fuel'].'</td>
            <td><!--<button class="btn btn-primary viewfaculty" id="'.$row['pid'].'"   data-izimodal-open="#viewfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button>--> <button class="btn btn-secondary btngetpit" id="'.$row['pid'].'"  data-izimodal-open="#editpit" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> </td>

            </tr>';
        }
    }

    // get single pit

    public function getpit($pid)
    {
        $res = customfetch('pit', [['pid', '=', $pid]]);
        $row = $res[0];
        echo '<div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Pit Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="pit_name" value="'.$row['pit_name'].'">
          <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="pid" value="'.$row['pid'].'">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Fuel</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="fuel" value="'.$row['fuel'].'">
         
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>';
    }

    // trucks***************************
    // function for gettrucks
    public function gettrucks()
    {
        $res = fetchall('trucks');

        foreach ($res  as $row) {
            echo '<tr>
            <td>'.$row['tid'].'</td>
            <td>'.$row['truck_name'].'</td>
            <td>'.$row['truck_number'].'</td>
            
            <td><!--<button class="btn btn-primary viewfaculty" id="'.$row['tid'].'"   data-izimodal-open="#viewfaculty" data-izimodal-transitionin="fadeInDown"><i class="fa fa-eye"></i></button>--> <button class="btn btn-secondary btngettruck" id="'.$row['tid'].'"  data-izimodal-open="#edittruck" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button> </td>

            </tr>';
        }
    }

    // get single truck

    public function gettruck($tid)
    {
        $res = customfetch('trucks', [['tid', '=', $tid]]);
        $row = $res[0];
        echo '<div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Truck Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="truck_name" value="'.$row['truck_name'].'">
          <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="tid" value="'.$row['tid'].'">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Truck Number</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="truck_number" value="'.$row['truck_number'].'">
         
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>';
    }

    // /admin**********************************************************
    // function for getadmins
    public function getadmins()
    {
        $res = fetchall('cmd');

        foreach ($res  as $row) {
            if ($row['status'] == 'active') {
                $status = '<span class="badge badge-success">Active</span>';
            } else {
                $status = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
            <td>'.$row['admin_id'].'</td>
            <td>'.$row['name'].'</td>   
            <td>'.$row['username'].'</td>
            
            <td>'.$row['contact'].'</td>
            <td>'.$row['role'].'</td>
            <td>'.$status.'</td>
            <td>'.$row['date_created'].'</td>
            <td><button class="btn btn-primary btnchangepass" id="'.$row['admin_id'].'" title="change password"   data-izimodal-open="#changepassword" data-izimodal-transitionin="fadeInDown"><i class="fa fa-lock"></i></button> <button title="Edit Account" class="btn btn-secondary btngetadmin" id="'.$row['admin_id'].'"  data-izimodal-open="#editadmin" data-izimodal-transitionin="fadeInDown"><i class="fa fa-edit"></i></button>  <button title="Delete Account" class="btn btn-danger btndelaccount" id="'.$row['admin_id'].'" ><i class="fa fa-trash"></i></button></td>

            </tr>';
        }
    }

    // get single admin password function

    public function getadminpass($admin_id)
    {
        $res = customfetch('cmd', [['admin_id', '=', $admin_id]]);
        $row = $res[0];
        echo '<div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">New Password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="newpass" value="">
          <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="admin_id" value="'.$row['admin_id'].'">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>';
    }

    // function to get single admin
    public function getadmin($admin_id)
    {
        $res = customfetch('cmd', [['admin_id', '=', $admin_id]]);
        $row = $res[0];
        echo '<div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="'.$row['name'].'">
                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="admin_id" value="'.$row['admin_id'].'">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="username" value="'.$row['username'].'" readonly>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="contact" value="'.$row['contact'].'">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-control" name="role">
                            <option value="admin" '.($row['role'] == 'admin' ? 'selected' : '').'>Admin</option>
                            <option value="superadmin" '.($row['role'] == 'superadmin' ? 'selected' : '').'>Super Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control" name="status">
                            <option value="active" '.($row['status'] == 'active' ? 'selected' : '').'>Active</option>
                            <option value="inactive" '.($row['status'] == 'inactive' ? 'selected' : '').'>Inactive</option>
                        </select>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
        
                </div>

        
        ';
    }

    //Report********************************************************
    public function pitreport($pid, $from, $to)
    {
        $sum = new sums();
        $count = new counter();
        $totaltonage = $sum->sumbetween('trips', 'net', [['pid', '=', $pid]], ['date_created', $from, $to], 'AND');
        if ($totaltonage == null) {
            $totaltonage = 0;
        }
        $totalfuel = $sum->sumbetween('trips', 'fuel', [['pid', '=', $pid]], ['date_created', $from, $to], 'AND');
        if ($totalfuel == null) {
            $totalfuel = 0;
        }
        echo '<div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3>'.$totaltonage.'</h3>
            <p>Total Tounage</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3>'.$count->countbetween('trips', 'date_created', [$from, $to], [['pid', '=', $pid]], 'AND').'</h3>
            <p>Trucks used </p>
          </div>
          <div class="icon">
          <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      
      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3>'.$totalfuel.'Litres</h3>
            <p>Fuel Consumption</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      
      
      
      
      ';
    }

    public function truckreport($tid, $from, $to)
    {
        $sum = new sums();
        $count = new counter();
        $totaltonage = $sum->sumbetween('trips', 'net', [['tid', '=', $tid]], ['date_created', $from, $to], 'AND');
        // $totaltonage = sum('trips', 'net', [['tid', '=', $tid], ['date_created', '>=', $from], ['date_created', '<=', $to]], 'AND');
        if ($totaltonage == null) {
            $totaltonage = 0;
        }
        $totalfuel = $sum->sumbetween('trips', 'fuel', [['tid', '=', $tid]], ['date_created', $from, $to], 'AND');
        // $totalfuel = sum('trips', 'fuel', [['tid', '=', $tid], ['date_created', '>=', $from], ['date_created', '<=', $to]], 'AND');
        if ($totalfuel == null) {
            $totalfuel = 0;
        }
        echo '<div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3>'.$totaltonage.'</h3>
            <p>Total Tounage</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3>'.$count->countbetween('trips', 'date_created', [$from, $to], [['tid', '=', $tid]], 'AND').'</h3>
            <p>Trips </p>
          </div>
          <div class="icon">
          <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      
      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3>'.$totalfuel.'Litres</h3>
            <p>Fuel Consumption</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      
      
      
      
      ';
    }

    // admin login********************************************************
    public function adminlogin($username, $password)
    {
        if (authenticate('cmd', [['username', '=', $username]]) == 'success') {
            if (authenticate('cmd', [['password', '=', md5($password)]]) == 'success') {
                if (loginauth('cmd', 'fleetadmin', [['username', '=', $username], ['password', '=', md5($password)]], 'AND') == 'success') {
                    return ['type' => 'success', 'msg' => 'loinsuccess'];
                } else {
                    return ['type' => 'error', 'msg' => 'Something went wrong'];
                }
            } else {
                return ['type' => 'error', 'msg' => 'Invalid Password'];
            }
        } else {
            return ['type' => 'error', 'msg' => 'Invalid Username'];
        }
    }

    // admin lgout********************************************************
    public function logout()
    {
        if (logout('fleetadmin') == 'success') {
            return ['type' => 'success', 'msg' => 'logout'];
        } else {
            return ['type' => 'error', 'msg' => 'Something went wrong'];
        }
    }
}
