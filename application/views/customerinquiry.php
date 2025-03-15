<?php 
include "include/header.php";  
include "include/topnavbar.php"; 
?>
<div id="layoutSidenav">

	<div id="layoutSidenav_nav">
		<?php include "include/menubar.php"; ?>
	</div>
	<div id="layoutSidenav_content">
		<main>
			<div class="page-header page-header-light bg-white shadow">
				<div class="container-fluid">
					<div class="page-header-content py-3">
						<h1 class="page-header-title">
							<div class="page-header-icon"><i data-feather="shopping-cart"></i></div>
							<span>Customer Inquiry</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid mt-2 p-0 p-2">
				<div class="card">
					<div class="card-body p-0 p-2">
						<div class="row">
							<div class="col-3">
								<form method="post" autocomplete="off" id="itemAddForm">
									<div class="col-12">
										<label class="small font-weight-bold text-dark"> Date*</label>
										<input type="date" class="form-control form-control-sm"
											value="<?php echo date("Y-m-d"); ?>" name="date" id="date" required>
									</div>
									<div class="col-12">
										<label class="small font-weight-bold text-dark">Customer*</label>
										<select class="form-control form-control-sm selecter2 px-0" name="customer"
											id="customer" required>
											<option value="">Select</option>
											<?php foreach($customerlist->result() as $rowcustomerlist){ ?>
											<option value="<?php echo $rowcustomerlist->idtbl_customer ?>">
												<?php echo $rowcustomerlist->name?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-12">
										<div class="form-group mb-1">
											<label class="small font-weight-bold text-dark">Item*</label>
											<select class="form-control form-control-sm  selecter2 px-0"
												name="customeritem" id="customeritem" required>
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="col-12">
										<div class="form-row mb-1">
											<div class="col">
												<label class="small font-weight-bold text-dark">QTY:</label>
												<input type="number" step="any" name="qty"
													class="form-control form-control-sm" id="qty" required>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group mb-1">
											<label class="small font-weight-bold text-dark">Comments :</label>
											<input type="text" name="comment" class="form-control form-control-sm"
												id="comment" required>
										</div>
									</div>
									<div class="form-group mt-2">
										&nbsp; <button type="button" name="btnAddToList" id="btnAddToList"
											class="btn btn-primary btn-m "><i class="fas fa-plus"></i>&nbsp;Add</button>
										<input type="submit" class="d-none" id="hiddenAddList">
									</div>
									<div class="form-group mt-2">
										<input type="hidden" name="invoiceid" class="form-control form-control-sm"
											id="invoiceid">
										<input type="hidden" name="inquirydetailsid"
											class="form-control form-control-sm" id="inquirydetailsid" value="0">
										&nbsp; <button type="button" name="Btnupdatelist" id="Btnupdatelist"
											class="btn btn-primary btn-m " style="display:none;"><i
												class="fas fa-plus"></i>&nbsp;Update List</button>
										<input type="submit" class="d-none" id="hidebtnupdatelist">
									</div>
								</form>

							</div>
							<div class="col-9">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap"
										id="tblinquiryitems">
										<thead>
											<tr>
												<th>Item</th>
												<th class="text-left">Qty</th>
												<th class="text-left">Comments</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody id="tbljobinquarybody">
										</tbody>
									</table>
								</div>
								<br>
								<div class="row">
									<div class="col-12">
										<div class="form-group mt-2">
											<input type="hidden" name="recordOption" id="recordOption" value="1">
											<input type="hidden" name="recordID" id="recordID" value="">
											<button type="button" name="btnCreateInquiry" id="btnCreateInquiry"
												class="btn btn-primary btn-m "><i
													class="far fa-save"></i>&nbsp;Save</button>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap" id="tblinquiries">
										<thead>
											<tr>
												<th>#</th>
												<th>Date</th>
												<th>Customer</th>
												<th>Status</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</main>
		<!-- view details model -->
		<div class="modal fade" id="detailsmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header p-2">
						<h5 class="modal-title" id="detailsModalLabel">Inquiry Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12">
							<div class="scrollbar pb-3" id="style-2">
								<table class="table table-bordered table-striped table-sm nowrap">
									<thead>
										<tr>
											<th>Item name</th>
											<th>Qty</th>
											<th>Comments</th>
										</tr>
									</thead>
									<tbody id="modaldetailsbody">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "include/footerbar.php"; ?>
	</div>
</div>
<?php include "include/footerscripts.php"; ?>


<script>
	$(document).ready(function () {
		$('#customer').select2({
			width: '100%',
		});
		$('#customeritem').select2({
			width: '100%',
		});
		var addcheck = '<?php echo $addcheck; ?>';
		var editcheck = '<?php echo $editcheck; ?>';
		var statuscheck = '<?php echo $statuscheck; ?>';
		var deletecheck = '<?php echo $deletecheck; ?>';

		$('#tblinquiries').DataTable({
			"destroy": true,
			"processing": true,
			"serverSide": true,
			dom: "<'row'<'col-sm-5'B><'col-sm-2'l><'col-sm-5'f>>" + "<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-5'i><'col-sm-7'p>>",
			responsive: true,
			lengthMenu: [
				[10, 25, 50, -1],
				[10, 25, 50, 'All'],
			],
			"buttons": [{
					extend: 'csv',
					className: 'btn btn-success btn-sm',
					title: 'Customer Inquiry  Information',
					text: '<i class="fas fa-file-csv mr-2"></i> CSV',
				},
				{
					extend: 'pdf',
					className: 'btn btn-danger btn-sm',
					title: 'Customer Inquiry  Information',
					text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
				},
				{
					extend: 'print',
					title: 'Customer Inquiry  Information',
					className: 'btn btn-primary btn-sm',
					text: '<i class="fas fa-print mr-2"></i> Print',
					customize: function (win) {
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
					},
				},
			],
			ajax: {
				url: "<?php echo base_url() ?>scripts/customerinquarylist.php",
				type: "POST", // you can use GET
			},
			"order": [
				[0, "desc"]
			],
			"columns": [{
					"data": "idtbl_customerinquiry"
				},
				{
					"data": "name"
				},
				{
					"data": "date"
				},
				{
					"data": "approvestatus",
					"render": function (data, type, full) {
						if (data == 0) {
							return '<span style="color: red;">Not Approved</span>';
						} else {
							return '<span style="color: green;">Approved</span>';
						}
					}
				},
				{
					"targets": -1,
					"className": 'text-right',
					"data": null,
					"render": function (data, type, full) {
						var button = '';
						button += '<button class="btn btn-dark btn-sm btnView mr-1" id="' + full[
							'idtbl_customerinquiry'] + '"><i class="fas fa-eye"></i></button>';
						button += '<button class="btn btn-primary btn-sm btnEdit mr-1 ';
						if (editcheck != 1) {
							button += 'd-none';
						}
						button += '" id="' + full['idtbl_customerinquiry'] +
							'"><i class="fas fa-pen"></i></button>';

						if (full['approvestatus'] == 1) {
							button +=
								'<a href="<?php echo base_url() ?>Customerinquiry/Customerinquiryapprove/' +
								full['idtbl_customerinquiry'] +
								'" onclick="return deactive_confirm()" target="_self" class="btn btn-success btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-check"></i></a>';
						} else {
							button +=
								'<a href="<?php echo base_url() ?>Customerinquiry/Customerinquiryapprove/' +
								full['idtbl_customerinquiry'] +
								'" onclick="return approve_confirm()" target="_self" class="btn btn-warning btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-times"></i></a>';
						}
						if (full['status'] == 1) {
							button +=
								'<a href="<?php echo base_url() ?>Customerinquiry/Customerinquirystatus/' +
								full['idtbl_customerinquiry'] +
								'/2" onclick="return deactive_confirm()" target="_self" class="btn btn-success btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-check"></i></a>';
						} else {
							button +=
								'<a href="<?php echo base_url() ?>Customerinquiry/Customerinquirystatus/' +
								full['idtbl_customerinquiry'] +
								'/1" onclick="return active_confirm()" target="_self" class="btn btn-warning btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-times"></i></a>';
						}
						button +=
							'<a href="<?php echo base_url() ?>Customerinquiry/Customerinquirystatus/' +
							full['idtbl_customerinquiry'] +
							'/3" onclick="return delete_confirm()" target="_self" class="btn btn-danger btn-sm ';
						if (deletecheck != 1) {
							button += 'd-none';
						}
						button += '"><i class="fas fa-trash-alt"></i></a>';
						return button;
					}
				}
			],
			drawCallback: function (settings) {
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
		$('#tblinquiries').DataTable().destroy();


		$('#customer').change(function () {
			var customerID = $(this).val();

			$('#customeritem').empty();
			$('#customeritem').prepend('<option value="" selected="selected">Select job</option>');
			$('#customeritem').val(null).trigger('change');
			$.ajax({
				type: "POST",
				data: {
					recordID: customerID
				},
				url: 'Customerinquiry/Getcustomeritems',
				success: function (result) {
					var obj = JSON.parse(result);
					var html1 = '';
					html1 += '<option value="">Select</option>';
					$.each(obj, function (i, item) {
						html1 += '<option value="' + obj[i]
							.idtbl_mainitems + '">';
						html1 += obj[i].itemname;
						html1 += '</option>';
					});
					$('#customeritem').empty().append(html1);
				}
			});
		});
		$('#btnAddToList').click(function () {
			if (!$("#itemAddForm")[0].checkValidity()) {
				// If the form is invalid, submit it. The form won't actually submit;
				// this will just cause the browser to display the native HTML5 error messages.
				$("#hiddenAddList").click();
				// alert('in');
			} else {
				var customerItem = $('#customeritem').val();
				var customerItemText = $("#customeritem option:selected").text();
				var qty = $('#qty').val();
				var comment = $('#comment').val();
				var inquirydetailsid = $('#inquirydetailsid').val();
				var insertmethod = 0;

				if (inquirydetailsid != 0) {
					insertmethod = 1;
					$("#tblinquiryitems > tbody").find('td.hiddendetailid').each(function () {
						var idhidden = $(this).text().trim()
						if (idhidden == inquirydetailsid) {
							$(this).parents("tr").remove();
						}
					});
				}


				$('#tblinquiryitems > tbody:last').append('<tr><td name="job">' +
					customerItemText + '</td><td class="text-left">' + qty +
					'</td><td class="text-left" name="uom">' +
					comment + '</td><td class="">' + insertmethod +
					'</td><td class="d-none">' + customerItem +
					'</td><td class="d-none">' + inquirydetailsid +
					'</td><td><button type="button" class=" btn btn-danger btn-sm float-right deleteBtn"><i class="fas fa-trash-alt"></i></button></td> </tr>'
				);
				$('#inquirydetailsid').val(0);
				$('#customeritem').val('').trigger('change');
				$('#customer').next('.select2-container').first().addClass('disabled-pointer-events');
				$("#customer").prop("readonly", false);
				resetfeild();
			}
		});

		$('#btnCreateInquiry').click(function () {
			var tbody = $('#tblinquiryitems tbody');
			if (tbody.children().length > 0) {
				var jsonObj = []
				$("#tblinquiryitems tbody tr").each(function () {
					item = {}
					$(this).find('td').each(function (col_idx) {
						item["col_" + (col_idx + 1)] = $(this).text();
					});
					jsonObj.push(item);
				});
			}

			var date = $('#date').val();
			var customer = $('#customer').val();
			var recordOption = $('#recordOption').val();
			var recordID = $('#recordID').val();

			$.ajax({
				type: "POST",
				data: {
					tableData: jsonObj,
					date: date,
					customer: customer,
					recordOption: recordOption,
					recordID: recordID
				},
				url: '<?php echo base_url() ?>Customerinquiry/Customerinquiryinsertupdate',
				success: function (result) {
					// alert(result)
					var objfirst = JSON.parse(result);
					if (objfirst.status == 1) {
						setTimeout(function () {
							location.reload();
						}, 1000);
					}
					action(objfirst.action)
				}
			});
		});

		$('#tblinquiryitems').on('click', '.deleteBtn', function () {
			console.log("Delete button clicked"); // Debugging log

			var r = confirm("Are you sure, You want to remove this Job ? ");
			if (r == true) {
				$(this).closest('tr').remove();
			}
		});


		//data edit function
		$('#tblinquiries').on('click', '.btnEdit', function () {
			var r = confirm("Are you sure, You want to Edit this ? ");
			if (r == true) {
				var id = $(this).attr('id');
				$.ajax({
					type: "POST",
					data: {
						recordID: id
					},
					url: '<?php echo base_url() ?>Customerinquiry/Customerinquiryedit',
					success: function (result) { //alert(result);
						var obj = JSON.parse(result);
						$('#customer').val(obj.customer).trigger('change');
						$('#recordID').val(obj.id);
						$('#date').val(obj.date);
						$('#recordOption').val('2');
						$('#btnCreateInquiry').html('<i class="far fa-save"></i>&nbsp;Update');
						$("#customer").prop("readonly", true);

					}
				});
				$.ajax({
					type: "POST",
					data: {
						recordID: id
					},
					url: '<?php echo base_url() ?>Customerinquiry/Customerinquiryjobedit',
					success: function (result) { //alert(result);
						$('#tbljobinquarybody').html(result);
					}
				});
			}
		});


		$(document).on('click', '.btnView', function () {
			var id = $(this).attr('id');
			$.ajax({
				type: "POST",
				data: {
					recordID: id
				},
				url: '<?php echo base_url() ?>Customerinquiry/Customerinquiryviewjoblist',
				success: function (result) { //alert(result);
					$('#modaldetailsbody').html(result);
					$('#detailsmodal').modal('show');

				}
			});

		});

		// edit JOB list table
		$(document).on('click', '.btnEditlist', function () {
			var r = confirm("Are you sure, You want to Edit this ? ");
			if (r == true) {
				var id = $(this).attr('id');

				$.ajax({
					type: "POST",
					data: {
						recordID: id
					},
					url: '<?php echo base_url() ?>Customerinquiry/Customerinquiryjoblistedit',
					success: function (result) { //alert(result);
						var obj = JSON.parse(result);
						$('#inquirydetailsid').val(obj.id);
						$('#customeritem').val(obj.itemId).trigger('change');;
						$('#qty').val(obj.qty);
						$('#comment').val(obj.comments);
						$('#invoiceid').val(obj.idtbl_customerinquiry);
					}
				});

			}
		});

		// $(document).on("click", "#Btnupdatelist", function () {
		// 	if (!$("#itemAddForm")[0].checkValidity()) {
		// 		// If the form is invalid, submit it. The form won't actually submit;
		// 		// this will just cause the browser to display the native HTML5 error messages.
		// 		$("#hidebtnupdatelist").click();
		// 		// alert('in');
		// 	} else {
		// 		var jobID = $('#customeritem').val();
		// 		var job = $("#customeritem option:selected").text();
		// 		var qty = $('#qty').val();
		// 		var uom = $('#uom').val();
		// 		var uomID = $('#uom_id').val();
		// 		var unitprice = $('#unitprice').val();
		// 		var comment = $('#comment').val();
		// 		var invoiceid = $('#invoiceid').val();
		// 		var invoicedetailid = $('#inquirydetailsid').val();
		// 		var insertmethod = "Updated";

		// 		$('#tblinquiryitems> tbody:last').append('<tr><td class="text-center">' + job +
		// 			'</td><td class="text-center">' + qty +
		// 			'</td><td class="text-center" name="uom">' +
		// 			uom + '</td><td class="text-center">' +
		// 			unitprice + '</td><td class="text-center">' + comment +
		// 			'</td><td name="jobid" class="d-none">' + jobID +
		// 			'</td><td name="uomid" class="d-none">' + uomID +
		// 			'</td><td class="text-center d-none">' + insertmethod +
		// 			'</td><td class=" d-none">' + invoiceid + '</td><td class=" d-none">' +
		// 			invoicedetailid +
		// 			'</td><td><button type="button" class="btn btn-danger btn-sm float-right deleteBtn"><i class="fas fa-trash-alt"></i></button></td></tr>'
		// 		);

		// 		$('#Btnupdatelist').hide();
		// 		$('#btnAddToList').show();
		// 		resetfeild();
		// 	}
		// });


	});





	function productDelete(ctl) {
		$(ctl).parents("tr").remove();
	}

	function deactive_confirm() {
		return confirm("Are you sure you want to deactive this?");
	}

	function active_confirm() {
		return confirm("Are you sure you want to active this?");
	}

	function approve_confirm() {
		return confirm("Are you sure you want to approve this inquiry?");
	}

	function delete_confirm() {
		return confirm("Are you sure you want to remove this?");
	}

	function resetfeild() {
		$('#customeritem').val('');
		$('#qty').val('');
		$('#comment').val('');
	}

	function action(data) { //alert(data);
		var obj = JSON.parse(data);
		$.notify({
			// options
			icon: obj.icon,
			title: obj.title,
			message: obj.message,
			url: obj.url,
			target: obj.target
		}, {
			// settings
			element: 'body',
			position: null,
			type: obj.type,
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "center"
			},
			offset: 100,
			spacing: 10,
			z_index: 1031,
			delay: 5000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			onShow: null,
			onShown: null,
			onClose: null,
			onClosed: null,
			icon_type: 'class',
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title">{1}</span> ' +
				'<span data-notify="message">{2}</span>' +
				'<div class="progress" data-notify="progressbar">' +
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				'</div>' +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
				'</div>'

		});
	}
</script>
<?php include "include/footer.php"; ?>