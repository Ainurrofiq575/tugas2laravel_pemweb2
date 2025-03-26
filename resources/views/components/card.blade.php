@props(['img', 'judul', 'text' => '', 'harga' => 'Rp 0'])

<div class="card shadow-lg border-0 rounded-4 overflow-hidden transition-effect h-100">
    <!-- Gambar Produk -->
    <img src="{{ $img }}" class="card-img-top img-fixed" alt="{{ $judul }}">

    <div class="card-body p-3 d-flex flex-column text-center">
        <!-- Nama Produk -->
        <h5 class="card-title fw-bold">{{ $judul }}</h5>
        
        <!-- Deskripsi Produk -->
        <p class="card-text text-muted flex-grow-1">{{ $text }}</p>

        <!-- Harga -->
        <h6 class="text-danger fw-bold mt-2">{{ $harga }}</h6>

        <!-- Tombol -->
        <a href="#" class="btn transition-button fw-bold mt-auto">🛒 Beli Sekarang</a>
    </div>
</div>

<style>
/* Ukuran gambar */
.img-fixed {
    object-fit: cover;
    height: 250px;
    width: 100%;
}

/* Efek hover pada card */
.transition-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
}

/* Tombol interaktif */
.transition-button {
    background-color: #ff9800; /* Warna oranye */
    color: white;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.transition-button:hover {
    background-color: #e65100; /* Oranye gelap */
    transform: scale(1.05);
}
</style>
