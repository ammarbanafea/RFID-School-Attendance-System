"use strict";



  $(document).ready(function(){
    $(".parent_add").click(function(e){
        e.preventDefault();
        let admin_name = $('#admin_name').val();
        let admin_email = $('#admin_email').val();
        let admin_pwd = $('#admin_pwd').val();
        let student_id = $('#student_id').val();

        $.post("parent_config.php",
        {
        Add: 1,
        student_id: student_id,
        admin_name:admin_name ,
        admin_email : admin_email,
        admin_pwd : admin_pwd,
        },
        function(data, status){
               $('.alert_user').fadeIn(500);
               $('.alert_user').html('<p class="alert alert-success">A new Parent has been successfully added</p>');
        });
    });


  });

  $(document).on('click', '.select_btn', function(){
    var el = this;
    var id = $(this).attr("id");
    // console.log(id);
    $.ajax({
      url: `parent_config.php`,
      type: 'GET',
      data: {
      'selectButton': 1,
      'id': id, 
      },
      success: function(response){
        // alert('sevice',response)

        $(el).closest('tr').css('background','#D4C9A9');

        $('.alert_user').fadeIn(500);
        $('.alert_user').html('<p class="alert alert-success">The card has been selected!</p>');
        
        setTimeout(function () {
            $('.alert').fadeOut(500);
        }, 5000);

        $.ajax({
          url: "parent_manage.php"
          }).done(function(data) {
          $('#manage_parent').html(data);
        });

        console.log(response);
        var admin_name = {
          admin_name : []
        };
        var admin_email = {
          admin_email : []
        };

        var len = response.length;
        console.log(' response:>> ',response );
        $('#id').val(response[0].id);
        $('#admin_name').val(response[0].admin_name);
        $('#admin_email').val(response[0].admin_email);
        $('#password').val(response[0].admin_pwd);
        $('#student_id').val(response[0].student_id);

      },
      error : function(data,error) {
        console.log('data :>> ', data);
        console.log(error);
      }
    });
  });


  $(document).on('click', '.user_upd', function(){
    //student Info
        var id = $('#id').val();
        let admin_name = $('#admin_name').val();
        let admin_email = $('#admin_email').val();
        let admin_pwd = $('#password').val();
        let admin_pwdShow = $('#admin_pwd').val();
        let student_id = $('#student_id').val();


        console.log('id :>> ', id);
        $.post("parent_config.php",
        {
        update:1,
        id: id,
        admin_name:admin_name ,
        admin_email : admin_email,
        admin_pwd : admin_pwd,
        admin_pwdShow : admin_pwdShow,
        student_id : student_id
        },
        function(data, status){
              console.log('data :>> ', data);
        });   
  });

  $(document).on('click', '.user_rmo', function(){
    //student Info
        var id = $('#id').val();
        $.post("parent_config.php",
        {
        Delete:1,
        id: id,
        },
        function(data, status){
              console.log('data :>> ', data);
        });   
  });
