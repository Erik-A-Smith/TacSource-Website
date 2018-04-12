function passwordReset($userID){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: "/user/"+$userID+"/resetToken",
    method: "POST",
    context: document.body,
    success: function(data) {
      // alert(data.token);
      var getUrl = window.location;
      var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
      $("#resetUrl").text(baseUrl+'/reset/'+data.token);
      $("#resetUrlInfo").show();
    },
    error: function(data) {
      console.log("broken!");
    }
  });
}
