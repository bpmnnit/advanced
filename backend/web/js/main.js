function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

function getmaxsig(url_action) {
	var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: url_action,
        data: "sig_id=" + sig_id,
        success: function(text) {
        	//alert(text);
        	var d = new Date(text);
        	d.setDate(d.getDate() + 1);
        	document.getElementById('dpr_date').value = formatDate(d);
        }
    });
}

function setCoverageOnInput(cf, acc, rej, skip, rep, rec) {
  var coverageShots = (parseInt(acc) + parseInt(skip) + parseInt(rej) - parseInt(rep) - parseInt(rec));
  var coverage = coverageShots * parseFloat(cf);
  var coverageFixed = parseFloat(coverage.toFixed(4)); // Round off to 4 decimal digits, returns string representation, so needed to be converted to float.
  $("#cov_shots").val(coverageShots);
  $("#coverage").val(coverageFixed);
}

$("#acc").bind('keyup', function(evt) {
  var acc = $("#acc").val();
  var rej = $("#rej").val();
  var skip = $("#skip").val();
  var rep = $("#rep").val();
  var rec = $("#rec").val();

  if(acc === '') { acc = 0; }
  if(rej === '') { rej = 0; }
  if(skip === '') { skip = 0; }
  if(rep === '') { rep = 0; }
  if(rec === '') { rec = 0; }

  var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: '/advanced/backend/web/index.php?r=dpr-onland/sigcf',
        data: "sig_id=" + sig_id,
        success: function(cf) {
        	setCoverageOnInput(cf, acc, rej, skip, rep, rec);
        }
    });
});

$("#rej").bind('keyup', function(evt) {
  var acc = $("#acc").val();
  var rej = $("#rej").val();
  var skip = $("#skip").val();
  var rep = $("#rep").val();
  var rec = $("#rec").val();


  if(acc === '') { acc = 0; }
  if(rej === '') { rej = 0; }
  if(skip === '') { skip = 0; }
  if(rep === '') { rep = 0; }
  if(rec === '') { rec = 0; }

  var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: '/advanced/backend/web/index.php?r=dpr-onland/sigcf',
        data: "sig_id=" + sig_id,
        success: function(cf) {
        	setCoverageOnInput(cf, acc, rej, skip, rep, rec);
        }
    });
});

$("#skip").bind('keyup', function(evt) {
  var acc = $("#acc").val();
  var rej = $("#rej").val();
  var skip = $("#skip").val();
  var rep = $("#rep").val();
  var rec = $("#rec").val();

  if(acc === '') { acc = 0; }
  if(rej === '') { rej = 0; }
  if(skip === '') { skip = 0; }
  if(rep === '') { rep = 0; }
  if(rec === '') { rec = 0; }

  var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: '/advanced/backend/web/index.php?r=dpr-onland/sigcf',
        data: "sig_id=" + sig_id,
        success: function(cf) {
        	setCoverageOnInput(cf, acc, rej, skip, rep, rec);
        }
    });
});

$("#rep").bind('keyup', function(evt) {
  var acc = $("#acc").val();
  var rej = $("#rej").val();
  var skip = $("#skip").val();
  var rep = $("#rep").val();
  var rec = $("#rec").val();

  if(acc === '') { acc = 0; }
  if(rej === '') { rej = 0; }
  if(skip === '') { skip = 0; }
  if(rep === '') { rep = 0; }
  if(rec === '') { rec = 0; }

  var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: '/advanced/backend/web/index.php?r=dpr-onland/sigcf',
        data: "sig_id=" + sig_id,
        success: function(cf) {
        	setCoverageOnInput(cf, acc, rej, skip, rep, rec);
        }
    });
});

$("#rec").bind('keyup', function(evt) {
  var acc = $("#acc").val();
  var rej = $("#rej").val();
  var skip = $("#skip").val();
  var rep = $("#rep").val();
  var rec = $("#rec").val();

  if(acc === '') { acc = 0; }
  if(rej === '') { rej = 0; }
  if(skip === '') { skip = 0; }
  if(rep === '') { rep = 0; }
  if(rec === '') { rec = 0; }

  var sig_id = document.getElementById("sig-id").value;
	$.ajax({
        type: "POST",
        url: '/advanced/backend/web/index.php?r=dpr-onland/sigcf',
        data: "sig_id=" + sig_id,
        success: function(cf) {
        	setCoverageOnInput(cf, acc, rej, skip, rep, rec);
        }
    });
});
