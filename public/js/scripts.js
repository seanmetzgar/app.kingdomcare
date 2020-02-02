/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.datepicker').datepicker(); // Mobile Nav Overlay

  $('#ham').on('click', function () {
    $('#myNav').addClass('open');
  });
  $('#myNav').find('.closebtn').on('click', function () {
    $('#myNav').removeClass('open');
  });
  $('.logout-link').on('click', function (e) {
    e.preventDefault();
    $('#logout-form').submit();
  });
  $('.select-role-form').find('.role-submit').on('click', function (e) {
    e.preventDefault();
    var $button = $(this);
    var role = $button.data('role');
    var $form = $(this).parents('form');
    $form.find('input[name=role]').val(role);
    console.log('hi');
    $form.submit();
  });
  $('.starrr').each(function () {
    var $this = $(this);
    var rating = this.hasAttribute('data-rating') ? parseInt($this.data('rating')) : null;
    var readOnly = $this.hasClass('read-only') ? true : false;

    if (!isNaN(rating)) {
      $this.starrr({
        rating: rating,
        readOnly: readOnly
      });
    } else {
      $this.starr({
        readOnly: readOnly
      });
    }
  }); // Sitter Profile Search Bar Shrink

  $(document).scroll(function () {
    var $nav = $(".sprofile .left");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
    $(".sitter-tab").toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
    $(".search.sprofile").toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
  });
  $('.tablinks').on('click', function (e) {
    // Declare all variables
    var city, $this; //Get jQuery version of element

    $this = $(this); //Get city from

    city = $this.attr('href');
    city = typeof city !== "string" ? false : city.trim();

    if (city !== false) {
      if (city.lastIndexOf('#', 0) === 0) {
        e.preventDefault();
        $('.tabcontent').hide();
        $('.tablinks').removeClass('active');
        $(city).show();
        $this.addClass('active');
      } else {
        return true;
      }
    } else {
      e.preventDefault();
    }
  });
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/scripts.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sean/Documents/Git/GitHub/seanmetzgar/app.kingdomcare/resources/js/scripts.js */"./resources/js/scripts.js");


/***/ })

/******/ });