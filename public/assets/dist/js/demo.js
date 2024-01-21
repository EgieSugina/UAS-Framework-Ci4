/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  "use strict";

  // setTimeout(function () {
  //   if (window.___browserSync___ === undefined && Number(localStorage.getItem('AdminLTE:Demo:MessageShowed')) < Date.now()) {
  //     localStorage.setItem('AdminLTE:Demo:MessageShowed', (Date.now()) + (15 * 60 * 1000))
  //     // eslint-disable-next-line no-alert
  //     alert('You load AdminLTE\'s "demo.js", \nthis file is only created for testing purposes!')
  //   }
  // }, 1000)

  $(".nav-sidebar").addClass("nav-flat");
  // $(".nav-sidebar").addClass("nav-legacy");
  $(".nav-sidebar").addClass("nav-compact");
  // $(".nav-sidebar").addClass("nav-child-indent");
  $(".nav-sidebar").addClass("nav-collapse-hide-child");
  // $(".nav-sidebar").addClass("text-sm");
})(jQuery);
