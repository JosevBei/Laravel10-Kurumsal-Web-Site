


//Navmenu kapatma 
document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.querySelector(".navbar-toggler");
    const menuCloseButton = document.querySelector(".btn-close-menu");
    const navbarCollapse = document.querySelector(".navbar-collapse");

    // Dışarı tıklandığında veya çarpı butonuna tıklandığında menüyü kapatma
    document.addEventListener("click", function (event) {
        if (!navbarCollapse) {
            return; // navbarCollapse null ise işlemi durdur
        }

        const isClickInsideMenu = navbarCollapse.contains(event.target);
        const isClickOnMenuButton = menuButton.contains(event.target);
        const isClickOnCloseButton = menuCloseButton.contains(event.target);

        console.log("Inside Menu:", isClickInsideMenu);
        console.log("Menu Button:", isClickOnMenuButton);
        console.log("Close Button:", isClickOnCloseButton);

        if (!isClickInsideMenu && !isClickOnMenuButton && !isClickOnCloseButton) {
            navbarCollapse.classList.remove("show");
            console.log("Menu Closed");
        }
    });

    // Çarpı butonuna tıklandığında menüyü kapatma
    menuCloseButton.addEventListener("click", function () {
        navbarCollapse.classList.remove("show");
        console.log("Menu Closed (Close button)");
    });
});


//Ürün Slider
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#splide', {
        type: 'loop',
        perPage: 3, // Başlangıçta sadece bir öğe göster
        focus: 'center',
        autoplay: true,
        interval: 8000,
        flickMaxPages: 3,
        updateOnMove: true,
        pagination: false,
        padding: '10%',
        throttle: 300,
        breakpoints: {
            721: {
                perPage: 1, // 721 piksel ve üzeri için 2 öğe göster
            },
            1201: {
                perPage: 2, // 1201 piksel ve üzeri için 3 öğe göster
            },
        },
    }).mount();
});





  
  
  
  
  
