"use strict";
// !(function () {
//         var e = document.querySelector("#flatpickr-date"),
//             t = document.querySelector("#flatpickr-time"),
//             a = document.querySelector("#flatpickr-datetime"),
//             i = document.querySelector("#flatpickr-multi"),
//             r = document.querySelector("#flatpickr-range"),
//             n = document.querySelector("#flatpickr-inline"),
//             o = document.querySelector("#flatpickr-human-friendly"),
//             l = document.querySelector("#flatpickr-disabled-range");
//         e && e.flatpickr({ monthSelectorType: "static" }),
//             t && t.flatpickr({ enableTime: !0, noCalendar: !0 }),
//             a && a.flatpickr({ enableTime: !0, dateFormat: "Y-m-d H:i" }),
//             i &&
//                 i.flatpickr({
//                     weekNumbers: !0,
//                     enableTime: !0,
//                     mode: "multiple",
//                     minDate: "today",
//                 }),
//             null != typeof r && r.flatpickr({ mode: "range" }),
//             n &&
//                 n.flatpickr({
//                     inline: !0,
//                     allowInput: !1,
//                     monthSelectorType: "static",
//                 }),
//             o &&
//                 o.flatpickr({
//                     altInput: !0,
//                     altFormat: "F j, Y",
//                     dateFormat: "Y-m-d",
//                 }),
//             l &&
//                 ((e = new Date(Date.now() - 1728e5)),
//                 (t = new Date(Date.now() + 1728e5)),
//                 l.flatpickr({
//                     dateFormat: "Y-m-d",
//                     disable: [
//                         {
//                             from: e.toISOString().split("T")[0],
//                             to: t.toISOString().split("T")[0],
//                         },
//                     ],
//                 }));
// })(),
$("#bs-datepicker-autoclose").datepicker({
    // format: "dd-mm-yyyy",
    // startView: "date",
    // minViewMode: "date",
    opens: "right",
    orientation: "auto bottom",
    autoclose: true,
    todayHighlight: true,
    immediateUpdates: true,
    // });
    // $(function () {
    //     var e = $("#bs-datepicker-basic"),
    //         o = $("#bs-datepicker-autoclose"),
    //         e =
    //             (e.length &&
    //                 e.datepicker({
    //                     todayHighlight: !0,
    //                     orientation: "auto right",
    //                 }),
    //             o.length &&
    //                 o.datepicker({
    //                     todayHighlight: !0,
    //                     autoclose: !0,
    //                     orientation: "auto right",
    //                 }),
    //             $("#bs-rangepicker-basic"));
});
$("#bs-datepicker-autoclose-mont").datepicker({
    format: "mm-yyyy",
    startView: "months",
    minViewMode: "months",
    opens: "right",
    orientation: "auto bottom",
    autoclose: !0,
    todayHighlight: !0,
    immediateUpdates: !0,
});
