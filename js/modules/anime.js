// Secondary menu expand-retract
var secMenuExpand = anime({
    targets: '.sec-menu',
    translateX: -700,
    delay: anime.stagger(700, {direction: 'reverse'}),
    autoplay: false
  });

document.querySelector('div.sec-menu-btn').onclick = secMenuExpand.play;

var secMenuClose = anime({
  targets: '.sec-menu',
  translateX: 700,
  delay: anime.stagger(700),
  autoplay: false
})

document.querySelector('.sec-menu-close').onclick = secMenuClose.play;

// Deals animated
var scrollAnimation = anime({
    targets: '#animated-ads',
    opacity: 1,
    delay: 500,
    easing: 'easeOutExpo',
    autoplay: false,
});

window.onscroll = function(e) {
    scrollAnimation.play(window.pageYOffset * 1.3);
};

// start animation
document.addEventListener('DOMContentLoaded', () => {

  anime.timeline({
		easing: 'easeOutExpo',
	})
  .add({
    targets: '.navbar',
    width: ['0', '100%'],
  })
  .add({
    targets: '.nav-item',
    opacity: [0, 1],
    translatY: [-50, 0],
    delay: (el, i) => 70 * i,
    offset: '-=200',
  })
	.add({
    targets: 'div.advert-div',
    translateX: 500,
    scale: [0, 1],
    delay: anime.stagger(100, {direction: 'reverse'}),
    offset: '-=100'
  })
  .add({
    targets: '.FP-hero-header',
    translateX: -650,
    scale: [0, 1],
    delay: anime.stagger(100, {direction: 'reverse'}),
    offset: '-=100'
  })
  .add({
    targets: '.sec-menu-btn',
    scale: [0, 1],
    offset: '-=200'
  })
  .add({
    targets: '.logo-area',
    translatY: [-50, 0],
    offset: '-=100',
  })

  // hover on main and secondary menus
  let navLinks = document.querySelectorAll('.nav-item a');
  
    navLinks.forEach((singleLink) => {
      singleLink.addEventListener('mouseenter', () => {
        anime.remove(singleLink);
        anime({
          targets: singleLink,
          scale: 1.1,
          translateY: 3,
          color: '#ffd300',
          easing: 'easeOutExpo',
        })
      })
      
      singleLink.addEventListener('mouseleave', () => {
        anime.remove(singleLink);
        anime({
          targets: singleLink,
          scale: 1,
          translateY: 0,
          color: '#ffffff',
          easing: 'easeOutExpo',
        })
      })
    })

  // advert blobs on a left
  let advertsLeft = document.querySelectorAll('.header-div a');

    advertsLeft.forEach((advert) => {
      advert.addEventListener('mouseenter', () => {
        anime.remove(advert);
        anime({
          targets: advert,
          scale: 1.5,
          letterSpacing: 1.5,
          color: '#ffd300',
          easing: 'easeOutExpo'
        })
      })
    

      advert.addEventListener('mouseleave', () => {
        anime.remove(advert);
        anime({
          targets: advert,
          scale: 1,
          letterSpacing: 1,
          color: '#ffffff',
          easing: 'easeOutExpo'
        })
      })
    })


});

// hover on secondary nav arrow
var hoverAnimation = anime({
  targets: ['#sec-menu-arrow', '.sec-menu-close'],
  rotate: {
    value: 360,
    duration: 1000,
    easing: 'easeInOutSine',
  },
  autoplay: false
})

document.querySelector('#sec-menu-arrow').onmouseenter = hoverAnimation.play;
document.querySelector('.sec-menu-close').onmouseenter = hoverAnimation.play;