<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('home/images/fav.png') }}" type="image/x-icon">

  <title>
    SofiBook
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}"  />

  <!-- Custom styles for this template -->
  <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>

  <body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
  
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand">
              <span>
                SofiBook
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#shop">
                    Shop
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#why">
                    Why Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#testi">
                    Testimonial
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact Us</a>
                </li>
              </ul>
              @if (empty(auth()->user()))
              <div class="user_option">
                <a href="{{ route('login') }}">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    Login
                  </span>
                </a>
              </div>
              @else
              <a href="/logout"> <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }}</a>
              @endif
            </div>
          </nav>
        </header>
        <!-- end header section -->
        <main id="main">
            <section id="product" class="pricing" style="margin-top: 75px; min-height: 100vh;">
                <div class="container" data-aos="fade-up">
        
                    <div class="row gy-4 align-items-center justify-content-center">
                        <div class="col-lg-8" data-aos="zoom-in" data-aos-delay="600">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="pricing-item">
                                                <div class="img">
                                                    <img src="{{ asset($book->produk) }}" alt="{{ $book->judul_buku }}" class="img-fluid">
                                                </div>
                                                <div class="mx-3">
                                                    <h3>{{ $book->judul_buku }}</h3>
                                                    <table>
                                                        <tr>
                                                            <th>Harga</th>
                                                            <td style="width: 75px; text-align:center">:</td>
                                                            <td>Rp. {{ number_format($book->harga, 0, ',', '.') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Stok Barang</th>
                                                            <td style="width: 75px; text-align:center">:</td>
                                                            <td>{{ $book->stok }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Terjual</th>
                                                            <td style="width: 75px; text-align:center">:</td>
                                                            <td>{{ $book->terjual }} produk</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kategori Produk</th>
                                                            <td style="width: 75px; text-align:center">:</td>
                                                            <td>{{ $book->kategori }}</td>
                                                        </tr>
                                                    </table>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <button style="margin: 25px 0px" type="button" class="btn btn-outline-secondary shadow-none" onclick="history.back()">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pricing-item">
                                                <div class="mx-3">
                                                    <h5 class="text-center m-3"><b>Pembayaran Produk</b></h5>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form action="/penjualan" method="post" name="autoSumForm">
                                                                @csrf
                                                                <input type="hidden" name="produk_id" class="form-control shadow-none" value="{{ $book->id }}">
                                                                <input type="hidden" name="harga" id="harga" class="form-control shadow-none" value="{{ $book->harga }}" disabled>
        
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                                                                        <input type="number" name="jumlah" min="0" max="{{ $book->stok }}" id="jumlah" class="form-control shadow-none" value="" placeholder="tersedia {{ $book->stok }} item" oninput="calculateTotal()">
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label fw-bold">Total</label>
                                                                        <input type="number" name="total" id="total" class="form-control shadow-none" readonly value="">
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                                                                        <textarea name="alamat" rows="2" class="form-control shadow-none">jalan kenangan</textarea>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="pesan" class="form-label fw-bold">Pesan</label>
                                                                        <textarea name="pesan" rows="2" class="form-control shadow-none"></textarea>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="metode_pembayaran" class="form-label fw-bold">Metode Pembayaran</label>
                                                                        <select class="form-select" aria-label="Default select example" name="metode_pembayaran">
                                                                            <option selected disabled>Pilih Metode Pembayaran</option>
                                                                            <option value="BNI">BNI</option>
                                                                            <option value="BCA">BCA</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 d-flex justify-content-between">
                                                                        <button type="button" class="btn btn-outline-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#cancel-payment">Cancel</button>
                                                                        <button type="submit" class="btn btn-outline-success shadow-none">Buat Pesanan</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Pricing Item -->
                    </div>
                </div>
            </section>
        
            <div class="modal fade" id="cancel-payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Batal Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin untuk keluar dari halaman pembayaran? Data yang telah diinputkan akan hilang!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Batal</button>
                            <a href="/" class="btn btn-success text-white shadow-none">Yakin</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
  
<!-- footer section -->
<footer class=" footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

</section>

<!-- end info section -->

<!-- Template Main JS File -->
  
<script>
    function calculateTotal() {
        var harga = {{ $book->harga }};
        var jumlah = document.getElementById('jumlah').value;
        var total = harga * jumlah;
        document.getElementById('total').value = total;
    }
</script>

<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>


</body>
</html>