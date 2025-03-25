<?php include('header-contents.php'); ?>
<?php include('top-nav-bar.php'); ?>

<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon primary">
                        <img src="./feather-icons/user.svg" style="width: px;" alt="">
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Jason Mason</p>
                        <p class="stat-cards-info__title">00:00am</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <i data-feather="trending-up" aria-hidden="true"></i>Pending
                            </span>
                        </p>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="users-table table-wrapper">
                    <table class="table table-striped">
                        <thead>
                            <tr class="users-table-info">
                                <th>Name</th>
                                <th>Area</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Client name here
                                </td>
                                <td>
                                    Wolverhampton
                                </td>
                                <td><span class="badge-pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ! Footer -->

<?php include('footer-contents.php'); ?>