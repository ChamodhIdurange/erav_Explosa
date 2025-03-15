<?php 
$controllermenu=$this->router->fetch_class();
$functionmenu=uri_string();
$functionmenu2=$this->router->fetch_method();
$menuprivilegearray=$menuaccess;

if($functionmenu2=='Useraccount'){
    $addcheck=checkprivilege($menuprivilegearray, 1, 1);
    $editcheck=checkprivilege($menuprivilegearray, 1, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 1, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 1, 4);
}
else if($functionmenu2=='Usertype'){
    $addcheck=checkprivilege($menuprivilegearray, 2, 1);
    $editcheck=checkprivilege($menuprivilegearray, 2, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 2, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 2, 4);
}
else if($functionmenu2=='Userprivilege'){
    $addcheck=checkprivilege($menuprivilegearray, 3, 1);
    $editcheck=checkprivilege($menuprivilegearray, 3, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 3, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 3, 4);
}
else if($controllermenu=='Supplier'){
    $addcheck=checkprivilege($menuprivilegearray, 4, 1);
    $editcheck=checkprivilege($menuprivilegearray, 4, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 4, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 4, 4);
}
else if($controllermenu=='Color'){
    $addcheck=checkprivilege($menuprivilegearray, 5, 1);
    $editcheck=checkprivilege($menuprivilegearray, 5, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 5, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 5, 4);
}
else if($controllermenu=='Categories'){
    $addcheck=checkprivilege($menuprivilegearray, 6, 1);
    $editcheck=checkprivilege($menuprivilegearray, 6, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 6, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 6, 4);
}
else if($controllermenu=='Subcategory'){
    $addcheck=checkprivilege($menuprivilegearray, 7, 1);
    $editcheck=checkprivilege($menuprivilegearray, 7, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 7, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 7, 4);
}
else if($controllermenu=='Customer'){
    $addcheck=checkprivilege($menuprivilegearray, 8, 1);
    $editcheck=checkprivilege($menuprivilegearray, 8, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 8, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 8, 4);
}
else if($controllermenu=='Jobs'){
    $addcheck=checkprivilege($menuprivilegearray, 9, 1);
    $editcheck=checkprivilege($menuprivilegearray, 9, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 9, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 9, 4);
}
else if($controllermenu=='StartedJobs'){
    $addcheck=checkprivilege($menuprivilegearray, 10, 1);
    $editcheck=checkprivilege($menuprivilegearray, 10, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 10, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 10, 4);
}
else if($controllermenu=='Slot'){
    $addcheck=checkprivilege($menuprivilegearray, 11, 1);
    $editcheck=checkprivilege($menuprivilegearray, 11, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 11, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 11, 4);
}
else if($controllermenu=='Material'){
    $addcheck=checkprivilege($menuprivilegearray, 12, 1);
    $editcheck=checkprivilege($menuprivilegearray, 12, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 12, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 12, 4);
}
else if($controllermenu=='Purchaseorder'){
    $addcheck=checkprivilege($menuprivilegearray, 13, 1);
    $editcheck=checkprivilege($menuprivilegearray, 13, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 13, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 13, 4);
}
else if($controllermenu=='Goodreceive'){
    $addcheck=checkprivilege($menuprivilegearray, 14, 1);
    $editcheck=checkprivilege($menuprivilegearray, 14, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 14, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 14, 4);
}
else if($controllermenu=='Stockreport'){
    $addcheck=checkprivilege($menuprivilegearray, 15, 1);
    $editcheck=checkprivilege($menuprivilegearray, 15, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 15, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 15, 4);
}
else if($controllermenu=='Employee'){
    $addcheck=checkprivilege($menuprivilegearray, 16, 1);
    $editcheck=checkprivilege($menuprivilegearray, 16, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 16, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 16, 4);
}
else if($controllermenu=='Insurance'){
    $addcheck=checkprivilege($menuprivilegearray, 17, 1);
    $editcheck=checkprivilege($menuprivilegearray, 17, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 17, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 17, 4);
}
else if($controllermenu=='Sectionsalesreport'){
    $addcheck=checkprivilege($menuprivilegearray, 18, 1);
    $editcheck=checkprivilege($menuprivilegearray, 18, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 18, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 18, 4);
}
else if($controllermenu=='Materialallocationreport'){
    $addcheck=checkprivilege($menuprivilegearray, 19, 1);
    $editcheck=checkprivilege($menuprivilegearray, 19, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 19, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 19, 4);
}
else if($controllermenu=='Jobestimation'){
    $addcheck=checkprivilege($menuprivilegearray, 20, 1);
    $editcheck=checkprivilege($menuprivilegearray, 20, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 20, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 20, 4);
}
else if($controllermenu=='Department'){
    $addcheck=checkprivilege($menuprivilegearray, 21, 1);
    $editcheck=checkprivilege($menuprivilegearray, 21, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 21, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 21, 4);
}
else if($controllermenu=='Employeeallocationreport'){
    $addcheck=checkprivilege($menuprivilegearray, 22, 1);
    $editcheck=checkprivilege($menuprivilegearray, 22, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 22, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 22, 4);
}
else if($controllermenu=='VehicleSearchReport'){
    $addcheck=checkprivilege($menuprivilegearray, 23, 1);
    $editcheck=checkprivilege($menuprivilegearray, 23, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 23, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 23, 4);
}
else if($controllermenu=='Vehiclecategory'){
    $addcheck=checkprivilege($menuprivilegearray, 24, 1);
    $editcheck=checkprivilege($menuprivilegearray, 24, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 24, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 24, 4);
}
else if($controllermenu=='Directgrn'){
    $addcheck=checkprivilege($menuprivilegearray, 25, 1);
    $editcheck=checkprivilege($menuprivilegearray, 25, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 25, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 25, 4);
}
else if($controllermenu=='Vehiclemodel'){
    $addcheck=checkprivilege($menuprivilegearray, 26, 1);
    $editcheck=checkprivilege($menuprivilegearray, 26, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 26, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 26, 4);
}
else if($controllermenu=='DeletedJobs'){
    $addcheck=checkprivilege($menuprivilegearray, 27, 1);
    $editcheck=checkprivilege($menuprivilegearray, 27, 2);
    $statuscheck=checkprivilege($menuprivilegearray, 27, 3);
    $deletecheck=checkprivilege($menuprivilegearray, 27, 4);
}

