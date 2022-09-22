function dialconfirm(id) {
  var href = $("#del-button" + id).prop('href');
  $("#del-button-dialog").prop("href", href);
  $('#dialog-confirm').modal('show');
}

function dialimageconfirm(id) {
  var href = $("#del-button" + id).prop('href');
  $("#del-image-button-dialog").prop("href", href);
  $('#dialog-image-confirm').modal('show');
}

function addSeparatorWithCommas(n) {
  if(n.toString().length == 0){
    a = n.toString().replace(/^0-9/, "");
    if(a.length == 0){
      a = 0;
    }

    n = a;

    return n;
  }
  else if(n.toString().length > 0 && n.toString().substr(0, 1) == "0" && n.toString().substr(1, 1) != ",")
  {
    a = n.toString().replace(/[^0-9\,]/, "");
    if(a.length <= 1 && Number.isInteger(a) == false){
      a = 0;
    }
    else{
      a = a.charAt(1);
    }
    
    return a;
  }
  else{
    a = n.toString().replace(/^0+/, "");
    b = n.toString().replace(/[^0-9\,]/g, "");
    d = b.split(",");
    c = "";

    panjang = d[0].length;
    j = 0;
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
        c = b.substr(i - 1, 1) + "." + c;
      } else {
        c = b.substr(i - 1, 1) + c;
      }
    }

    if(d[1] === undefined){
      n = c;
    }
    else{
      n = c+","+d[1];
    }

    return n;
  }
}

function addSeparators(n) {
  if(n.toString().length == 0){
    a = n.toString().replace(/^0-9/, "");
    if(a.length == 0){
      a = "";
    }

    n = a;

    return n;
  }
  else{
    a = n.toString().replace(/^0+/, "");
    b = n.toString().replace(/[^0-9\,]/g, "");
    c = "";

    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      c = b.substr(i - 1, 1) + c;
    }

    n = c;

    return n;
  }
}

function checkAll(ele) {
  var checkboxes = document.getElementsByTagName('input');
  if (ele.checked) {
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type == 'checkbox') {
        checkboxes[i].checked = true;
      }
    }
  }
  else {
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type == 'checkbox') {
        checkboxes[i].checked = false;
      }
    }
  }
}

