jQuery(document).ready(function ($) {
  $('#add_student').submit(function (e) { 
    e.preventDefault();
    // alert('ajax')
    let firstname=$('#firstname').val();
    let lastname=$('#lastname').val();
    let mobile=$('#mobile').val();
    let email=$('#email').val();
    let level=$('#level').val();
    // alert(level)
    $.ajax({
        type: "post",
        url: "/wp-admin/admin-ajax.php",
        data: {
            action:'add_students',
            firstname:firstname,
            lastname:lastname,
            mobile:mobile,
            email:email,
            level:level

        },
        // dataType: "dataType",
        success: function (response) {
            
        },
        error:function () {  }
    });
    
  });
  $('.select-student').click(function (e) { 
      e.preventDefault();
      
      let el=$(this).data('id');
      $.ajax({
          type: "post",
          url: "/wp-admin/admin-ajax.php",
          data: {
              action:'select_student',
              el:el
            },
            // dataType: "dataType",
            success: function (response) {
                let data=JSON.parse(response)
                $('#e_ID').val(data.ID);
                $('#e_name').val(data.name);
                $('#e_family').val(data.family);
                $('#e_mobile').val(data.mobile);
                $('#e_email').val(data.email);
                $('#e_level').val(data.level);
            },
            error:function (error) {
                
            }
        });
        
    });
        $('.delet-student').click(function (e) { 
            e.preventDefault();
            let tr=this;
            let el=$(this).data('id');
            $.ajax({
                type: "post",
                url: "/wp-admin/admin-ajax.php",
                data: {
                    action:'delete_student',
                    el:el
                },
                // dataType: "dataType",
                before:function(){},
                success: function (response) {
                    if(response.success){
                      $(tr).parents('tr').remove();                
                    }
                },
                error:function (error) {
                    
                },
                complete:function(){
                    
                }
            });
            
        });
    $('#update_student').submit(function (e) { 
      e.preventDefault();
      // alert('ajax')
      let id=$('#e_ID').val();
   
      let name=$('#e_name').val();
      let family=$('#e_family').val();
      let mobile=$('#e_mobile').val();
      let email=$('#e_email').val();
      let level=$('#e_level').val();
      // alert(level)
      $.ajax({
          type: "post",
          url: "/wp-admin/admin-ajax.php",
          data: {
              action:'update_students',
              id:id,
              name:name,
              family:family,
              mobile:mobile,
              email:email,
              level:level
  
          },
          // dataType: "dataType",
          success: function (response) {
            
           
            if(response.success){
                // alert(response.message)
                Swal.fire({
                    title: response.message,
                    
                    confirmButtonText: "باشه",
                   
                   
                    showCloseButton: true
                  });
            }
          },
          error:function (error) { 
if(error.responseJSON.error){
    // alert(error.responseJSON.message)
    
    Swal.fire({
        title: error.responseJSON.message,
     
        confirmButtonText: "باشه",
        
       
        showCloseButton: true
      });
}
           },
           complete:function(){
            
           }
      });
      
    });
});