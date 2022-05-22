
<style>
</style>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                   class="brand-logo"><i
                class="fas fa-money-check-alt"></i> <span>LOAN</span></a></header>
        <nav class="dashboard-nav-list"><a href="index.php?page=home" class="dashboard-nav-item"><i class="fas fa-home"></i>
            Home </a>
        

        <?php if($_SESSION['login_type'] == 3): ?>
        <a href="dashboard.php?page=loan_list" class="dashboard-nav-item payments"><i class="fas fa-money-bill"></i> Loan </a>
        <a href="dashboard.php?page=history" class="dashboard-nav-item payments"><i class="fas fa-money-bill"></i> Payments </a>
        <a href="dashboard.php?page=wallet" class="dashboard-nav-item borrowers"><i class="fas fa-list-alt"></i> Wallet </a>
        <a href="dashboard.php?page=profile" class="dashboard-nav-item plan"><i class="fas fa-user-friends"></i>Profile setting  </a>

        <?php endif; ?>


        <?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2): ?>

            <a href="index.php?page=loans" class="dashboard-nav-item loans "><i class="fas fa-file-invoice-dollar"></i> Loan
        </a>
        <a href="index.php?page=payments" class="dashboard-nav-item payments"><i class="fas fa-money-bill"></i> Payments </a>
        <a href="index.php?page=borrowers" class="dashboard-nav-item borrowers"><i class="fas fa-user-friends"></i> Borrowers </a>
        <a href="index.php?page=plan" class="dashboard-nav-item plan"><i class="fas fa-list-alt"></i> Loan Plans </a>


            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                    class="fas fa-users"></i> Users </a>
                <div class='dashboard-nav-dropdown-menu'><a href="index.php?page=users"
                                                            class="dashboard-nav-dropdown-item">All</a><a
                        href="index.php?page=kyc_pending" class="dashboard-nav-dropdown-item">Kyc Pending</a><a
                        href="index.php?page=kyc_approve"
                        class="dashboard-nav-dropdown-item">Kyc Approve</a><a
                        href="#" class="dashboard-nav-dropdown-item">Banned</a><a
                        href="#" class="dashboard-nav-dropdown-item">New</a></div>
            </div>

            <?php endif; ?>

<!--             <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                    class="fas fa-money-check-alt"></i> Payments </a>
                <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                            class="dashboard-nav-dropdown-item">All</a><a
                        href="#" class="dashboard-nav-dropdown-item">Recent</a><a
                        href="#" class="dashboard-nav-dropdown-item"> Projections</a>
                </div>
            </div>
            <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a
                    href="#" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a> -->
          <div class="nav-item-divider"></div>
          <a
                    href="ajax.php?action=logout" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>



<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
