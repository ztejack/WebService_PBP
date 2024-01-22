/**
 * Main
 */

"use strict";

let menu, animate;

(function () {
    // Initialize menu
    //-----------------

    let layoutMenuEl = document.querySelectorAll("#layout-menu");
    layoutMenuEl.forEach(function (element) {
        menu = new Menu(element, {
            orientation: "vertical",
            closeChildren: false,
        });
        // Change parameter to true if you want scroll animation
        window.Helpers.scrollToActive((animate = false));
        window.Helpers.mainMenu = menu;
    });

    // Initialize menu togglers and bind click on each
    let menuToggler = document.querySelectorAll(".layout-menu-toggle");
    menuToggler.forEach((item) => {
        item.addEventListener("click", (event) => {
            event.preventDefault();
            window.Helpers.toggleCollapsed();
        });
    });

    // Display menu toggle (layout-menu-toggle) on hover with delay
    let delay = function (elem, callback) {
        let timeout = null;
        elem.onmouseenter = function () {
            // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
            if (!Helpers.isSmallScreen()) {
                timeout = setTimeout(callback, 300);
            } else {
                timeout = setTimeout(callback, 0);
            }
        };

        elem.onmouseleave = function () {
            // Clear any timers set to timeout
            document
                .querySelector(".layout-menu-toggle")
                .classList.remove("d-block");
            clearTimeout(timeout);
        };
    };
    if (document.getElementById("layout-menu")) {
        delay(document.getElementById("layout-menu"), function () {
            // not for small screen
            if (!Helpers.isSmallScreen()) {
                document
                    .querySelector(".layout-menu-toggle")
                    .classList.add("d-block");
            }
        });
    }

    // Display in main menu when menu scrolls
    let menuInnerContainer = document.getElementsByClassName("menu-inner"),
        menuInnerShadow =
            document.getElementsByClassName("menu-inner-shadow")[0];
    if (menuInnerContainer.length > 0 && menuInnerShadow) {
        menuInnerContainer[0].addEventListener("ps-scroll-y", function () {
            if (this.querySelector(".ps__thumb-y").offsetTop) {
                menuInnerShadow.style.display = "block";
            } else {
                menuInnerShadow.style.display = "none";
            }
        });
    }

    // Init helpers & misc
    // --------------------

    // Init BS Tooltip
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Accordion active class
    const accordionActiveFunction = function (e) {
        if (e.type == "show.bs.collapse" || e.type == "show.bs.collapse") {
            e.target.closest(".accordion-item").classList.add("active");
        } else {
            e.target.closest(".accordion-item").classList.remove("active");
        }
    };

    const accordionTriggerList = [].slice.call(
        document.querySelectorAll(".accordion")
    );
    const accordionList = accordionTriggerList.map(function (
        accordionTriggerEl
    ) {
        accordionTriggerEl.addEventListener(
            "show.bs.collapse",
            accordionActiveFunction
        );
        accordionTriggerEl.addEventListener(
            "hide.bs.collapse",
            accordionActiveFunction
        );
    });

    // Auto update layout based on screen size
    window.Helpers.setAutoUpdate(true);

    // Toggle Password Visibility
    window.Helpers.initPasswordToggle();

    // Speech To Text
    window.Helpers.initSpeechToText();

    // Manage menu expanded/collapsed with templateCustomizer & local storage
    //------------------------------------------------------------------

    // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
    if (window.Helpers.isSmallScreen()) {
        return;
    }

    // If current layout is vertical and current window screen is > small

    // Auto update menu collapsed/expanded based on the themeConfig
    window.Helpers.setCollapsed(true, false);
})();

var pwShown = 0;

$(document).ready(function () {
    $("#tableBarang").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: 200,
        scrollX: true,
    });
    $("#tableUser").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: 200,
        scrollX: true,
    });
    $("#tablePerusahaan").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: 200,
        scrollX: true,
    });
    $("#example").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: 200,
        scrollX: true,
    });
    $("#examples").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: true,
        scrollX: true,
    });
    $("#example-x").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: true,
        scrollX: true,
    });
    $("#example-y").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: true,
        scrollX: true,
    });
    $("#addsubmission").DataTable({
        stateSave: true,
        paging: true,
        ordering: true,
        info: true,
        scrollY: 200,
        scrollX: true,
        columnDefs: [
            {
                targets: 1,
                checkboxes: true,
            },
        ],
    });
    $("table.table-display").DataTable({
        // paging: false,
        // ordering: false,
        // info: false,
        // searching: false,
        // scrollY: true,
        // scrollX: true,
    });
    // $("#example-form").DataTable({
    //     paging: true,
    //     pagingType: "first_last_numbers",
    //     pageLength: 50,
    //     ordering: false,
    //     info: true,
    //     scrollY: true,
    //     scrollX: true,
    //     columnDefs: [
    //         {
    //             orderable: false,
    //             className: "select-checkbox",
    //             checkboxes: true,
    //             targets: 0,
    //         },
    //     ],
    //     select: {
    //         style: "os",
    //         selector: "td:first-child", // Corrected selector for the first cell in each row
    //     },
    // });

    // });
    //password visible
    // $(document).ready(function () {
    $("#togglepassword").click(function () {
        if (pwShown == 0) {
            $("#password").attr("type", "text");
            $("#new-password").attr("type", "text");
            $("#new-password-confirmation").attr("type", "text");
            $("#toggleicon").addClass("bxs-low-vision").removeClass("bx-show");
            pwShown = 1;
        } else {
            $("#password").attr("type", "password");
            $("#new-password").attr("type", "password");
            $("#new-password-confirmation").attr("type", "password");
            $("#toggleicon").addClass("bx-show").removeClass("bxs-low-vision");
            pwShown = 0;
        }
    });
    if ($("#modalcbx").is(":checked")) {
        $("#modalPassword").modal("show");
        $("#modalBRG".$product[id]).modal("show");
    }

    // $("#print").on("click", function () {
    //     let CSRF_TOKEN = $('meta[name="csrf-token"').attr("content");

    //     $.ajaxSetup({
    //         url: "/cetak/transaksi/",
    //         type: "GET",
    //         data: {
    //             _token: CSRF_TOKEN,
    //         },
    //         beforeSend: function () {
    //             console.log("printing ...");
    //         },
    //         complete: function () {
    //             console.log("printed!");
    //         },
    //     });

    //     $.ajax({
    //         success: function (viewContent) {
    //             // $.print(viewContent); // This is where the script calls the printer to print the viwe's content.
    //             window.print();
    //         },
    //     });
    // });
});
