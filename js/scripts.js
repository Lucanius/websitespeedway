window.addEventListener('scroll', function() {
    var counterSection = document.getElementById('counter');
    var rect = counterSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight) {
        document.querySelector('.bar-fill-5').style.width = '5%';
        document.querySelector('.bar-fill-1').style.width = '1%';
    }
});