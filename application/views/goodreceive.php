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
							<span>Good Receive Note</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid mt-2 p-0 p-2">
				<div class="card">
					<div class="card-body p-0 p-2">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<button type="button" class="btn btn-outline-primary btn-sm fa-pull-right px-3"
									id="btnviewallgrn"><i class="fas fa-eye"></i>&nbsp;View GRN</button>
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<form action="#" method="post" autocomplete="off" id="grnFrom">
									<div class="form-row mb-1">
										<!-- <div class="col">
                                            <label class="small font-weight-bold text-dark">GRN Number</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="grnnum" id="grnnum" value="<?php echo $GRNNum; ?>" readonly>
                                        </div> -->
									</div>
									<div class="form-row mb-1">
										<div class="col">
											<label class="small font-weight-bold text-dark">GRN Date</label>
											<div class="input-group input-group-sm">
												<input type="date" class="form-control dpd1a" placeholder=""
													name="grndate" id="grndate" required>
											</div>
										</div>
										<div class="col">
											<label class="small font-weight-bold text-dark">Purches Order</label>
											<select class="form-control form-control-sm" name="ponumber" id="ponumber"
												required>
												<option value="">Select</option>
												<?php foreach($porderlist->result() as $rowporder){ ?>
												<option value="<?php echo $rowporder->idtbl_porder ?>">
													<?php echo 'PO-'.$rowporder->idtbl_porder ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-row mb-1">
										<div class="col">
											<label class="small font-weight-bold text-dark">Invoice Number*</label>
											<input type="text" class="form-control form-control-sm" placeholder=""
												name="grninvoice" id="grninvoice" required>
										</div>
										<div class="col">
											<label class="small font-weight-bold text-dark">Delivery Number*</label>
											<input type="text" class="form-control form-control-sm" placeholder=""
												name="grndispatch" id="grndispatch" required>
										</div>
									</div>
									<div class="form-group mt-2">
										<input name="submitBtn" type="submit" value="Save" id="submitBtn"
											class="d-none">
									</div>
								</form>
							</div>
							<div class="col-8">
								<h6 class="title-style small font-weight-bold mt-2"><span>GRN Detail</span></h6>
								<table class="table table-bordered table-sm table-striped" id="tableGrnList">
									<thead>
										<tr>
											<th>Product</th>
											<th class="d-none">ProductID</th>
											<th class="d-none">Unitprice</th>
											<th class="text-right">Unit Price</th>
											<th class="text-center">Qty</th>
											<th class="d-none">Hidetotal</th>
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody id="tbodygrncreate"></tbody>
								</table>
								<div class="row">
									<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 text-right">
										<h4>Total : </h4>
									</div>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-right">
										<h3 class="text-dark" id="showPrice">0.00</h3>
									</div>
									<input type="hidden" id="txtShowPrice" value="">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<hr class="border-dark">
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<button type="button" class="btn btn-outline-primary btn-sm fa-pull-right px-5"
											id="btnSaveGrn"><i class="far fa-save"></i>&nbsp;Save GRN</button>
									</div>
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

<!-- Modal GRN List -->
<div class="modal fade" id="modalgrnlist" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header p-2">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="viewgrnlist"></div>
            </div>
        </div>
    </div>
</div>

<?php include "include/footerscripts.php"; ?>
<script>
	$(document).ready(function () {
		var addcheck = 1;
		var editcheck = 1;
		var statuscheck = 1;
		var deletecheck = 1;

	});
	$('#ponumber').change(function () {
		var ponumber = $(this).val();
		$.ajax({
			type: "POST",
			data: {
				recordID: ponumber
			},
			url: 'Goodreceive/GetPoDetails',
			success: function (result) { //alert(result);
				$('#tbodygrncreate').html(result);
				tabletotal();
				orderoption();
			}
		});

	});
	$('#btnviewallgrn').click(function(){
            $('#viewgrnlist').empty().html('<div class="card border-0 shadow-none"><div class="card-body text-center"><img src="images/spinner.gif"></div></div>');
            $('#modalgrnlist').modal('show');
            
            $.ajax({
                type: "POST",
                data: {},
				url: '<?php echo base_url() ?>Goodreceive/GetGrnList',
                success: function(result) {//alert(result);
                    $('#viewgrnlist').html(result);
                }
            });
        });
	$('#btnSaveGrn').click(function () {
		if (!$("#grnFrom")[0].checkValidity()) {
			// If the form is invalid, submit it. The form won't actually submit;
			// this will just cause the browser to display the native HTML5 error messages.
			$("#submitBtn").click();
		} else {
			jsonObj = [];
			$("#tableGrnList tbody tr").each(function () {
				item = {}
				$(this).find('td').each(function (col_idx) {
					item["col_" + (col_idx + 1)] = $(this).text();
				});
				jsonObj.push(item);
			});
			// console.log(jsonObj);

			// var grnnum = $('#grnnum').val();
			var ponumber = $('#ponumber').val();
			var grndate = $('#grndate').val();
			var grninvoice = $('#grninvoice').val();
			var grndispatch = $('#grndispatch').val();
			var grnnettotal = $('#txtShowPrice').val();

			$.ajax({
				type: "POST",
				data: {
					tableData: jsonObj,
					// grnnum: grnnum,
					ponumber: ponumber,
					grndate: grndate,
					grninvoice: grninvoice,
					grndispatch: grndispatch,
					grnnettotal: grnnettotal
				},
				url: '<?php echo base_url() ?>Goodreceive/SaveNewGrn',
				success: function (result) { //alert(result);
					var obj = JSON.parse(result);
					if (obj.status == 1) {
						setTimeout(window.location.reload(), 3000);
					}
					action(obj.action);
				}
			});
		}
	});

	function tabletotal() {
		var sum = 0;
		$(".total").each(function () {
			sum += parseFloat($(this).text());
		});

		var showsum = addCommas(parseFloat(sum).toFixed(2));
		$('#showPrice').html('Rs. ' + showsum);
		$('#txtShowPrice').val(sum);
	}

	function orderoption() {
		$('#tableGrnList tbody').on('click', '.editnewqty', function (e) {
			var row = $(this);
			// var rowid = row.closest("tr").find('td:eq(0)').text();
			// var selectvalueone = $('.optionpiorityone' + rowid).val();
			// row.closest("tr").find('td:eq(7)').text(selectvalueone);

			e.preventDefault();
			e.stopImmediatePropagation();

			$this = $(this);
			if ($this.data('editing')) return;

			var val = $this.text();

			$this.empty();
			$this.data('editing', true);

			$('<input type="Text" class="form-control form-control-sm optionnewqty">').val(val).appendTo($this);
			textremove('.optionnewqty', row);
		});
	}

	function textremove(classname, row) {
		$('#tableGrnList tbody').on('keyup', classname, function (e) {
			if (e.keyCode === 13) {
				$this = $(this);
				var val = $this.val();
				var td = $this.closest('td');
				td.empty().html(val).data('editing', false);

				var rowID = row.closest("td").parent()[0].rowIndex;
				var unitprice = parseFloat(row.closest("tr").find('td:eq(4)').text());

				var totnew = unitprice * val;

				var total = parseFloat(totnew).toFixed(2);

				var showtotal = addCommas(total);

				$('#tableGrnList').find('tr').eq(rowID).find('td:eq(3)').text(showtotal);
				$('#tableGrnList').find('tr').eq(rowID).find('td:eq(5)').text(total);


				tabletotal();
			}
		});
	}


	function deactive_confirm() {
		return confirm("Are you sure you want to deactive this?");
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

	function getbatchno() {
		var supplierID = $('#supplier').val();

		$.ajax({
			type: "POST",
			data: {
				recordID: supplierID
			},
			url: 'Goodreceive/Getbatchnoaccosupplier',
			success: function (result) { //alert(result);
				//console.log(result);
				$('#batchno').val(result);
			}
		});
	}
</script>
<?php include "include/footer.php"; ?>
