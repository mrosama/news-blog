/*
 *
 *
 * */

$("document").ready(function() {

    $("#notify_id").on('click', function() {
update_notify();
        $.each(['#list_message', '#list_themes', '#privacy-menu'], function(index, value) {
            //alert( index + ": " + value );
            $(value).hide('fast');
        });

        $('#list_notify').toggle(1000);

    });

    /////////////////////////////////////////////////

    $("#message_id").on('click', function() {

        $.each(['#list_notify', '#list_themes', '#privacy-menu'], function(index, value) {
            //alert( index + ": " + value );
            $(value).hide('fast');
        });

        $('#list_message').toggle(1000);

    });

    ////////////////////////////////

    $("#themes_id").on('click', function() {

        $.each(['#list_message', '#list_notify', '#privacy-menu'], function(index, value) {
            //alert( index + ": " + value );
            $(value).hide('fast');
        });

        $('#list_themes').toggle(1000);

    });

    $("#privacy_id").on('click', function() {

        $.each(['#list_message', '#list_notify', '#list_themes'], function(index, value) {
            //alert( index + ": " + value );
            $(value).hide('fast');
        });

        $('#privacy-menu').toggle(1000);

    });

    /////////////////////////end function/////////////////////////////
    
    
    
    
    var timer = setInterval(function() { 
var base=$("#_base").val();
var profile_img=$("#welcome_icon").html();
var arr=["/img/gray.png","/img/green.png"];
var num=Math.round(Math.random()*1);
var _randomIcon="<img src="+base + arr[num]+" alt='online'> ";
$("#welcome_icon").html(_randomIcon);

}, 1000);
    
    
 ////////////////add class///////////////////////////  
    
 /*$("#b_plugin").addClass('uk-button-primary');   
     $("#b_plugin2").addClass('uk-button-primary');*/   
     
    
     

$('[title="--"]').addClass('uk-button-primary');

  
  
  

  
    
  /*   $("#btn_senddbmail").on('click', function() {
         
          
     $( "#form_mail_db" ).toggle(function() {
$(this).hide();
}, function() {
$(this).show();
});
      
     });
    */
    

$('#btn_senddbmail').click( function() { $('#form_mail_db').toggle(1000);return false; } );
    
    
    
    
    
$("#r1").click(function(){

   $("input[name='del[]']").each(function ()
   {     
if($(this).is(':checked')){
$(this).removeAttr("checked");
} else {
$(this).prop("checked",'checked');
}
});
}); 
    





/////////////////////////////



$("#btn_maillist").click(function(){
   if($("#subject2").val()==""){
       alert("Please Enter Subject");
       return false;
   } 
    
       if($("#msg2").val()==""){
       alert("Please Enter Message");
       return false;
        } 
    
    
    return true;
    
    
    
});


$("#btn_replay").click(function(){
   if($("#title_msg").val()==""){
       alert("Please Enter Subject");
       return false;
   } 
    
       if($("#msg_replay").val()==""){
       alert("Please Enter Message");
       return false;
        } 
    
    
    return true;
    
    
    
});


////////////////////////////////////////////
    var uri_base_num_msg=$("#base_num_msg").val();
var get_num_message = function() {
   $.get( uri_base_num_msg,function( data ) 
             {
                // alert(data);
                 if(parseInt(data) > 0){
                     if(parseInt(data) > 20){
                         $("#notify_num_msg").html('20+');
                     } else {
                         
                         $("#notify_num_msg").html(data);  
                     }
   $("#notify_num_msg").show("fast");
                 }
     
       
       });

};

get_num_message();

///////////////////////////////////

 var uri_base_list_msg=$("#base_list_msg").val();

var get_list_message = function() {
   $.get( uri_base_list_msg,function( data ) 
             {
                 if(data!=''){
                $("#n_msg").html(data);
            
                 }
     
       
       });

};



get_list_message();

////////////////////////////
  
  
  
  
  ////////////////////////////////////////////
    var uri_base_num_alert=$("#base_num_alert").val();
var get_num_alert = function() {
   $.get( uri_base_num_alert,function( data ) 
             {
                 if(parseInt(data) > 0){
                   
                     
                     if(parseInt(data) > 20){
                         $("#num_notifications").html('20+');
                     } else {
                         
                         $("#num_notifications").html(data);  
                     } 
   $("#num_notifications").show("fast");
                 }
     
       
       });

};
  
get_num_alert(); 
  
  
  ////////////////////////
  
  
  
  
  
  
  
   var uri_base_list_alert=$("#base_list_alert").val();

var get_list_notify = function() {
   $.get( uri_base_list_alert,function( data ) 
             {
                 if(data!=''){
                $("#n_alert").html(data);
            
                 }
     
       
       });

};



get_list_notify();
  
  
  
  
  
 var uri_update_notify=$("#base_up_alert").val();

var update_notify = function() {
  //  alert('s');
   $.get(uri_update_notify);

};

  
  
  
  $("#chart2_vsize").click(function(){
      viewone('chart2');
      
  });
  
  $("#chart1_vvistor").click(function(){
      viewone('chart1');
      
  });
  
  
    $("#chart_vvmember").click(function(){
      viewone('chart_cmember');
      
  });
  
    $("#chart_vvinfo").click(function(){
      viewone('chart_cinfo');
      
  });
  
 var viewone = function(div){
      
 var divc="#"+div;    
/*var x=$(divc).css("display");  
   if(x=='none'){
 $(divc).show("slow");
 }
 else {
 
 $(divc).hide("slow");
 
 }  
 */
  if ( $( divc).is( ":hidden" ) ) {
$( divc ).slideDown( "slow" );
} else {
$( divc ).hide('slow');
}
 }; 
  
  
  
$("#tagschoose").click(function(){
    $('#toptags').toggle('2000');
    return false; 
    
});  
  
  
  
  
  
  
  
 
  
  
  
  
  //end  
  });   
  /*  function checkme(myform){
    alert('s');
var p_ids=myform.elements['del[]'];
if(myform.r1.checked){
for (var i = 0;i<p_ids.length;i++) {
p_ids[i].checked=true;
}
}else {
    
for (var i = 0;i<p_ids.length;i++) {
p_ids[i].checked=false;
}   
    
    } 
    
    
    

});*/

/////////////out jquery

//----------logout--------------   



