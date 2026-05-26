import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.data('app', () => ({
    sidebarOpen: false,
    profileOpen: false,
    init() {
        const flash = window.flashMessage || {};

        if (flash.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: flash.success,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });
        }

        if (flash.error) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: flash.error,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
        }
    },
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
    },
    toggleProfile() {
        this.profileOpen = !this.profileOpen;
    },
    closeProfile() {
        this.profileOpen = false;
    },
}));

Alpine.start();