$(function(){
  $('.date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    orientation: "bottom",
  });

  $('.dates').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    orientation: "bottom",
    startDate:$(".todaydate").val(),
  });

  $('.startdate').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    orientation: "bottom",
  }).on('changeDate', function(ev) {
    $(".enddate").datepicker('setStartDate', $(".startdate").val());
    var startDate = $(".startdate").val().split("-");
    var endDate = $(".enddate").val().split("-");

    var startParseDate = Date.parse(startDate[2]+"-"+startDate[1]+"-"+startDate[0])
    var endParseDate = Date.parse(endDate[2]+"-"+endDate[1]+"-"+endDate[0])

    if (endParseDate <= startParseDate) {
      $(".enddate").datepicker('update', $(".startdate").val());
    }
  });

  $(".enddate").datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    orientation: "bottom",
    startDate:$(".startdate").val(),
  });

  $('.select-with-select2').select2({
    placeholder: "Select data",
    allowClear: true
  });

  $(".dotseparator").on('change paste keyup', function(){
    $(this).val(addSeparatorWithCommas($(this).val().toString().replace(/[^0-9\,]/g, "")));
  })

  $(".numericseparator").on('change paste keyup', function(){
    $(this).val(addSeparators($(this).val().toString().replace(/[^0-9\,]/g, "")));
  })

  $("#phone").on('change paste keyup', function(){
    var phone = $(this).val().replace(/[^0-9]/g, "");
    $(this).val(phone);

    if(phone.substr(0, 1) === "0"){
      $(this).val("62"+phone.slice(1));
    }
  })

  $(".phone").on('change paste keyup', function(){
    var phone = $(this).val().replace(/[^0-9]/g, "");
    $(this).val(phone);

    if(phone.substr(0, 1) === "0"){
      $(this).val("62"+phone.slice(1));
    }
  })

  /*$(".nomordompetdigital").on('change paste keyup', function(){
    var phone = $(this).val().replace(/[^0-9]/g, "");
    $(this).val(phone);

    if(phone.substr(0, 1) === "0"){
      $(this).val("62"+phone.slice(1));
    }
  })*/

  $("#rekening-bank").on('click', function(){
    if($(this).is(":checked")){
      $("#namabank").prop('readonly', '');
      $("#nomorrekening").prop('readonly', '');
      $("#pemegangrekening").prop('readonly', '');
    }
    else{
      $("#namabank").val('');
      $("#nomorrekening").val('');
      $("#pemegangrekening").val('');

      $("#namabank").prop('readonly', 'readonly');
      $("#nomorrekening").prop('readonly', 'readonly');
      $("#pemegangrekening").prop('readonly', 'readonly');
    }
  })

  $("#dompet-digital").on('click', function(){
    if($(this).is(":checked")){
      $(".dompet-type").prop('disabled', '');
      $(".nomordompetdigital").prop('readonly', '');
    }
    else{
      $(".dompet-type").prop('checked', false);
      $(".dompet-type").prop('disabled', 'disabled');
      $(".nomordompetdigital").prop('readonly', 'readonly');
    }
  })

  $(".dompet-type").each(function() {
    $(this).on('click', function(){
      var id = $(this).prop("id").split("-");

      if($(this).is(":checked")){
        $(".nomordompetdigital").prop('readonly', 'readonly');
        $("#nomordompetdigital-"+id[1]).prop('readonly', '');
      }
      else{
        $(".nomordompetdigital").prop('readonly', 'readonly');
      }
    })
  })

  $(".add").each(function(){
    $(this).on('click', function(){
      let id = $(this).prop("id").split("-");
      let qty = 0;
      
      if(id[1]) {
        $.ajax({
          url: base_url + 'dashboard/process',
          method: 'POST',
          dataType: "json",
          data: {
            type: 'add',
            id: id[1],
            qty: 1,
          },
          success: function (data) {
            if(data.status == 1){
              var qtys = $("#qty-"+id[1]).html();
              qtys = parseInt(qtys) + 1;

              $("#qty-"+id[1]).html(qtys);

              $("#table-content").html(data.data);
              $("#weighttotal").html('<strong>'+data.totalweight+'</strong>');
              $("#transactiontotal").html('<strong>'+data.total+'</strong>');
              $("#cart-count").html('<strong>'+data.carttotal+'</strong>');
              
              if($("#table-section").hasClass("hide")){
                $("#table-section").removeClass("hide");
              }

              if($("#checkout-section").hasClass("hide")){
                $("#checkout-section").removeClass("hide");
              }

              if($(".alert-content").hasClass("hide")){
                $(".alert-content").removeClass("hide");
              }

              $(".alert-content").html(data.message);
              
            }
            else{
              if($(".alert-content").hasClass("hide")){
                $(".alert-content").removeClass("hide");
              }

              $(".alert-content").html(data.message);
            }
          }
        });
      }
    })
  })

  $(".reduce").each(function(){
    $(this).on('click', function(){
      let id = $(this).prop("id").split("-");
      let qty = 0;
      
      if(id[1]) {
        $.ajax({
          url: base_url + 'dashboard/process',
          method: 'POST',
          dataType: "json",
          data: {
            type: 'reduce',
            id: id[1],
            qty: 1,
          },
          success: function (data) {
            if(data.status == 1){
              var qtys = $("#qty-"+id[1]).html();
              if(qtys > 0){
                qtys = parseInt(qtys) - 1;
              }

              $("#qty-"+id[1]).html(qtys);

              $("#table-content").html(data.data);
              $("#weighttotal").html('<strong>'+data.totalweight+'</strong>');
              $("#transactiontotal").html('<strong>'+data.total+'</strong>');
              $("#cart-count").html('<strong>'+data.carttotal+'</strong>');
              
              if(data.data == null) {
                if(!$("#table-section").hasClass("hide")){
                  $("#table-section").addClass("hide");
                }
  
                if(!$("#checkout-section").hasClass("hide")){
                  $("#checkout-section").addClass("hide");
                }
              }
              else{
                if($("#table-section").hasClass("hide")){
                  $("#table-section").removeClass("hide");
                }
  
                if($("#checkout-section").hasClass("hide")){
                  $("#checkout-section").removeClass("hide");
                }
              }

              $(".alert-content").html(data.message);

              if($(".alert-content").hasClass("hide")){
                $(".alert-content").removeClass("hide");
              }
              
            }
            else{
              if($(".alert-content").hasClass("hide")){
                $(".alert-content").removeClass("hide");
              }

              $(".alert-content").html(data.message);
            }
          }
        });
      }
    })
  })

  $("#province").on('change', function(){
    $.ajax({
      url: base_url + 'registrasi/get_regencies_list',
      method: 'POST',
      dataType: "json",
      data: {
        id: $(this).val(),
      },
      success: function (data) {
        if(data != null){
          $("#regencies").html(data);
        }
        else{
          $("#regencies").html("");
        }

        $("#regencies").trigger("change");
      }
    });
  })

  $("#regencies").on('change', function(){
    $.ajax({
      url: base_url + 'registrasi/get_district_list',
      method: 'POST',
      dataType: "json",
      data: {
        id: $(this).val(),
      },
      success: function (data) {
        if(data != null){
          $("#district").html(data);
        }
        else{
          $("#district").html("");
        }

        $("#district").trigger("change");
      }
    });
  })

  $("#agree").on('click', function(){
    if($(this).is(":checked")){
      $("#checkout-button").prop('disabled', '');
    }
    else{
      $("#checkout-button").prop('disabled', 'disabled');
    }

    /*$.ajax({
      url: base_url + 'konfirmasipengangkutan/agree',
      method: 'POST',
      dataType: "json",
      data: {
        id: $(this).val(),
        status: $(this).is(":checked"),
      },
      success: function (data) {
        if(data.status == true) {
          $("#success-message").html(data.message);
          $("#dialog-success-confirm").modal();
        }
        else{
          $("#error-message").html(data.message);
          $("#dialog-alert-confirm").modal();
        }
      }
    });*/
  })

  $("#pengangkutan").on('change', function() {
    var pengangkutan = $(this).val();

    if (pengangkutan == 3) {
      $("#tps").prop('disabled', '');
      $("#tps_address_row").show();
    } else {
      $("#tps").prop('disabled', 'disabled');
      $("#tps_address_row").hide();
    }
  })

  $("#tps").on('change', function() {
    $.ajax({
      url: base_url + 'cart/get_address',
      method: 'POST',
      dataType: "json",
      data: {
        id: $(this).val(),
      },
      success: function (data) {
        $("#tps_address").html('<span style="margin-left: 25px">'+data+'</span>');
      }
    });
  })
})