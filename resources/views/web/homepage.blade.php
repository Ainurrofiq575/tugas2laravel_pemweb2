<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Tempat Alert di Atas -->
    <div id="liveAlertPlaceholder" class="position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050; width: 90%; max-width: 500px;"></div>

    <div class="container text-center py-5">
        <!-- Header Produk -->
        <h2 class="mb-3 fw-bold text-uppercase" style="background: linear-gradient(90deg, #ff4d4d, #ffa64d, #33cc33, #0099ff, #6666ff); -webkit-background-clip: text; color: transparent; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
            PRODUK TERBAIK
        </h2>

        <hr class="w-50 mx-auto mb-4"> 

        <!-- Grid Produk -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <x-card 
                img="https://image.makewebeasy.net/makeweb/m_1920x0/aDHlzCExY/DefaultData/D47CB3C6_DC25_4CC9_8614_347C94A98227.jpeg" 
                judul="Kecap Bango" 
                text="Kecap manis premium dengan rasa gurih dan manis."
                harga="Rp 15.000 - Rp 20.000"/>
            <x-card 
                img="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//86/MTA-48220132/masako_masako_sachet_-1_renceng_12__pcs-_full01_gd5kqlup.jpg" 
                judul="Masako" 
                text="Penyedap rasa dengan rasa umami yang kaya, cocok untuk berbagai masakan."
                harga="Rp 5.000 - Rp 10.000"/>
            <x-card 
                img="https://images.tokopedia.net/img/cache/700/OJWluG/2022/10/5/a45c0a96-4570-4c8d-9ab7-ad51db38bd1c.jpg" 
                judul="Minyak Bimoli" 
                text="Minyak goreng berkualitas, ideal untuk memasak."
                harga="Rp 15.000 - Rp 30.000"/>
            <x-card 
                img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKACJnYQBupcY7EO1HkvZXZluKbsn631UIQA&s" 
                judul="Santan Sasa" 
                text="Santan kelapa siap pakai, praktis untuk berbagai masakan."
                harga="Rp 7.000 - Rp 15.000"/>
        </div>

        <hr class="w-50 mx-auto my-4">
        
        <!-- Tombol Produk Terbaru -->
        <button type="button" class="btn btn-lg fw-bold px-4 py-2 shadow-lg" id="liveAlertBtn" style="background: linear-gradient(45deg, #ff4d4d, #ff9900); color: white; border: none; transition: transform 0.2s;">
            🔥 Produk Baru, Cek Sekarang!
        </button>
    </div>

    <!-- JavaScript untuk Notifikasi -->
    <script>
        document.getElementById('liveAlertBtn').addEventListener('click', function() {
            let alertPlaceholder = document.getElementById('liveAlertPlaceholder');
            let alertDiv = document.createElement('div');

            alertDiv.innerHTML = `
                <div class="alert alert-warning alert-dismissible fade show text-center shadow-lg" role="alert" style="background: linear-gradient(90deg, #ffcc00, #ff6600); color: white; font-weight: bold;">
                    🚀 Produk baru telah rilis! Yuk, cek sebelum kehabisan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
            
            alertPlaceholder.appendChild(alertDiv);

            // Auto-hide alert after 4 seconds
            setTimeout(() => {
                alertDiv.classList.remove("show");
                alertDiv.classList.add("fade");
                setTimeout(() => alertDiv.remove(), 500);
            }, 4000);
        });

        // Hover effect untuk tombol
        document.getElementById('liveAlertBtn').addEventListener('mouseenter', function() {
            this.style.transform = "scale(1.05)";
        });

        document.getElementById('liveAlertBtn').addEventListener('mouseleave', function() {
            this.style.transform = "scale(1)";
        });
    </script>

</x-layout>
