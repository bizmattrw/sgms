    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="admin_dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span> Operator's Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
            <!-- Form components -->

            
  <!-- Raw Materials -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Inputs & Outputs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                   
                    <li>

                    <li>
                        <a href="rawentry_operator.php">
                        <i class="bi bi-circle"></i><span>Add to Store</span>
                        </a>
                    </li>
                    <li>
                        <a href="rawexit_operator.php">
                            <i class="bi bi-circle"></i><span>Exit from Store</span>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="defects.php">
                            <i class="bi bi-circle"></i><span>Record Defects</span>
                        </a>
                    </li> -->
                  
                </ul>
            </li>
            <!-- END Raw Materials -->

            <!-- RECORDING EXPENSES -->
            <!-- <li >
                <a class="nav-link collapsed"  href="expenses_register.php">
                <i class="bi bi-journal-text"></i><span>Record Expenses</span></i>
                </a>
                
            </li> -->

            <!-- END Recording Expenses -->

            <!-- <li >
                <a class="nav-link collapsed"  href="otherincomes.php">
                <i class="bi bi-journal-text"></i><span>Other Incomes</span></i>
                </a>
                
            </li> -->

            
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