window.onscroll = function() {
  let btn = document.getElementById("btnTop");
  btn.style.display = document.documentElement.scrollTop > 200 ? "flex" : "none";
};

function voltarAoTopo() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

const swiper = new Swiper('.slider-wrapper', {
  loop: true,
  grabCursor: true,
spaceBetween: 30,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  dynamicBullets: true,
  },


  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {
      0: {
         slidesPerView: 1
      } ,
  
      620: {
        slidesPerView: 2
     },
  
     1024: {
      slidesPerView: 3
   } 
  }
});