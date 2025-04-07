<?php
$controllermenu = $this->router->fetch_class();
$functionmenu = uri_string();
$functionmenu2 = $this->router->fetch_method();
$menuprivilegearray = $menuaccess;

if ($functionmenu2 == 'Useraccount') {
    $addcheck = checkprivilege($menuprivilegearray, 1, 1);
    $editcheck = checkprivilege($menuprivilegearray, 1, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 1, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 1, 4);
} else if ($functionmenu2 == 'Usertype') {
    $addcheck = checkprivilege($menuprivilegearray, 2, 1);
    $editcheck = checkprivilege($menuprivilegearray, 2, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 2, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 2, 4);
} else if ($functionmenu2 == 'Userprivilege') {
    $addcheck = checkprivilege($menuprivilegearray, 3, 1);
    $editcheck = checkprivilege($menuprivilegearray, 3, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 3, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 3, 4);
} else if ($controllermenu == 'Supplier') {
    $addcheck = checkprivilege($menuprivilegearray, 4, 1);
    $editcheck = checkprivilege($menuprivilegearray, 4, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 4, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 4, 4);
} else if ($controllermenu == 'Customer') {
    $addcheck = checkprivilege($menuprivilegearray, 5, 1);
    $editcheck = checkprivilege($menuprivilegearray, 5, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 5, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 5, 4);
} else if ($controllermenu == 'Employee') {
    $addcheck = checkprivilege($menuprivilegearray, 6, 1);
    $editcheck = checkprivilege($menuprivilegearray, 6, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 6, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 6, 4);
} else if ($controllermenu == 'Location') {
    $addcheck = checkprivilege($menuprivilegearray, 7, 1);
    $editcheck = checkprivilege($menuprivilegearray, 7, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 7, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 7, 4);
} else if ($controllermenu == 'Suppliertype') {
    $addcheck = checkprivilege($menuprivilegearray, 8, 1);
    $editcheck = checkprivilege($menuprivilegearray, 8, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 8, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 8, 4);
} else if ($controllermenu == 'Reeltype') {
    $addcheck = checkprivilege($menuprivilegearray, 9, 1);
    $editcheck = checkprivilege($menuprivilegearray, 9, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 9, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 9, 4);
} else if ($controllermenu == 'Gsm') {
    $addcheck = checkprivilege($menuprivilegearray, 10, 1);
    $editcheck = checkprivilege($menuprivilegearray, 10, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 10, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 10, 4);
} else if ($controllermenu == 'Materialmaincategory') {
    $addcheck = checkprivilege($menuprivilegearray, 11, 1);
    $editcheck = checkprivilege($menuprivilegearray, 11, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 11, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 11, 4);
} else if ($controllermenu == 'Rowmaterials') {
    $addcheck = checkprivilege($menuprivilegearray, 12, 1);
    $editcheck = checkprivilege($menuprivilegearray, 12, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 12, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 12, 4);
} else if ($controllermenu == 'Measurements') {
    $addcheck = checkprivilege($menuprivilegearray, 13, 1);
    $editcheck = checkprivilege($menuprivilegearray, 13, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 13, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 13, 4);
} else if ($controllermenu == 'Mainitems') {
    $addcheck = checkprivilege($menuprivilegearray, 14, 1);
    $editcheck = checkprivilege($menuprivilegearray, 14, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 14, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 14, 4);
} else if ($controllermenu == 'Itemprofile') {
    $addcheck = checkprivilege($menuprivilegearray, 15, 1);
    $editcheck = checkprivilege($menuprivilegearray, 15, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 15, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 15, 4);
} else if ($controllermenu == 'Fliinformation') {
    $addcheck = checkprivilege($menuprivilegearray, 16, 1);
    $editcheck = checkprivilege($menuprivilegearray, 16, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 16, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 16, 4);
} else if ($controllermenu == 'Cuttype') {
    $addcheck = checkprivilege($menuprivilegearray, 17, 1);
    $editcheck = checkprivilege($menuprivilegearray, 17, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 17, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 17, 4);
} else if ($controllermenu == 'Machinetype') {
    $addcheck = checkprivilege($menuprivilegearray, 18, 1);
    $editcheck = checkprivilege($menuprivilegearray, 18, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 18, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 18, 4);
} else if ($controllermenu == 'Machine') {
    $addcheck = checkprivilege($menuprivilegearray, 19, 1);
    $editcheck = checkprivilege($menuprivilegearray, 19, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 19, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 19, 4);
} else if ($controllermenu == 'Customerinquiry') {
    $addcheck = checkprivilege($menuprivilegearray, 20, 1);
    $editcheck = checkprivilege($menuprivilegearray, 20, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 20, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 20, 4);
} else if ($controllermenu == 'Jobquotation') {
    $addcheck = checkprivilege($menuprivilegearray, 21, 1);
    $editcheck = checkprivilege($menuprivilegearray, 21, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 21, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 21, 4);
} else if ($controllermenu == 'Purchaseorder') {
    $addcheck = checkprivilege($menuprivilegearray, 22, 1);
    $editcheck = checkprivilege($menuprivilegearray, 22, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 22, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 22, 4);
} else if ($controllermenu == 'Goodreceive') {
    $addcheck = checkprivilege($menuprivilegearray, 23, 1);
    $editcheck = checkprivilege($menuprivilegearray, 23, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 23, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 23, 4);
} else if ($controllermenu == 'AdditionalCost') {
    $addcheck = checkprivilege($menuprivilegearray, 24, 1);
    $editcheck = checkprivilege($menuprivilegearray, 24, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 24, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 24, 4);
}else if ($controllermenu == 'cartontype') {
    $addcheck = checkprivilege($menuprivilegearray, 27, 1);
    $editcheck = checkprivilege($menuprivilegearray, 27, 2);
    $statuscheck = checkprivilege($menuprivilegearray, 27, 3);
    $deletecheck = checkprivilege($menuprivilegearray, 27, 4);
}

