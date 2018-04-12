
function validateAttendance($attendanceId){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/event/attendance/"+$attendanceId+"/validate",
    method: "POST",
    context: document.body,
    success: function(data) {
      $("#attendance_" + $attendanceId).removeClass("badge-warning");
      $("#attendance_" + $attendanceId).removeClass("badge-danger");
      $("#attendance_" + $attendanceId).addClass("badge-success");
      $("#attendance_" + $attendanceId).text("Approved");
      console.log("validated");
    },
    error: function(data) {
      console.log("broken validate");
    }
  });
}

function invalidateAttendance($attendanceId){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/event/attendance/"+$attendanceId+"/invalidate",
    method: "POST",
    context: document.body,
    success: function(data) {
      $("#attendance_" + $attendanceId).removeClass("badge-warning");
      $("#attendance_" + $attendanceId).addClass("badge-danger");
      $("#attendance_" + $attendanceId).removeClass("badge-success");
      $("#attendance_" + $attendanceId).text("Revoked");
      console.log("invalidated");
    },
    error: function(data) {
      console.log("broken invalidate");
    }
  });
}

function changeRole($attendanceId,$newRoleId){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/event/attendance/"+$attendanceId+"/changeRole",
    method: "POST",
    data:{
      "role":$newRoleId
    },
    context: document.body,
    success: function(data) {
      console.log("invalidated");
    },
    error: function(data) {
      console.log("broken invalidate");
    }
  });
}


function addPlayer($event){

  var playersToAdd = $('.addPlayerListing li').map(function(){
    if($(this).hasClass("active")){
      return this.value;
    }
  }).toArray() ;

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/event/"+$event+"/addPlayer",
    method: "POST",
    data:{
      "playerAdded":playersToAdd
    },
    context: document.body,
    success: function(data) {
      location.reload();
    },
    error: function(data) {
      location.reload();
    }
  });
}

function toggleActive ($classId){
  $("."+$classId).toggleClass("active");
}
