
$(function(){
  
  // *********************************** */
  // responses handler
  // *********************************** */
    function resp(response){

      console.log(response);
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
            $('#cttrips').load('processor/processor.php?action=counttrips');
            $('#cttrip').load('processor/processor.php?action=counttrips');
            $('#ctfuel').load('processor/processor.php?action=sumfuel');
            $('#cttrucks').load('processor/processor.php?action=counttrucks');

            $('#cttruck').load('processor/processor.php?action=counttrucks');
            $('#ctpits').load('processor/processor.php?action=countpits');
            $('#ctpit').load('processor/processor.php?action=countpits');
            
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

          else if(response.type == "success" &&  response.msg == "loinsuccess"){
            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            toastr.success('Login Successful');
            window.location.href = "admin";

          }

          else if(response.type == "success" &&  response.msg == "logout"){
            toastr.remove();
            toastr.options = {
              progressBar: true,
              positionClass: "toast-top-center",

            };
            toastr.success('Logout Successful');
            setTimeout(function(){
              window.location.href = "login";
            }, 2000);

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
$('.addtrip').submit(function(e){

    e.preventDefault();
    var user = {
        url: 'processor/processor.php?action=addtrip',
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
// get faculty now get trips
$(document).on('click','.btngettrip',function(){
  var tripid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=gettrip',
    type: 'post',
    data: {'tripid':tripid},
    success: function(response){
      $('.edittrip').html(response);
    }

  };
  $.ajax(user);
})


// edit faculty

$('.edittrip').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=edittrip',
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





// Fleett Manager **************************************
// add pit
$('.addpit').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=addpit',
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


// get a pit 

$(document).on('click','.btngetpit',function(){
  var pid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getsinglepit',
    type: 'post',
    data: {'pid':pid},
    success: function(response){
      $('.editpit').html(response);
    }

  };
  $.ajax(user);
})


// edit pit

$('.editpit').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editpit',
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





// Trucks************************************** */
// add truck
$('.addtruck').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=addtruck',
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


// get a truck 

$(document).on('click','.btngettruck',function(){
  var tid = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getsingletruck',
    type: 'post',
    data: {'tid':tid},
    success: function(response){
      $('.edittruck').html(response);
    }

  };
  $.ajax(user);
})


// edit Truck

$('.edittruck').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=edittruck',
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



// Admin************************************** */
// add admin
$('.addadmin').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=addadmin',
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

// get password info

$(document).on('click','.btnchangepass',function(){
  var admin_id = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getadminpass',
    type: 'post',
    data: {'admin_id':admin_id},
    success: function(response){
      $('.changepassword').html(response);
    }

  };
  $.ajax(user);
})


// edit password 

$('.changepassword').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editpassword',
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


// get single admin

$(document).on('click','.btngetadmin',function(){
  var admin_id = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=getsingleadmin',
    type: 'post',
    data: {'admin_id':admin_id},
    success: function(response){
      $('.editadmin').html(response);
    }

  };
  $.ajax(user);
})

// edit admin

$('.editadmin').submit(function(e){

  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=editadmin',
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


// delete admin
$(document).on('click','.btndelaccount',function(){
  var admin_id = $(this).attr('id');
  var user = {
    url: 'processor/processor.php?action=deleteadmin',
    type: 'post',
    data: {'admin_id':admin_id},
    beforeSend: before,
    success: resp

  };
  $.ajax(user);

});


// Reports ************************************** */

$('#frmcontroler').show();
$('#truckfrm').hide();
$('#btntruck').hide();
$('#reporttype').on('change', function() {
  var reporttype = $(this).val();
  if(reporttype == 'pit'){
    $('#truckfrm').hide();
    $('#btntruck').hide();
    $('#btnpit').show();
    $('#pitfrm').show();
  }
  if(reporttype == 'truck'){
    $('#truckfrm').show();
    $('#btntruck').show();
    $('#btnpit').hide();
    $('#pitfrm').hide();


  }
  
});

// get pit report
$('#btnpit').click(function(){
  var pid = $('.pid').val();
  var from = $('#fromdate').val();
  var to = $('#todate').val();
  var user = {
    url: 'processor/processor.php?action=getpitreport',
    type: 'post',
    data: {'pid':pid,'from':from,'to':to},
    beforeSend: before, 
    success: function(response){
      toastr.remove();
      $('#displayreport').html(response);
    }

  };
  $.ajax(user);

});

// get truck report
$('#btntruck').click(function(){
  var tid = $('.tid').val();
  var from = $('#fromdate').val();
  var to = $('#todate').val();
  var user = {
    url: 'processor/processor.php?action=gettruckreport',
    type: 'post',
    data: {'tid':tid,'from':from,'to':to},
    beforeSend: before, 
    success: function(response){
      toastr.remove();
      $('#displayreport').html(response);
    }

  };
  $.ajax(user);


});

// adminlogin ************************************** */
$('.adminlogin').submit(function(e){
  e.preventDefault();
  var user = {
      url: 'processor/processor.php?action=adminlogin',
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


// logout ************************************** */
$(document).on('click','#logout',function(){
  var user = {
    url: 'processor/processor.php?action=logout',
    type: 'post',
    beforeSend: before,
    success: resp

  };
  $.ajax(user);

});










    
})