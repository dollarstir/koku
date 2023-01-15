
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








    
})