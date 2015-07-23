$(document).ready(function(){
    $("#upload").click(function(){
     	var name = $("#fname").val();
		var mail = $("#email").val();
		var mobile = $("#mobile").val();
        var plat = $("#plat").val();
		var file = $("#userfile").val();
	if(name==''){
		$('#fname').notify("required name"/*,{position:"right"}*/);
		$('#fname').next().show();
			return false;
	};
	if(mail==''){
		$('#email').notify("required email"/*,{position:"right"}*/);
		$('#email').next().show();
			return false;
	};
	if(IsEmail(mail)==false){
		$('#email').notify("This email is not valid"/*,{position:"right"}*/);
		$('#email').next().show();
    		return false;
	};
	if(mobile==''){
		$('#mobile').notify("required Mobile Number");
		$('#mobile').next().show();
			return false;
	};
    if(plat==''){
        $('#plat').notify("required Your Platform");
        $('#plat').next().show();
            return false;
    };
	if (file=='') {
		$("#userfile").notify("Upload File");
        //$('#userfile').next().show();
		return false;
	};
			 
    });
    
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
          return false;
        }else{
           return true;
       }
    }
    $('.numbersOnly').keyup(function () {
    	this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    /*$("#status").on('click',function(){
        var uid = $("#userid").val();
        if(uid==''){
            $("#userid").notify("Enter Mobile Number");
            $("#userid").next().show();
            return false;
        };
        if(uid.length<10) {
            $("#userid").notify("Enter Valid and 10 Digits");
            return false;
        };
        $.ajax({url: "track.php?mobile="+uid, 
            success: function(result){
                //alert(result);
                 if (result == '') {
    $("#get-data").text('Sorry! Your Number Not registered').css({ 'margin-top':'20px',
                    'font-size' : '20px',
                    'font-weight':'bold',
                    'padding':'10px 10px 10px 10px',
                    'background-color' : '#0060ac',
                    'color' : '#fff',
                    'border-radius': '10px',
                    'text-align': 'center',
                });
  }else{
                $("#get-data").text(result).css({ 'margin-top':'20px',
                    'font-size' : '20px',
                    'font-weight':'bold',
                    'padding':'10px 10px 10px 10px',
                    'background-color' : '#0060ac',
                    'color' : '#fff',
                    'border-radius': '10px',
                    'text-align': 'center',
                });
                }
            }
        });
     });*/
/*$("#mobile").blur(function(){
            $("#Status_Cell").show();
             $("#Status_Cell").html("checking...");
             var mobile = $("#mobile").val();
             $.ajax({
                /*type:"post",*
                url:"getphone.php?mobile="+mobile,
                //data:"cell="+cell,
                    success:function(data){
                        //alert(data);
                    if(data==0){
                        $("#Status_Cell").html("Valid number").css('color' , 'green');
                    }
                    else{
                        $("#Status_Cell").html("Your Mobile Number already existed").css('color' , 'red');
                    }
                }
             });
        });*/

});