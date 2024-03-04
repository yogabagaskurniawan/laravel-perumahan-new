// work in progress - needs some refactoring and will drop JQuery i promise :)
// var instance = $(".hs__wrapper");
// $.each(instance, function (key, value) {
//     var arrows = $(instance[key]).find(".arrow"),
//         prevArrow = arrows.filter(".arrow-prev"),
//         nextArrow = arrows.filter(".arrow-next"),
//         box = $(instance[key]).find(".hs"),
//         x = 0,
//         mx = 0,
//         maxScrollWidth =
//             box[0].scrollWidth - box[0].clientWidth / 2 - box.width() / 2;

//     $(arrows).on("click", function () {
//         if ($(this).hasClass("arrow-next")) {
//             x = box.width() / 2 + box.scrollLeft() - 10;
//             box.animate({
//                 scrollLeft: x,
//             });
//         } else {
//             x = box.width() / 2 - box.scrollLeft() - 10;
//             box.animate({
//                 scrollLeft: -x,
//             });
//         }
//     });

//     $(box).on({
//         mousemove: function (e) {
//             var mx2 = e.pageX - this.offsetLeft;
//             if (mx) this.scrollLeft = this.sx + mx - mx2;
//         },
//         mousedown: function (e) {
//             this.sx = this.scrollLeft;
//             mx = e.pageX - this.offsetLeft;
//         },
//         scroll: function () {
//             toggleArrows();
//         },
//     });

//     $(document).on("mouseup", function () {
//         mx = 0;
//     });

//     function toggleArrows() {
//         if (box.scrollLeft() > maxScrollWidth - 10) {
//             // disable next button when right end has reached
//             nextArrow.addClass("disabled");
//         } else if (box.scrollLeft() < 10) {
//             // disable prev button when left end has reached
//             prevArrow.addClass("disabled");
//         } else {
//             // both are enabled
//             nextArrow.removeClass("disabled");
//             prevArrow.removeClass("disabled");
//         }
//     }
// });

// Mengambil elemen-elemen yang diperlukan
var instances = document.querySelectorAll(".hs__wrapper");

instances.forEach(function (instance) {
    // Mendapatkan elemen-elemen yang diperlukan di dalam setiap instance
    var arrows = instance.querySelectorAll(".arrow"),
        // prevArrow = instance.querySelector(".arrow-prev"),
        // nextArrow = instance.querySelector(".arrow-next"),
        box = instance.querySelector(".hs"),
        x = 0,
        mx = 0,
        maxScrollWidth =
            box.scrollWidth - box.clientWidth / 2 - box.offsetWidth / 2;

    arrows.forEach(function (arrow) {
        // Menambahkan event listener untuk setiap tombol panah
        arrow.addEventListener("click", function () {
            if (arrow.classList.contains("arrow-next")) {
                x = box.offsetWidth / 2 + box.scrollLeft - 10;
                box.scrollTo({
                    left: x,
                    behavior: "smooth",
                });
            } else {
                x = box.offsetWidth / 2 - box.scrollLeft - 10;
                box.scrollTo({
                    left: -x,
                    behavior: "smooth",
                });
            }
        });
    });

    box.addEventListener("mousemove", function (e) {
        var mx2 = e.pageX - this.offsetLeft;
        if (mx) this.scrollLeft = this.sx + mx - mx2;
    });

    box.addEventListener("mousedown", function (e) {
        this.sx = this.scrollLeft;
        mx = e.pageX - this.offsetLeft;
    });

    box.addEventListener("scroll", function () {
        toggleArrows();
    });

    document.addEventListener("mouseup", function () {
        mx = 0;
    });

    function toggleArrows() {
        if (box.scrollLeft > maxScrollWidth - 10) {
            // Menonaktifkan tombol next ketika mencapai akhir kanan
            // nextArrow.classList.add("disabled");
        } else if (box.scrollLeft < 10) {
            // Menonaktifkan tombol prev ketika mencapai akhir kiri
            // prevArrow.classList.add("disabled");
        } else {
            // Keduanya diaktifkan
            // nextArrow.classList.remove("disabled");
            // prevArrow.classList.remove("disabled");
        }
    }
});
