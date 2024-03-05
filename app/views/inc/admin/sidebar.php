<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?= URLROOT ;?>/dist/img/AdminLTELogo.png" alt="AdminLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MITRE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= URLROOT?>/admin/dashboard" class="nav-link">    
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Database
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/admin/students/<?php echo JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo JUNIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/admin/students/<?php echo SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo SENIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/admin/alumni_2024" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/admin/add/<?php echo JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo JUNIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/admin/add/<?php echo SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo SENIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= URLROOT ;?>/alumni/register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni Registration</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Attendance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/attendance/<?php echo JUNIOR;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo JUNIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/attendance/<?php echo SENIOR;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set <?php echo SENIOR;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/admin/sorting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sort Attendance</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Culmulative
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?php echo URLROOT;?>/portal/add_mark" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Mark</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/admin/culmulative" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Culmulative</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Scoring (Long Paper)
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_kaduna/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kaduna Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_ufuma/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ufuma Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_minna/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minna Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_kaduna/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kaduna Set <?= JUNIOR?></p>
                   </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_Ufuma/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ufuma Set <?= JUNIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/long_paper_minna/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minna Set <?= JUNIOR?></p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Scoring (Short Paper)
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_kaduna/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kaduna Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_ufuma/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ufuma Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_minna/<?= SENIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minna Set <?= SENIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_kaduna/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kaduna Set <?= JUNIOR?></p>
                   </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_Ufuma/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ufuma Set <?= JUNIOR?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT;?>/papers/short_paper_minna/<?= JUNIOR?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minna Set <?= JUNIOR?></p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= URLROOT?>/admin/media" class="nav-link">
            <i class="nav-icon fas fa-camera"></i>
              <p>
                Media
              </p>
            </a>
          </li>
          
         <li class="nav-item">
            <a href="<?= URLROOT?>/portal/settings" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
              <p>
                General Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= URLROOT?>/portal/logout" class="nav-link">
            <i class="nav-icon fas fa-backward"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>