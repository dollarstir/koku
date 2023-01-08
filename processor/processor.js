
$(function(){
  
  // *********************************** */
  // responses handler
  // *********************************** */
    function resp(response){
        var response = JSON.parse(response);

        if(response.type == "success" &&  response.msg == "success"){
            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            toastr.success('Record added Successfully');
            $('form').trigger('reset');
            $('#'+ response.tbl).load('processor/processor.php?action='+response.action);
            $('#'+ response.modalid).iziModal('close');
        }

        else if(response.type == "success" &&  response.msg == "updated"){
            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            toastr.success('Record updated Successfully');
            $('#'+ response.tbl).load('processor/processor.php?action='+response.action);
            $('#'+ response.modalid).iziModal('close');

        }

        else if(response.type == "success" &&  response.msg == "deleted"){
            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            toastr.success('Record deleted Successfully');
            $('#'+ response.tbl).load('processor/processor.php?action='+response.action);

          }
        
        else{

            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            var tp = String(response.type);
            if(tp == "error"){
                toastr.error(response.msg);

            }
            if(tp == "warning"){
                toastr.warning(response.msg);

            }

        }

    }

    function before()
{
    
    toastr.remove();
    toastr.options = {
      progressBar: true,
      positionClass: "toast-top-center",
      timeOut :10000,

    };
    toastr.info('Please wait...');
}


// ****************************************************************************************
// Faculty section
// ****************************************************************************************

// add faculty
$('.addfaculty').submit(function(e){

    e.preventDefault();
    var user = {
        url: 'processor/processor.php?action=addfaculty',
        type: 'post',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        
        beforeSend: before,
        success: resp

    };
    $.ajax(user);
});
// get faculty
$(document).on('click','.btngetfaculty',function(){
  var fid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getfaculty',
    type: 'post',
    data: {'fid':fid},
    success: function(response){
      $('.editfaculty').html(response);
    }

  };
  $.ajax(user);
})


// edit faculty

$('.editfaculty').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editfaculty',
      type: 'post',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: before,
      success: resp

  };
  $.ajax(user);
});

// view faculty info 

$(document).on('click','.viewfaculty',function(){
  var fid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=facultydetails',
    type: 'post',
    data: {'fid':fid},
    success: function(response){
      $('#facultyinfo').html(response);
    }

  };
  $.ajax(user);

});

// delete faculty
$(document).on('click','.deletefaculty',function(){
  var fid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deletefaculty',
    type: 'post',
    data: {'fid':fid},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);
});


// ****************************************************************************************
// Department section
// ****************************************************************************************
$('.adddepartment').submit(function(e){
  
    e.preventDefault();
    var user = {
        url: 'processor/processor.php?action=adddepartment',
        type: 'post',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: before,
        success: resp
  
    };
    $.ajax(user);
});

// get department
$(document).on('click','.btngetdepartment',function(){
  var did = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getdepartment',
    type: 'post',
    data: {'did':did},
    success: function(response){
      $('.editdepartment').html(response);
    }

  };
  $.ajax(user);
})

// view department info
$(document).on('click','.viewdepartment',function(){
  var did = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=departmentdetails',
    type: 'post',
    data: {'did':did},
    success: function(response){
      $('#departmentinfo').html(response);
    }

  };
  $.ajax(user);

});

// edit department

$('.editdepartment').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editdepartment',
      type: 'post',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: before,
      success: resp

  };
  $.ajax(user);
});

// delete department
$(document).on('click','.deletedepartment',function(){
  var did = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deletedepartment',
    type: 'post',
    data: {'did':did},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);
});

// ****************************************************************************************
// Program section
// ****************************************************************************************

$('.addprogramme').submit(function(e){
  
  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=adddprogramme',
      type: 'post',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: before,
      success: resp

  };
  $.ajax(user);
});

// get programme
$(document).on('click','.btngetprogramme',function(){
var pid = $(this).attr('id');
var user = {
  url: 'processor/processor.php?action=getprogramme',
  type: 'post',
  data: {'pid':pid},
  success: function(response){
    $('.editprogramme').html(response);
  }

};
$.ajax(user);

});


// View programme info
$(document).on('click','.viewprogramme',function(){
  var pid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=programmedetails',
    type: 'post',
    data: {'pid':pid},
    success: function(response){
      $('#programmeinfo').html(response);
    }
  };
  $.ajax(user);
});

// edit programme
$('.editprogramme').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editprogramme',
      type: 'post',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: before,
      success: resp

  };
  $.ajax(user);

});


// delete Programme
$(document).on('click','.deleteprogramme',function(){
  var pid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deletedprogramme',
    type: 'post',
    data: {'pid':pid},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);
});

// ****************************************************************************************
// Course section
// ****************************************************************************************

$('.addcourse').submit(function(e){
    
    e.preventDefault();
    var user = {
        url: 'processor/processor.php?action=addcourse',
        type: 'post',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: before,
        success: resp
  
    };
    $.ajax(user);
});

// get course
$(document).on('click','.btngetcourse',function(){
var cid = $(this).attr('id');
var user = {
  url: 'processor/processor.php?action=getcourse',
  type: 'post',
  data: {'cid':cid},
  success: function(response){
    $('.editcourse').html(response);
  }
};
$.ajax(user);

});

// View course info
$(document).on('click','.viewcourse',function(){
  var cid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=coursedetails',
    type: 'post',
    data: {'cid':cid},
    success: function(response){
      $('#courseinfo').html(response);
    }
  };
  $.ajax(user);

});

// edit course
$('.editcourse').submit(function(e){
  
    e.preventDefault();
    var user = {
        url: 'processor/processor.php?action=editcourse',
        type: 'post',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: before,
        success: resp
  
    };
    $.ajax(user);
});

// delete course
$(document).on('click','.deletecourse',function(){
  var cid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deletecourse',
    type: 'post',
    data: {'cid':cid},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);
});

// ****************************************************************************************
//  Position section
// ****************************************************************************************

$('.addposition').submit(function(e){
      
      e.preventDefault();
      var user = {
          url: 'processor/processor.php?action=addposition',
          type: 'post',
          data: new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: before,
          success: resp
    
      };
      $.ajax(user);
});

// get position
$(document).on('click','.btngetposition',function(){
var position_id = $(this).attr('id');
var user = {
  url: 'processor/processor.php?action=getposition',
  type: 'post',
  data: {'position_id':position_id},
  success: function(response){
    $('.editposition').html(response);
  }
};
$.ajax(user);

});


// edit position
$('.editposition').submit(function(e){
      
        e.preventDefault();
        var user = {
            url: 'processor/processor.php?action=editposition',
            type: 'post',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: before,
            success: resp
      
        };
        $.ajax(user);

});

// delete position
$(document).on('click','.deleteposition',function(){
  var position_id = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deleteposition',
    type: 'post',
    data: {'position_id':position_id},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);

});





    
})