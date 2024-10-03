<!-- footer -->
<footer class=" bg-white">
    <div class="container-content ">

        <div class="grid grid-cols-12 pt-12">
            <div class="px-3 xl:col-span-6 lg:col-span-6 md:col-span-7 sm:col-span-12 col-span-12">
                <div class="text-lg text-[#C92127] font-bold">
                    stripe
                </div>
                <div class="text-sm text-[#424242]">Hotline: 1900.636.099</div>
                <div class="text-sm text-[#424242]">
                    HCM: Lầu 6, 182 Lê Đại Hành, P.15, Quận 11, Tp.HCM
                </div>

                <div class="text-sm text-[#424242] mt-2">Hotline: 1900.636.099</div>
                <div class="text-sm text-[#424242] mt-2">
                    Email: hello@merakiui.com
                </div>
            </div>

            <div class="px-3 xl:col-span-6 lg:col-span-6 md:col-span-5 sm:col-span-12 col-span-12 w-[420px]">
                <div class="grid grid-cols-12">
                    <div class="col-span-6 lg:col-span-6 md:col-span-12">
                        <div class="text-lg text-[#C92127] font-bold">Chính sách</div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Hotline: 1900.636.099
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Chính sách vận chuyển
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Chính sách đổi trả
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Quy định sử dụng
                        </div>
                    </div>

                    <div class="col-span-6 lg:col-span-6 md:col-span-12">
                        <div class="text-lg text-[#C92127] font-bold">Hỗ trợ</div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Hướng dẫn mua hàng
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Hướng dẫn thanh toán
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Hướng dẫn giao nhận
                        </div>
                        <div class="leading-5 my-1 text-sm text-[#424242] hover:text-[#C92127]">
                            Điều khoản dịch vụ
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4" />
        <div class="text-center text-sm leading-4 text-[#424242] pb-4">
            Bản quyền thuộc về Nhóm 8. Fpoly
        </div>
    </div>
</footer>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>

    var swiper = new Swiper(".mySwiper3", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    var swiper = new Swiper(".mySwiper2", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });
    // <!-- Initialize Swiper -->
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        freeMode: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[9%]')
    }

    //Drop down menu
    // Lấy tham chiếu đến nút dropdown và menu dropdown
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // Bắt sự kiện click vào nút dropdown
    dropdownButton.addEventListener('click', function () {
        // Kiểm tra trạng thái hiện tại của menu dropdown
        const isMenuVisible = dropdownMenu.classList.contains('hidden');

        // Nếu menu đang ẩn, hiển thị nó. Ngược lại, ẩn nó đi.
        if (isMenuVisible) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Bắt sự kiện click bên ngoài menu dropdown để ẩn nó đi
    document.addEventListener('click', function (event) {
        const isClickedInsideDropdown = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);

        if (!isClickedInsideDropdown) {
            dropdownMenu.classList.add('hidden');
        }
    });

    // slider
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length } for (i = 0; i < slides.length; i++) { slides[i].style.display = "none"; } for (i = 0;
            i < dots.length; i++) { dots[i].className = dots[i].className.replace(" active", ""); } slides[slideIndex -
                1].style.display = "block"; dots[slideIndex - 1].className += " active";
    } </script>
</body>

</html>