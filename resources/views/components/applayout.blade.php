<!DOCTYPE html>


<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>SIGAP - {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/landing-page/assets/images/tutwuri.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/template/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/template/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/template/assets/js/config.js"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="/template/assets/vendor/libs/jquery/jquery.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="/template/assets/vendor/libs/popper/popper.js"></script>
    <script src="/template/assets/vendor/js/bootstrap.js"></script>
    <script src="/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    {{-- datatables --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>

    <style>
      .required:after {
        content:" *";
        color: red;
      }

      .hidden {
        display: none; 
      }

      .notification {

        /* circle shape, size and position */
        position: absolute;
        right: -0.3em;
        top: -0.3em;
        min-width: 1.6em; /* or width, explained below. */
        height: 1.6em;
        border-radius: 0.8em; /* or 50%, explained below. */
        border: 0.05em solid white;
        background-color: red;

        /* number size and position */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.6em;
        color: white;
      }

      @media only screen and (max-width: 600px) {
        .notification {

          /* circle shape, size and position */
          position: absolute;
          right: 1.5em;
          top: 1.2Fem;
          min-width: 1.6em; /* or width, explained below. */
          height: 1.6em;
          border-radius: 0.8em; /* or 50%, explained below. */
          border: 0.05em solid white;
          background-color: red;
        }
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('dashboard.index') }}" class="app-brand-link">
              {{-- <span class="app-brand-logo demo">
                <img width="60" src="/landing-page/assets/images/tutwuri.png">
              </span> --}}
              <span class="app-brand-text demo menu-text fw-bolder ms-2">SIGAP</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            
            <li class="menu-item {{ Request::is('dashboard', 'dashboard/*') ? 'active' : '' }}">
              <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            
            <li class="menu-item {{ Request::is('manajemen-pegawai', 'manajemen-pegawai/*') ? 'active' : '' }}">
              <a href="{{ route('manajemen-pegawai.list-pegawai') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Dashboard">Manajemen Pegawai</div>
              </a>
            </li>
            
            <li class="menu-item {{ Request::is('manajemen-admin', 'manajemen-admin/*') ? 'active' : '' }}">
              <a href="{{ route('manajemen-admin.list-admin') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Dashboard">Manajemen Admin</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              {{-- <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search --> --}}

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <b>Halo</b>, {{ Auth::user()->name }}
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class='bx bxs-user-circle'></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="/template/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li> --}}
                    <li>
                      <a class="dropdown-item" href="/logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
                <!-- Notification -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" id="notificationDropdown" onclick="readAllNotif()" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (count($notifications) > 0)
                    <div class="notification" id="badge-notif" role="status">{{count($notifications)}}</div>
                    @endif
                    <i class='bx bxs-bell'></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-menu-header border-bottom">
                      <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto">Notification</h6>
                      </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container ps ps--active-y">
                      <ul class="list-group list-group-flush">
                        @foreach ($allNotif as $notif)
                        <li class="list-group-item list-group-item-action dropdown-notifications-item" id="notification-item">
                          <a href="{{$notif['url']}}">
                            <div class="flex-grow-1">
                              <h6 class="small mb-0">{{$notif['title']}} ✉️</h6>
                              <small class="mb-1 d-block text-body">{{strtok($notif['message'], '.')}}</small>
                              <small class="text-muted">{{ date("Y-m-d", strtotime($notif['created_at']))}}</small>
                            </div>
                          </a>
                        </li>
                        
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </li>
                <!--/ Notification -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div
                  class="bs-toast toast toast-placement-ex m-2 toast-welcome"
                  role="alert"
                  aria-live="assertive"
                  aria-atomic="true"
                  data-delay="100"
                >
                  <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Halo, </div>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">{{ session('WELCOME') }}.</div>
                </div>
                <div
                  class="bs-toast toast toast-placement-ex m-2 toast-notif"
                  role="alert"
                  aria-live="assertive"
                  aria-atomic="true"
                  data-delay="100"
                >
                  <div class="toast-header">
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">{{ session('OK') ?? session('ERR') }}.</div>
                </div>
                {{ $slot }}
            </div>
            <!-- / Content -->

            <!-- Footer -->
            {{-- <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div> --}}
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <script src="/template/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/template/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/template/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/template/assets/js/dashboards-analytics.js"></script>
    <script src="/template/assets/js/ui-toasts.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    

    {{-- <script src="/template/js/signature-pad.js"></script> --}}
    <script>
        const toastPlacementExampleWelcome = document.querySelector('.toast-welcome')
        const toastPlacementExampleNotif = document.querySelector('.toast-notif')
    </script>
    @if (session('ERR'))
