@props(['message'])

<style>
    .custom-alert {
        position: fixed;
        top: -100px; /* Awalnya di luar layar */
        left: 50%;
        transform: translateX(-50%);
        z-index: 1050;
        min-width: 350px;
        background-color: #28a745; /* Warna hijau sukses */
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 10px;
        transition: top 0.5s ease-in-out, opacity 0.5s ease-in-out;
    }

    .custom-alert.show {
        top: 20px; /* Muncul ke bawah */
    }

    .custom-alert .icon {
        font-size: 20px;
    }

    .custom-alert .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        margin-left: auto;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div');
            wrapper.classList.add('custom-alert', 'show');
            wrapper.innerHTML = `
                <span class="icon">✅</span>
                <div>${message}</div>
                <button class="close-btn">&times;</button>
            `;

            alertPlaceholder.append(wrapper);

            // Sembunyikan alert setelah 3 detik
            setTimeout(() => {
                wrapper.classList.remove('show');
                setTimeout(() => {
                    wrapper.remove();
                }, 500);
            }, 3000);

            // Event untuk tombol close
            wrapper.querySelector('.close-btn').addEventListener('click', () => {
                wrapper.classList.remove('show');
                setTimeout(() => {
                    wrapper.remove();
                }, 500);
            });
        };

        const alertTrigger = document.getElementById('liveAlertBtn');
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert(@json($message), 'success');
            });
        }
    });
</script>