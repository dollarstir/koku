$(function(){
    //*********************************** */
    //Izi modal here 
    //*********************************** */

  $('#editfaculty').iziModal({
    title: 'Edit Trip',
    // icon: 'fa fa-eye',
    
    headerColor: '#5A6268',
    theme: 'dark',
    // width: 500,
    // height: 500,
    padding: 20,
    radius: 20,
    top: 100,
    bottom: 50,
  });

  $('#viewfaculty').iziModal({
    title: 'View Faculty',
    // icon: 'icon-home',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 90,
    // bottom: 50,

  });

  $('#addfacultymodal').iziModal({
    title: 'New Trip',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });



  // *********************************** */



  $('#editdepartment').iziModal({
    title: 'Edit Department',
    // icon: 'fa fa-eye',
    
    headerColor: '#5A6268',
    theme: 'dark',
    // width: 500,
    // height: 500,
    padding: 20,
    radius: 20,
    top: 100,
    bottom: 50,
  });

  $('#viewdepartment').iziModal({
    title: 'View Department',
    // icon: 'icon-home',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 90,
    // bottom: 50,

  });

  $('#adddepartmentmodal').iziModal({
    title: 'Add Department',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });

  // *********************************** */

  $('#editprogramme').iziModal({
    title: 'Edit Programme',
    // icon: 'fa fa-eye',
    
    headerColor: '#5A6268',
    theme: 'dark',
    // width: 500,
    // height: 500,
    padding: 20,
    radius: 20,
    top: 100,
    bottom: 50,
  });

  $('#viewprogramme').iziModal({
    title: 'View Programme',
    // icon: 'icon-home',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 90,
    // bottom: 50,

  });

  $('#addprogrammemodal').iziModal({
    title: 'Add Programme',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });




// ****************************************************************************************
// Course section
// ****************************************************************************************


$('#editcourse').iziModal({
    title: 'Edit Course',
    // icon: 'fa fa-eye',
    
    headerColor: '#5A6268',
    theme: 'dark',
    // width: 500,
    // height: 500,
    padding: 20,
    radius: 20,
    top: 100,
    bottom: 50,
  });

  $('#viewcourse').iziModal({
    title: 'View Course',
    // icon: 'icon-home',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 90,
    // bottom: 50,

  });

  $('#addcoursemodal').iziModal({
    title: 'Add Course',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });

//   ****************************************************************************************
// position section
// ****************************************************************************************
$('#editposition').iziModal({
    title: 'Edit Position',
    // icon: 'fa fa-eye',
    
    headerColor: '#5A6268',
    theme: 'dark',
    // width: 500,
    // height: 500,
    padding: 20,
    radius: 20,
    top: 100,
    bottom: 50,
  });

  

  $('#addpositionmodal').iziModal({
    title: 'Add Position',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });


  // addpit moAL

  $('#addpit').iziModal({
    title: 'New Pit',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });

  // edit pit

  $('#editpit').iziModal({
    title: 'Edit Pit',
    headerColor: '#5A6268',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });


  // add truck 

  $('#addtruck').iziModal({
    title: 'New Truck',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });



  // edit truck

  $('#edittruck').iziModal({
    title: 'Edit Truck',
    headerColor: '#5A6268',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });



  // Admin Settings *******************

  // add truck 

  $('#addadmin').iziModal({
    title: 'New Admin',
    headerColor: '#0069D9',
    padding: 20,
    radius: 20,
    top: 120,
    bottom: 50,

  });



  // calculate net weight

  $(document).on('input','#gw',function(){
      if($('#tw').val() == ''){
        $('#netwaight').val($(this).val() - 0 );
      }
      if($('#tw').val()!=''){
        $('#netwaight').val($(this).val() - parseFloat($('#tw').val()));
      }
  })


  $(document).on('input','#tw',function(){
    if($('#gw').val() == ''){
      $('#netwaight').val($(this).val() - 0 );
    }
    if($('#gw').val()!=''){
      $('#netwaight').val( parseFloat($('#gw').val())- $(this).val());
    }
})

})