 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#client" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i><span>Client</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="client" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('client.index') }}">
            <i class="bi bi-circle"></i><span>Client List</span>
          </a>
        </li>
        <li>
          <a href="{{ route('client.create') }}">
            <i class="bi bi-circle"></i><span>Create Client</span>
          </a>
        </li>
    
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#lead" data-bs-toggle="collapse" href="#">
        <i class="bi bi-lightning-charge"></i><span>Lead</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="lead" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('lead.index') }}">
            <i class="bi bi-circle"></i><span>Lead List</span>
          </a>
        </li>
        <li>
          <a href="{{ route('lead.create') }}">
            <i class="bi bi-circle"></i><span>Create Lead</span>
          </a>
        </li>
    
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#setting-setting" data-bs-toggle="collapse" href="#">
        <i class="bi bi-wrench"></i><span>System Setting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="setting-setting" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('system-setting.edit',2) }}">
            <i class="bi bi-circle"></i><span>Update system</span>
          </a>
        </li>
      </ul>
    </li>

{{-- Char OF Account --}}
{{-- <li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#chart-account" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Chart OF Account</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="chart-account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="{{route('account-create')}}">
        <i class="bi bi-circle"></i><span>Create Chart Account</span>
      </a>
    </li>
    <li>
      <a href="{{route('account-list')}}">
        <i class="bi bi-circle"></i><span>Chart Account List</span>
      </a>
    </li>
    <li>
      <a href="{{route('account-opening')}}">
        <i class="bi bi-circle"></i><span>Chart Opening Balance</span>
      </a>
    </li>


  </ul>
</li> --}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-sliders"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('users.index')}}">
            <i class="bi bi-circle"></i><span>User List</span>
          </a>
        </li>
        <li>
          <a href="{{route('roles.index')}}">
            <i class="bi bi-circle"></i><span>Role List</span>
          </a>
        </li>
        <li>
          <a href="{{route('permission.index')}}">
            <i class="bi bi-circle"></i><span>Permission List</span>
          </a>
        </li>

  
      </ul>
    </li>
    <!-- End Components Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#web-setting-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Web Setting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="web-setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('sliders.index') }}">
            <i class="bi bi-circle"></i><span>Slider</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e('roles')?>">
            <i class="bi bi-circle"></i><span>Card</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>About Us</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Status</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Why Chose Us</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Service</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Our Team</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Case Study</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Case Study Child</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Testimonal</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Qoute</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('logout') }}"  onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-in-right"></i>
        logout
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>
      </a>
    </li>





















{{-- 
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Alerts</span>
          </a>
        </li>
        <li>
          <a href="components-accordion.html">
            <i class="bi bi-circle"></i><span>Accordion</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span>Badges</span>
          </a>
        </li>
        <li>
          <a href="components-breadcrumbs.html">
            <i class="bi bi-circle"></i><span>Breadcrumbs</span>
          </a>
        </li>
        <li>
          <a href="components-buttons.html">
            <i class="bi bi-circle"></i><span>Buttons</span>
          </a>
        </li>
        <li>
          <a href="components-cards.html">
            <i class="bi bi-circle"></i><span>Cards</span>
          </a>
        </li>
        <li>
          <a href="components-carousel.html">
            <i class="bi bi-circle"></i><span>Carousel</span>
          </a>
        </li>
        <li>
          <a href="components-list-group.html">
            <i class="bi bi-circle"></i><span>List group</span>
          </a>
        </li>
        <li>
          <a href="components-modal.html">
            <i class="bi bi-circle"></i><span>Modal</span>
          </a>
        </li>
        <li>
          <a href="components-tabs.html">
            <i class="bi bi-circle"></i><span>Tabs</span>
          </a>
        </li>
        <li>
          <a href="components-pagination.html">
            <i class="bi bi-circle"></i><span>Pagination</span>
          </a>
        </li>
        <li>
          <a href="components-progress.html">
            <i class="bi bi-circle"></i><span>Progress</span>
          </a>
        </li>
        <li>
          <a href="components-spinners.html">
            <i class="bi bi-circle"></i><span>Spinners</span>
          </a>
        </li>
        <li>
          <a href="components-tooltips.html">
            <i class="bi bi-circle"></i><span>Tooltips</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <!-- End Components Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="forms-elements.html">
            <i class="bi bi-circle"></i><span>Form Elements</span>
          </a>
        </li>
        <li>
          <a href="forms-layouts.html">
            <i class="bi bi-circle"></i><span>Form Layouts</span>
          </a>
        </li>
        <li>
          <a href="forms-editors.html">
            <i class="bi bi-circle"></i><span>Form Editors</span>
          </a>
        </li>
        <li>
          <a href="forms-validation.html">
            <i class="bi bi-circle"></i><span>Form Validation</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <!-- End Forms Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="tables-general.html">
            <i class="bi bi-circle"></i><span>General Tables</span>
          </a>
        </li>
        <li>
          <a href="tables-data.html">
            <i class="bi bi-circle"></i><span>Data Tables</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <!-- End Tables Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="charts-chartjs.html">
            <i class="bi bi-circle"></i><span>Chart.js</span>
          </a>
        </li>
        <li>
          <a href="charts-apexcharts.html">
            <i class="bi bi-circle"></i><span>ApexCharts</span>
          </a>
        </li>
        <li>
          <a href="charts-echarts.html">
            <i class="bi bi-circle"></i><span>ECharts</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <!-- End Charts Nav -->
{{-- 
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="icons-bootstrap.html">
            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
          </a>
        </li>
        <li>
          <a href="icons-remix.html">
            <i class="bi bi-circle"></i><span>Remix Icons</span>
          </a>
        </li>
        <li>
          <a href="icons-boxicons.html">
            <i class="bi bi-circle"></i><span>Boxicons</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <!-- End Icons Nav -->

    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
      </a>
    </li><!-- End Blank Page Nav --> --}}

  </ul>

</aside><!-- End Sidebar-->
          