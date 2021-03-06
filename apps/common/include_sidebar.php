

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="../assets/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="../view/dashboard.php" class="nav-link " id="item">
                    <i class="fas fa-fw fa-tachometer-alt"></i>

                    <p>
                        DashBoard

                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview " id="ordersMenu">
                <a href="../view/webOrder.php" class="nav-link" id="order">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Order
<!--                        <i class="fas fa-angle-right right"></i>-->
                    </p>
                </a>

                <!--                 <a href="#" class="nav-link" id="order">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Order
                                        <i class="fas fa-angle-right right"></i>
                                    </p>
                                </a>-->
                <!--                <ul class="nav nav-treeview ">
                                    <li class="nav-item ">
                                        <a href="../view/storeOrder.php" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shop Orders</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../view/webOrder.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Web Orders</p>
                                        </a>
                                    </li>
                                </ul>-->
            </li>

            <li class="nav-item has-treeview" id="scheduleMenu">
                <a href="#" class="nav-link" id="schedule">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        Schedule
                        <i class="fas fa-angle-right right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../view/schedule.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Schedule</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/viewAllPickUpDelivery.php" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Today's Pick up & Delivery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/scheduleplan.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Schedule Planner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/collectionmap.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Collection Map</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="" class="nav-link" id="task">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Task

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../view/Task.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Task</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../view/taskSummery.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Task Summery</p>
                        </a>
                    </li>
                </ul>
                <!--
                    <li class="nav-item">
                        <a href="../pages/forms/advanced.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Advanced Elements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/forms/editors.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Editors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/forms/validation.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Validation</p>
                        </a>
                    </li>
                </ul> -->
            </li>
            <li class="nav-item">
                <a href="item.php" class="nav-link " id="item">
                    <i class="nav-icon fas fa-tshirt"></i>
                    <p>
                        Item

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../view/category.php" class="nav-link" id="category">
                    <i class="nav-icon fas fa-grip-horizontal"></i>
                    <p>
                        Category

                    </p>
                </a>
            </li>
            <!--            <li class="nav-item">
                            <a href="service.php" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Service

                                </p>
                            </a>
                        </li>-->
            <li class="nav-item">
                <a href="customer.php" class="nav-link" id="customer">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Customer

                    </p>
                </a>
            </li>

            <!--            <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="driver">
                                <i class="nav-icon fas fa-id-card"></i>


                                <p>
                                    Driver
                                </p>
                                <i class="fas fa-angle-right right"></i>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../view/Jobs.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jobs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../view/LeaveDrivers.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave</p>
                                    </a>
                                </li>

                            </ul>
                        </li>-->

            <li class="nav-item has-treeview">
                <a href="employee.php" class="nav-link" id="employee">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Employee
        <!--                <i class="right fas fa-angle-left"></i>-->
                    </p>
                </a>

            </li>




            <li class="nav-item has-treeview" >
                <a href="vehicle.php" class="nav-link" id="vehicle">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Vehicle

                    </p>
                </a>

            </li>
            <!--            <li class="nav-item">
                            <a href="customer.php" class="nav-link" id="loyalty">
                                <i class="nav-icon fas fa-gift"></i>
                                <p>
                                    Loyalty
                                </p>
                            </a>
                        </li>-->
            <li class="nav-item has-treeview " id="reportMenu">
                <a href="#" class="nav-link " id="report">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        Report
                        <i class="fas fa-angle-right right"></i>
                    </p>

                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="../view/reportincome.php" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Income Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/reportOrder.php" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/reporttasks.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Task Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../view/reportcustomer.php" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Customer Report</p>
                        </a>
                    </li>


                </ul>
            </li>
            <!--
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
                <a href="pages/calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Gallery
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Mailbox
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/compose.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compose</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/read-mail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Pages
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/examples/invoice.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/profile.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/e-commerce.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>E-commerce</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/projects.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/project-add.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/project-edit.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Edit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/project-detail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Project Detail</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/contacts.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Extras
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/examples/login.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/register.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Register</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/forgot-password.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Forgot Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/recover-password.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Recover Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/lockscreen.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lockscreen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Legacy User Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/language-menu.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Language Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/404.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 404</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/500.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 500</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/pace.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pace</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/blank.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blank Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="starter.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Starter Page</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
                <a href="https://adminlte.io/docs/3.0" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                </a>
            </li>
            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Level 1
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Level 2
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                </a>
            </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Important</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Warning</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>Informational</p>
                </a>
            </li>
            -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<style>
  /* side nav bar  */
.main-sidebar.sidebar-light-primary{
  bottom: 0;
  float: none;
  height: 100vh;
  left: 0;
  position: fixed;
  top: 0;
  overflow:scroll;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.main-sidebar.sidebar-light-primary::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.main-sidebar.sidebar-light-primary{
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