<script>
    selectedType = 'bg-danger';
    selectedPlacement = 'top-0 end-0'.split(' ');

    toastPlacementExampleNotif.classList.add(selectedType);
    DOMTokenList.prototype.add.apply(toastPlacementExampleNotif.classList, selectedPlacement);
    toastPlacement = new bootstrap.Toast(toastPlacementExampleNotif);
    toastPlacement.show();
</script>
@endif
    @if (session('OK'))
<script>
    selectedType = 'bg-primary';
    selectedPlacement = 'top-0 end-0'.split(' ');

    toastPlacementExampleNotif.classList.add(selectedType);
    DOMTokenList.prototype.add.apply(toastPlacementExampleNotif.classList, selectedPlacement);
    toastPlacement = new bootstrap.Toast(toastPlacementExampleNotif);
    toastPlacement.show();
</script>
@endif
    @if (session('WELCOME'))
<script>
    selectedType = 'bg-primary';
    selectedPlacement = 'top-0 start-50 translate-middle-x'.split(' ');

    toastPlacementExampleWelcome.classList.add(selectedType);
    DOMTokenList.prototype.add.apply(toastPlacementExampleWelcome.classList, selectedPlacement);
    toastPlacement = new bootstrap.Toast(toastPlacementExampleWelcome);
    toastPlacement.show();
</script>
@endif
    <script>
        $('table tbody').on('click', '#btn-delete', function() {
            console.log("test");
            var url = $(this).data('url');
            if (confirm(
                    'Data yang sudah dihapus tidak bisa dikembalikan. Apakah anda yakin akan menghapus data tersebut?'
                )) {
                window.location.href = url;
            } else {
                return false;
            }
        });
    </script>
    <script>
        $('table tbody').on('click', '#btn-show', function() {
            var url = $(this).data('url'); // Ambil URL dari data-url di tombol
            var id = $(this).data('id'); // Ambil ID dari data-id di tombol

            // Redirect ke URL yang ditentukan
            window.location.href = url;
        });
    </script>
    <script>
      function archiveNotification(event) {
        event.stopPropagation(); // Mencegah dropdown menutup saat klik

        const notificationItem = document.getElementById('notification-item');
        if (notificationItem) {
          notificationItem.classList.add('hidden'); // Menyembunyikan item notifikasi
        }
      }

      function readAllNotif() {

        var el = document.getElementById("badge-notif");

        el.style.display = 'none';

        $.ajax({
            method: "GET",
            url: "{{ route('notification.read-all') }}",
        }).done(function(response) {
          //do nothing
        });

      }

      function loadNotif() {

        $.ajax({
            method: "GET",
            url: "{{ route('notification.load-all') }}",
        }).done(function(response) {
          const notif = document.getElementById('badge-notif');
          if (response.unReadNotif > 0) {
            
            if (!notif) {
              document.getElementById('notificationDropdown').innerHTML = '<div class="notification" id="badge-notif" role="status">'+response.unReadNotif+'</div>';
            }
            notif.style.display = 'flex';
            notif.innerHTML = response.unReadNotif;
          }
        });
        setTimeout(loadNotif, 5000);
      }

      loadNotif();
</script>
  </body>
</html>
