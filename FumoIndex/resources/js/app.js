import './bootstrap';
import "@fortawesome/fontawesome-free/css/all.min.css";
import AOS from 'aos';
import 'aos/dist/aos.css';


document.addEventListener('DOMContentLoaded', function() {
    AOS.init();
    const decoration = document.getElementById('decoration-animation');
    if (!decoration) return;
    function onScroll() {
        const rect = decoration.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.9) {
            decoration.classList.add('decoration-inview');
            window.removeEventListener('scroll', onScroll);
        }
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
});
