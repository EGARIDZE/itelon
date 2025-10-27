(function () {
	'use strict';

	var checkSupportedWebp = function checkSupportedWebp(callback) {
	  var webP = new Image();
	  webP.onload = function () {
	    return callback(webP.height === 2);
	  };
	  webP.onerror = function () {
	    return callback(webP.height === 2);
	  };
	  webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
	};

	window.addEventListener('DOMContentLoaded', function () {
	  checkSupportedWebp(function (isSupported) {
	    return document.querySelector('body').classList.add(isSupported ? 'webp' : 'no-webp');
	  });
	});

})();
//# sourceMappingURL=utils.bundle.js.map
