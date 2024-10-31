@extends('layouts.appfront')

@section('title', 'Form Daftar')

@section('main')

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Pembayaran</h1>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">pembayaran</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

   <!-- Courses Course Details Section -->
   <section id="courses-course-details" class="courses-course-details section">

    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top" src="{{ asset('img/mandiri-logo.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Bank Mandiri</h5>
              <p class="card-text">A.N Diki Saputra</p>
              <p class="card-text">1630003521047</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/Dana-logo.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Dana</h5>
              <p class="card-text">A.N Diki Saputra</p>
              <p class="card-text">082186099606</p>
            </div>
          </div>
        </div>

        <h3>Konfirmasi Pembayaran ke No Whatsapp 082186099606</h3>
    </div>


    </div>

  </section><!-- /Courses Course Details Section -->

@endsection

@push('scripts')

@endpush
