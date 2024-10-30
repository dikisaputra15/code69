@extends('layouts.appfront')

@section('title', 'Form Daftar')

@section('main')

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Course Details</h1>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Course Details</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

   <!-- Courses Course Details Section -->
   <section id="courses-course-details" class="courses-course-details section">

    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8">
          <img src="{{ Storage::url('piccourse/'.$item->path_gambar) }}" class="img-fluid" alt="">
          <h3>{{$item->nama_produk}}</h3>
          <p class="price">Rp. {{$item->harga}}</p>
          <p>
            {{$item->deskripsi_produk}}
          </p>
        </div>
        <div class="col-lg-4">

            <form action="/storedaftar" method="POST">
                @csrf

            <h3>Form Pendaftaran</h3>

          <div class="form-group" hidden>
            <label>Id Produk</label>
           <input type="text" class="form-control" name="id_produk" value="{{$item->id}}">
          </div>

          <div class="form-group">
            <label>Nama Peserta</label>
           <input type="text" class="form-control" name="nama_peserta" required>
          </div>

          <div class="form-group">
            <label>No Whatsapp</label>
            <input type="text" class="form-control" name="no_wa" required>
          </div>

          <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" name="email" required>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
          </div><br><br>

          <div class="form-group">
            <button class="btn btn-primary">Daftar</button>
          </div>

        </form>

        </div>
      </div>

    </div>

  </section><!-- /Courses Course Details Section -->

@endsection

@push('scripts')

@endpush
