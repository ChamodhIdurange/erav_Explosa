<?php 
include "include/header.php";  
include "include/topnavbar.php"; 
?>
<style>
	body {
		background-color: #f9f9f9;
		color: #333;
		line-height: 1.6;
	}

	.card {
		background: #fff;
		border: 1px solid #ddd;
		border-radius: 4px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
	}

	.card h6 {
		font-size: 16px;
		margin-bottom: 10px;
		color: #007bff;
		text-transform: uppercase;
	}

	.btn {
		border-radius: 4px;
		transition: all 0.3s;
	}

	.btn:hover {
		background-color: #0056b3;
		color: #fff;
	}

	.scrollbar {
		max-height: 300px;
		overflow-y: auto;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 4px;
	}

	.scrollbar::-webkit-scrollbar {
		width: 8px;
	}

	.scrollbar::-webkit-scrollbar-thumb {
		background: #007bff;
		border-radius: 4px;
	}
</style>
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
							<div class="page-header-icon"><i class="fas fa-users"></i></div>
							<span>Item Profile</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid mt-2 p-0 p-2">
				<div class="card">
					<div class="card-body p-0 p-4">
						<div class="row">
							<div class="col-3">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Customer*</label>
									<select class="form-control selecter2 form-control-sm" name="selectCustomer"
										id="selectCustomer" required>
										<option value="">Select</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Main Item*</label>
									<select class="form-control selecter2 form-control-sm" name="mainitem" id="mainitem"
										required>
										<option value="">Select</option>
									</select>
									<input type="hidden" id="recordOption" name="recordOption" value="1">
								</div>
							</div>
							<div class="col-3">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">No Of Ups*</label>
									<select class="form-control selecter2 form-control-sm" name="noofups"
										id="noofups" required>
										<option value="">Select</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">No Of sheet per Box*</label>
									<input type="text" class="form-control form-control-sm" name="noofbox"
										id="noofbox" required>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-3">
						<div class="form-group mb-1">
						<label class="small font-weight-bold">Carton Type*</label>
						<select class="form-control selecter2 form-control-sm" name="cartontype" id="cartontype" required>
							<option value="">Select</option>
							<?php foreach ($cartontypelist->result() as $rowcartontype) { ?>
								<option value="<?php echo $rowcartontype->idtbl_cartontype; ?>">
									<?php echo $rowcartontype->cartontypename; ?>
								</option>
							<?php } ?>
						</select>
					</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-6">
							<div class="row ">
							<div class="col-3">
							<div class="form-group mb-1">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="hasOffset">
										<label class="form-check-label small font-weight-bold">Has Offset</label>
									</div>
								</div>
							</div>
						</div>

						
						<div class="row ">
							<div class="col-6">
								<div class="form-group mb-1">
								<label class="small font-weight-bold">Length (In)*</label>
								<input type="text" class="form-control form-control-sm" name="oflength" id="oflength" disabled required>
								</div>
							</div>
							<div class="col-6">
							<div class="form-group mb-1">
								<label class="small font-weight-bold">Width (In)*</label>
								<input type="text" class="form-control form-control-sm" name="ofwidth" id="ofwidth" disabled required>
								</div>
							</div>
						</div>
							</div>
							<div class="col-md-6">

							<div class="row">
							<div class="col-3">
							<div class="form-group mb-1">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="hasdiecut">
										<label class="form-check-label small font-weight-bold">Die cut</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group mb-1">
								<label class="small font-weight-bold">Length (In)*</label>
								<input type="text" class="form-control form-control-sm" name="dielength" id="dielength" disabled required>
								</div>
							</div>
							<div class="col-6">
							<div class="form-group mb-1">
								<label class="small font-weight-bold">Width (In)*</label>
								<input type="text" class="form-control form-control-sm" name="diewidth" id="diewidth" disabled required>
								</div>
							</div>
						</div>
							</div>
						</div>
						
						
						<div class="form-group mt-2">
							<hr>
							<h6 class="font-weight-bold">Measurement Data</h6>
						</div>
						<div class="row">
							<!-- Length Box -->
							<div class="col-md-4">
								<div class="border p-3 rounded mb-3">
									<h6 class="font-weight-bold text-center">Length</h6>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Length (In)*</label>
										<input type="text" class="form-control form-control-sm" name="length"
											id="length" required>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Length (Cm)*</label>
										<input type="text" class="form-control form-control-sm" name="lengthcm"
											id="lengthcm" >
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Length (m)*</label>
										<input type="text" class="form-control form-control-sm" name="lengthm"
											id="lengthm" readonly>
									</div>
									
									</div>
								</div>
							</div>
							<!-- Width Box -->
							<div class="col-md-4">
								<div class="border p-3 rounded mb-3">
									<h6 class="font-weight-bold text-center">Width</h6>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Width (In)*</label>
										<input type="text" class="form-control form-control-sm" name="width" id="width"
											required>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Width (Cm)*</label>
										<input type="text" class="form-control form-control-sm" name="widthcm"
											id="widthcm">
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Width (m)*</label>
										<input type="text" class="form-control form-control-sm" name="widthm"
											id="widthm" readonly>
									</div>
									
								</div>
							</div>
							<!-- Height Box -->
							<div class="col-md-4">
								<div class="border p-3 rounded mb-3">
									<h6 class="font-weight-bold text-center">Height</h6>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Height (In)*</label>
										<input type="text" class="form-control form-control-sm" name="height"
											id="height" required>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Height (Cm)*</label>
										<input type="text" class="form-control form-control-sm" name="heightcm"
											id="heightcm">
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Height (m)*</label>
										<input type="text" class="form-control form-control-sm" name="heightm"
											id="heightm" readonly>
									</div>
									
								</div>
							</div>
						</div>
						<div class="form-group mt-2">
							<hr>
							<h6 class="font-weight-bold">Reel Data</h6>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Reel Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="reelsize"
										id="reelsize" required disabled>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Cut Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="cutsize" id="cutsize"
										required disabled>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Actual Reel Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="actualreelsize"
										id="actualreelsize" required>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Actual Cut Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="actualcutsize"
										id="actualcutsize" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Inner Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="innersize"
										id="innersize" required>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Outer Size(In)*</label>
									<input type="text" class="form-control form-control-sm" name="outersize"
										id="outersize" required>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Cut Type*</label>
									<select class="form-control selecter2 form-control-sm" name="cuttype" id="cuttype"
										required>
										<option value="">Select</option>
										<?php foreach ($cuttypelist->result() as $rowcuttype) { ?>
										<option value="<?php echo $rowcuttype->idtbl_cuttype ?>">
											<?php echo $rowcuttype->cuttype ?>
										</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col">
								<div class="form-group mb-1">
									<label class="small font-weight-bold">Material (Reel)(In)*</label>
									<select class="form-control selecter2 form-control-sm" name="materialreel"
										id="materialreel" required>
										<option value="">Select</option>
										<?php foreach ($materiallist->result() as $rowmateriallist) { ?>
										<option value="<?php echo $rowmateriallist->idtbl_row_material ?>">
											<?php echo $rowmateriallist->material_name ?>
										</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mt-2">
							<hr>
							<h6 class="font-weight-bold">Ply Data</h6>
						</div>
						<div class="row">
							<div class="col-3">
								<form id="flidataform" method="post" autocomplete="off">
									<div class="form-group mb-1">
										<label class="small font-weight-bold">No of Flies*</label>
										<select class="form-control selecter2 form-control-sm" name="flicount"
											id="flicount" required>
											<option value="">Select</option>
											<option value="1">One Ply</option>
											<option value="2">Two Ply</option>
											<option value="3">Three Ply</option>
											<option value="4">Four Ply</option>
											<option value="5">Five Ply</option>
											<option value="6">Six Ply</option>
											<option value="7">Seven Ply</option>
											<option value="8">Eight Ply</option>
											<option value="9">Nine Ply</option>
											<option value="10">Ten Ply</option>
											<option value="11">Eleven Ply</option>
										</select>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Ply*</label>
										<select class="form-control selecter2 form-control-sm" name="selectedfli"
											id="selectedfli" required>
											<option value="">Select</option>
											<?php foreach ($flilist->result() as $rowflilist) { ?>
											<option value="<?php echo $rowflilist->idtbl_flidata ?>">
												<?php echo $rowflilist->fli_name ?>/
												<?php echo $rowflilist->fli_type ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group mb-1">
										<div class="form-group mb-1">
											<label class="small font-weight-bold">Position*</label>
											<input type="text" class="form-control form-control-sm" name="fliposition"
												id="fliposition" required>
										</div>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">GSM*</label>
										<select class="form-control selecter2 form-control-sm" name="gsm" id="gsm"
											required>
											<option value="">Select</option>
											<?php foreach ($gsmlist->result() as $rowgsmlist) { ?>
											<option value="<?php echo $rowgsmlist->idtbl_gsm ?>">
												<?php echo $rowgsmlist->gsmname ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group mt-2 text-right">
										<button type="button" id="btnaddflidataadd" class="btn btn-primary btn-sm px-4"
											<?php if($addcheck==0){echo 'disabled';} ?>><i
												class="fa fa-plus"></i>&nbsp;Add</button>
										<input type="submit" class="d-none" id="hiddenflidataformsubmit">
									</div>
								</form>
							</div>
							<div class="col-9">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap" id="flidatatable">
										<thead>
											<tr>
												<th>Ply</th>
												<th>Position</th>
												<th>Gsm</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group mt-2">
							<hr>
							<h6 class="font-weight-bold">Material Data</h6>
						</div>
						<div class="row">
							<div class="col-3">
								<form id="materialdataform" method="post" autocomplete="off">
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Row Material*</label>
										<select class="form-control selecter2 form-control-sm" name="rowmaterial"
											id="rowmaterial" required>
											<option value="">Select</option>
											<?php foreach ($materiallist->result() as $rowmateriallist) { ?>
											<option value="<?php echo $rowmateriallist->idtbl_row_material ?>">
												<?php echo $rowmateriallist->material_name ?>
											</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group mb-1">
										<div class="form-group mb-1">
											<label class="small font-weight-bold">Qty*</label>
											<input type="text" class="form-control form-control-sm" name="materialqty"
												id="materialqty" required>
										</div>
									</div>
									<div class="form-group mt-2 text-right">
										<button type="button" id="btnaddmaterialdata"
											class="btn btn-primary btn-sm px-4"
											<?php if($addcheck==0){echo 'disabled';} ?>><i
												class="fa fa-plus"></i>&nbsp;Add Materials</button>
										<input type="submit" class="d-none" id="hiddenmaterialdatasubmit">
									</div>
								</form>
							</div>
							<div class="col-9">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap"
										id="materialdatatable">
										<thead>
											<tr>
												<th>Material</th>
												<th>Quantity</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group mt-2">
							<hr>
							<h6 class="font-weight-bold">Machine Data</h6>
						</div>
						<div class="row">
							<div class="col-3">
								<form id="machinedataform" method="post" autocomplete="off">
									<div class="form-group mb-1">
										<div class="form-group mb-1">
											<label class="small font-weight-bold">Sequence*</label>
											<input type="text" class="form-control form-control-sm"
												name="machinesequence" id="machinesequence" required>
										</div>
									</div>
									<div class="form-group mb-1">
										<label class="small font-weight-bold">Machine*</label>
										<select class="form-control selecter2 form-control-sm" name="machineid"
											id="machineid" required>
											<option value="">Select</option>
											<?php foreach ($machinelist->result() as $rowmachinelist) { ?>
											<option value="<?php echo $rowmachinelist->idtbl_machine ?>">
												<?php echo $rowmachinelist->machine ?>
											</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group mt-2 text-right">
										<button type="button" id="btnaddmachine" class="btn btn-primary btn-sm px-4"
											<?php if($addcheck==0){echo 'disabled';} ?>><i
												class="fa fa-plus"></i>&nbsp;Add Machine</button>
										<input type="submit" class="d-none" id="hiddenmachinedatasubmit">
									</div>
								</form>
							</div>
							<div class="col-9">
								<div class="scrollbar pb-3" id="style-2">
									<table class="table table-bordered table-striped table-sm nowrap"
										id="machinedatatable">
										<thead>
											<tr>
												<th>Sequence</th>
												<th>Machine</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group mt-2 text-right">
							<button type="button" id="btnCreateUpdateProfile" class="btn btn-primary btn-sm px-4"
								<?php if($addcheck==0){echo 'disabled';} ?>><i class="far fa-save"></i>&nbsp;Create
								Profile</button>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php include "include/footerbar.php"; ?>
	</div>
</div>
<?php include "include/footerscripts.php"; ?>
<script>
	$(document).ready(function () {

		function roundUpToNextOdd(number) {
        let rounded = Math.ceil(number);
        if (rounded % 2 === 0) {
            return rounded + 1;
        }
        return rounded;
    	}

		var addcheck = '<?php echo $addcheck; ?>';
		var editcheck = '<?php echo $editcheck; ?>';
		var statuscheck = '<?php echo $statuscheck; ?>';
		var deletecheck = '<?php echo $deletecheck; ?>';

		$("#selectCustomer").select2({
			ajax: {
				url: '<?php echo base_url() ?>Itemprofile/GetCustomersforselect2',
				type: "post",
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						searchTerm: params.term, // search term
					};
				},
				processResults: function (response) { //console.log(response)
					return {
						results: response
					};
				},
				cache: true
			}
		});

		$('#selectCustomer').change(function () {
			var customerId = $(this).val();
			$("#mainitem").select2({
				ajax: {
					url: '<?php echo base_url() ?>Itemprofile/GetProductAccoCustomerSelect2',
					type: "post",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							customerId: customerId, 
							searchTerm: params.term, 
						};
					},
					processResults: function (response) { //console.log(response)
						return {
							results: response
						};
					},
					cache: true
				}
			});
		})



		function validateDimensions(width, height, length) {
        const hasOffset = $('#hasOffset').is(':checked');
        const hasDiecut = $('#hasdiecut').is(':checked');
        const offsetLength = parseFloat($('#oflength').val()) || 0;
        const offsetWidth = parseFloat($('#ofwidth').val()) || 0;
        const diecutLength = parseFloat($('#dielength').val()) || 0;
        const diecutWidth = parseFloat($('#diewidth').val()) || 0;
        const noofups = $('#noofups').val() || 1 ;
		console.log('number of nn',noofups);	
        
        // Calculate reel size and cut size 
		console.log('width + height',width+height);

        const additionalInch = (noofups == 1 || noofups == 2) ? 1 : 1.5;
        const rawReelsize = ((width + height) * noofups) + additionalInch;
		console.log('befor rownd',rawReelsize);
        const reelsize = roundUpToNextOdd(rawReelsize);
		console.log('reeeel',rawReelsize);
		console.log('orignl reeel',reelsize);


        let originalCutSize = length + width;
        let cutsize;
        if ((originalCutSize * 2) < 81) {
            cutsize = (originalCutSize * 2) + 2;
        } else {
            cutsize = originalCutSize + 2;
        }

        // Validation checks
        let isValid = true;
        let errorMessage = "";
        
        if (hasOffset) {
            if (cutsize > offsetWidth) {
                isValid = false;
                errorMessage += `Cut size (${cutsize}") cannot be greater than Offset Width (${offsetWidth}")\n`;
            }
            // if (reelsize > offsetLength) {
            //     isValid = false;
            //     errorMessage += `Reel size (${reelsize}") cannot be greater than Offset Length (${offsetLength}")\n`;
            // }
        }
        
        if (hasDiecut) {
            if (cutsize > diecutWidth) {
                isValid = false;
                errorMessage += `Cut size (${cutsize}") cannot be greater than Diecut Width (${diecutWidth}")\n`;
            }
            // if (reelsize > diecutLength) {
            //     isValid = false;
            //     errorMessage += `Reel size (${reelsize}") cannot be greater than Diecut Length (${diecutLength}")\n`;
            // }
        }
        
        if (!isValid) {
            alert("Validation errors:\n" + errorMessage + "\nPlease adjust your measurements.");
            // Reset measurement fields
            $('#width').val('');
            $('#height').val('');
            $('#length').val('');
            $('#widthcm').val('');
            $('#heightcm').val('');
            $('#lengthcm').val('');
            $('#widthm').val('');
            $('#heightm').val('');
            $('#lengthm').val('');
            $('#reelsize').val('');
            $('#cutsize').val('');
            return false;
        }
        
        // Update the fields if validation passes
        $('#reelsize').val(reelsize);
        $('#cutsize').val(cutsize);
		$('#actualcutsize').val(originalCutSize);

        return true;
    }

		// inch inputs
		$("#width, #height, #length").on("input", function () {
			let width = parseFloat($("#width").val()) || 0;
			let height = parseFloat($("#height").val()) || 0;
			let length = parseFloat($("#length").val()) || 0;
			
			if (validateDimensions(width, height, length)) {
            // If validation passes, proceed with conversion
            convertMeasurmentDataInches(width, height, length);
        }
		});
		$("#widthcm, #heightcm, #lengthcm").on("input", function () {
			let width = parseFloat($("#widthcm").val()) || 0;
			let height = parseFloat($("#heightcm").val()) || 0;
			let length = parseFloat($("#lengthcm").val()) || 0;
			
			const widthIn = width / 2.54;
			const heightIn = height / 2.54;
			const lengthIn = length / 2.54;
        
        // First validate dimensions
        if (validateDimensions(widthIn, heightIn, lengthIn)) {
            // If validation passes, proceed with conversion
            convertMeasurmentDataCm(width, height, length);
        }
		});
		});

		$("#mainitem").change(function () {
		var itemId = $(this).val();
		$('#flidatatable > tbody').empty()
		$('#materialdatatable > tbody').empty()
		$('#machinedatatable > tbody').empty()

		$.ajax({
			type: "POST",
			data: {
				itemId: itemId
			},
			url: '<?php echo base_url() ?>Itemprofile/CheckItemProfile',
			success: function (result) {
				var obj = JSON.parse(result);
				if (obj.recordOption == 1) {
					$('#recordOption').val(obj.recordOption);
					$('#width').val('');
					$('#height').val('');
					$('#length').val('');
					$('#reelsize').val('');
					$('#cutsize').val('');
					$('#actualreelsize').val('');
					$('#actualcutsize').val('');
					$('#flicount').val('');
					$('#materialreel').val('');
					$('#noofups').val('');
					$('#noofbox').val('');  
					$('#cartontype').val('').trigger('change');  
					
					// Reset offset fields
					$('#hasOffset').prop('checked', false);
					$('#oflength').val('').prop('disabled', true);
					$('#ofwidth').val('').prop('disabled', true);
					
					// Reset diecut fields
					$('#hasdiecut').prop('checked', false);
					$('#dielength').val('').prop('disabled', true);
					$('#diewidth').val('').prop('disabled', true);

					$('#flidatatable > tbody').empty();
					$('#btnCreateUpdateProfile').html(
						'<i class="far fa-save"></i>&nbsp; Save Profile');
					$('#btnCreateUpdateProfile').prop('disabled', false);
					$('#btnaddflidataadd').prop('disabled', false);

					convertMeasurmentDataInches(0, 0, 0);

				} else {
					$('#recordOption').val(obj.recordOption);
					$('#width').val(obj.width);
					$('#height').val(obj.height);
					$('#length').val(obj.length);
					$('#reelsize').val(obj.reelsize);
					$('#cutsize').val(obj.cutsize);
					$('#actualreelsize').val(obj.actualreelsize);
					$('#actualcutsize').val(obj.actualcutsize);
					$('#flicount').val(obj.noofflies);
					$('#materialreel').val(obj.materialId);
					$('#noofups').val(obj.noofups);
					$('#noofbox').val(obj.noofbox);
					$('#cartontype').val(obj.cartontype).trigger('change');
					
					// Handle offset fields
					if(obj.hasOffset == 1) {
						$('#hasOffset').prop('checked', true);
						$('#oflength').val(obj.offsetLength).prop('disabled', false);
						$('#ofwidth').val(obj.offsetWidth).prop('disabled', false);
					} else {
						$('#hasOffset').prop('checked', false);
						$('#oflength').val('').prop('disabled', true);
						$('#ofwidth').val('').prop('disabled', true);
					}
					
					// Handle diecut fields
					if(obj.hasDiecut == 1) {
						$('#hasdiecut').prop('checked', true);
						$('#dielength').val(obj.diecutLength).prop('disabled', false);
						$('#diewidth').val(obj.diecutWidth).prop('disabled', false);
					} else {
						$('#hasdiecut').prop('checked', false);
						$('#dielength').val('').prop('disabled', true);
						$('#diewidth').val('').prop('disabled', true);
					}

					convertMeasurmentDataInches(obj.width, obj.height, obj.length);


					var objDetails = obj.detailsArray;
					$.each(objDetails, function (i, item) {
						//alert(objDetails[i].gsmname);
						$('#flidatatable > tbody:last').append(
							'<tr class="pointer"><td class="positioncount">' +
							objDetails[i].fliname +
							'</td><td class="">' +
							objDetails[i].fliposition +
							'</td><td>' + objDetails[i].gsmname +
							'</td><td class="d-none">' + objDetails[i].gsmId +
							'</td><td class="d-none">' + objDetails[i].fliId +
							'</td></tr>');
					});

					var objMaterialDetails = obj.materialDetailsArray;
					$.each(objMaterialDetails, function (i, item) {
						$('#materialdatatable > tbody:last').append(
							'<tr class="pointer"><td>' +
							objMaterialDetails[i].materialname +
							'</td><td class="">' +
							objMaterialDetails[i].requiredqty +
							'</td><td class="d-none">' + objMaterialDetails[i].materialId +
							'</td><td class="d-none">' + objMaterialDetails[i]
							.materialDetailId +
							'</td></tr>');
					});

					var objMachineDetails = obj.machineDetailsArray;
					$.each(objMachineDetails, function (i, item) {
						$('#machinedatatable > tbody:last').append(
							'<tr class="pointer"><td>' +
							objMachineDetails[i].sequence +
							'</td><td class="">' +
							objMachineDetails[i].machineName +
							'</td><td class="d-none">' + objMachineDetails[i].machineId +
							'</td><td class="d-none">' + objMachineDetails[i]
							.machineDetailId +
							'</td></tr>');
					});
					$('#btnCreateUpdateProfile').html(
						'<i class="far fa-save"></i>&nbsp; Update Profile');
					$('#btnCreateUpdateProfile').prop('disabled', true);
					$('#btnaddflidataadd').prop('disabled', true);
				}
			}
		});
		}
		)
		$("#btnaddflidataadd").click(function () {
		if (!$("#flidataform")[0].checkValidity()) {
			$("#hiddenflidataformsubmit").click();
		} else {
			var flicount = $('#flicount').val();
			var flicountText = $("#flicount option:selected").text();
			var selectedfli = $('#selectedfli').val();
			var selectedfliText = $("#selectedfli option:selected").text();
			var fliposition = $('#fliposition').val();

			var gsmId = $('#gsm').val();
			var gsmText = $("#gsm option:selected").text();

			var count = 0;
			$(".positioncount").each(function () {
				count += 1;
			});

			if (count == flicount) {
				alert(`You can't enter any more Ply data since No of flies you selected is ${count}`);
				return;
			}

			$('#flidatatable > tbody:last').append('<tr class="pointer"><td class="positioncount">' +
				selectedfliText +
				'</td><td>' + fliposition +
				'</td><td>' + gsmText +
				'</td><td class="d-none">' + gsmId +
				'</td><td class="d-none">' + selectedfli +
				'</td></tr>');

			$('#selectedfli').val('').trigger('change');
			$('#fliposition').val('');
			$('#gsm').val('');
		}
	})
	$("#btnaddmaterialdata").click(function () {
		if (!$("#materialdataform")[0].checkValidity()) {
			$("#hiddenmaterialdatasubmit").click();
		} else {
			var rowmaterial = $('#rowmaterial').val();
			var rowmaterialText = $("#rowmaterial option:selected").text();
			var materialqty = $('#materialqty').val();

			$('#materialdatatable > tbody:last').append('<tr class="pointer"><td>' +
				rowmaterialText +
				'</td><td>' + materialqty +
				'</td><td class="d-none">' + rowmaterial +
				'</td></tr>');

			$('#rowmaterial').val('').trigger('change');
			$('#materialqty').val(0);
		}
	})
	$("#btnaddmachine").click(function () {
		if (!$("#machinedataform")[0].checkValidity()) {
			$("#hiddenmachinedatasubmit").click();
		} else {
			var machineid = $('#machineid').val();
			var machineidText = $("#machineid option:selected").text();
			var machinesequence = $('#machinesequence').val();

			$('#machinedatatable > tbody:last').append('<tr class="pointer"><td>' +
				machinesequence +
				'</td><td>' + machineidText +
				'</td><td class="d-none">' + machineid +
				'</td></tr>');

			$('#machineid').val('').trigger('change');
			$('#machinesequence').val(0);
		}
	})
	$('#flidatatable').on('click', 'tr', function () {
		var r = confirm("Are you sure, You want to remove this product ? ");
		if (r == true) {
			$(this).closest('tr').remove();

			var sum = 0;
			$(".total").each(function () {
				sum += parseFloat($(this).text());
			});

			var showsum = addCommas(parseFloat(sum).toFixed(2));

			$('#divtotal').html('Rs. ' + showsum);
			$('#hidetotalinvoice').val(sum);
			$('#productclose').focus();
		}
	});
	$("#btnCreateUpdateProfile").click(function () {
		fliObj = [];
		materialObj = [];
		machineObj = [];
		$("#flidatatable tbody tr").each(function () {
			item = {}
			$(this).find('td').each(function (col_idx) {
				item["col_" + (col_idx + 1)] = $(this).text();
			});
			fliObj.push(item);
		});
		$("#materialdatatable tbody tr").each(function () {
			item = {}
			$(this).find('td').each(function (col_idx) {
				item["col_" + (col_idx + 1)] = $(this).text();
			});
			materialObj.push(item);
		});
		$("#machinedatatable tbody tr").each(function () {
			item = {}
			$(this).find('td').each(function (col_idx) {
				item["col_" + (col_idx + 1)] = $(this).text();
			});
			machineObj.push(item);
		});

		var width = $('#width').val();
		var height = $('#height').val();
		var length = $('#length').val();
		var reelsize = $('#reelsize').val();
		var cutsize = $('#cutsize').val();
		var actualreelsize = $('#actualreelsize').val();
		var actualcutsize = $('#actualcutsize').val();
		var innersize = $('#innersize').val();
		var outersize = $('#outersize').val();
		var cuttype = $('#cuttype').val();
		let noofups = $('#noofups').val();


		var flicount = $('#flicount').val();
		var materialId = $('#materialreel').val();

		var mainitemId = $('#mainitem').val();
		var recordOption = $('#recordOption').val();

		var noofbox = $('#noofbox').val();
		var cartontype = $('#cartontype').val();
		var hasOffset = $('#hasOffset').is(':checked') ? 1 : 0;
		var offsetLength = $('#oflength').val();
		var offsetWidth = $('#ofwidth').val();
		var hasDiecut = $('#hasdiecut').is(':checked') ? 1 : 0;
		var diecutLength = $('#dielength').val();
		var diecutWidth = $('#diewidth').val();

		$.ajax({
			type: "POST",
			data: {
				tableData: fliObj,
				materialTableData: materialObj,
				machineTableData: machineObj,
				width: width,
				height: height,
				length: length,
				reelsize: reelsize,
				cutsize: cutsize,
				actualreelsize: actualreelsize,
				actualcutsize: actualcutsize,
				innersize: innersize,
				outersize: outersize,
				cuttypeId: cuttype,
				flicount: flicount,
				noofups: noofups,
				materialId: materialId,
				recordOption: recordOption,
				mainitemId: mainitemId,
				noofbox: noofbox,
				cartontype: cartontype,
				hasOffset: hasOffset,
				oflength: offsetLength,
				ofwidth: offsetWidth,
				hasdiecut: hasDiecut,
				dielength: diecutLength,
				diewidth: diecutWidth
			},
			url: '<?php echo base_url() ?>Itemprofile/InsertUpdateItemProfile',
			success: function (result) {
				//alert(result);
				action(result);
				setTimeout(function () {
					window.location.reload();

				}, 1500);
			}
		});
	})
	function convertMeasurmentDataInches(widthIn, heightIn, lengthIn) {
		var widthM = (widthIn / 39.37).toFixed(3);
		var heightM = (heightIn / 39.37).toFixed(3);
		var lengthM = (lengthIn / 39.37).toFixed(3);

		var widthCm = (widthIn * 2.54).toFixed(3);
		var heightCm = (heightIn * 2.54).toFixed(3);
		var lengthCm = (lengthIn * 2.54).toFixed(3);

		$('#widthm').val(widthM)
		$('#heightm').val(heightM)
		$('#lengthm').val(lengthM)

		$('#widthcm').val(widthCm)
		$('#heightcm').val(heightCm)
		$('#lengthcm').val(lengthCm)
	}
	function convertMeasurmentDataCm(widthCm, heightCm, lengthCm) {
		var widthM = (widthCm / 100).toFixed(3);
		var heightM = (heightCm / 100).toFixed(3);
		var lengthM = (lengthCm / 100).toFixed(3);

		var widthIn = (widthCm / 2.54).toFixed(3);
		var heightIn = (heightCm / 2.54).toFixed(3);
		var lengthIn = (lengthCm / 2.54).toFixed(3);

		$('#widthm').val(widthM)
		$('#heightm').val(heightM)
		$('#lengthm').val(lengthM)

		$('#width').val(widthIn)
		$('#height').val(heightIn)
		$('#length').val(lengthIn)
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


	document.getElementById('hasOffset').addEventListener('change', function() {
    const lengthInput = document.getElementById('oflength');
	const widthInput = document.getElementById('ofwidth');
    lengthInput.disabled = !this.checked;
	widthInput.disabled = !this.checked;
    if (!this.checked) widthInput.value = '';
    if (!this.checked) lengthInput.value = '';
 	});
	 document.getElementById('hasdiecut').addEventListener('change', function() {
    const lengthInput = document.getElementById('dielength');
	const widthInput = document.getElementById('diewidth');
    lengthInput.disabled = !this.checked;
	widthInput.disabled = !this.checked;
    if (!this.checked) widthInput.value = '';
    if (!this.checked) lengthInput.value = '';
 	});

	function deactive_confirm() {
		return confirm("Are you sure you want to deactive this?");
	}

	function active_confirm() {
		return confirm("Are you sure you want to active this?");
	}

	function delete_confirm() {
		return confirm("Are you sure you want to remove this?");
	}
</script>
<?php include "include/footer.php"; ?>
