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
						<h1 class="page-header-title font-weight-light">
							<div class="page-header-icon"><i class="fas fa-truck"></i></div>
							<span>Customer Purchase Order</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid mt-2 p-0 p-2">
				<div class="card">
					<div class="card-body p-0 p-2">
						<div class="row">
							<div class="col-12 text-right">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
									data-target="#staticBackdrop"><i class="fas fa-plus mr-2"></i>Create Porder</button>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap" id="dataTable">
										<thead>
											<tr>
												<th>#</th>
												<th>Po date</th>
												<th>Total</th>
												<th>Status</th>
												<th>Remark</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php include "include/footerbar.php"; ?>
	</div>
</div>
<!-- Modal Create-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Create Purchase Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-4">
						<form id="createporderform" autocomplete="off">
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Order Date*</label>
									<input type="date" class="form-control form-control-sm" placeholder=""
										name="orderdate" id="orderdate" value="<?php echo date('Y-m-d') ?>" required>
								</div>

							</div>
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Material*</label>
									<select class="form-control form-control-sm" name="material" id="material" required>
										<option value="">Select</option>
										<?php foreach($materiallist->result() as $rowmaterial){ ?>
										<option value="<?php echo $rowmaterial->idtbl_row_material ?>">
											<?php echo $rowmaterial->material_name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Qty*</label>
									<input type="text" class="form-control form-control-sm" placeholder="" name="qty"
										id="qty" required>
								</div>
								<div class="col">
									<label class="small font-weight-bold text-dark">Unit Price*</label>
									<input type="text" class="form-control form-control-sm" placeholder=""
										name="unitprice" id="unitprice" required readonly> 
								</div>
							</div>
							<div class="form-group mt-3 text-right">
								<button type="button" id="formsubmit" class="btn btn-primary btn-sm px-4"><i
										class="fas fa-plus"></i>&nbsp;Add to
									list</button>
								<input name="submitBtn" type="submit" value="Save" id="submitBtn" class="d-none">
							</div>
						</form>
					</div>
					<div class="col-8">
						<table class="table table-striped table-bordered table-sm small" id="tblporderdetails">
							<thead>
								<tr>
									<th>Material</th>
									<th>Unit price</th>
									<th>Qty</th>
									<th>Total</th>
									<th class="d-none">PoductId</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
						<div class="row">
							<div class="col text-right">
								<h1 class="font-weight-600" id="divtotal">Rs. 0.00</h1>
							</div>
							<input type="hidden" id="hidetotalorder" value="0">
						</div>
						<hr>
						<div class="form-group">
							<label class="small font-weight-bold text-dark">Remark</label>
							<textarea name="remark" id="remark" class="form-control form-control-sm"></textarea>
						</div>
						<div class="form-group mt-2">
							<button type="button" id="btncreateporder"
								class="btn btn-outline-primary btn-sm fa-pull-right"><i
									class="fas fa-save"></i>&nbsp;Create
								Job</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="jobviewmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Porder Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <h4 class="text-right">UN/POD-0000<label id="procode"></label></h4> -->
				<div id="viewhtml"></div>
			</div>
		</div>
	</div>
</div>
<?php include "include/footerscripts.php"; ?>
<script>
	$(document).ready(function () {
		var addcheck = '<?php echo $addcheck; ?>';
		var editcheck = '<?php echo $editcheck; ?>';
		var statuscheck = '<?php echo $statuscheck; ?>';
		var deletecheck = '<?php echo $deletecheck; ?>';

		$('#dataTable').DataTable({
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
					title: 'Purchase Order Information',
					text: '<i class="fas fa-file-csv mr-2"></i> CSV',
				},
				{
					extend: 'pdf',
					className: 'btn btn-danger btn-sm',
					title: 'Purchase Order Information',
					text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
				},
				{
					extend: 'print',
					title: 'Purchase Order Information',
					className: 'btn btn-primary btn-sm',
					text: '<i class="fas fa-print mr-2"></i> Print',
					customize: function (win) {
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
					},
				},
				// 'copy', 'csv', 'excel', 'pdf', 'print'
			],
			ajax: {
				url: "<?php echo base_url() ?>scripts/porderlist.php",
				type: "POST", // you can use GET
				// data: function(d) {}
			},
			"order": [
				[0, "desc"]
			],
			"columns": [{
					"data": "idtbl_porder"
				},
				{
					"render": function (data, type, full) {
						var dateStr = full['podate'];
						var date = new Date(dateStr);

						var options = {
							year: 'numeric',
							month: 'short',
							day: 'numeric'
						};
						return date.toLocaleDateString('en-US', options);
					}
				},
				{
					"className": 'text-right',
					"render": function (data, type, full) {
						return parseFloat(full['total']).toFixed(2);
					}
				},
				{
					"targets": -1,
					"className": '',
					"data": null,
					"render": function (data, type, full) {
						if (full['confirmedstatus'] == 0) {
							return '<i class="fas fa-times text-warning mr-2"></i>Not Confirmed';
						}else{
							return '<i class="fas fa-times text-success mr-2"></i>Confirmed';
						}
					}
				},
				{
					"data": "remarks"
				},
				{
					"targets": -1,
					"className": 'text-right',
					"data": null,
					"render": function (data, type, full) {
						var button = '';
						button += '<button class="btn btn-dark btn-sm btnview mr-1" id="' + full[
							'idtbl_porder'] + '"><i class="fas fa-eye"></i></button>';
						if (full['confirmedstatus'] == 1) {
							button += '<button class="btn btn-success btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-check"></i></button>';
						} else {
							button +=
								'<a href="<?php echo base_url() ?>Purchaseorder/ConfirmPorder/' +
								full['idtbl_porder'] +
								'/1" onclick="return active_confirm()" target="_self" class="btn btn-danger btn-sm mr-1 ';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-times"></i></a>';
						}

						return button;
					}
				}
			],
			drawCallback: function (settings) {
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
		$('#dataTable tbody').on('click', '.btnview', function () {
			var id = $(this).attr('id');
			$('#procode').html(id);
			$.ajax({
				type: "POST",
				data: {
					recordID: id
				},
				url: '<?php echo base_url() ?>Purchaseorder/PorderdetailsView',
				success: function (result) { //alert(result);

					$('#jobviewmodal').modal('show');
					$('#viewhtml').html(result);
				}
			});
		});

	});

	$('#material').change(function () {
		let materialId = $(this).val()

		$.ajax({
			type: "POST",
			data: {
				recordID: materialId
			},
			url: 'Purchaseorder/GetUnitpriceAccoMaterial',
			success: function (result) {
				var obj = JSON.parse(result);
				$('#unitprice').val(obj[0].unitprice);
			}
		});
	});
	$("#formsubmit").click(function () {
		if (!$("#createporderform")[0].checkValidity()) {
			// If the form is invalid, submit it. The form won't actually submit;
			// this will just cause the browser to display the native HTML5 error messages.
			$("#submitBtn").click();
		} else {
			var materialtext = $("#material option:selected").text();
			var materialid = $('#material').val();
			var unitprice = parseFloat($('#unitprice').val());
			var qty = $('#qty').val();

			var newtotal = parseFloat(unitprice * qty);

			var total = parseFloat(newtotal);
			var showtotal = addCommas(parseFloat(total).toFixed(2));

			$('#tblporderdetails > tbody:last').append('<tr class="pointer"><td>' + materialtext +
				'</td><td class="text-right">' + unitprice +
				'</td><td class="text-right">' + qty + '</td><td class="text-right">' + showtotal +
				'</td><td class="d-none">' + materialid +
				'</td><td class="total d-none">' + total + '</td></tr>');

			var sum = 0;
			$(".total").each(function () {
				sum += parseFloat($(this).text());
			});

			var showsum = addCommas(parseFloat(sum).toFixed(2));

			$('#divtotal').html('Rs. ' + showsum);
			$('#hidetotalorder').val(sum);

			$('#material').val('');
			$('#unitprice').val('');
			$('#qty').val('');

			$('#material').focus();
		}
	});
	$('#tblporderdetails').on('click', 'tr', function () {
		var r = confirm("Are you sure, You want to remove this product ? ");
		if (r == true) {

			$(this).closest('tr').remove();

			var sum = 0;
			$(".total").each(function () {
				sum += parseFloat($(this).text());
			});

			var showsum = addCommas(parseFloat(sum).toFixed(2));

			$('#divtotal').html('Rs. ' + showsum);
			$('#hidetotalorder').val(sum);
			$('#maintype').focus();
		}
	});
	$('#btncreateporder').click(function () { //alert('IN');
		$('#btncreateporder').prop('disabled', true).html(
			'<i class="fas fa-circle-notch fa-spin mr-2"></i> Create Order')
		var tbody = $("#tblporderdetails tbody");

		if (tbody.children().length > 0) {
			jsonObj = [];
			$("#tblporderdetails tbody tr").each(function () {
				item = {}
				$(this).find('td').each(function (col_idx) {
					item["col_" + (col_idx + 1)] = $(this).text();
				});
				jsonObj.push(item);
			});
			// console.log(jsonObj);

			var orderdate = $('#orderdate').val();
			var remark = $('#remark').val();
			var hidetotalorder = $('#hidetotalorder').val();
		
			$.ajax({
				type: "POST",
				data: {
					tableData: jsonObj,
					orderdate: orderdate,
					remark: remark,
					total: hidetotalorder
				},
				url: 'Purchaseorder/Porderinsert',
				success: function (result) { //alert(result);
					console.log(result);
					var obj = JSON.parse(result);
					if (obj.status == 1) {
						setTimeout(window.location.reload(), 3000);
					}
					action(obj.action);
				}
			});
		}

	});

	function deactive_confirm() {
		return confirm("Are you sure you want to deactive this?");
	}

	function active_confirm() {
		return confirm("Are you sure you want to confirm this purchase order?");
	}

	function delete_confirm() {
		return confirm("Are you sure you want to remove this?");
	}

	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
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
