<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
  <link href="{{ asset('template/assets/img/fav.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/fav.png') }}" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
  
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Apr 20 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="{{ asset('template/assets/img/fav.png') }}" alt="">
        <span class="d-none d-lg-block">BookAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('template/assets/img/profile-img.jpg') }}"  alt="Profile" class="rounded-circle">
            <span class=" ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header --><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-bar-chart-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cart-fill"></i><span>Katalog Produk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('data') }}">
              <i class="bi bi-circle"></i><span>Daftar Buku</span>
            </a>
          </li>
          <li>
            <a href="" class="active">
              <i class="bi bi-circle"></i><span>Kategori Buku</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-bag-check-fill"></i>
          <span>Pembelian</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Daftar Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Daftar Kategori</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                                <i class="bi bi-plus-square"></i> Tambah
                            </button>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                @foreach ($kategoris as $kategori)
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $kategori->nama }}</h5>
                                            <!-- Tombol Edit -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKategoriModal{{ $kategori->id }}">Edit</button>
                                            <!-- Form Hapus -->
                                            <form action="{{ route('hapuskategori', $kategori->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Modal Edit Kategori -->
                                <div class="modal fade" id="editKategoriModal{{ $kategori->id }}" tabindex="-1" aria-labelledby="editKategoriModalLabel{{ $kategori->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editKategoriModalLabel{{ $kategori->id }}">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('editkategori', $kategori->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="namaKategori{{ $kategori->id }}" class="form-label">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="namaKategori{{ $kategori->id }}" name="namaKategori" value="{{ $kategori->nama }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('tambahkategori') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="namaKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="namaKategori" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    </section>
      
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
  
</body>

</html>