@extends('layouts.appfront')

@section('title', 'Hompe Page')

@section('main')

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">

    <img src="{{ asset('Mentor/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="#" class="btn-get-started">Get Started</a>
      </div>
    </div>

  </section><!-- /Hero Section -->

<section id="courses" class="courses section">
   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
    <h2>Courses</h2>
    <p>Popular Courses</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row">

    @foreach ($items as $item)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="course-item">
          <img src="{{ Storage::url('piccourse/'.$item->path_gambar) }}" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <p class="price">Rp. {{$item->harga}}</p>
            </div>

            <h3><a href="/daftar/{{$item->id}}/formdaftar">{{$item->nama_produk}}</a></h3>
            <p class="description">{{$item->deskripsi_produk}}</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <div class="trainer-rank d-flex align-items-center">
                <i class="bi bi-person user-icon"></i>&nbsp;50
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      @endforeach

    </div>

  </div>
</section>

@endsection

@push('scripts')

@endpush
