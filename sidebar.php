    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="admin_dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
            <!-- Form components -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="users.php">
                            <i class="bi bi-person-fill"></i><span>Users</span>
                        </a>
                    </li>
                    <li>

                    <li>
                        <a href="formattive_form.php">
                            <i class="bi bi-cash-stack"></i><span>Prices</span>
                        </a>
                    </li>
                    <li>
                        <a href="expenses.php">
                        <i class="bi bi-bar-chart-steps"></i><span>Expenses</span>
                        </a>
                    </li>
                </ul>
            </li>
  <!-- Raw Materials -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Inputs & Outputs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="raw-items.php">
                        <i class="bi bi-circle"></i><span>Register Inputs/Outputs Items</span>
                        </a>
                    </li>
                    <li>

                    <li>
                        <a href="rawentry.php">
                        <i class="bi bi-circle"></i><span>Add to Store</span>
                        </a>
                    </li>
                    <li>
                        <a href="rawexit.php">
                            <i class="bi bi-circle"></i><span>Exit from Store</span>
                        </a>
                    </li>

                    <li>
                        <a href="defects.php">
                            <i class="bi bi-circle"></i><span>Record Defects</span>
                        </a>
                    </li>
                  
                </ul>
            </li>
            <!-- END Raw Materials -->

            <!-- RECORDING EXPENSES -->
            <li >
                <a class="nav-link collapsed"  href="expenses_register.php">
                <i class="bi bi-journal-text"></i><span>Record Expenses</span></i>
                </a>
                
            </li>

            <!-- END Recording Expenses -->

            <li >
                <a class="nav-link collapsed"  href="otherincomes.php">
                <i class="bi bi-journal-text"></i><span>Other Incomes</span></i>
                </a>
                
            </li>

            
             
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart-steps"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    
                    <li>
                    <li>
                        <a href="balancerawhr-form.php">
                            <i class="bi bi-cash-stack"></i><span>Product Balances</span>
                        </a>
                    </li>
                    <li>
                        <a href="entries_form.php">
                            <i class="bi bi-cash-stack"></i><span>Entries Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="exit_form.php">
                            <i class="bi bi-cash-stack"></i><span>Exit Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="defects_form.php">
                            <i class="bi bi-circle"></i><span>Defects Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="expenses_form.php">
                            <i class="bi bi-circle"></i><span>Expenses Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="general_form.php">
                            <i class="bi bi-circle"></i><span>General Report</span>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- End Forms Nav -->

            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar-->