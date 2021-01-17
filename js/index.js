empData();
function empData() {
	$.ajax({
		url:"backend.php",
		type:'GET',
		data: {
			employe_dataaa :'employe_data',
			
		},
		success:function(record, status){
            var recordParsed = JSON.parse(record);
            var data = recordParsed.ResponseData;
            if (recordParsed.ResponseData !=='NULL') {
                
                var employe_data = '';
                $.each(data,function (key,value) {
                    employe_data +='<tr>';
                    employe_data +='<td>'+value.participation_id+'</td>';
                    employe_data +='<td>'+value.employee_name+'</td>';
                    employe_data +='<td>'+value.employee_mail+'</td>';
                    employe_data +='<td>'+value.event_id+'</td>';
                    employe_data +='<td>'+value.event_name+'</td>';
                    employe_data +='<td>'+value.participation_fee+'</td>';
                    employe_data +='<td>'+value.event_date+'</td>';
                    employe_data +='</tr>';
                });
                $("#tdata").html(employe_data);
                employee_total = '';
                employee_total +='<tr>';
                employee_total +='<td><b>Total</b></td>';
                employee_total +='<td></td>';
                employee_total +='<td></td>';
                employee_total +='<td></td>';
                employee_total +='<td></td>';
                employee_total +='<td>'+recordParsed.ResponseTotal+'</td>';
                employee_total +='<td></td>';
                employee_total +='</tr>';
                    $('#emp_table').append(employee_total);
            }
		},
	});
    
}

$("#SearchSubm").click(function () {
    var empName = $("#SearchName").val();
	$.ajax({
		url:"backend.php",
		type:'POST',
		data: {
			employe_search :'employe_search',
			emp_name :empName,
			
		},
		success:function(record, status){
            var recordParsed = JSON.parse(record);
            var data = recordParsed.ResponseData;
            var employe_data = '';
            $.each(data,function (key,value) {
                employe_data +='<tr>';
                employe_data +='<td>'+value.participation_id+'</td>';
                employe_data +='<td>'+value.employee_name+'</td>';
                employe_data +='<td>'+value.employee_mail+'</td>';
                employe_data +='<td>'+value.event_id+'</td>';
                employe_data +='<td>'+value.event_name+'</td>';
                employe_data +='<td>'+value.participation_fee+'</td>';
                employe_data +='<td>'+value.event_date+'</td>';
                employe_data +='</tr>';
            });
            $("#tdata").html(employe_data);
            employee_total = '';
            employee_total +='<tr>';
            employee_total +='<td><b>Total</b></td>';
            employee_total +='<td></td>';
            employee_total +='<td></td>';
            employee_total +='<td></td>';
            employee_total +='<td></td>';
            employee_total +='<td>'+recordParsed.ResponseTotal+'</td>';
            employee_total +='<td></td>';
            employee_total +='</tr>';
				$('#emp_table').append(employee_total);
		},
	});
    
    return false;
});

$("#submit").click(function (e) {
    e.preventDefault();
    var fd = new FormData();
    var files = $("#uplFile")[0].files[0];
    if (files !== undefined) {
        swal({
            title: "Are you wants to submit?",
            text: "Press Okk For Submit, Press Cancel if you wants to cancel",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willSubmit) => {
            if (willSubmit) {
                fd.append('file',files);
                fd.append('fileSubmit','fileSubmit');
                $.ajax({
                    url:'backend.php',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data=='submited'){
                            empData();
                            swal("Performance Sheet has submited", {
                                icon: "success",
                              });
                        } else {
                            swal("Not submitted into database",{
                                icon:"warning"
                            });
                          }
                    }
                })
            }
        });
    }

})