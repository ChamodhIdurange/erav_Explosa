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
							<div class="page-header-icon"><i class="fas fa-truck"></i></div>
							<span>Job Quotations</span>
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
									data-target="#staticBackdrop" <?php if ($addcheck == 0) {
										echo 'disabled';
									} ?>><i
										class="fas fa-plus mr-2"></i>Create
									Job Quotation</button>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap" id="dataTable">
										<thead>
											<tr>
												<th>Id</th>
												<th>Remarks</th>
												<th>Full Total</th>
												<th>Status</th>
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Create Good Receive Note</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<form id="jobquotationform" autocomplete="off">
							<div class="form-row mb-1">
								<div class="col-4">
									<label class="small font-weight-bold text-dark">Order Date*</label>
									<input type="date" class="form-control form-control-sm" placeholder=""
										name="orderdate" id="orderdate" value="<?php echo date('Y-m-d') ?>" required>
								</div>
								<div class="col-8">
									<label class="small font-weight-bold text-dark">Inquiry*</label>
									<select class="form-control form-control-sm selecter2 px-0" name="inquiryId"
										id="inquiryId" required>
										<option value="">Select</option>
										<?php foreach ($inquirylist->result() as $rowinquirylist) { ?>
											<option value="<?php echo $rowinquirylist->idtbl_customerinquiry ?>">
												<?php echo $rowinquirylist->name ?> - INQ
												No:<?php echo $rowinquirylist->idtbl_customerinquiry ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-row mb-1">
								<div class="col-8">
									<label class="small font-weight-bold text-dark">Main Item*</label>
									<select class="form-control form-control-sm selecter2 px-0" name="mainitem"
										id="mainitem" required>
										<option value="">Select</option>
										<?php foreach ($mainitemlist->result() as $rowitemslist) { ?>
											<option value="<?php echo $rowitemslist->idtbl_mainitems ?>">
												<?php echo $rowitemslist->itemname ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<label class="small font-weight-bold text-dark">Qty*</label>
									<input type="number" class="form-control form-control-sm" placeholder=""
										name="itemqty" id="itemqty" value="<?php echo date('Y-m-d') ?>" required>
								</div>
							</div>
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Comment*</label>
									<textarea name="comment" class="form-control form-control-sm" id="comment" cols="10"
										rows="4" required></textarea>

								</div>
							</div>
							<div class="form-group mt-2">
								<button type="button" id="btnAddToList"
									class="btn btn-outline-primary btn-sm fa-pull-right"><i
										class="fas fa-plus"></i>&nbsp;
									Add</button>
								<input type="submit" id="hiddenformsubmit" class="d-none">
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="scrollbar pb-3" id="style-3">
							<table class="table table-striped table-bordered table-sm small" id="tblnewquotation">
								<!-- Table headers remain unchanged -->
								<thead>
									<tr>
										<th>Item</th>
										<th>Quantity</th>
										<th>Comment</th>
										<th>Reel (Kg)</th>
										<th>Unit Price</th>
										<th>Total Price</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>

						<div class="row">
							<div class="col text-right">
								<h4 class="font-weight-600" id="divtotal">Rs. 0.00</h4>
							</div>
							<input type="hidden" id="hidetotalorder" value="0">
						</div>
						<hr>
						<div class="form-group">
							<label class="small font-weight-bold text-dark">Remark</label>
							<textarea name="remarks" id="remarks" class="form-control form-control-sm"></textarea>
						</div>
						<div class="form-group mt-2">
							<button type="button" id="btnccreatequotation"
								class="btn btn-outline-primary btn-sm fa-pull-right"><i class="fas fa-save"></i>&nbsp;
								Create Job Quotation</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  View model -->
<div class="modal fade" id="modalquotationdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">View Job Quotation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<hr>
				<div class="col-12">
					<div class="scrollbar pb-3" id="style-2">
						<table class="table table-bordered table-striped table-sm nowrap" id="tblquotationdetails">
							<thead>
								<tr>
									<th>Item</th>
									<th>Quantity</th>
									<th>Comment</th>
									<th>Reel amount</th>
									<th>Unit Price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="tbljobinquarybodyview">
							</tbody>
						</table>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>

<!--  additional cost add Modal -->
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Add Additional Cost</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<!-- Form Section -->
					<div class="col-md-6">
						<form id="additionalCostForm">
							<div class="row mb-3">
								<div class="col-md-12">
									<label class="small font-weight-bold text-dark">Select Quotation Item*</label>
									<select class="form-control form-control-sm" id="quotationItemSelect" required>
										<option value="">Select Item</option>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="small font-weight-bold text-dark">Additional Price*</label>
									<input type="number" class="form-control form-control-sm" id="additionalPrice"
										placeholder="Enter additional price" step="0.01" min="0" required>
								</div>
								<div class="col-md-6">
									<label class="small font-weight-bold text-dark">Select Cost Type*</label>
									<select class="form-control form-control-sm" id="costTypeSelect" required>
										<option value="">Select Cost Type</option>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12">
									<label class="small font-weight-bold text-dark">Remarks</label>
									<textarea class="form-control form-control-sm" id="costremarks" rows="2"
										placeholder="Enter remarks"></textarea>
								</div>
							</div>
							<button type="button" class="btn btn-primary btn-sm float-right"
								id="addTempData">Add</button>
						</form>
					</div>

					<div class="col-md-6">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-sm" id="tblAdditionalCosts">
								<thead>
									<tr>
										<th>#</th>
										<th>Quotation Item</th>
										<th>Price</th>
										<th>Cost Type</th>
										<th>Remarks</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<button type="button" id="saveData" class="btn btn-primary btn-sm float-right">Save</button>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Added Additional Price View -->
<div class="modal fade" id="modaladdionalcost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">View Additional Cost</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<hr>
				<div class="col-12">
					<div class="scrollbar pb-3" id="style-2">
						<table class="table table-bordered table-striped table-sm nowrap" id="tblquotationdetails">
							<thead>
								<tr>
									<th>#</th>
									<th>Quotation Item</th>
									<th>Price</th>
									<th>Cost Type</th>
									<th>Remarks</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tbladdionalcost">

							</tbody>
						</table>
						<div class="total-price mb-3">
							<strong>Total Price: </strong><span id="totalPrice">0</span>
						</div>

						<!-- Update Form -->
						<div id="updateFormContainer" style="display: none;">
							<form id="updateadditionalCostForm">
								<div class="row mb-3">
									<div class="col-md-12">
										<label class="small font-weight-bold text-dark">Select Quotation Item*</label>
										<select class="form-control form-control-sm" id="updatequotationItemSelect"
											required>
											<option value="">Select Item</option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<label class="small font-weight-bold text-dark">Additional Price*</label>
										<input type="number" class="form-control form-control-sm"
											id="updateadditionalPrice" step="0.01" min="0" required>
									</div>
									<div class="col-md-6">
										<label class="small font-weight-bold text-dark">Select Cost Type*</label>
										<select class="form-control form-control-sm" id="updatecostTypeSelect" required>
											<option value="">Select Cost Type</option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<label class="small font-weight-bold text-dark">Remarks</label>
										<textarea class="form-control form-control-sm" id="updatecostremarks"
											rows="2"></textarea>
									</div>
								</div>
								<button type="button" class="btn btn-primary btn-sm float-right"
									id="saveUpdatedData">Save</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include "include/footerscripts.php"; ?>


<script>
	var jobQuotationId;
	$(document).ready(function () {
		var addcheck = '<?php echo $addcheck; ?>';
		var editcheck = '<?php echo $editcheck; ?>';
		var statuscheck = '<?php echo $statuscheck; ?>';
		var deletecheck = '<?php echo $deletecheck; ?>';

		$('#printgrn').click(function () {
			printJS({
				printable: 'GRNView',
				type: 'html',
				css: 'assets/css/styles.css'
			});
		});

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
				title: 'Customer  Information',
				text: '<i class="fas fa-file-csv mr-2"></i> CSV',
			},
			{
				extend: 'pdf',
				className: 'btn btn-danger btn-sm',
				title: 'Customer  Information',
				text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
			},
			{
				extend: 'print',
				title: 'Customer  Information',
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
				url: "<?php echo base_url() ?>scripts/jobquotationlist.php",
				type: "POST", // you can use GET
			},
			"order": [
				[0, "desc"]
			],
			"columns": [{
				"data": "idtbl_job_quotation"
			},
			{
				"data": "remarks"
			},

			{
				"targets": -1,
				"className": 'text-right',
				"data": null,
				"render": function (data, type, full) {
					return addCommas(parseFloat(full['quotation_total']).toFixed(2));
				}
			},
			{
				"data": "accepted_status",
				"className": 'text-right',
				"render": function (data, type, full) {
					if (data == 0) {
						return '<span class="text-danger">Not Accepted</span>';
					} else {
						return '<span class="text-success">Accepted</span>';
					}
				}
			},
			{
				"targets": -1,
				"className": 'text-right',
				"data": null,
				"render": function (data, type, full) {
					var button = '';
					button += '<button class="btn btn-dark btn-sm btnview mr-1" id="' + full[
						'idtbl_job_quotation'] + '"><i class="fas fa-eye"></i></button>';

					if (full['accepted_status'] == 0) {
						button +=
							'<a href="<?php echo base_url() ?>Jobquotation/Deleteandacceptquotation/' +
							full['idtbl_job_quotation'] +
							'/1" onclick="return accept_confirm()" target="_self" class="btn btn-warning btn-sm mr-1 ';
						if (statuscheck != 1) {
							button += 'd-none';
						}
						button += '"><i class="fas fa-times"></i></a>';

					} else {
						button += '<button target="_self" class="btn btn-success btn-sm mr-1 ';
						if (statuscheck != 1) {
							button += 'd-none';
						}
						button += '"><i class="fas fa-check"></i></button>';

					}
					if (full['accepted_status'] == 0) {
						button +=
							'<a href="<?php echo base_url() ?>Jobquotation/Deleteandacceptquotation/' +
							full['idtbl_job_quotation'] +
							'/2" onclick="return delete_confirm()" target="_self" class="btn btn-danger btn-sm ';
						if (deletecheck != 1) {
							button += 'd-none';
						}
						button += '"><i class="fas fa-trash-alt"></i></a>';
					}

					button += '<button class="btn btn-info btn-sm add_additional_cost mr-1" data-id="' + full['idtbl_job_quotation'] +
						'" data-toggle="modal" data-target="#modal_details"><i class="fas fa-plus"></i></button>';
					button += '<button class="btn btn-info btnviewaddionalcost btn-sm  mr-1" data-id="' + full['idtbl_job_quotation'] +
						'" data-toggle="modal" data-target="#modaladdionalcost"><i class="fas fa-arrow-right"></i></button>';




					return button;

				}
			}
			],
			drawCallback: function (settings) {
				$('[data-toggle="tooltip"]').tooltip();
			},


		});


		$('#inquiryId').change(function () {
			var inquiryId = $(this).val();
			$.ajax({
				type: "POST",
				data: {
					recordID: inquiryId
				},
				url: '<?php echo base_url() ?>Jobquotation/Getdetailsfrominquiry',
				success: function (result) { //alert(result);
					var obj = JSON.parse(result);
					$.each(obj, function (i, item) {
						formatUnitPrice = addCommas(parseFloat(obj[i].unitPrice)
							.toFixed(2));
						formattotalPrice = addCommas(parseFloat(obj[i].totalPrice)
							.toFixed(2));
						$('#tblnewquotation> tbody:last').append(
							'<tr><td class="text-left">' + obj[i].itemname +
							'</td><td class="text-left">' + obj[i].qty +
							'</td><td class="text-left">' + obj[i].comments +
							'</td><td class="text-right">' + obj[i].requiredAmount
								.toFixed(2) +
							'</td><td class="text-right">' + formatUnitPrice +
							'</td><td class="text-right">' + formattotalPrice +
							'</td><td class="d-none">' + obj[i].unitPrice +
							'</td><td class="d-none quotationTot">' + obj[i]
								.totalPrice +
							'</td><td class="d-none">' + obj[i]
								.tbl_mainitems_idtbl_mainitems +
							'</td><td class="d-none">' + obj[i]
								.materialId +
							'</td></tr>'
						);
					});
					calculateQuotationTot();


				}
			});
		});

		$('#btnAddToList').click(function () {
			if (!$("#jobquotationform")[0].checkValidity()) {
				$("#hiddenformsubmit").click();
			} else {
				var mainitem = $('#mainitem').val();
				var mainitemText = $("#mainitem option:selected").text();
				var itemqty = $('#itemqty').val();
				var comment = $('#comment').val();
				var isArray = false;

				$.ajax({
					type: "POST",
					data: {
						mainItemId: mainitem,
						qty: itemqty
					},
					url: `<?php echo base_url() ?>Jobquotation/CalculateTotalAmountPublic`,
					success: function (result) {
						var obj = JSON.parse(result);
						var formatUnitPrice = addCommas(parseFloat(obj[0].unitPrice).toFixed(
							2));
						var formattotalPrice = addCommas(parseFloat(obj[0].totalPrice).toFixed(
							2));

						$('#tblnewquotation > tbody:last').append(
							'<tr class="pointer"><td class="text-left">' +
							mainitemText +
							'</td><td class="text-left">' + itemqty +
							'</td><td class="text-left">' + comment +
							'</td><td class="text-right">' + obj[0].requiredAmount.toFixed(
								2) +
							'</td><td class="text-right">' + formatUnitPrice +
							'</td><td class="text-right">' + formattotalPrice +
							'</td><td class="d-none">' + obj[0].unitPrice +
							'</td><td class="d-none quotationTot">' + obj[0].totalPrice +
							'</td><td class="d-none">' + mainitem +
							'</td><td class="d-none">' + obj[0].materialId +
							'</td></tr>');

						$('#mainitem').val('').trigger('change');
						$('#itemqty').val(0);
						calculateQuotationTot();
					}
				});
			}
		})
		$('#dataTable tbody').on('click', '.btnview', function () {
			var recordId = $(this).attr('id');

			$.ajax({
				type: "POST",
				data: {
					recordId: recordId
				},
				url: `<?php echo base_url() ?>Jobquotation/Getquotationdetails`,
				success: function (result) { // alert(result)
					var obj = JSON.parse(result);

					$('#tblquotationdetails tbody').empty();

					var formattedReelAmount = 0;
					var formattedUnitPrice = 0;
					var formattedTotalPrice = 0;

					$.each(obj, function (i, item) {
						formattedReelAmount = addCommas(parseFloat(obj[i]
							.required_reel_amount)
							.toFixed(2));
						formattedUnitPrice = addCommas(parseFloat(obj[i]
							.calculated_unitprice)
							.toFixed(2));
						formattedTotalPrice = addCommas(parseFloat(obj[i].total_price)
							.toFixed(2));


						$('#tblquotationdetails > tbody:last').append(
							'<tr class="pointer"><td>' +
							obj[i].itemname +
							'</td><td class="">' +
							obj[i].qty +
							'</td><td>' +
							obj[i].comment +
							'</td><td class="text-right">' +
							formattedReelAmount +
							'</td><td class="text-right">' +
							formattedUnitPrice +
							'</td><td class="text-right">' +
							formattedTotalPrice +
							'</td></tr>');
					});
					$('#modalquotationdetails').modal('show');
				}
			});
		})

		$('#btnccreatequotation').click(function () {
			var orderDate = $('#orderdate').val();
			var remarks = $('#remarks').val();

			if (orderdate != null) {
				var tbody = $("#tblnewquotation tbody");

				if (tbody.children().length > 0) {
					jsonObj = [];
					$("#tblnewquotation tbody tr").each(function () {
						item = {}
						$(this).find('td').each(function (col_idx) {
							item["col_" + (col_idx + 1)] = $(this).text();
						});

						jsonObj.push(item);
					});

					$.ajax({
						type: "POST",
						data: {
							tableData: jsonObj,
							orderDate: orderDate,
							remarks: remarks
						},
						url: '<?php echo base_url() ?>Jobquotation/Jobquotationinsert',
						success: function (result) {
							//alert(result);
							$('#staticBackdrop').modal('hide');
							var objfirst = JSON.parse(result);
							if (objfirst.status == 1) {
								setTimeout(function () {
									window.location.reload();
								}, 2000);
							}
							action(objfirst.action)
						}
					});
				}
			}
		})

	});






	//function for add to additional cost 

	$(document).ready(function () {
		let additionalCosts = []; // Temporary storage
		$.ajax({
			url: '<?= base_url("AdditionalCost/fetch_cost_types") ?>',
			type: 'GET',
			success: function (response) {
				let data = JSON.parse(response);
				data.forEach(item => {
					$("#costTypeSelect").append(`<option value="${item.idtbl_additional_cost}">${item.costtype}</option>`);
				});
			},
			error: function () {
				alert("Failed to load cost types.");
			}
		});

		// Add Data Temporarily
		$('#addTempData').click(function () {
			let quotationItem = $('#quotationItemSelect').val();
			let additionalPrice = $('#additionalPrice').val();
			let costType = $('#costTypeSelect').val();
			let costTypeText = $('#costTypeSelect option:selected').text();
			let remarks = $('#costremarks').val();

			if (!quotationItem || !additionalPrice || !costType) {
				alert("Please fill in all required fields.");
				return;
			}
			let quotationItemText = $('#quotationItemSelect option:selected').text();

			let newEntry = {
				quotationItem: quotationItemText,
				additionalPrice: additionalPrice,
				costType: costTypeText,
				remarks: remarks
			};
			console.log("add dd" + newEntry);
			additionalCosts.push(newEntry);
			updateTable();
		});

		// Function to Update Table
		function updateTable() {
			let tbody = $('#tblAdditionalCosts tbody');
			tbody.empty();
			additionalCosts.forEach((item, index) => {
			

				tbody.append(`
				<tr>
					<td>${index + 1}</td>
					<td>${item.quotationItem}</td> <!-- Directly use the stored text -->
                <td>${item.additionalPrice}</td>
                <td>${item.costType}</td> <!-- Directly use the stored text -->
                <td>${item.remarks}</td>
					<td><button class="btn btn-danger btn-sm delete-row" data-index="${index}">Delete</button></td>
				</tr>
			`);
			});
		}



		// Delete Temporary Row
		$(document).on('click', '.delete-row', function () {
			let index = $(this).data('index');
			additionalCosts.splice(index, 1);
			updateTable();
		});

		// Save Data to Database
		$('#saveData').click(function () {
			if (additionalCosts.length === 0) {
				alert("No data to save.");
				return;
			}

			$.ajax({
				url: '<?= base_url("AdditionalCost/save_additional_costs") ?>',
				type: 'POST',
				data: {
					additionalCosts: additionalCosts,
					jobQuotationId: jobQuotationId
				},
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						alert("Data saved successfully!");
						additionalCosts = [];
						updateTable();
					} else {
						alert("Failed to save data.");
					}
				},
				error: function () {
					alert("Error saving data.");
				}
			});
		});



		// btnviewdetails

		$(document).on("click", ".add_additional_cost", function () {
			jobQuotationId = $(this).data('id'); // Get the data-id
			console.log("Selected Row ID:", jobQuotationId);

			$("#quotationItemSelect").html('<option value="">Select Item</option>');

			$.ajax({
				url: '<?php echo base_url() ?>Jobquotation/Getquotationdetails',
				type: 'POST',
				data: { recordId: jobQuotationId },
				dataType: 'json',
				success: function (response) {
					console.log("Parsed JSON Response:", response);

					if (response.length > 0) {
						response.forEach(item => {
							$("#quotationItemSelect").append(`<option value="${item.idtbl_job_quotation_details}">${item.itemname}</option>`);
						});
					} else {
						$("#quotationItemSelect").append('<option value="">No Data Found</option>');
					}
				},
				error: function (xhr, status, error) {
					console.error("AJAX Error:", xhr.responseText);
					$("#quotationItemSelect").append('<option value="">Error Fetching Data</option>');
				}
			});
		});

	});



	// view added additional cost item table
	$(document).on('click', '.btnviewaddionalcost', function () {
		jobQuotationId = $(this).data('id');


		$.ajax({
			url: '<?= base_url('AdditionalCost/fetch_additional_costs_by_quotation/') ?>' + jobQuotationId,
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				var tableBody = $('#tbladdionalcost');
				var totalPrice = 0;

				tableBody.empty();
				response.forEach(function (item, index) {
					var row = '<tr>' +
						'<td>' + (index + 1) + '</td>' +
						'<td>' + item.quotation_item + '</td>' +
						'<td>' + item.additional_price + '</td>' +
						'<td>' + item.cost_type + '</td>' +
						'<td>' + item.remarks + '</td>' +
						'<td>' +
						'<button class="btn btn-primary btn-sm updateBtn" data-id="' + item.id + '"><i class="fas fa-pen"></i></button>' + " " +
						'<button class="btn btn-danger btn-sm deleteBtn" data-id="' + item.id + '"><i class="fas fa-trash-alt"></i></button>'
						+
						'</td>' +
						'</tr>';
					tableBody.append(row);
					totalPrice += parseFloat(item.additional_price);
				});


				$('#totalPrice').text(totalPrice.toFixed(2));


				$('#modaladdionalcost').modal('show');
			}
		});
	});


	$(document).on('click', '.deleteBtn', function () {
		var id = $(this).data('id');

		if (confirm('Are you sure you want to delete this record?')) {
			$.ajax({
				url: '<?= base_url('AdditionalCost/delete_additional_cost/') ?>' + id,
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						alert('Record deleted successfully');
						$('#modaladdionalcost').modal('hide');
						location.reload();
					} else {
						alert('Error deleting record');
					}
				}
			});
		}
	});
	//update for the added additional cost items
	$(document).ready(function () {
		$(document).on('click', '.updateBtn', function () {
			var id = $(this).data('id');
			var url = '<?= site_url('AdditionalCost/get_additional_cost/') ?>' + id;

			console.log("Additional Cost ID:", id);
			console.log("Global Job Quotation ID:", jobQuotationId);

			// Step 1: Fetch quotation items based on jobQuotationId
			$.post('<?php echo base_url() ?>Jobquotation/Getquotationdetails', { recordId: jobQuotationId }, function (result) {
				console.log("Quotation Items Raw Response:", result);
				let obj = JSON.parse(result);
				console.log("Quotation Items Parsed JSON:", obj);

				$("#updatequotationItemSelect").html('<option value="">Select Item</option>');
				if (obj.length > 0) {
					obj.forEach(item => {
						$("#updatequotationItemSelect").append(
							`<option value="${item.itemname}">${item.itemname}</option>`
						);
					});
				} else {
					$("#updatequotationItemSelect").append('<option value="">No Items Found</option>');
				}

				// Step 2: Fetch cost types
				$.ajax({
					url: '<?php echo base_url(); ?>AdditionalCost/fetch_cost_types',
					type: 'GET',
					success: function (result) {
						let costTypes = JSON.parse(result);
						$("#updatecostTypeSelect").html('<option value="">Select Cost Type</option>');
						if (costTypes.length > 0) {
							costTypes.forEach(item => {
								$("#updatecostTypeSelect").append(
									`<option value="${item.costtype}">${item.costtype}</option>`
								);
							});
						}

						// Step 3: Fetch and populate additional cost data
						$.ajax({
							url: url,
							type: 'GET',
							dataType: 'json',
							success: function (response) {
								if (response && response.length > 0) {
									var item = response[0];
									$("#updatequotationItemSelect").val(item.quotation_item);
									$("#updateadditionalPrice").val(item.additional_price);
									$("#updatecostTypeSelect").val(item.cost_type);
									$("#updatecostremarks").val(item.remarks);
									$('#saveUpdatedData').data('id', item.id);
									$('#updateFormContainer').slideDown();
								}
							}
						});
					}
				});
			});
		});

		// Save updated data
		$('#saveUpdatedData').on('click', function () {
			var id = $(this).data('id');
			var data = {
				id: id,
				quotationItem: $('#updatequotationItemSelect').val(),
				additionalPrice: $('#updateadditionalPrice').val(),
				costType: $('#updatecostTypeSelect').val(),
				remarks: $('#updatecostremarks').val()
			};

			$.ajax({
				url: '<?= base_url('AdditionalCost/update_additional_cost') ?>',
				type: 'POST',
				data: data,
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						alert('Data updated successfully');
						$('#updateFormContainer').slideUp();
						location.reload();
					} else {
						alert('Error updating data');
					}
				}
			});
		});
	});




	function calculateQuotationTot() {
		var sum = 0;
		$(".quotationTot").each(function () {
			sum += parseFloat($(this).text());
		});
		var showsum = addCommas(parseFloat(sum).toFixed(2));
		$('#divtotal').html('Rs. ' + showsum);

	}

	function deactive_confirm() {
		return confirm("Are you sure you want to deactive this?");
	}

	function accept_confirm() {
		return confirm("Are you sure you want to accept this Quotation?");
	}

	function active_confirm() {
		return confirm("Are you sure you want to approve this good receive note?");
	}

	function delete_confirm() {
		return confirm("Are you sure you want to reject this good receive note?");
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
<script>
	< ? php include "include/footer.php"; ? >