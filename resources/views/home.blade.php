@extends('layouts.app') <!-- Menggunakan Layout app.blade.php -->

@section('title', 'Halaman Utama - SneakCulture') <!-- Mengatur judul halaman -->

@section('content')
<div class="container mt-4">
    <!-- Carousel -->
    <div id="carouselExampleAutoplay" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="slide1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="slide2">
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filters mt-4">
        <h4>Filter Kategori</h4>
        <div class="category-filters">
            <div>
                <input type="checkbox" id="nike" name="category" value="nike">
                <label for="nike">Nike</label>
            </div>
            <div>
                <input type="checkbox" id="new_balance" name="category" value="new_balance">
                <label for="new_balance">New Balance</label>
            </div>
            <div>
                <input type="checkbox" id="puma" name="category" value="puma">
                <label for="puma">Puma</label>
            </div>
            <div>
                <input type="checkbox" id="asics" name="category" value="asics">
                <label for="asics">Asics</label>
            </div>
            <div>
                <input type="checkbox" id="adidas" name="category" value="adidas">
                <label for="adidas">Adidas</label>
            </div>
        </div>

        <h4>Filter Harga</h4>
        <div class="price-range-container">
            <input type="range" class="form-range" id="priceSlider" min="0" max="99999" step="500" value="0">
            <div class="price-range-box">
                <span id="priceMin">0</span> - <span id="priceMax">99999</span>
            </div>
            <!-- Box harga yang menampilkan harga real-time -->
            <div class="price-box">
              <p><strong>Harga Terpilih: </strong>Rp <span id="realPrice">0</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
