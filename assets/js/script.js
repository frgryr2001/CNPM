let headerSubMenu = document.querySelector('.header__location__submenu')
let headerSubMenuModal = document.querySelector('.header__location__submenu__modal')

headerSubMenuModal.addEventListener('click', function() {
    headerSubMenu.style.display = 'none'
    headerSubMenuModal.style.display = 'none'
});
// Header Search Bar Handle
let searchInput = document.querySelector('.header__search__bar__input input')
let searchModal = document.querySelector('.header__search__bar__modal')

searchInput.addEventListener('click', function() {
    searchModal.style.display = 'block'
})
searchModal.addEventListener('click', function() {
    searchModal.style.display = 'none'
});
// Slider
(function slider() {
    let nextButton = document.querySelector('.slider__top__next__btn')
    let prevButton = document.querySelector('.slider__top__prev__btn')
    let slideWrapper = document.querySelector('.slider__top__wrapper')
    let l = 684.98
    let index = 0
    let positionX = 0
        // Automatic Slider
    setInterval(function() {
        if (index >= 7) {
            positionX = 0
            slideWrapper.style.transform = `translateX(${positionX}px)`
            index = 0
        } else {
            positionX = positionX - l
            slideWrapper.style.transform = `translateX(${positionX}px)`
            index++
        }
    }, 3000);
    // Button Slider
    nextButton.addEventListener('click', function() {
        Handle('next')
    })
    prevButton.addEventListener('click', function() {
        Handle('prev')
    })

    function Handle(number) {
        if (number === 'next') {
            if (index >= 7) return
            positionX = positionX - l
            slideWrapper.style.transform = `translateX(${positionX}px)`
            index++
        } else {
            if (index <= 0) return
            positionX = positionX + l
            slideWrapper.style.transform = `translateX(${positionX}px)`
            index--
        }
    }
})();

// flash sales slider
(function flashSalesSlider() {
    const flashSalesNext = document.querySelector('.flash__sale__next__btn')
    const flashSalesPrev = document.querySelector('.flash__sale__prev__btn')
    const flashProductList = document.querySelector('.flash__sale__product__list')
    let flash = 238 * 2
    let flashSalesIndex = 0
    let flashPositionX = 0
    flashSalesNext.addEventListener('click', function() {
        flashSalesHandle('next')
    })
    flashSalesPrev.addEventListener('click', function() {
        flashSalesHandle('prev')
    })

    function flashSalesHandle(flashSalesNumber) {
        if (flashSalesNumber === 'next') {
            if (flashSalesIndex > 5) return
            flashPositionX = flashPositionX - flash
            flashProductList.style.transform = `translateX(${flashPositionX}px)`
            flashSalesIndex++
        } else {
            if (flashSalesIndex <= 0) return
            flashPositionX = flashPositionX + flash
            flashProductList.style.transform = `translateX(${flashPositionX}px)`
            flashSalesIndex--
        }
    }
})();

// Count down
(function countDownFlashSales() {
    let second, minute, hour, day;

    const currentDate = new Date();
    const endDate = new Date(2021, 10, 30, 12, 00, 00);
    timeDifference = (endDate - currentDate) / 1000
    const countDown = setInterval(function() {
        if (timeDifference <= 0) {
            setTimeCountDown(0, 0, 0, 0)
            clearInterval(countDown)
            return
        }
        timeDifference = timeDifference - 1
        second = Math.floor(timeDifference % 60)
        minute = Math.floor(timeDifference / 60 % 60)
        hour = Math.floor(timeDifference / 60 / 60 % 24)
        day = Math.floor(timeDifference / 60 / 60 / 24)
        setTimeCountDown(day, hour, minute, second)
    }, 1000)

    function setTimeCountDown(day, hour, minute, second) {
        document.querySelector('#day').innerHTML = day < 10 ? '0' + day : day
        document.querySelector('#hour').innerHTML = hour < 10 ? '0' + hour : hour
        document.querySelector('#minutes').innerHTML = minute < 10 ? '0' + minute : minute
        document.querySelector('#seconds').innerHTML = second < 10 ? '0' + second : second
    }
})();