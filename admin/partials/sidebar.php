<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'dashboard')) { echo 'collapsed'; }?>" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'site-info')) { echo 'collapsed'; }?>" href="site-info.php">
                <i class="bi bi-grid"></i>
                <span>Site Info</span>
            </a>
        </li>

        <!-- ============================================================ -->

<!--         
        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'questions')) { echo 'collapsed'; }?>" data-bs-target="#question-nav" data-bs-toggle="collapse" href="#" <?php if (str_contains($_SERVER['PHP_SELF'], 'questions')) { echo 'aria-expanded="true"'; }?>>
                <i class="bi bi-journal-text"></i></i><span>Questions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="question-nav" class="nav-content collapse <?php if (str_contains($_SERVER['PHP_SELF'], 'questions')) { echo 'show'; }?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="questions.php" <?php if (str_contains($_SERVER['PHP_SELF'], 'questions')) { echo 'class="active"'; }?>>
                        <i class="bi bi-circle"></i><span>Questions</span>
                    </a>
                </li>
            </ul>
        </li> -->

        <!-- ============================================================= -->

        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'services')) { echo 'collapsed'; }?>" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#" <?php if (str_contains($_SERVER['PHP_SELF'], 'services')) { echo 'class="active"'; }?>>
            <i class="bi bi-bookmark-heart"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="services-nav" class="nav-content collapse <?php if (str_contains($_SERVER['PHP_SELF'], 'services')) { echo 'show'; }?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="services.php" <?php if (str_contains($_SERVER['PHP_SELF'], 'services')) { echo 'class="active"'; }?>>
                        <i class="bi bi-circle"></i><span>Services</span>
                    </a>
                </li>

                <li>
                    <a href="child-services.php" <?php if (str_contains($_SERVER['PHP_SELF'], 'child-services')) { echo 'class="active"'; }?>>
                        <i class="bi bi-circle"></i><span>Child Services</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'projects')) { echo 'collapsed'; }?>" data-bs-target="#projects-nav" data-bs-toggle="collapse" href="#" <?php if (str_contains($_SERVER['PHP_SELF'], 'services')) { echo 'class="active"'; }?>>
            <i class="bi bi-bookmark-heart"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="projects-nav" class="nav-content collapse <?php if (str_contains($_SERVER['PHP_SELF'], 'projects')) { echo 'show'; }?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="projects.php" <?php if (str_contains($_SERVER['PHP_SELF'], 'projects')) { echo 'class="active"'; }?>>
                        <i class="bi bi-circle"></i><span>Projects</span>
                    </a>
                </li>

            </ul>
        </li>

        <!-- ============================================================= -->
        
        <li class="nav-item">
            <a class="nav-link <?php if (!str_contains($_SERVER['PHP_SELF'], 'user')) { echo 'collapsed'; }?>" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#" <?php if (str_contains($_SERVER['PHP_SELF'], 'user')) { echo 'class="active"'; }?>>
                <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse <?php if (str_contains($_SERVER['PHP_SELF'], 'user')) { echo 'show'; }?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="users.php" <?php if (str_contains($_SERVER['PHP_SELF'], 'user')) { echo 'class="active"'; }?>>
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Dashboard Nav -->

        <!-- ============================================================= -->



        

        <li class="nav-heading">Pages</li>

   
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'faq') { echo 'collapsed'; }?>" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="register-admin.php">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.php">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

    </ul>

</aside>