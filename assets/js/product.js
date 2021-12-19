let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})

// let color = document.querySelectorAll('.js_click');
// for (var i=0; i < color.length; i++){
// 	color[i].addEventListener('click', function() {
// 		console.log(color[i].firstElementChild.innerHTML)
// 		document.getElementById('featured').src = color[i].nextElementSibling.src
// 	})
// }




// Slick silder product detail
$(document).ready(function(){
	$('.item-list').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 2,
		dots: false,
		arrows: true,
		prevArrow:"<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
	  });
});