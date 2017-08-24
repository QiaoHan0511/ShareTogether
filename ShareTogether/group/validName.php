<!DOCTYPE html>
<html><head><meta charset="utf-8"><title></title></head><body>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">

function clearStatus() {
  $("#plate_status").text("");
}

function clearStatus(s)
{
  $(s).siblings('.spanError').text("");
}

function clearValidSpan()
{
  $(".spanValid").text("");
}

var validate, valid2= false;

function checkplate(){
  var plate=$("#gName" ).val();
  if(plate.length > 0){
   $.ajax({
     type: 'post',
	 async:false,
     url: 'checkName.php',
     data: {gName:plate},
     success: function (response) {
       if(response=="Valid"){
         $("#plateStatus").text("");
         $("#plateStatusV").text("Valid");
         validate = true;
		 console.log('response = success',validate);
         return true;
       }
       else{
         $("#plateStatus").text("Group name already exist.");
         $("#plateStatusV").text("");
         validate = false;
		  console.log('response = fail');
         return false;
       }
     }
  });
 }
 else {
   $("#gName" ).val("")
    console.log('length !> 0');
   validate = false;
   return false;
 }
return validate;
}

function checkStatus()
{
  var gStatus = $('.gStatus> select').val();
  if(gStatus == "noselect" || gStatus == null){
    $("#positionStatus").text("");
    valid2 =  false;
    return false;
  }
  else{
    $("#positionStatus").text("");
    valid2 =  true;
    return true;
  }
  return valid2;
}

// function keyValid()
// {
//   var key = $('#gKey').val();
//   var length = key.length;
//
//     if (length == 0)
//     {
//       $("#keyStatus").text("You can't leave this empty.");
//       $("#keyStatusV").text("");
//       valid4 =  false;
//       return false;
//
//     }
//     else{
//         $("#keyStatusV").text("Valid");
//         $("#keyStatus").text("");
//         valid4 =  true;
//         return true;
//
//     }
//       return valid4;
// }


function checkAll(){

	   if(checkplate() && checkStatus()){
      //  alert($('#gName').val()+$('.gStatus> select').val()+$('#gKey').val());
    $.ajax({
      type:"post",
      data: {
        gName: $('#gName').val(),
        gKey: $('#gKey').val(),
        gStatus: $('.gStatus> select').val()
      },
      url: "createGroup.php",
      success: function(response){
        alert(response);
      window.location.href = "group.php";
      }
    })
  } else{

	 var plate = checkplate();
   var gStatus = checkStatus();
    console.log(plate, gStatus);
  }

}
</script></body></html>