function checkprivilege($arraymenu, $menuID, $type)
{
    foreach ($arraymenu as $array) {
        if ($array->menuid == $menuID) {
            if ($type == 1) {
                return $array->add;
            } else if ($type == 2) {
                return $array->edit;
            } else if ($type == 3) {
                return $array->statuschange;
            } else if ($type == 4) {
                return $array->remove;
            }
        }
    }
}
?>
<textarea class="d-none"
    id="actiontext"><?php if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    } ?></textarea>

<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">Core</div>
            <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url() . 'Welcome/Dashboard'; ?>">
                <div class="nav-link-icon"><i class="fas fa-desktop"></i></div>
                Dashboard
            </a>

            <?php if (menucheck($menuprivilegearray, 4) == 1 | menucheck($menuprivilegearray, 5) == 1 | menucheck($menuprivilegearray, 6) == 1 | menucheck($menuprivilegearray, 7) == 1 | menucheck($menuprivilegearray, 8) == 1 | menucheck($menuprivilegearray, 9) == 1 | menucheck($menuprivilegearray, 10) == 1 | menucheck($menuprivilegearray, 10) == 13) { ?>
                <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapsemaster" aria-expanded="false" aria-controls="collapsemaster">
                    <div class="nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                    Master Files
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php if ($functionmenu == "Supplier" | $functionmenu == "Customer" | $functionmenu == "Employee" | $functionmenu == "Location" | $functionmenu == "Suppliertype" | $functionmenu == "Reeltype" | $functionmenu == "Gsm" | $functionmenu == "Measurements" | $functionmenu == "AdditionalCost") {
                    echo 'show';
                } ?>"
                    id="collapsemaster" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <?php if (menucheck($menuprivilegearray, 4) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'Supplier'; ?>">Suppliers</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 5) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'Customer'; ?>">Customers</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 6) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'Employee'; ?>">Employees</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 7) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Location'; ?>">Location</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 8) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Suppliertype'; ?>">Supplier
                                Type</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 9) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Reeltype'; ?>">Reel
                                Type</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 10) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Gsm'; ?>">GSM</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 13) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'Measurements'; ?>">Measurments</a>
                        <?php } 
                        if (menucheck($menuprivilegearray, 23) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'AdditionalCost'; ?>">AdditionalCost</a>
                        <?php } 
                        if (menucheck($menuprivilegearray, 27) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'cartontype'; ?>">Carton Type</a>
                        <?php } 
                        
                        ?>
                    </nav>
                </div>
            <?php }
            if (menucheck($menuprivilegearray, 11) == 1 | menucheck($menuprivilegearray, 12) == 1 | menucheck($menuprivilegearray, 16) == 1 | menucheck($menuprivilegearray, 17) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapsematerial" aria-expanded="false" aria-controls="collapsematerial">
                    <div class="nav-link-icon"><i class="fa fa-cogs"></i></div>
                    Material Data
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php if ($functionmenu == "Materialmaincategory" | $functionmenu == "Rowmaterials" | $functionmenu == "Fliinformation" | $functionmenu == "Cuttype") {
                    echo 'show';
                } ?>"
                    id="collapsematerial" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <?php if (menucheck($menuprivilegearray, 11) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'Materialmaincategory'; ?>">Material Main Category</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 12) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Rowmaterials'; ?>">Row
                                Materials</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 16) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Fliinformation'; ?>">Fli
                                Information</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 17) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Cuttype'; ?>">Cut Type</a>
                        <?php } ?>
                    </nav>
                </div>
            <?php }
            if (menucheck($menuprivilegearray, 18) == 1 | menucheck($menuprivilegearray, 19) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapsemachine" aria-expanded="false" aria-controls="collapsemachine">
                    <div class="nav-link-icon"><i class="fa fa-cubes"></i></div>
                    Machine Data
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php if ($functionmenu == "Machinetype" | $functionmenu == "Machine") {
                    echo 'show';
                } ?>"
                    id="collapsemachine" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <?php if (menucheck($menuprivilegearray, 18) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Machinetype'; ?>">Machine
                                Type</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 19) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Machine'; ?>">Machines</a>
                        <?php } ?>
                    </nav>
                </div>
            <?php }
            if (menucheck($menuprivilegearray, 14) == 1 | menucheck($menuprivilegearray, 15) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapsemainitem" aria-expanded="false" aria-controls="collapsemainitem">
                    <div class="nav-link-icon"><i class="fa fa-cubes"></i></div>
                    Item Data
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php if ($functionmenu == "Mainitems" | $functionmenu == "Itemprofile") {
                    echo 'show';
                } ?>"
                    id="collapsemainitem" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <?php if (menucheck($menuprivilegearray, 14) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Mainitems'; ?>">Main
                                Items</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 15) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'Itemprofile'; ?>">Item
                                Profiles</a>
                        <?php } ?>
                    </nav>
                </div>
                <!-- Delete Item Menu New Added -->
            <?php }
            if (menucheck($menuprivilegearray, 20) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url() . 'Customerinquiry'; ?>">
                    <div class="nav-link-icon"><i class="fas fa-search-dollar"></i></div>
                    Customer Inquiry
                </a>
            <?php }
            if (menucheck($menuprivilegearray, 21) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url() . 'Jobquotation'; ?>">
                    <div class="nav-link-icon"><i class="fas fa-search-dollar"></i></div>
                    Job Quotation
                </a>
            <?php }
            if (menucheck($menuprivilegearray, 22) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url() . 'Purchaseorder'; ?>">
                    <div class="nav-link-icon"><i class="fas fa-search-dollar"></i></div>
                    Customer Purchase Order
                </a>
            <?php }
            if (menucheck($menuprivilegearray, 23) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 text-dark" href="<?php echo base_url() . 'Goodreceive'; ?>">
                    <div class="nav-link-icon"><i class="fas fa-search-dollar"></i></div>
                    Good Recieve
                </a>
            <?php }
            if (menucheck($menuprivilegearray, 1) == 1 | menucheck($menuprivilegearray, 2) == 1 | menucheck($menuprivilegearray, 3) == 1) { ?>
                <a class="nav-link p-0 px-3 py-2 collapsed text-dark" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                    <div class="nav-link-icon"><i class="fas fa-user"></i></div>
                    User Account
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php if ($functionmenu == "Useraccount" | $functionmenu == "Usertype" | $functionmenu == "Userprivilege") {
                    echo 'show';
                } ?>"
                    id="collapseUser" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <?php if (menucheck($menuprivilegearray, 1) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark" href="<?php echo base_url() . 'User/Useraccount'; ?>">User
                                Account</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 2) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'User/Usertype'; ?>">Type</a>
                        <?php }
                        if (menucheck($menuprivilegearray, 3) == 1) { ?>
                            <a class="nav-link p-0 px-3 py-1 text-dark"
                                href="<?php echo base_url() . 'User/Userprivilege'; ?>">Privilege</a>
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