function checkprivilege($arraymenu, $menuID, $type){
    foreach($arraymenu as $array){
        if($array->menuid==$menuID){
            if($type==1){
                return $array->add;
            }
            else if($type==2){
                return $array->edit;
            }
            else if($type==3){
                return $array->statuschange;
            }
            else if($type==4){
                return $array->remove;
            }
        }
    }
}
?>
<textarea class="d-none" id="actiontext"><?php if($this->session->flashdata('msg')) {echo $this->session->flashdata('msg');} ?></textarea>

<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">Core</div>
            <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url().'Welcome/Dashboard'; ?>">
                <div class="nav-link-icon"><i class="fas fa-desktop"></i></div>
                Dashboard
            </a>
            
            <?php if(menucheck($menuprivilegearray, 4)==1 | menucheck($menuprivilegearray, 5)==1 | menucheck($menuprivilegearray, 6)==1 | menucheck($menuprivilegearray, 7)==1 | menucheck($menuprivilegearray, 8)==1 | menucheck($menuprivilegearray, 11)==1 | menucheck($menuprivilegearray, 12)==1 | menucheck($menuprivilegearray, 16)==1 | menucheck($menuprivilegearray, 17)==1 | menucheck($menuprivilegearray, 21)==1 | menucheck($menuprivilegearray, 24)==1 | menucheck($menuprivilegearray, 26)==1){?>
			<a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
				data-target="#collapsemaster" aria-expanded="false" aria-controls="collapsemaster">
				<div class="nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
				 Master Files
				<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse <?php if($functionmenu=="Supplier"  | $functionmenu=="Color" | $functionmenu=="Category" |  $functionmenu=="Subcategory" |  $functionmenu=="Customer" |  $functionmenu=="Slot" |  $functionmenu=="Material"  |  $functionmenu=="Employee" |  $functionmenu=="Insurance" |  $functionmenu=="Department" |  $functionmenu=="Vehiclecategory" |  $functionmenu=="Vehiclemodel"){echo 'show';} ?>"
				id="collapsemaster" data-parent="#accordionSidenav">
				<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
					<?php if(menucheck($menuprivilegearray, 4)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Supplier'; ?>">Suppliers</a>
					<?php } if(menucheck($menuprivilegearray, 21)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Department'; ?>">Departments</a>
					<?php } if(menucheck($menuprivilegearray, 16)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Employee'; ?>">Employee</a>
					<?php } if(menucheck($menuprivilegearray, 8)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Customer'; ?>">Customers</a>
					<?php } if(menucheck($menuprivilegearray, 5)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Color'; ?>">Colors</a>
					<?php } if(menucheck($menuprivilegearray, 24)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Vehiclecategory'; ?>">Vehicle Category</a>
					<?php } if(menucheck($menuprivilegearray, 6)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Category'; ?>">Main Categories</a>
					<?php } if(menucheck($menuprivilegearray, 7)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Subcategory'; ?>">Sub Categories</a>
					<?php } if(menucheck($menuprivilegearray, 11)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Slot'; ?>">Slots</a>
					<?php } if(menucheck($menuprivilegearray, 12)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Material'; ?>">Materials</a>
					<?php } if(menucheck($menuprivilegearray, 17)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Insurance'; ?>">Insurance</a>
					<?php } if(menucheck($menuprivilegearray, 26)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Vehiclemodel'; ?>">Vehicle Model</a>
					<?php } ?>
				</nav>
			</div>
            <?php }if(menucheck($menuprivilegearray, 9)==1 | menucheck($menuprivilegearray, 10)==1 | menucheck($menuprivilegearray, 20)==1 | menucheck($menuprivilegearray, 27)==1){?>
			<a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
				data-target="#collapseJobs" aria-expanded="false" aria-controls="collapseVehicle">
				<div class="nav-link-icon"><i class="fa fa-car"></i></div>
				Job Management
				<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse <?php if($functionmenu=="Jobs"  | $functionmenu=="StartedJobs" | $functionmenu=="Jobestimation" | $functionmenu=="DeletedJobs"){echo 'show';} ?>"
				id="collapseJobs" data-parent="#accordionSidenav">
				<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
					<?php if(menucheck($menuprivilegearray, 9)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Jobs'; ?>">New jobs</a>
					<?php } if(menucheck($menuprivilegearray, 10)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'StartedJobs'; ?>">Started Jobs</a>
					<?php } if(menucheck($menuprivilegearray, 20)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Jobestimation'; ?>">Job Estimation</a>
					<?php } if(menucheck($menuprivilegearray, 27)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'DeletedJobs'; ?>">Deleted Jobs</a>
					<?php } ?>
				</nav>
			</div>
            <?php }if(menucheck($menuprivilegearray, 13)==1){ ?>
            <a class="nav-link p-0 px-3 py-2" href="<?php echo base_url().'Purchaseorder'; ?>">
                <div class="nav-link-icon"><i data-feather="archive"></i></div>
                Purchase Order
            </a>
            <?php }if(menucheck($menuprivilegearray, 14)==1 | menucheck($menuprivilegearray, 25)==1){ ?>
            <a class="nav-link p-0 px-3 py-2" href="<?php echo base_url().'Goodreceive'; ?>">
                <div class="nav-link-icon"><i data-feather="truck"></i></div>
                GRN Menu
            </a>
			<div class="collapse <?php if($functionmenu=="Goodreceive"  | $functionmenu=="Directgrn"){echo 'show';} ?>"
				id="collapseJobs" data-parent="#accordionSidenav">
				<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
					<?php if(menucheck($menuprivilegearray, 14)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Goodreceive'; ?>">GRN</a>
					<?php } if(menucheck($menuprivilegearray, 25)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Directgrn'; ?>">Direct Grn</a>
					<?php } ?>
				</nav>
			</div>
            <?php } if(menucheck($menuprivilegearray, 15)==1 | menucheck($menuprivilegearray, 18)==1 | menucheck($menuprivilegearray, 19)==1 | menucheck($menuprivilegearray, 22)==1 | menucheck($menuprivilegearray, 23)==1){ ?>
            <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsereport" aria-expanded="false" aria-controls="collapsereport">
                <div class="nav-link-icon"><i class="fas fa-area-chart"></i></div>
                Reports
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if($functionmenu=="Stockreport" | $functionmenu=="Sectionsalesreport" | $functionmenu=="Materialallocationreport" | $functionmenu=="Employeeallocationreport" | $functionmenu=="Vehiclesearchreport"){echo 'show';} ?>" id="collapsereport" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <?php if(menucheck($menuprivilegearray, 15)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Stockreport'; ?>">Stock Report</a>
                    <?php } if(menucheck($menuprivilegearray, 18)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Sectionsalesreport'; ?>">Section Sales</a>
                    <?php } if(menucheck($menuprivilegearray, 19)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Materialallocationreport'; ?>">Material Allocation Report</a>
                    <?php } if(menucheck($menuprivilegearray, 22)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Employeeallocationreport'; ?>">Employee Allocation</a>
                    <?php } if(menucheck($menuprivilegearray, 23)==1){ ?>
					<a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'Vehiclesearchreport'; ?>">Vehicle Report</a>
                    <?php } ?>
                </nav>
            </div>
            <?php } if(menucheck($menuprivilegearray, 1)==1 | menucheck($menuprivilegearray, 2)==1 | menucheck($menuprivilegearray, 3)==1){ ?>
            <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                <div class="nav-link-icon"><i class="fas fa-user"></i></div>
                User Account
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if($functionmenu=="Useraccount" | $functionmenu=="Usertype" | $functionmenu=="Userprivilege"){echo 'show';} ?>" id="collapseUser" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <?php if(menucheck($menuprivilegearray, 1)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'User/Useraccount'; ?>">User Account</a>
                    <?php } if(menucheck($menuprivilegearray, 2)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'User/Usertype'; ?>">Type</a>
                    <?php } if(menucheck($menuprivilegearray, 3)==1){ ?>
                    <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url().'User/Userprivilege'; ?>">Privilege</a>
                    <?php } ?>
                </nav>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?php echo ucfirst($_SESSION['name']); ?></div>
        </div>
    </div>
</nav>



