document.addEventListener('DOMContentLoaded', function() {
    if ('IntersectionObserver' in window) {
        const animatedElements = document.querySelectorAll('.nx-list-item');
        
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.2
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const index = Array.from(document.querySelectorAll('.nx-list-item')).indexOf(element);
                    
                    // Add animation classes
                    if (index % 2 === 0) {
                        element.classList.add('animate-from-left');
                    } else {
                        element.classList.add('animate-from-right');
                    }
                    
                    // Ensure visibility
                    element.style.opacity = '1';
                    element.style.visibility = 'visible';
                    
                    // Stop observing this element
                    observer.unobserve(element);
                }
            });
        }, observerOptions);
        
        // Start observing each element
        animatedElements.forEach(element => {
            // Set initial state
            element.style.opacity = '0';
            element.style.visibility = 'hidden';
            observer.observe(element);
        });
    }

    // Parallax effect for home intro
    const homeIntro = document.querySelector('.home-intro');
    if (homeIntro) {
        window.addEventListener('scroll', () => {
            const scrollPosition = window.pageYOffset;
            if (scrollPosition <= homeIntro.offsetHeight) {
                requestAnimationFrame(() => {
                    homeIntro.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
                });
            }
        }, { passive: true });
    }
});