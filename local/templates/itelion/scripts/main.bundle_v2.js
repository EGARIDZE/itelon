(function () {
	'use strict';

	var takeControlMenu = function takeControlMenu() {
		document.querySelector('.header');
		var main = document.querySelector('main'),
						footer = document.querySelector('.footer');
		var headerNavMenu = document.querySelector('.header__navigation-container');
		var burgerDesktop = document.querySelector('.header__burger');
					
					if (window.innerWidth < 1025) {
							document.addEventListener('click', (e)=>{
								if (e.target.hasAttribute('data-menu-btn')) {
									e.preventDefault();
									var btnActive = e.target;
									var contentActive = document.querySelector(`[data-menu-content="${btnActive.getAttribute('data-menu-btn')}"]`);

									if (contentActive) {
										var btns = document.querySelectorAll('[data-menu-btn]');
										btns.forEach((btn) => {
											if (btn != btnActive && btn.classList.contains('_open')) {
												btn.classList.remove('_open');
											}
										});
										var contents = document.querySelectorAll('[data-menu-content]');
										contents.forEach((content) => {
											if (content != contentActive && content.classList.contains('_open')) {
												content.classList.remove('_open');
											}
										});

										btnActive.classList.toggle('_open');
										contentActive.classList.toggle('_open');

										if ((contentActive.getAttribute('data-menu-content') != 'search') && contentActive.classList.contains('_open') == true) {
											document.body.classList.add('_lock')
										}
										else{
											document.body.classList.remove('_lock')
										}
									}
								}
						});

	    var mobileList = document.querySelector('.mobile-list');
	    var mobileListItems = mobileList.querySelectorAll('li');
	    if (mobileListItems.length > 0) {
	      mobileListItems.forEach(function (item) {
	        var link = item.querySelector('a');
	        var list = item.querySelector('ul');
	        if (list) {
	          if (!link.querySelector('._arrow')) {
	            link.innerHTML += "<div class=\"_arrow\"></div>";
	          }
	          link.addEventListener('click', function (e) {
	            e.preventDefault();
	            var listOpen = item.parentElement.querySelector('ul._open');
	            var linkOpen = item.parentElement.querySelector('a._open');
	            if (listOpen === list) {
	              list.classList.remove('_open');
	              link.classList.remove('_open');
	              return;
	            }
	            if (listOpen) {
	              listOpen.classList.remove('_open');
	              linkOpen.classList.remove('_open');
	            }
	            if (!link.classList.contains('_open')) {
	              link.classList.add('_open');
	              list.classList.add('_open');
	            } else {
	              link.classList.remove('_open');
	              list.classList.remove('_open');
	              var subitems = item.querySelectorAll('li');
	              if (subitems.length > 0) {
	                subitems.forEach(function (subitem) {
	                  var sublinks = subitem.querySelectorAll('a');
	                  if (sublinks.length > 0) {
	                    sublinks.forEach(function (sublink) {
	                      sublink.classList.remove('_open');
	                    });
	                  }
	                  var sublists = subitem.querySelectorAll('ul');
	                  if (sublists.length > 0) {
	                    sublists.forEach(function (sublist) {
	                      sublist.classList.remove('_open');
	                    });
	                  }
	                });
	              }
	            }
	          });
	        }
	      });
	    }
	  }
	  if (window.innerWidth > 1024) {
	    var headerLogo = document.querySelector('.header__logo');
	    var headerRow = document.querySelector('.header__row');
	    var headerNavContainer = document.querySelector('.header__container-nav');
	    window.addEventListener('scroll', function () {
	      if (window.scrollY > 0 && window.scrollY < 10) {
	        headerNavMenu.classList.add('_open');
	        burgerDesktop.classList.remove('_disable');
	        headerNavMenu.classList.remove('_open');
	        headerLogo.classList.remove('_open');
	        headerRow.classList.remove('_disable');
	        headerNavContainer.classList.remove('_disable');
	      } else if (window.scrollY > 10) {
	        headerNavMenu.classList.remove('_open');
	        headerRow.classList.remove('_disable');
	        headerNavContainer.classList.remove('_disable');
	        burgerDesktop.classList.remove('_disable');
	        headerLogo.classList.remove('_open');
	        burgerDesktop.classList.remove('_open');
	      } else {
	        headerRow.classList.add('_disable');
	        headerNavContainer.classList.add('_disable');
	        headerLogo.classList.add('_open');
	        headerNavMenu.classList.add('_open');
	        burgerDesktop.classList.remove('_open');
	        burgerDesktop.classList.add('_disable');
	      }
	    });
	    if (burgerDesktop) {
	      var _headerNavMenu = document.querySelector('.header__navigation-container');
	      var _headerNavMenuMobile = document.querySelector('.mobile-menu');
	      burgerDesktop.addEventListener('click', function () {
	        _headerNavMenu.classList.toggle('_open');
	        burgerDesktop.classList.toggle('_open');
	        // _headerNavMenuMobile.classList.toggle('_open');
	        document.querySelector('.header__row').classList.toggle('_disable');
	        headerNavContainer.classList.toggle('_disable');

	        // document.body.classList.toggle('_lock')
	      });
	    }

	    var desktopMenu = document.querySelector('.desktop-menu');
	    var _loop = function _loop() {
	      var child = desktopMenu.children[i];
	      var childLink = child.querySelector('.desktop-menu__link');
	      var childItem = child.querySelector('.desktop-menu__item');
	      childLink.addEventListener('mouseover', function () {
	        var desktopMenuItemOpen = document.querySelector('.desktop-menu__item._visible');
	        if (desktopMenuItemOpen) {
	          desktopMenuItemOpen.classList.remove('_visible');
	        }
	        if (childItem) {
	          childItem.classList.add('_visible');
	          main.addEventListener('mouseover', function () {
	            childItem.classList.remove('_visible');
	          });
	          footer.addEventListener('mouseover', function () {
	            childItem.classList.remove('_visible');
	          });
	        }
	      });
	    };
	    for (var i = 0; i < desktopMenu.children.length; i++) {
	      _loop();
	    }
	    var desktopMenuNav = desktopMenu.querySelectorAll('.desktop-menu-nav');
	    desktopMenuNav.forEach(function (MenuNav) {
	      var MenuNavLinks = MenuNav.querySelectorAll('.desktop-menu-nav__link');
	      MenuNavLinks.forEach(function (MenuNavLink) {
	        var MenuNavLinkAttribute = MenuNavLink.getAttribute('data-link');
	        var MenuNavBody = MenuNav.querySelector("[data-menu=\"" + MenuNavLinkAttribute + "\"]");
	        MenuNavLink.addEventListener('mouseover', function () {
	          var MenuNavLinkOpen = MenuNav.querySelector('.desktop-menu-nav__link._visible');
	          var MenuNavBodyOpen = MenuNav.querySelector('.desktop-menu-nav__body._visible');
	          if (MenuNavLinkOpen) {
	            MenuNavLinkOpen.classList.remove('_visible');
	            MenuNavBodyOpen.classList.remove('_visible');
	          }
	          MenuNavLink.classList.add('_visible');
	          MenuNavBody.classList.add('_visible');
	        });
	      });
	    });
	  }
	};

	function ownKeys(e, r) {
	  var t = Object.keys(e);
	  if (Object.getOwnPropertySymbols) {
	    var o = Object.getOwnPropertySymbols(e);
	    r && (o = o.filter(function (r) {
	      return Object.getOwnPropertyDescriptor(e, r).enumerable;
	    })), t.push.apply(t, o);
	  }
	  return t;
	}
	function _objectSpread2(e) {
	  for (var r = 1; r < arguments.length; r++) {
	    var t = null != arguments[r] ? arguments[r] : {};
	    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
	      _defineProperty(e, r, t[r]);
	    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
	      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
	    });
	  }
	  return e;
	}
	function _typeof(o) {
	  "@babel/helpers - typeof";

	  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
	    return typeof o;
	  } : function (o) {
	    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
	  }, _typeof(o);
	}
	function _classCallCheck(instance, Constructor) {
	  if (!(instance instanceof Constructor)) {
	    throw new TypeError("Cannot call a class as a function");
	  }
	}
	function _defineProperties(target, props) {
	  for (var i = 0; i < props.length; i++) {
	    var descriptor = props[i];
	    descriptor.enumerable = descriptor.enumerable || false;
	    descriptor.configurable = true;
	    if ("value" in descriptor) descriptor.writable = true;
	    Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor);
	  }
	}
	function _createClass(Constructor, protoProps, staticProps) {
	  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
	  if (staticProps) _defineProperties(Constructor, staticProps);
	  Object.defineProperty(Constructor, "prototype", {
	    writable: false
	  });
	  return Constructor;
	}
	function _defineProperty(obj, key, value) {
	  key = _toPropertyKey(key);
	  if (key in obj) {
	    Object.defineProperty(obj, key, {
	      value: value,
	      enumerable: true,
	      configurable: true,
	      writable: true
	    });
	  } else {
	    obj[key] = value;
	  }
	  return obj;
	}
	function _toConsumableArray(arr) {
	  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
	}
	function _arrayWithoutHoles(arr) {
	  if (Array.isArray(arr)) return _arrayLikeToArray(arr);
	}
	function _iterableToArray(iter) {
	  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
	}
	function _unsupportedIterableToArray(o, minLen) {
	  if (!o) return;
	  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
	  var n = Object.prototype.toString.call(o).slice(8, -1);
	  if (n === "Object" && o.constructor) n = o.constructor.name;
	  if (n === "Map" || n === "Set") return Array.from(o);
	  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
	}
	function _arrayLikeToArray(arr, len) {
	  if (len == null || len > arr.length) len = arr.length;
	  for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];
	  return arr2;
	}
	function _nonIterableSpread() {
	  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
	}
	function _toPrimitive(input, hint) {
	  if (typeof input !== "object" || input === null) return input;
	  var prim = input[Symbol.toPrimitive];
	  if (prim !== undefined) {
	    var res = prim.call(input, hint || "default");
	    if (typeof res !== "object") return res;
	    throw new TypeError("@@toPrimitive must return a primitive value.");
	  }
	  return (hint === "string" ? String : Number)(input);
	}
	function _toPropertyKey(arg) {
	  var key = _toPrimitive(arg, "string");
	  return typeof key === "symbol" ? key : String(key);
	}

	(function (global, factory) {
	  (typeof exports === "undefined" ? "undefined" : _typeof(exports)) === 'object' && typeof module !== 'undefined' ? module.exports = factory() : typeof define === 'function' && define.amd ? define(factory) : (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.Pristine = factory());
	})(undefined, function () {

	  var lang = {
	    en: {
	      required: "Обязательное поле",
	      email: "Введите e-mail",
	      number: "Введите число",
	      integer: "This field requires an integer value",
	      url: "Введите URL адрес",
	      tel: "Введите номер телефона",
	      maxlength: "Должно быть не больше ${1} символов",
	      minlength: "Должно быть не меньше ${1} символов",
	      min: "Минимальное значение ${1}",
	      max: "максимальное значение ${1}",
	      pattern: "Введите подходящий формат",
	      equals: "Пароли не совпадают",
	      "default": "Введите корректное значение"
	    }
	  };
	  function findAncestor(el, cls) {
	    while ((el = el.parentElement) && !el.classList.contains(cls)) {}
	    return el;
	  }
	  function tmpl(o) {
	    var _arguments = arguments;
	    return this.replace(/\${([^{}]*)}/g, function (a, b) {
	      return _arguments[b];
	    });
	  }
	  function groupedElemCount(input) {
	    return input.pristine.self.form.querySelectorAll('input[name="' + input.getAttribute('name') + '"]:checked').length;
	  }
	  function mergeConfig(obj1, obj2) {
	    for (var attr in obj2) {
	      if (!(attr in obj1)) {
	        obj1[attr] = obj2[attr];
	      }
	    }
	    return obj1;
	  }
	  var defaultConfig = {
	    classTo: 'form-group',
	    errorClass: 'has-danger',
	    successClass: 'has-success',
	    errorTextParent: 'form-group',
	    errorTextTag: 'div',
	    errorTextClass: 'text-help'
	  };
	  var PRISTINE_ERROR = 'pristine-error';
	  var SELECTOR = "input:not([type^=hidden]):not([type^=submit]), select, textarea";
	  var ALLOWED_ATTRIBUTES = ["required", "min", "max", 'minlength', 'maxlength', 'pattern'];
	  var EMAIL_REGEX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  var MESSAGE_REGEX = /-message(?:-([a-z]{2}(?:_[A-Z]{2})?))?/; // matches, -message, -message-en, -message-en_US
	  var currentLocale = 'en';
	  var validators = {};
	  var _ = function _(name, validator) {
	    validator.name = name;
	    if (validator.priority === undefined) validator.priority = 1;
	    validators[name] = validator;
	  };
	  _('text', {
	    fn: function fn(val) {
	      return true;
	    },
	    priority: 0
	  });
	  _('required', {
	    fn: function fn(val) {
	      return this.type === 'radio' || this.type === 'checkbox' ? groupedElemCount(this) : val !== undefined && val.trim() !== '';
	    },
	    priority: 99,
	    halt: true
	  });
	  _('email', {
	    fn: function fn(val) {
	      return !val || EMAIL_REGEX.test(val);
	    }
	  });
	  _('number', {
	    fn: function fn(val) {
	      return !val || !isNaN(parseFloat(val));
	    },
	    priority: 2
	  });
	  _('integer', {
	    fn: function fn(val) {
	      return !val || /^\d+$/.test(val);
	    }
	  });
	  _('minlength', {
	    fn: function fn(val, length) {
	      return !val || val.length >= parseInt(length);
	    }
	  });
	  _('maxlength', {
	    fn: function fn(val, length) {
	      return !val || val.length <= parseInt(length);
	    }
	  });
	  _('min', {
	    fn: function fn(val, limit) {
	      return !val || (this.type === 'checkbox' ? groupedElemCount(this) >= parseInt(limit) : parseFloat(val) >= parseFloat(limit));
	    }
	  });
	  _('max', {
	    fn: function fn(val, limit) {
	      return !val || (this.type === 'checkbox' ? groupedElemCount(this) <= parseInt(limit) : parseFloat(val) <= parseFloat(limit));
	    }
	  });
	  _('pattern', {
	    fn: function fn(val, pattern) {
	      var m = pattern.match(new RegExp('^/(.*?)/([gimy]*)$'));
	      return !val || new RegExp(m[1], m[2]).test(val);
	    }
	  });
	  _('equals', {
	    fn: function fn(val, otherFieldSelector) {
	      var other = document.querySelector(otherFieldSelector);
	      return other && (!val && !other.value || other.value === val);
	    }
	  });
	  function Pristine(form, config, live) {
	    var self = this;
	    init(form, config, live);
	    function init(form, config, live) {
	      form.setAttribute("novalidate", "true");
	      self.form = form;
	      self.config = mergeConfig(config || {}, defaultConfig);
	      self.live = !(live === false);
	      self.fields = Array.from(form.querySelectorAll(SELECTOR)).map(function (input) {
	        var fns = [];
	        var params = {};
	        var messages = {};
	        [].forEach.call(input.attributes, function (attr) {
	          if (/^data-pristine-/.test(attr.name)) {
	            var name = attr.name.substr(14);
	            var messageMatch = name.match(MESSAGE_REGEX);
	            if (messageMatch !== null) {
	              var locale = messageMatch[1] === undefined ? 'en' : messageMatch[1];
	              if (!messages.hasOwnProperty(locale)) messages[locale] = {};
	              messages[locale][name.slice(0, name.length - messageMatch[0].length)] = attr.value;
	              return;
	            }
	            if (name === 'type') name = attr.value;
	            _addValidatorToField(fns, params, name, attr.value);
	          } else if (~ALLOWED_ATTRIBUTES.indexOf(attr.name)) {
	            _addValidatorToField(fns, params, attr.name, attr.value);
	          } else if (attr.name === 'type') {
	            _addValidatorToField(fns, params, attr.value);
	          }
	        });
	        fns.sort(function (a, b) {
	          return b.priority - a.priority;
	        });
	        self.live && input.addEventListener(!~['radio', 'checkbox'].indexOf(input.getAttribute('type')) ? 'input' : 'change', function (e) {
	          self.validate(e.target);
	        }.bind(self));
	        return input.pristine = {
	          input: input,
	          validators: fns,
	          params: params,
	          messages: messages,
	          self: self
	        };
	      }.bind(self));
	    }
	    function _addValidatorToField(fns, params, name, value) {
	      var validator = validators[name];
	      if (validator) {
	        fns.push(validator);
	        if (value) {
	          var valueParams = name === "pattern" ? [value] : value.split(',');
	          valueParams.unshift(null); // placeholder for input's value
	          params[name] = valueParams;
	        }
	      }
	    }

	    /***
	     * Checks whether the form/input elements are valid
	     * @param input => input element(s) or a jquery selector, null for full form validation
	     * @param silent => do not show error messages, just return true/false
	     * @returns {boolean} return true when valid false otherwise
	     */
	    self.validate = function (input, silent) {
	      silent = input && silent === true || input === true;
	      var fields = self.fields;
	      if (input !== true && input !== false) {
	        if (input instanceof HTMLElement) {
	          fields = [input.pristine];
	        } else if (input instanceof NodeList || input instanceof (window.$ || Array) || input instanceof Array) {
	          fields = Array.from(input).map(function (el) {
	            return el.pristine;
	          });
	        }
	      }
	      var valid = true;
	      for (var i = 0; fields[i]; i++) {
	        var field = fields[i];
	        if (_validateField(field)) {
	          !silent && _showSuccess(field);
	        } else {
	          valid = false;
	          !silent && _showError(field);
	        }
	      }
	      return valid;
	    };

	    /***
	     * Get errors of a specific field or the whole form
	     * @param input
	     * @returns {Array|*}
	     */
	    self.getErrors = function (input) {
	      if (!input) {
	        var erroneousFields = [];
	        for (var i = 0; i < self.fields.length; i++) {
	          var field = self.fields[i];
	          if (field.errors.length) {
	            erroneousFields.push({
	              input: field.input,
	              errors: field.errors
	            });
	          }
	        }
	        return erroneousFields;
	      }
	      if (input.tagName && input.tagName.toLowerCase() === "select") {
	        return input.pristine.errors;
	      }
	      return input.length ? input[0].pristine.errors : input.pristine.errors;
	    };

	    /***
	     * Validates a single field, all validator functions are called and error messages are generated
	     * when a validator fails
	     * @param field
	     * @returns {boolean}
	     * @private
	     */
	    function _validateField(field) {
	      var errors = [];
	      var valid = true;
	      for (var i = 0; field.validators[i]; i++) {
	        var validator = field.validators[i];
	        var params = field.params[validator.name] ? field.params[validator.name] : [];
	        params[0] = field.input.value;
	        if (!validator.fn.apply(field.input, params)) {
	          valid = false;
	          if (typeof validator.msg === "function") {
	            errors.push(validator.msg(field.input.value, params));
	          } else if (typeof validator.msg === "string") {
	            errors.push(tmpl.apply(validator.msg, params));
	          } else if (validator.msg === Object(validator.msg) && validator.msg[currentLocale]) {
	            // typeof generates unnecessary babel code
	            errors.push(tmpl.apply(validator.msg[currentLocale], params));
	          } else if (field.messages[currentLocale] && field.messages[currentLocale][validator.name]) {
	            errors.push(tmpl.apply(field.messages[currentLocale][validator.name], params));
	          } else if (lang[currentLocale] && lang[currentLocale][validator.name]) {
	            errors.push(tmpl.apply(lang[currentLocale][validator.name], params));
	          } else {
	            errors.push(tmpl.apply(lang[currentLocale]["default"], params));
	          }
	          if (validator.halt === true) {
	            break;
	          }
	        }
	      }
	      field.errors = errors;
	      return valid;
	    }

	    /***
	     * Add a validator to a specific dom element in a form
	     * @param elem => The dom element where the validator is applied to
	     * @param fn => validator function
	     * @param msg => message to show when validation fails. Supports templating. ${0} for the input's value, ${1} and
	     * so on are for the attribute values
	     * @param priority => priority of the validator function, higher valued function gets called first.
	     * @param halt => whether validation should stop for this field after current validation function
	     */
	    self.addValidator = function (elem, fn, msg, priority, halt) {
	      if (elem instanceof HTMLElement) {
	        elem.pristine.validators.push({
	          fn: fn,
	          msg: msg,
	          priority: priority,
	          halt: halt
	        });
	        elem.pristine.validators.sort(function (a, b) {
	          return b.priority - a.priority;
	        });
	      } else {
	        console.warn("The parameter elem must be a dom element");
	      }
	    };

	    /***
	     * An utility function that returns a 2-element array, first one is the element where error/success class is
	     * applied. 2nd one is the element where error message is displayed. 2nd element is created if doesn't exist and cached.
	     * @param field
	     * @returns {*}
	     * @private
	     */
	    function _getErrorElements(field) {
	      if (field.errorElements) {
	        return field.errorElements;
	      }
	      var errorClassElement = findAncestor(field.input, self.config.classTo);
	      var errorTextParent = null,
	        errorTextElement = null;
	      if (self.config.classTo === self.config.errorTextParent) {
	        errorTextParent = errorClassElement;
	      } else {
	        errorTextParent = errorClassElement.querySelector('.' + self.config.errorTextParent);
	      }
	      if (errorTextParent) {
	        errorTextElement = errorTextParent.querySelector('.' + PRISTINE_ERROR);
	        if (!errorTextElement) {
	          errorTextElement = document.createElement(self.config.errorTextTag);
	          errorTextElement.className = PRISTINE_ERROR + ' ' + self.config.errorTextClass;
	          errorTextParent.appendChild(errorTextElement);
	          errorTextElement.pristineDisplay = errorTextElement.style.display;
	        }
	      }
	      return field.errorElements = [errorClassElement, errorTextElement];
	    }
	    function _showError(field) {
	      var errorElements = _getErrorElements(field);
	      var errorClassElement = errorElements[0],
	        errorTextElement = errorElements[1];
	      var input = field.input;
	      var inputId = input.id || Math.floor(new Date().valueOf() * Math.random());
	      var errorId = 'error-' + inputId;
	      if (errorClassElement) {
	        errorClassElement.classList.remove(self.config.successClass);
	        errorClassElement.classList.add(self.config.errorClass);
	        input.setAttribute('aria-describedby', errorId);
	        input.setAttribute('aria-invalid', 'true');
	      }
	      if (errorTextElement) {
	        errorTextElement.setAttribute('id', errorId);
	        errorTextElement.setAttribute('role', 'alert');
	        errorTextElement.innerHTML = field.errors.join('<br/>');
	        errorTextElement.style.display = errorTextElement.pristineDisplay || '';
	      }
	    }

	    /***
	     * Adds error to a specific field
	     * @param input
	     * @param error
	     */
	    self.addError = function (input, error) {
	      input = input.length ? input[0] : input;
	      input.pristine.errors.push(error);
	      _showError(input.pristine);
	    };
	    function _removeError(field) {
	      var errorElements = _getErrorElements(field);
	      var errorClassElement = errorElements[0],
	        errorTextElement = errorElements[1];
	      var input = field.input;
	      if (errorClassElement) {
	        // IE > 9 doesn't support multiple class removal
	        errorClassElement.classList.remove(self.config.errorClass);
	        errorClassElement.classList.remove(self.config.successClass);
	        input.removeAttribute('aria-describedby');
	        input.removeAttribute('aria-invalid');
	      }
	      if (errorTextElement) {
	        errorTextElement.removeAttribute('id');
	        errorTextElement.removeAttribute('role');
	        errorTextElement.innerHTML = '';
	        errorTextElement.style.display = 'none';
	      }
	      return errorElements;
	    }
	    function _showSuccess(field) {
	      var errorClassElement = _removeError(field)[0];
	      errorClassElement && errorClassElement.classList.add(self.config.successClass);
	    }

	    /***
	     * Resets the errors
	     */
	    self.reset = function () {
	      for (var i = 0; self.fields[i]; i++) {
	        self.fields[i].errorElements = null;
	      }
	      Array.from(self.form.querySelectorAll('.' + PRISTINE_ERROR)).map(function (elem) {
	        elem.parentNode.removeChild(elem);
	      });
	      Array.from(self.form.querySelectorAll('.' + self.config.classTo)).map(function (elem) {
	        elem.classList.remove(self.config.successClass);
	        elem.classList.remove(self.config.errorClass);
	      });
	    };

	    /***
	     * Resets the errors and deletes all pristine fields
	     */
	    self.destroy = function () {
	      self.reset();
	      self.fields.forEach(function (field) {
	        delete field.input.pristine;
	      });
	      self.fields = [];
	    };
	    self.setGlobalConfig = function (config) {
	      defaultConfig = config;
	    };
	    return self;
	  }

	  /***
	   *
	   * @param name => Name of the global validator
	   * @param fn => validator function
	   * @param msg => message to show when validation fails. Supports templating. ${0} for the input's value, ${1} and
	   * so on are for the attribute values
	   * @param priority => priority of the validator function, higher valued function gets called first.
	   * @param halt => whether validation should stop for this field after current validation function
	   */
	  Pristine.addValidator = function (name, fn, msg, priority, halt) {
	    _(name, {
	      fn: fn,
	      msg: msg,
	      priority: priority,
	      halt: halt
	    });
	  };
	  Pristine.addMessages = function (locale, messages) {
	    var langObj = lang.hasOwnProperty(locale) ? lang[locale] : lang[locale] = {};
	    Object.keys(messages).forEach(function (key, index) {
	      langObj[key] = messages[key];
	    });
	  };
	  Pristine.setLocale = function (locale) {
	    currentLocale = locale;
	  };
	  return Pristine;
	});
	var Pristine$1 = Pristine;

	var createElement = function createElement(template) {
	  var newElement = document.createElement("div");
	  newElement.innerHTML = template;
	  return newElement.firstChild;
	};
	var isElementVisible = function isElementVisible(element) {
	  return element.offsetParent !== null;
	};
	var resetInputs = function resetInputs(container) {
	  var dropdowns = container.querySelectorAll('.dropdown');
	  var radioButtons = container.querySelectorAll('.input-radio');
	  var inputRangeElemets = container.querySelectorAll('.input-radio-castom');
	  var inputCounts = container.querySelectorAll('.input-count');
	  if (dropdowns[0]) {
	    dropdowns.forEach(function (dropdown) {
	      var input = dropdown.querySelector('input');
	      var selectElements = dropdown.querySelectorAll('.dropdown__option');
	      var isTaskChooseElement = dropdown.hasAttribute('data-task-input');
	      var dropDownTitle = dropdown.querySelector('.dropdown__title');
	      if (isTaskChooseElement) {
	        // ставит значение, которые было у клонированногоэлемента
	        var firstElement = selectElements[0];
	        var defaultDataValue = firstElement.getAttribute('data-value');
	        var defaultTextValue = firstElement.textContent;
	        firstElement.classList.add('_selected');
	        dropDownTitle.textContent = defaultTextValue;
	        input.setAttribute('value', defaultDataValue);
	      } else {
	        // отчищает дропдаун
	        dropDownTitle.textContent = '';
	        input.setAttribute('value', '');
	      }
	      selectElements.forEach(function (option) {
	        option.classList.remove('_selected');
	      });
	      input.removeAttribute('checked');
	      input.setAttribute('data-listener-inited', '');
	    });
	  }
	  if (radioButtons[0]) {
	    radioButtons.forEach(function (radioButton) {
	      var inputs = radioButton.querySelectorAll('input');
	      inputs.forEach(function (input) {
	        input.checked = false;
	        input.removeAttribute('checked');
	        input.setAttribute('data-listener-inited', '');
	      });
	    });
	  }
	  if (inputRangeElemets[0]) {
	    inputRangeElemets.forEach(function (inputRangeElemet) {
	      var inputs = inputRangeElemet.querySelectorAll('input');
	      inputs.forEach(function (input) {
	        input.checked = false;
	        input.removeAttribute('checked');
	      });
	    });
	  }
	  if (inputCounts) {
	    inputCounts.forEach(function (inputCount) {
	      inputCount.querySelector('input').value = '';
	    });
	  }
	};

	var getTaskDescriptionTemplate = function getTaskDescriptionTemplate(id) {
	  return "<div class=\"solution-config__task task-first\" data-task-description data-task-description-id=\"".concat(id, "\">\n        <h4>\u0414\u043E\u043F\u043E\u043B\u043D\u0438\u0442\u0435\u043B\u044C\u043D\u0430\u044F \u0437\u0430\u0434\u0430\u0447\u0430:</h4>\n            <div class=\"solution-config__task-desc\">\n                <div class=\"solution-config__task-list\">\n                </div>\n            </div>\n    </div>");
	};
	var getDeleteButtonTemplate = function getDeleteButtonTemplate() {
	  return "<span class=\"btn btn_small btn_secondary input-set__reset\">\n        <span class=\"children\">\u0423\u0434\u0430\u043B\u0438\u0442\u044C</span>\n        <a href=\"#\" class=\"cover \"></a>\n    </span>";
	};
	var getTaskDescriptionElementTemplate = function getTaskDescriptionElementTemplate(title, value, name) {
	  return "<div class=\"solution-config__task-item\" ".concat(name ? "data-name=\"".concat(name, "\"") : '', ">\n\t\t<h5>").concat(title.trim(), ":</h5>\n\t\t<span>").concat(value.trim(), "</span>\n\t</div>");
	};
	var getTaskModalValue = function getTaskModalValue(title, value) {
	  return "<div class=\"popup-form__item\">\n\t\t<h4>".concat(title, "</h4>\n\t\t<span>").concat(value, "</span>\n\t</div>");
	};

	var takeControlForms = function takeControlForms() {
	  var wrapper = document.querySelector('.wrapper');
	  
	  var addValuesToCharacteristicsBlock = function addValuesToCharacteristicsBlock(element, characteristicsChoiceContainer) {
	    var inputs = element.querySelectorAll('input');
	    // добавляет характеристики в блок "соответсвует характеристикам"
	    inputs.forEach(function (input) {
	      input.addEventListener('change', function () {
	        var value = input.value;
	        var inputName = input.name;
	        var characteristicsNameValue = characteristicsChoiceContainer.querySelector("[data-name=\"".concat(inputName, "\"]"));
	        var isCheckbox = input.type === 'checkbox';
	        if (isCheckbox) {
	          var title = input.nextElementSibling.textContent;
	          var isChecked = input.checked;
	          if (characteristicsNameValue) {
	            characteristicsNameValue.remove();
	          }
	          if (isChecked) {
	            characteristicsChoiceContainer.append(createElement(getTaskDescriptionElementTemplate(title, 'Да', inputName)));
	          }
	          return;
	        }
	        var isDuplicate = false;
	        if (characteristicsNameValue) {
	          characteristicsNameValue.querySelector('span').textContent = value;
	          isDuplicate = true;
	        }
	        if (!isDuplicate) {
	          var _title = input.closest('[data-characteristics-choice]').querySelector('label').textContent;
	          characteristicsChoiceContainer.append(createElement(getTaskDescriptionElementTemplate(_title, value, inputName)));
	        }
	      });
	    });
	  };
	  if (wrapper) {
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.closest('form') && e.target.getAttribute('type') == 'submit' && e.target.closest('form').getAttribute('data-form') != 'config') {
	        var _formhValidator, _formhValidator2;
	        var form = e.target.closest('form');
	        var formhValidator = new Pristine$1(form);
	        (_formhValidator = formhValidator) === null || _formhValidator === void 0 || _formhValidator.reset();
	        (_formhValidator2 = formhValidator) === null || _formhValidator2 === void 0 || _formhValidator2.destroy();
	        formhValidator = new Pristine$1(form);
	        if (formhValidator.validate() != true) {
	          e.preventDefault();
	        }
	        form.addEventListener('reset', function (e) {
	          var inputs = form.querySelectorAll('input');
						var textareas = form.querySelectorAll('textarea');
	          inputs.forEach(function (input) {
	            if (input.classList.contains('_filled') && !input.value) {
	              input.classList.remove('_filled');
	            }
	          });
						if (textareas.length > 0) {
	            textareas.forEach(function (textarea) {
	              if (textarea.classList.contains('_filled') && !textarea.value) {
	                textarea.classList.remove('_filled');
	              }
	            });
	          }
	          var dropdowns = form.querySelectorAll('.dropdown');
	          if (dropdowns.length > 0) {
	            dropdowns.forEach(function (dropdown) {
	              var button = dropdown.querySelector('.dropdown__button');
	              var title = button.querySelector('.dropdown__title');
	              var placeholder = button.querySelector('.dropdown__placeholder');
	              var selected = dropdown.querySelector('._selected');
	              if (placeholder) {
	                placeholder.style.display = 'inline-block';
	                title.style.display = 'none';
	              }
	              if (selected) {
	                selected.classList.remove('_selected');
	              }
	            });
	          }
	        });
	      }
	      if (e.target.closest('.input-set__append')) {
	        setTimeout(function () {
	          document.querySelectorAll('.accordion__group').forEach(function (acEl) {
	            var formTasks = acEl.querySelectorAll('.accardeon__tasks');
	            if (e.target.classList.contains('dropdown__option')) {
	              formTasks.forEach(function (el) {
	                if (e.target.getAttribute('data-value') == el.getAttribute('data-task')) {
	                  el.classList.add('_open');
	                } else {
	                  el.classList.remove('_open');
	                }
	              });
	            }
	          });
	        }, 1);
	      }
	      var dropdownOption = e.target.closest('.dropdown__option');
	      if (dropdownOption) {
	        var taskValue = dropdownOption.closest('.tasks-value');
	        if (taskValue) {
	          var parent = taskValue.parentElement;
	          var valueOfDependElement = dropdownOption.getAttribute('data-value');
	          var dependDropdowns = parent.querySelectorAll('[data-task]');
	          dependDropdowns.forEach(function (dropdown) {
	            if (dropdown.getAttribute('data-task') === valueOfDependElement) {
	              dropdown.classList.add('_open');
	            } else {
	              dropdown.classList.remove('_open');
	            }
	          });
	        }
	      }
	      if (e.target.closest('.input-radio.producers') && e.target.tagName == 'INPUT') {
	        if (e.target.checked) {
	          var i = Array.prototype.indexOf.call(document.querySelector('.input-radio.producers').querySelectorAll('input'), e.target);
	          var inpsMarks = document.querySelector('.inputs-mark').querySelectorAll('.form-group');
	          inpsMarks.forEach(function (el) {
	            el.classList.remove('_open');
	          });
	          inpsMarks[i].classList.add('_open');
	        }
	      }
	    });
	    var characteristicsChoice = document.querySelectorAll('[data-characteristics-choice]');
	    var characteristicsChoiceContainer = document.querySelector('[data-characteristics-choice-container]');
	    var choiceForm = document.querySelector('.choise-form');
	    if (characteristicsChoice && characteristicsChoiceContainer) {
	      characteristicsChoice.forEach(function (element) {
	        var inputs = element.querySelectorAll('input');
	        var dataAttr = element.getAttribute('data-characteristics-choice');
	        var isVisible = isElementVisible(element);
	        switch (dataAttr) {
	          case 'radio':
	            {
	              var title = element.querySelector('label').textContent;
	              var inputChecked = _toConsumableArray(inputs).filter(function (input) {
	                return input.checked;
	              })[0];
	              var value = inputChecked ? inputChecked.value : false;
	              var inputName = inputChecked ? inputChecked.name : false;
	              if (value && title && isVisible) {
	                characteristicsChoiceContainer.append(createElement(getTaskDescriptionElementTemplate(title, value, inputName)));
	              }
	            }
	            break;
	          case 'dropdownOrCount':
	            {
	              var _title2 = element.querySelector('label').textContent;
	              var input = _toConsumableArray(inputs).filter(function (input) {
	                return input.value;
	              })[0];
	              var _value = input ? input.value : false;
	              var _inputName = input ? input.name : false;
	              if (isVisible && _value && _title2) {
	                characteristicsChoiceContainer.append(createElement(getTaskDescriptionElementTemplate(_title2, _value, _inputName)));
	              }
	            }
	            break;
	        }
	        addValuesToCharacteristicsBlock(element, characteristicsChoiceContainer);
	      });
	      var isInited = choiceForm.getAttribute('data-listener-inited');
	      if (isInited) return;
	      choiceForm.setAttribute('data-listener-inited', 'true');
	      choiceForm.addEventListener('click', function (evt) {
	        var addButton = evt.target.closest('.input-set__append');
	        if (addButton) {
	          setTimeout(function () {
	            var appendContainer = addButton.closest('[data-form="set"]');
	            var appendElements = appendContainer.querySelectorAll('[data-form="group"]');
	            var lastAppendElement = appendElements[appendElements.length - 1];
	            addValuesToCharacteristicsBlock(lastAppendElement, characteristicsChoiceContainer);
	          });
	        }
	      });
	    }
	  }
	  var setSelectedTaskToModal = function setSelectedTaskToModal() {
	    var taskContainers = document.querySelectorAll('.solution-config__task');
	    var modalTaskRes = document.querySelector('[data-form-res]');
	    if (!taskContainers && !modalTaskRes) return;
	    modalTaskRes.innerHTML = '';
	    taskContainers.forEach(function (taskContainer) {
	      var taskValues = [];
	      var taskTitle = taskContainer.querySelector('h4').textContent;
	      var tasks = taskContainer.querySelectorAll('.solution-config__task-item');
	      tasks.forEach(function (task) {
	        var title = task.querySelector('h5').textContent;
	        var value = task.querySelector('span').textContent;
	        taskValues.push({
	          title: title,
	          value: value
	        });
	      });
	      var title = "<h3>".concat(taskTitle, "</h3>");
	      modalTaskRes.append(createElement(title));
	      taskValues.forEach(function (task) {
	        modalTaskRes.append(createElement(getTaskModalValue(task.title, task.value)));
	      });
	    });
	  };
	  var sendButton = document.querySelector('[data-send-form]');
	  if (sendButton) {
	    sendButton.addEventListener('click', function () {
	      // отчищает инпуты у выбранных, но закрытых элементов
	      var taskLists = document.querySelectorAll('.tasks-list');
	      taskLists.forEach(function (taskList) {
	        var collapsedTasks = taskList.querySelectorAll('.accardeon__tasks:not(.accardeon__tasks._open)');
	        collapsedTasks.forEach(function (task) {
	          resetInputs(task);
	        });
	      });
	      setSelectedTaskToModal();
	    });
	  }
	};

	var cookieIsAcceptedStatusStorageKey = 'COOKIE_IS_ACCEPTED';
	var CookieController = /*#__PURE__*/function () {
	  function CookieController(cookieContainerSelector, cookieAcceptButtonSelector) {
	    var _this = this;
	    _classCallCheck(this, CookieController);
	    _defineProperty(this, "_checkCookieIsAccepted", function () {
	      return localStorage.getItem(cookieIsAcceptedStatusStorageKey);
	    });
	    _defineProperty(this, "_setCookieIsAccepted", function () {
	      localStorage.setItem(cookieIsAcceptedStatusStorageKey, true);
	    });
	    var cookieContainerElement = document.querySelector(cookieContainerSelector);
	    var cookieAcceptButtonElements = cookieContainerElement.querySelectorAll(cookieAcceptButtonSelector);
	    this._cookieContainer = cookieContainerElement;
	    var cookieIsAccepted = this._checkCookieIsAccepted();
	    if (!cookieIsAccepted) {
	      this._showCookieContainer();
	    }
	    cookieAcceptButtonElements.forEach(function (cookieAcceptButtonElement) {
	      cookieAcceptButtonElement.addEventListener('click', function (event) {
	        _this._setCookieIsAccepted();
	        _this._hideCookieContainer();
	      });
	    });
	  }
	  _createClass(CookieController, [{
	    key: "_hideCookieContainer",
	    value: function _hideCookieContainer() {
	      this._cookieContainer.classList.remove('_showing');
	    }
	  }, {
	    key: "_showCookieContainer",
	    value: function _showCookieContainer() {
	      this._cookieContainer.classList.add('_showing');
	    }
	  }]);
	  return CookieController;
	}();
	var takeControlCookie = function takeControlCookie(cookieContainerSelector, cookieAcceptButtonSelector) {
	  new CookieController(cookieContainerSelector, cookieAcceptButtonSelector);
	};

	var takeControlShopPOST = function takeControlShopPOST() {
	  let itemList = [];
	  for (let i = 0; i < localStorage.length; i++) {
	    if (localStorage.key(i).startsWith("shop-item-")) {
	      let itemObject = JSON.parse(localStorage.getItem(localStorage.key(i)));
	      itemList.push(itemObject);
	    }
	  }
	  if (itemList.length > 0) {
		  let basketId = localStorage.getItem('basketId');
	    var xhr = new XMLHttpRequest();
	    var url = '/local/ajaxhandler/basket.php';
	    let objFormData = new FormData();
		objFormData.set('updateBasketElement', JSON.stringify([basketId, itemList]));
	    xhr.open('POST', url, true);
	    //xhr.setRequestHeader('Content-Type', 'multipart/form-data; charset=UTF-8');
	    xhr.onload = function () {
	      if (xhr.status >= 200 && xhr.status < 300) {
	        try {
	          //var responseData = JSON.parse(xhr.responseText);
	          //console.log('Success:', responseData);
	        } catch (error) {
	          console.error('Error parsing JSON:', error);
	        }
	      } else {
	        console.error('Request failed. Status:', xhr.status);
	      }
	    };
	    xhr.onerror = function () {
	      console.error('Request failed');
	    };
	    xhr.send(objFormData);

	  }
	};

	var takeControlModal = function takeControlModal() {
	  // const popupLinks = document.querySelectorAll('.popup-link');

	  var wrapper = document.querySelector('.wrapper');
	  var body = document.querySelector('body');
	  var lockPadding = document.querySelectorAll('.lock-padding');
	  var popupActive = document.querySelector('.popup._open');
	  var lockPaddingValue = window.innerWidth - body.offsetWidth + 'px';
	  var unlock = true;
	  var timeout = 350; // Равна времени в transition
	  // let pageHash =  document.location.hash;

	  wrapper.addEventListener("click", function (e) {
	    if (e.target.classList.contains('popup-link')) {
	      var popupName = e.target.getAttribute('href').replace('#', '');
	      var currentPopup = document.getElementById(popupName);
	      popupOpen(currentPopup);
	      e.preventDefault();
	    }
			if (e.target.classList.contains('close-btn')) {
				popupClose(e.target.closest('.popup'));
			}
	  });
	  if (lockPadding.length > 0 && popupActive) {
	    lockPadding.forEach(function (elem) {
	      elem.style.paddingRight = lockPaddingValue;
	    });
	    body.style.paddingRight = lockPaddingValue;
	    body.classList.add('_lock');
	  }
	  var popupCloseIcon = document.querySelectorAll('.popup__close');
	  if (popupCloseIcon.length > 0) {
	    popupCloseIcon.forEach(function (elem) {
	      elem.addEventListener('click', function (e) {
	        popupClose(elem.closest('.popup'));
	        e.preventDefault();
	      });
	    });
	  }
	  var popupOpen = function popupOpen(currentPopup) {
	    if (currentPopup && unlock) {
	      var _popupActive = document.querySelector('.popup._open');
	      if (_popupActive) {
	        popupClose(_popupActive, false);
	      }
	      bodyLock();
	      if (currentPopup != null) {
			  // Проверяем наличие класса у элемента с id="shop"
				var currentPopupId = currentPopup.id;
				if (currentPopupId === 'shop') {
				  ym(13396396,'reachGoal','click_otkryt_korziny')
				  console.log('click_otkryt_korziny');
				}
	        currentPopup.classList.add('_open');
	        currentPopup.addEventListener('click', function (e) {
	          if (!e.target.closest('.popup__content')) {
	            popupClose(e.target.closest('.popup'));
	          }
	        });
					var choosingSocial = currentPopup.querySelector('.choosing-social');
	        if (choosingSocial) {
	          var phoneInput = currentPopup.querySelector('[data-type="tel"]');
	          phoneInput.setAttribute('required', '');
	          var emailInput = currentPopup.querySelector('[data-type="email"]');
	          emailInput.setAttribute('required', '');
	        }
	      }
	    }
	  };
	  var popupClose = function popupClose(popupActive) {
	    var doUnlock = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
	    if (unlock) {
	      popupActive.classList.remove('_open');
	      if (doUnlock) {
	        bodyUnlock();
	      }
	      if (popupActive.classList.contains('_success')) {
	        popupActive.classList.remove('_success');
	      }
				if (popupActive.querySelector('._success')) {
	        popupActive.querySelector('._success').classList.remove('_success');
	      }
	      var periodStringList = document.querySelectorAll('.popup-form__period');
	      if (periodStringList) {
	        periodStringList.forEach(function (period) {
	          period.removeAttribute('style');
	        });
	      }
				if (popupActive.classList.contains('popup-shop') && popupActive.getAttribute('id') == 'shop') {
	        takeControlShopPOST();
	      }
	    }
	  };
	  var bodyLock = function bodyLock() {
	    var lockPaddingValue = window.innerWidth - body.offsetWidth + 'px';
	    if (lockPadding.length > 0) {
	      lockPadding.forEach(function (elem) {
	        elem.style.paddingRight = lockPaddingValue;
	      });
	    }
	    body.style.paddingRight = lockPaddingValue;
	    body.classList.add('_lock');
	    unlock = false;
	    setTimeout(function () {
	      unlock = true;
	    }, timeout);
	  };
	  var bodyUnlock = function bodyUnlock() {
	    setTimeout(function () {
	      if (lockPadding.length > 0) {
	        lockPadding.forEach(function (elem) {
	          elem.style.paddingRight = '0px';
	        });
	      }
	      body.style.paddingRight = '0px';
	      body.classList.remove('_lock');
	    }, timeout);
	    unlock = false;
	    setTimeout(function () {
	      unlock = true;
	    }, timeout);
	  };
	};

	var takeControlSearch = function takeControlSearch() {
	  var search = document.querySelector('.header__search');
	  var searchBar = search.querySelector('.search-bar');
	  var searchInput = search.querySelector('input');
	  var searchSubmit = search.querySelector('.search-bar__submit');
	  if (window.innerWidth < 769) {
	    document.onclick = function (e) {
	      if (e.target == search || e.target == searchBar || e.target == searchInput || e.target == searchSubmit) {
	        search.classList.add('_open');
	        searchInput.focus();
	      } else {
	        search.classList.remove('_open');
	      }
	    };
	  }
	};
	window.addEventListener('resize', function () {
	  takeControlSearch();
	});

	var takeControlAccordion = function takeControlAccordion() {
	  document.body.addEventListener('click', function (e) {
	    if (e.target.classList.contains('accordion__title')) {
	      var accordion = e.target.closest('.accordion');
	      if (!accordion.classList.contains('_open')) {
	        accordion.classList.add('_open');
	      } else {
	        accordion.classList.remove('_open');
	      }
	    }
	    if (e.target.getAttribute('data-accordion') == 'title' || e.target.closest('[data-accordion="title"]')) {
	      e.target.closest('[data-accordion="accordion"]').classList.toggle('_open');
	    }
	  });
	};

	var takeControlTabs = function takeControlTabs() {
	  var tabs = document.querySelectorAll('.tabs');
	  if (tabs.length > 0) {
	    tabs.forEach(function (tab) {
	      var tabsTitles = tab.querySelectorAll('.tabs__title');
	      var tabsContents = tab.querySelectorAll('.tabs__content');
	      if (tabsContents.length > 0) {
	        tabsTitles.forEach(function (elem, i) {
	          elem.addEventListener("click", function (e) {
	            tabsClose();
	            elem.classList.add("_active");
	            tabsContents[i].classList.add("_active");
	          });
	        });
	        var tabsClose = function tabsClose() {
	          tabsTitles.forEach(function (elem) {
	            elem.classList.remove('_active');
	          });
	          tabsContents.forEach(function (elem) {
	            elem.classList.remove('_active');
	          });
	        };
	      }
	    });
	  }
	};

	/** Checks if value is string */
	function isString(str) {
	  return typeof str === 'string' || str instanceof String;
	}

	/** Checks if value is object */
	function isObject$2(obj) {
	  var _obj$constructor;
	  return typeof obj === 'object' && obj != null && (obj == null || (_obj$constructor = obj.constructor) == null ? void 0 : _obj$constructor.name) === 'Object';
	}
	function pick(obj, keys) {
	  if (Array.isArray(keys)) return pick(obj, (_, k) => keys.includes(k));
	  return Object.entries(obj).reduce((acc, _ref) => {
	    let [k, v] = _ref;
	    if (keys(v, k)) acc[k] = v;
	    return acc;
	  }, {});
	}

	/** Direction */
	const DIRECTION = {
	  NONE: 'NONE',
	  LEFT: 'LEFT',
	  FORCE_LEFT: 'FORCE_LEFT',
	  RIGHT: 'RIGHT',
	  FORCE_RIGHT: 'FORCE_RIGHT'
	};

	/** Direction */

	function forceDirection(direction) {
	  switch (direction) {
	    case DIRECTION.LEFT:
	      return DIRECTION.FORCE_LEFT;
	    case DIRECTION.RIGHT:
	      return DIRECTION.FORCE_RIGHT;
	    default:
	      return direction;
	  }
	}

	/** Escapes regular expression control chars */
	function escapeRegExp(str) {
	  return str.replace(/([.*+?^=!:${}()|[\]/\\])/g, '\\$1');
	}

	// cloned from https://github.com/epoberezkin/fast-deep-equal with small changes
	function objectIncludes(b, a) {
	  if (a === b) return true;
	  const arrA = Array.isArray(a),
	    arrB = Array.isArray(b);
	  let i;
	  if (arrA && arrB) {
	    if (a.length != b.length) return false;
	    for (i = 0; i < a.length; i++) if (!objectIncludes(a[i], b[i])) return false;
	    return true;
	  }
	  if (arrA != arrB) return false;
	  if (a && b && typeof a === 'object' && typeof b === 'object') {
	    const dateA = a instanceof Date,
	      dateB = b instanceof Date;
	    if (dateA && dateB) return a.getTime() == b.getTime();
	    if (dateA != dateB) return false;
	    const regexpA = a instanceof RegExp,
	      regexpB = b instanceof RegExp;
	    if (regexpA && regexpB) return a.toString() == b.toString();
	    if (regexpA != regexpB) return false;
	    const keys = Object.keys(a);
	    // if (keys.length !== Object.keys(b).length) return false;

	    for (i = 0; i < keys.length; i++) if (!Object.prototype.hasOwnProperty.call(b, keys[i])) return false;
	    for (i = 0; i < keys.length; i++) if (!objectIncludes(b[keys[i]], a[keys[i]])) return false;
	    return true;
	  } else if (a && b && typeof a === 'function' && typeof b === 'function') {
	    return a.toString() === b.toString();
	  }
	  return false;
	}

	/** Provides details of changing input */
	class ActionDetails {
	  /** Current input value */

	  /** Current cursor position */

	  /** Old input value */

	  /** Old selection */

	  constructor(opts) {
	    Object.assign(this, opts);

	    // double check if left part was changed (autofilling, other non-standard input triggers)
	    while (this.value.slice(0, this.startChangePos) !== this.oldValue.slice(0, this.startChangePos)) {
	      --this.oldSelection.start;
	    }
	    if (this.insertedCount) {
	      // double check right part
	      while (this.value.slice(this.cursorPos) !== this.oldValue.slice(this.oldSelection.end)) {
	        if (this.value.length - this.cursorPos < this.oldValue.length - this.oldSelection.end) ++this.oldSelection.end;else ++this.cursorPos;
	      }
	    }
	  }

	  /** Start changing position */
	  get startChangePos() {
	    return Math.min(this.cursorPos, this.oldSelection.start);
	  }

	  /** Inserted symbols count */
	  get insertedCount() {
	    return this.cursorPos - this.startChangePos;
	  }

	  /** Inserted symbols */
	  get inserted() {
	    return this.value.substr(this.startChangePos, this.insertedCount);
	  }

	  /** Removed symbols count */
	  get removedCount() {
	    // Math.max for opposite operation
	    return Math.max(this.oldSelection.end - this.startChangePos ||
	    // for Delete
	    this.oldValue.length - this.value.length, 0);
	  }

	  /** Removed symbols */
	  get removed() {
	    return this.oldValue.substr(this.startChangePos, this.removedCount);
	  }

	  /** Unchanged head symbols */
	  get head() {
	    return this.value.substring(0, this.startChangePos);
	  }

	  /** Unchanged tail symbols */
	  get tail() {
	    return this.value.substring(this.startChangePos + this.insertedCount);
	  }

	  /** Remove direction */
	  get removeDirection() {
	    if (!this.removedCount || this.insertedCount) return DIRECTION.NONE;

	    // align right if delete at right
	    return (this.oldSelection.end === this.cursorPos || this.oldSelection.start === this.cursorPos) &&
	    // if not range removed (event with backspace)
	    this.oldSelection.end === this.oldSelection.start ? DIRECTION.RIGHT : DIRECTION.LEFT;
	  }
	}

	/** Applies mask on element */
	function IMask(el, opts) {
	  // currently available only for input-like elements
	  return new IMask.InputMask(el, opts);
	}

	// TODO can't use overloads here because of https://github.com/microsoft/TypeScript/issues/50754
	// export function maskedClass(mask: string): typeof MaskedPattern;
	// export function maskedClass(mask: DateConstructor): typeof MaskedDate;
	// export function maskedClass(mask: NumberConstructor): typeof MaskedNumber;
	// export function maskedClass(mask: Array<any> | ArrayConstructor): typeof MaskedDynamic;
	// export function maskedClass(mask: MaskedDate): typeof MaskedDate;
	// export function maskedClass(mask: MaskedNumber): typeof MaskedNumber;
	// export function maskedClass(mask: MaskedEnum): typeof MaskedEnum;
	// export function maskedClass(mask: MaskedRange): typeof MaskedRange;
	// export function maskedClass(mask: MaskedRegExp): typeof MaskedRegExp;
	// export function maskedClass(mask: MaskedFunction): typeof MaskedFunction;
	// export function maskedClass(mask: MaskedPattern): typeof MaskedPattern;
	// export function maskedClass(mask: MaskedDynamic): typeof MaskedDynamic;
	// export function maskedClass(mask: Masked): typeof Masked;
	// export function maskedClass(mask: typeof Masked): typeof Masked;
	// export function maskedClass(mask: typeof MaskedDate): typeof MaskedDate;
	// export function maskedClass(mask: typeof MaskedNumber): typeof MaskedNumber;
	// export function maskedClass(mask: typeof MaskedEnum): typeof MaskedEnum;
	// export function maskedClass(mask: typeof MaskedRange): typeof MaskedRange;
	// export function maskedClass(mask: typeof MaskedRegExp): typeof MaskedRegExp;
	// export function maskedClass(mask: typeof MaskedFunction): typeof MaskedFunction;
	// export function maskedClass(mask: typeof MaskedPattern): typeof MaskedPattern;
	// export function maskedClass(mask: typeof MaskedDynamic): typeof MaskedDynamic;
	// export function maskedClass<Mask extends typeof Masked> (mask: Mask): Mask;
	// export function maskedClass(mask: RegExp): typeof MaskedRegExp;
	// export function maskedClass(mask: (value: string, ...args: any[]) => boolean): typeof MaskedFunction;

	/** Get Masked class by mask type */
	function maskedClass(mask) /* TODO */{
	  if (mask == null) throw new Error('mask property should be defined');
	  if (mask instanceof RegExp) return IMask.MaskedRegExp;
	  if (isString(mask)) return IMask.MaskedPattern;
	  if (mask === Date) return IMask.MaskedDate;
	  if (mask === Number) return IMask.MaskedNumber;
	  if (Array.isArray(mask) || mask === Array) return IMask.MaskedDynamic;
	  if (IMask.Masked && mask.prototype instanceof IMask.Masked) return mask;
	  if (IMask.Masked && mask instanceof IMask.Masked) return mask.constructor;
	  if (mask instanceof Function) return IMask.MaskedFunction;
	  console.warn('Mask not found for mask', mask); // eslint-disable-line no-console
	  return IMask.Masked;
	}
	function normalizeOpts(opts) {
	  if (!opts) throw new Error('Options in not defined');
	  if (IMask.Masked) {
	    if (opts.prototype instanceof IMask.Masked) return {
	      mask: opts
	    };

	    /*
	      handle cases like:
	      1) opts = Masked
	      2) opts = { mask: Masked, ...instanceOpts }
	    */
	    const {
	      mask = undefined,
	      ...instanceOpts
	    } = opts instanceof IMask.Masked ? {
	      mask: opts
	    } : isObject$2(opts) && opts.mask instanceof IMask.Masked ? opts : {};
	    if (mask) {
	      const _mask = mask.mask;
	      return {
	        ...pick(mask, (_, k) => !k.startsWith('_')),
	        mask: mask.constructor,
	        _mask,
	        ...instanceOpts
	      };
	    }
	  }
	  if (!isObject$2(opts)) return {
	    mask: opts
	  };
	  return {
	    ...opts
	  };
	}

	// TODO can't use overloads here because of https://github.com/microsoft/TypeScript/issues/50754

	// From masked
	// export default function createMask<Opts extends Masked, ReturnMasked=Opts> (opts: Opts): ReturnMasked;
	// // From masked class
	// export default function createMask<Opts extends MaskedOptions<typeof Masked>, ReturnMasked extends Masked=InstanceType<Opts['mask']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedDate>, ReturnMasked extends MaskedDate=MaskedDate<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedNumber>, ReturnMasked extends MaskedNumber=MaskedNumber<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedEnum>, ReturnMasked extends MaskedEnum=MaskedEnum<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedRange>, ReturnMasked extends MaskedRange=MaskedRange<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedRegExp>, ReturnMasked extends MaskedRegExp=MaskedRegExp<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedFunction>, ReturnMasked extends MaskedFunction=MaskedFunction<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedPattern>, ReturnMasked extends MaskedPattern=MaskedPattern<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<typeof MaskedDynamic>, ReturnMasked extends MaskedDynamic=MaskedDynamic<Opts['parent']>> (opts: Opts): ReturnMasked;
	// // From mask opts
	// export default function createMask<Opts extends MaskedOptions<Masked>, ReturnMasked=Opts extends MaskedOptions<infer M> ? M : never> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedNumberOptions, ReturnMasked extends MaskedNumber=MaskedNumber<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedDateFactoryOptions, ReturnMasked extends MaskedDate=MaskedDate<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedEnumOptions, ReturnMasked extends MaskedEnum=MaskedEnum<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedRangeOptions, ReturnMasked extends MaskedRange=MaskedRange<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedPatternOptions, ReturnMasked extends MaskedPattern=MaskedPattern<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedDynamicOptions, ReturnMasked extends MaskedDynamic=MaskedDynamic<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<RegExp>, ReturnMasked extends MaskedRegExp=MaskedRegExp<Opts['parent']>> (opts: Opts): ReturnMasked;
	// export default function createMask<Opts extends MaskedOptions<Function>, ReturnMasked extends MaskedFunction=MaskedFunction<Opts['parent']>> (opts: Opts): ReturnMasked;

	/** Creates new {@link Masked} depending on mask type */
	function createMask(opts) {
	  if (IMask.Masked && opts instanceof IMask.Masked) return opts;
	  const nOpts = normalizeOpts(opts);
	  const MaskedClass = maskedClass(nOpts.mask);
	  if (!MaskedClass) throw new Error("Masked class is not found for provided mask " + nOpts.mask + ", appropriate module needs to be imported manually before creating mask.");
	  if (nOpts.mask === MaskedClass) delete nOpts.mask;
	  if (nOpts._mask) {
	    nOpts.mask = nOpts._mask;
	    delete nOpts._mask;
	  }
	  return new MaskedClass(nOpts);
	}
	IMask.createMask = createMask;

	/**  Generic element API to use with mask */
	class MaskElement {
	  /** */

	  /** */

	  /** */

	  /** Safely returns selection start */
	  get selectionStart() {
	    let start;
	    try {
	      start = this._unsafeSelectionStart;
	    } catch {}
	    return start != null ? start : this.value.length;
	  }

	  /** Safely returns selection end */
	  get selectionEnd() {
	    let end;
	    try {
	      end = this._unsafeSelectionEnd;
	    } catch {}
	    return end != null ? end : this.value.length;
	  }

	  /** Safely sets element selection */
	  select(start, end) {
	    if (start == null || end == null || start === this.selectionStart && end === this.selectionEnd) return;
	    try {
	      this._unsafeSelect(start, end);
	    } catch {}
	  }

	  /** */
	  get isActive() {
	    return false;
	  }
	  /** */

	  /** */

	  /** */
	}

	IMask.MaskElement = MaskElement;

	const KEY_Z = 90;
	const KEY_Y = 89;

	/** Bridge between HTMLElement and {@link Masked} */
	class HTMLMaskElement extends MaskElement {
	  /** HTMLElement to use mask on */

	  constructor(input) {
	    super();
	    this.input = input;
	    this._onKeydown = this._onKeydown.bind(this);
	    this._onInput = this._onInput.bind(this);
	    this._onBeforeinput = this._onBeforeinput.bind(this);
	    this._onCompositionEnd = this._onCompositionEnd.bind(this);
	  }
	  get rootElement() {
	    var _this$input$getRootNo, _this$input$getRootNo2, _this$input;
	    return (_this$input$getRootNo = (_this$input$getRootNo2 = (_this$input = this.input).getRootNode) == null ? void 0 : _this$input$getRootNo2.call(_this$input)) != null ? _this$input$getRootNo : document;
	  }

	  /** Is element in focus */
	  get isActive() {
	    return this.input === this.rootElement.activeElement;
	  }

	  /** Binds HTMLElement events to mask internal events */
	  bindEvents(handlers) {
	    this.input.addEventListener('keydown', this._onKeydown);
	    this.input.addEventListener('input', this._onInput);
	    this.input.addEventListener('beforeinput', this._onBeforeinput);
	    this.input.addEventListener('compositionend', this._onCompositionEnd);
	    this.input.addEventListener('drop', handlers.drop);
	    this.input.addEventListener('click', handlers.click);
	    this.input.addEventListener('focus', handlers.focus);
	    this.input.addEventListener('blur', handlers.commit);
	    this._handlers = handlers;
	  }
	  _onKeydown(e) {
	    if (this._handlers.redo && (e.keyCode === KEY_Z && e.shiftKey && (e.metaKey || e.ctrlKey) || e.keyCode === KEY_Y && e.ctrlKey)) {
	      e.preventDefault();
	      return this._handlers.redo(e);
	    }
	    if (this._handlers.undo && e.keyCode === KEY_Z && (e.metaKey || e.ctrlKey)) {
	      e.preventDefault();
	      return this._handlers.undo(e);
	    }
	    if (!e.isComposing) this._handlers.selectionChange(e);
	  }
	  _onBeforeinput(e) {
	    if (e.inputType === 'historyUndo' && this._handlers.undo) {
	      e.preventDefault();
	      return this._handlers.undo(e);
	    }
	    if (e.inputType === 'historyRedo' && this._handlers.redo) {
	      e.preventDefault();
	      return this._handlers.redo(e);
	    }
	  }
	  _onCompositionEnd(e) {
	    this._handlers.input(e);
	  }
	  _onInput(e) {
	    if (!e.isComposing) this._handlers.input(e);
	  }

	  /** Unbinds HTMLElement events to mask internal events */
	  unbindEvents() {
	    this.input.removeEventListener('keydown', this._onKeydown);
	    this.input.removeEventListener('input', this._onInput);
	    this.input.removeEventListener('beforeinput', this._onBeforeinput);
	    this.input.removeEventListener('compositionend', this._onCompositionEnd);
	    this.input.removeEventListener('drop', this._handlers.drop);
	    this.input.removeEventListener('click', this._handlers.click);
	    this.input.removeEventListener('focus', this._handlers.focus);
	    this.input.removeEventListener('blur', this._handlers.commit);
	    this._handlers = {};
	  }
	}
	IMask.HTMLMaskElement = HTMLMaskElement;

	/** Bridge between InputElement and {@link Masked} */
	class HTMLInputMaskElement extends HTMLMaskElement {
	  /** InputElement to use mask on */

	  constructor(input) {
	    super(input);
	    this.input = input;
	  }

	  /** Returns InputElement selection start */
	  get _unsafeSelectionStart() {
	    return this.input.selectionStart != null ? this.input.selectionStart : this.value.length;
	  }

	  /** Returns InputElement selection end */
	  get _unsafeSelectionEnd() {
	    return this.input.selectionEnd;
	  }

	  /** Sets InputElement selection */
	  _unsafeSelect(start, end) {
	    this.input.setSelectionRange(start, end);
	  }
	  get value() {
	    return this.input.value;
	  }
	  set value(value) {
	    this.input.value = value;
	  }
	}
	IMask.HTMLMaskElement = HTMLMaskElement;

	class HTMLContenteditableMaskElement extends HTMLMaskElement {
	  /** Returns HTMLElement selection start */
	  get _unsafeSelectionStart() {
	    const root = this.rootElement;
	    const selection = root.getSelection && root.getSelection();
	    const anchorOffset = selection && selection.anchorOffset;
	    const focusOffset = selection && selection.focusOffset;
	    if (focusOffset == null || anchorOffset == null || anchorOffset < focusOffset) {
	      return anchorOffset;
	    }
	    return focusOffset;
	  }

	  /** Returns HTMLElement selection end */
	  get _unsafeSelectionEnd() {
	    const root = this.rootElement;
	    const selection = root.getSelection && root.getSelection();
	    const anchorOffset = selection && selection.anchorOffset;
	    const focusOffset = selection && selection.focusOffset;
	    if (focusOffset == null || anchorOffset == null || anchorOffset > focusOffset) {
	      return anchorOffset;
	    }
	    return focusOffset;
	  }

	  /** Sets HTMLElement selection */
	  _unsafeSelect(start, end) {
	    if (!this.rootElement.createRange) return;
	    const range = this.rootElement.createRange();
	    range.setStart(this.input.firstChild || this.input, start);
	    range.setEnd(this.input.lastChild || this.input, end);
	    const root = this.rootElement;
	    const selection = root.getSelection && root.getSelection();
	    if (selection) {
	      selection.removeAllRanges();
	      selection.addRange(range);
	    }
	  }

	  /** HTMLElement value */
	  get value() {
	    return this.input.textContent || '';
	  }
	  set value(value) {
	    this.input.textContent = value;
	  }
	}
	IMask.HTMLContenteditableMaskElement = HTMLContenteditableMaskElement;

	class InputHistory {
	  constructor() {
	    this.states = [];
	    this.currentIndex = 0;
	  }
	  get currentState() {
	    return this.states[this.currentIndex];
	  }
	  get isEmpty() {
	    return this.states.length === 0;
	  }
	  push(state) {
	    // if current index points before the last element then remove the future
	    if (this.currentIndex < this.states.length - 1) this.states.length = this.currentIndex + 1;
	    this.states.push(state);
	    if (this.states.length > InputHistory.MAX_LENGTH) this.states.shift();
	    this.currentIndex = this.states.length - 1;
	  }
	  go(steps) {
	    this.currentIndex = Math.min(Math.max(this.currentIndex + steps, 0), this.states.length - 1);
	    return this.currentState;
	  }
	  undo() {
	    return this.go(-1);
	  }
	  redo() {
	    return this.go(+1);
	  }
	  clear() {
	    this.states.length = 0;
	    this.currentIndex = 0;
	  }
	}
	InputHistory.MAX_LENGTH = 100;

	/** Listens to element events and controls changes between element and {@link Masked} */
	class InputMask {
	  /**
	    View element
	  */

	  /** Internal {@link Masked} model */

	  constructor(el, opts) {
	    this.el = el instanceof MaskElement ? el : el.isContentEditable && el.tagName !== 'INPUT' && el.tagName !== 'TEXTAREA' ? new HTMLContenteditableMaskElement(el) : new HTMLInputMaskElement(el);
	    this.masked = createMask(opts);
	    this._listeners = {};
	    this._value = '';
	    this._unmaskedValue = '';
	    this._rawInputValue = '';
	    this.history = new InputHistory();
	    this._saveSelection = this._saveSelection.bind(this);
	    this._onInput = this._onInput.bind(this);
	    this._onChange = this._onChange.bind(this);
	    this._onDrop = this._onDrop.bind(this);
	    this._onFocus = this._onFocus.bind(this);
	    this._onClick = this._onClick.bind(this);
	    this._onUndo = this._onUndo.bind(this);
	    this._onRedo = this._onRedo.bind(this);
	    this.alignCursor = this.alignCursor.bind(this);
	    this.alignCursorFriendly = this.alignCursorFriendly.bind(this);
	    this._bindEvents();

	    // refresh
	    this.updateValue();
	    this._onChange();
	  }
	  maskEquals(mask) {
	    var _this$masked;
	    return mask == null || ((_this$masked = this.masked) == null ? void 0 : _this$masked.maskEquals(mask));
	  }

	  /** Masked */
	  get mask() {
	    return this.masked.mask;
	  }
	  set mask(mask) {
	    if (this.maskEquals(mask)) return;
	    if (!(mask instanceof IMask.Masked) && this.masked.constructor === maskedClass(mask)) {
	      // TODO "any" no idea
	      this.masked.updateOptions({
	        mask
	      });
	      return;
	    }
	    const masked = mask instanceof IMask.Masked ? mask : createMask({
	      mask
	    });
	    masked.unmaskedValue = this.masked.unmaskedValue;
	    this.masked = masked;
	  }

	  /** Raw value */
	  get value() {
	    return this._value;
	  }
	  set value(str) {
	    if (this.value === str) return;
	    this.masked.value = str;
	    this.updateControl('auto');
	  }

	  /** Unmasked value */
	  get unmaskedValue() {
	    return this._unmaskedValue;
	  }
	  set unmaskedValue(str) {
	    if (this.unmaskedValue === str) return;
	    this.masked.unmaskedValue = str;
	    this.updateControl('auto');
	  }

	  /** Raw input value */
	  get rawInputValue() {
	    return this._rawInputValue;
	  }
	  set rawInputValue(str) {
	    if (this.rawInputValue === str) return;
	    this.masked.rawInputValue = str;
	    this.updateControl();
	    this.alignCursor();
	  }

	  /** Typed unmasked value */
	  get typedValue() {
	    return this.masked.typedValue;
	  }
	  set typedValue(val) {
	    if (this.masked.typedValueEquals(val)) return;
	    this.masked.typedValue = val;
	    this.updateControl('auto');
	  }

	  /** Display value */
	  get displayValue() {
	    return this.masked.displayValue;
	  }

	  /** Starts listening to element events */
	  _bindEvents() {
	    this.el.bindEvents({
	      selectionChange: this._saveSelection,
	      input: this._onInput,
	      drop: this._onDrop,
	      click: this._onClick,
	      focus: this._onFocus,
	      commit: this._onChange,
	      undo: this._onUndo,
	      redo: this._onRedo
	    });
	  }

	  /** Stops listening to element events */
	  _unbindEvents() {
	    if (this.el) this.el.unbindEvents();
	  }

	  /** Fires custom event */
	  _fireEvent(ev, e) {
	    const listeners = this._listeners[ev];
	    if (!listeners) return;
	    listeners.forEach(l => l(e));
	  }

	  /** Current selection start */
	  get selectionStart() {
	    return this._cursorChanging ? this._changingCursorPos : this.el.selectionStart;
	  }

	  /** Current cursor position */
	  get cursorPos() {
	    return this._cursorChanging ? this._changingCursorPos : this.el.selectionEnd;
	  }
	  set cursorPos(pos) {
	    if (!this.el || !this.el.isActive) return;
	    this.el.select(pos, pos);
	    this._saveSelection();
	  }

	  /** Stores current selection */
	  _saveSelection( /* ev */
	  ) {
	    if (this.displayValue !== this.el.value) {
	      console.warn('Element value was changed outside of mask. Syncronize mask using `mask.updateValue()` to work properly.'); // eslint-disable-line no-console
	    }

	    this._selection = {
	      start: this.selectionStart,
	      end: this.cursorPos
	    };
	  }

	  /** Syncronizes model value from view */
	  updateValue() {
	    this.masked.value = this.el.value;
	    this._value = this.masked.value;
	    this._unmaskedValue = this.masked.unmaskedValue;
	    this._rawInputValue = this.masked.rawInputValue;
	  }

	  /** Syncronizes view from model value, fires change events */
	  updateControl(cursorPos) {
	    const newUnmaskedValue = this.masked.unmaskedValue;
	    const newValue = this.masked.value;
	    const newRawInputValue = this.masked.rawInputValue;
	    const newDisplayValue = this.displayValue;
	    const isChanged = this.unmaskedValue !== newUnmaskedValue || this.value !== newValue || this._rawInputValue !== newRawInputValue;
	    this._unmaskedValue = newUnmaskedValue;
	    this._value = newValue;
	    this._rawInputValue = newRawInputValue;
	    if (this.el.value !== newDisplayValue) this.el.value = newDisplayValue;
	    if (cursorPos === 'auto') this.alignCursor();else if (cursorPos != null) this.cursorPos = cursorPos;
	    if (isChanged) this._fireChangeEvents();
	    if (!this._historyChanging && (isChanged || this.history.isEmpty)) this.history.push({
	      unmaskedValue: newUnmaskedValue,
	      selection: {
	        start: this.selectionStart,
	        end: this.cursorPos
	      }
	    });
	  }

	  /** Updates options with deep equal check, recreates {@link Masked} model if mask type changes */
	  updateOptions(opts) {
	    const {
	      mask,
	      ...restOpts
	    } = opts; // TODO types, yes, mask is optional

	    const updateMask = !this.maskEquals(mask);
	    const updateOpts = this.masked.optionsIsChanged(restOpts);
	    if (updateMask) this.mask = mask;
	    if (updateOpts) this.masked.updateOptions(restOpts); // TODO

	    if (updateMask || updateOpts) this.updateControl();
	  }

	  /** Updates cursor */
	  updateCursor(cursorPos) {
	    if (cursorPos == null) return;
	    this.cursorPos = cursorPos;

	    // also queue change cursor for mobile browsers
	    this._delayUpdateCursor(cursorPos);
	  }

	  /** Delays cursor update to support mobile browsers */
	  _delayUpdateCursor(cursorPos) {
	    this._abortUpdateCursor();
	    this._changingCursorPos = cursorPos;
	    this._cursorChanging = setTimeout(() => {
	      if (!this.el) return; // if was destroyed
	      this.cursorPos = this._changingCursorPos;
	      this._abortUpdateCursor();
	    }, 10);
	  }

	  /** Fires custom events */
	  _fireChangeEvents() {
	    this._fireEvent('accept', this._inputEvent);
	    if (this.masked.isComplete) this._fireEvent('complete', this._inputEvent);
	  }

	  /** Aborts delayed cursor update */
	  _abortUpdateCursor() {
	    if (this._cursorChanging) {
	      clearTimeout(this._cursorChanging);
	      delete this._cursorChanging;
	    }
	  }

	  /** Aligns cursor to nearest available position */
	  alignCursor() {
	    this.cursorPos = this.masked.nearestInputPos(this.masked.nearestInputPos(this.cursorPos, DIRECTION.LEFT));
	  }

	  /** Aligns cursor only if selection is empty */
	  alignCursorFriendly() {
	    if (this.selectionStart !== this.cursorPos) return; // skip if range is selected
	    this.alignCursor();
	  }

	  /** Adds listener on custom event */
	  on(ev, handler) {
	    if (!this._listeners[ev]) this._listeners[ev] = [];
	    this._listeners[ev].push(handler);
	    return this;
	  }

	  /** Removes custom event listener */
	  off(ev, handler) {
	    if (!this._listeners[ev]) return this;
	    if (!handler) {
	      delete this._listeners[ev];
	      return this;
	    }
	    const hIndex = this._listeners[ev].indexOf(handler);
	    if (hIndex >= 0) this._listeners[ev].splice(hIndex, 1);
	    return this;
	  }

	  /** Handles view input event */
	  _onInput(e) {
	    this._inputEvent = e;
	    this._abortUpdateCursor();
	    const details = new ActionDetails({
	      // new state
	      value: this.el.value,
	      cursorPos: this.cursorPos,
	      // old state
	      oldValue: this.displayValue,
	      oldSelection: this._selection
	    });
	    const oldRawValue = this.masked.rawInputValue;
	    const offset = this.masked.splice(details.startChangePos, details.removed.length, details.inserted, details.removeDirection, {
	      input: true,
	      raw: true
	    }).offset;

	    // force align in remove direction only if no input chars were removed
	    // otherwise we still need to align with NONE (to get out from fixed symbols for instance)
	    const removeDirection = oldRawValue === this.masked.rawInputValue ? details.removeDirection : DIRECTION.NONE;
	    let cursorPos = this.masked.nearestInputPos(details.startChangePos + offset, removeDirection);
	    if (removeDirection !== DIRECTION.NONE) cursorPos = this.masked.nearestInputPos(cursorPos, DIRECTION.NONE);
	    this.updateControl(cursorPos);
	    delete this._inputEvent;
	  }

	  /** Handles view change event and commits model value */
	  _onChange() {
	    if (this.displayValue !== this.el.value) this.updateValue();
	    this.masked.doCommit();
	    this.updateControl();
	    this._saveSelection();
	  }

	  /** Handles view drop event, prevents by default */
	  _onDrop(ev) {
	    ev.preventDefault();
	    ev.stopPropagation();
	  }

	  /** Restore last selection on focus */
	  _onFocus(ev) {
	    this.alignCursorFriendly();
	  }

	  /** Restore last selection on focus */
	  _onClick(ev) {
	    this.alignCursorFriendly();
	  }
	  _onUndo() {
	    this._applyHistoryState(this.history.undo());
	  }
	  _onRedo() {
	    this._applyHistoryState(this.history.redo());
	  }
	  _applyHistoryState(state) {
	    if (!state) return;
	    this._historyChanging = true;
	    this.unmaskedValue = state.unmaskedValue;
	    this.el.select(state.selection.start, state.selection.end);
	    this._saveSelection();
	    this._historyChanging = false;
	  }

	  /** Unbind view events and removes element reference */
	  destroy() {
	    this._unbindEvents();
	    this._listeners.length = 0;
	    delete this.el;
	  }
	}
	IMask.InputMask = InputMask;

	/** Provides details of changing model value */
	class ChangeDetails {
	  /** Inserted symbols */

	  /** Additional offset if any changes occurred before tail */

	  /** Raw inserted is used by dynamic mask */

	  /** Can skip chars */

	  static normalize(prep) {
	    return Array.isArray(prep) ? prep : [prep, new ChangeDetails()];
	  }
	  constructor(details) {
	    Object.assign(this, {
	      inserted: '',
	      rawInserted: '',
	      tailShift: 0,
	      skip: false
	    }, details);
	  }

	  /** Aggregate changes */
	  aggregate(details) {
	    this.inserted += details.inserted;
	    this.rawInserted += details.rawInserted;
	    this.tailShift += details.tailShift;
	    this.skip = this.skip || details.skip;
	    return this;
	  }

	  /** Total offset considering all changes */
	  get offset() {
	    return this.tailShift + this.inserted.length;
	  }
	  get consumed() {
	    return Boolean(this.rawInserted) || this.skip;
	  }
	  equals(details) {
	    return this.inserted === details.inserted && this.tailShift === details.tailShift && this.rawInserted === details.rawInserted && this.skip === details.skip;
	  }
	}
	IMask.ChangeDetails = ChangeDetails;

	/** Provides details of continuous extracted tail */
	class ContinuousTailDetails {
	  /** Tail value as string */

	  /** Tail start position */

	  /** Start position */

	  constructor(value, from, stop) {
	    if (value === void 0) {
	      value = '';
	    }
	    if (from === void 0) {
	      from = 0;
	    }
	    this.value = value;
	    this.from = from;
	    this.stop = stop;
	  }
	  toString() {
	    return this.value;
	  }
	  extend(tail) {
	    this.value += String(tail);
	  }
	  appendTo(masked) {
	    return masked.append(this.toString(), {
	      tail: true
	    }).aggregate(masked._appendPlaceholder());
	  }
	  get state() {
	    return {
	      value: this.value,
	      from: this.from,
	      stop: this.stop
	    };
	  }
	  set state(state) {
	    Object.assign(this, state);
	  }
	  unshift(beforePos) {
	    if (!this.value.length || beforePos != null && this.from >= beforePos) return '';
	    const shiftChar = this.value[0];
	    this.value = this.value.slice(1);
	    return shiftChar;
	  }
	  shift() {
	    if (!this.value.length) return '';
	    const shiftChar = this.value[this.value.length - 1];
	    this.value = this.value.slice(0, -1);
	    return shiftChar;
	  }
	}

	/** Append flags */

	/** Extract flags */

	// see https://github.com/microsoft/TypeScript/issues/6223

	/** Provides common masking stuff */
	class Masked {
	  /** */

	  /** */

	  /** Transforms value before mask processing */

	  /** Transforms each char before mask processing */

	  /** Validates if value is acceptable */

	  /** Does additional processing at the end of editing */

	  /** Format typed value to string */

	  /** Parse string to get typed value */

	  /** Enable characters overwriting */

	  /** */

	  /** */

	  /** */

	  /** */

	  constructor(opts) {
	    this._value = '';
	    this._update({
	      ...Masked.DEFAULTS,
	      ...opts
	    });
	    this._initialized = true;
	  }

	  /** Sets and applies new options */
	  updateOptions(opts) {
	    if (!this.optionsIsChanged(opts)) return;
	    this.withValueRefresh(this._update.bind(this, opts));
	  }

	  /** Sets new options */
	  _update(opts) {
	    Object.assign(this, opts);
	  }

	  /** Mask state */
	  get state() {
	    return {
	      _value: this.value,
	      _rawInputValue: this.rawInputValue
	    };
	  }
	  set state(state) {
	    this._value = state._value;
	  }

	  /** Resets value */
	  reset() {
	    this._value = '';
	  }
	  get value() {
	    return this._value;
	  }
	  set value(value) {
	    this.resolve(value, {
	      input: true
	    });
	  }

	  /** Resolve new value */
	  resolve(value, flags) {
	    if (flags === void 0) {
	      flags = {
	        input: true
	      };
	    }
	    this.reset();
	    this.append(value, flags, '');
	    this.doCommit();
	  }
	  get unmaskedValue() {
	    return this.value;
	  }
	  set unmaskedValue(value) {
	    this.resolve(value, {});
	  }
	  get typedValue() {
	    return this.parse ? this.parse(this.value, this) : this.unmaskedValue;
	  }
	  set typedValue(value) {
	    if (this.format) {
	      this.value = this.format(value, this);
	    } else {
	      this.unmaskedValue = String(value);
	    }
	  }

	  /** Value that includes raw user input */
	  get rawInputValue() {
	    return this.extractInput(0, this.displayValue.length, {
	      raw: true
	    });
	  }
	  set rawInputValue(value) {
	    this.resolve(value, {
	      raw: true
	    });
	  }
	  get displayValue() {
	    return this.value;
	  }
	  get isComplete() {
	    return true;
	  }
	  get isFilled() {
	    return this.isComplete;
	  }

	  /** Finds nearest input position in direction */
	  nearestInputPos(cursorPos, direction) {
	    return cursorPos;
	  }
	  totalInputPositions(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    return Math.min(this.displayValue.length, toPos - fromPos);
	  }

	  /** Extracts value in range considering flags */
	  extractInput(fromPos, toPos, flags) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    return this.displayValue.slice(fromPos, toPos);
	  }

	  /** Extracts tail in range */
	  extractTail(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    return new ContinuousTailDetails(this.extractInput(fromPos, toPos), fromPos);
	  }

	  /** Appends tail */
	  appendTail(tail) {
	    if (isString(tail)) tail = new ContinuousTailDetails(String(tail));
	    return tail.appendTo(this);
	  }

	  /** Appends char */
	  _appendCharRaw(ch, flags) {
	    if (!ch) return new ChangeDetails();
	    this._value += ch;
	    return new ChangeDetails({
	      inserted: ch,
	      rawInserted: ch
	    });
	  }

	  /** Appends char */
	  _appendChar(ch, flags, checkTail) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const consistentState = this.state;
	    let details;
	    [ch, details] = this.doPrepareChar(ch, flags);
	    if (ch) {
	      details = details.aggregate(this._appendCharRaw(ch, flags));

	      // TODO handle `skip`?

	      // try `autofix` lookahead
	      if (!details.rawInserted && this.autofix === 'pad') {
	        const noFixState = this.state;
	        this.state = consistentState;
	        let fixDetails = this.pad(flags);
	        const chDetails = this._appendCharRaw(ch, flags);
	        fixDetails = fixDetails.aggregate(chDetails);

	        // if fix was applied or
	        // if details are equal use skip restoring state optimization
	        if (chDetails.rawInserted || fixDetails.equals(details)) {
	          details = fixDetails;
	        } else {
	          this.state = noFixState;
	        }
	      }
	    }
	    if (details.inserted) {
	      let consistentTail;
	      let appended = this.doValidate(flags) !== false;
	      if (appended && checkTail != null) {
	        // validation ok, check tail
	        const beforeTailState = this.state;
	        if (this.overwrite === true) {
	          consistentTail = checkTail.state;
	          for (let i = 0; i < details.rawInserted.length; ++i) {
	            checkTail.unshift(this.displayValue.length - details.tailShift);
	          }
	        }
	        let tailDetails = this.appendTail(checkTail);
	        appended = tailDetails.rawInserted.length === checkTail.toString().length;

	        // not ok, try shift
	        if (!(appended && tailDetails.inserted) && this.overwrite === 'shift') {
	          this.state = beforeTailState;
	          consistentTail = checkTail.state;
	          for (let i = 0; i < details.rawInserted.length; ++i) {
	            checkTail.shift();
	          }
	          tailDetails = this.appendTail(checkTail);
	          appended = tailDetails.rawInserted.length === checkTail.toString().length;
	        }

	        // if ok, rollback state after tail
	        if (appended && tailDetails.inserted) this.state = beforeTailState;
	      }

	      // revert all if something went wrong
	      if (!appended) {
	        details = new ChangeDetails();
	        this.state = consistentState;
	        if (checkTail && consistentTail) checkTail.state = consistentTail;
	      }
	    }
	    return details;
	  }

	  /** Appends optional placeholder at the end */
	  _appendPlaceholder() {
	    return new ChangeDetails();
	  }

	  /** Appends optional eager placeholder at the end */
	  _appendEager() {
	    return new ChangeDetails();
	  }

	  /** Appends symbols considering flags */
	  append(str, flags, tail) {
	    if (!isString(str)) throw new Error('value should be string');
	    const checkTail = isString(tail) ? new ContinuousTailDetails(String(tail)) : tail;
	    if (flags != null && flags.tail) flags._beforeTailState = this.state;
	    let details;
	    [str, details] = this.doPrepare(str, flags);
	    for (let ci = 0; ci < str.length; ++ci) {
	      const d = this._appendChar(str[ci], flags, checkTail);
	      if (!d.rawInserted && !this.doSkipInvalid(str[ci], flags, checkTail)) break;
	      details.aggregate(d);
	    }
	    if ((this.eager === true || this.eager === 'append') && flags != null && flags.input && str) {
	      details.aggregate(this._appendEager());
	    }

	    // append tail but aggregate only tailShift
	    if (checkTail != null) {
	      details.tailShift += this.appendTail(checkTail).tailShift;
	      // TODO it's a good idea to clear state after appending ends
	      // but it causes bugs when one append calls another (when dynamic dispatch set rawInputValue)
	      // this._resetBeforeTailState();
	    }

	    return details;
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    this._value = this.displayValue.slice(0, fromPos) + this.displayValue.slice(toPos);
	    return new ChangeDetails();
	  }

	  /** Calls function and reapplies current value */
	  withValueRefresh(fn) {
	    if (this._refreshing || !this._initialized) return fn();
	    this._refreshing = true;
	    const rawInput = this.rawInputValue;
	    const value = this.value;
	    const ret = fn();
	    this.rawInputValue = rawInput;
	    // append lost trailing chars at the end
	    if (this.value && this.value !== value && value.indexOf(this.value) === 0) {
	      this.append(value.slice(this.displayValue.length), {}, '');
	      this.doCommit();
	    }
	    delete this._refreshing;
	    return ret;
	  }
	  runIsolated(fn) {
	    if (this._isolated || !this._initialized) return fn(this);
	    this._isolated = true;
	    const state = this.state;
	    const ret = fn(this);
	    this.state = state;
	    delete this._isolated;
	    return ret;
	  }
	  doSkipInvalid(ch, flags, checkTail) {
	    return Boolean(this.skipInvalid);
	  }

	  /** Prepares string before mask processing */
	  doPrepare(str, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    return ChangeDetails.normalize(this.prepare ? this.prepare(str, this, flags) : str);
	  }

	  /** Prepares each char before mask processing */
	  doPrepareChar(str, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    return ChangeDetails.normalize(this.prepareChar ? this.prepareChar(str, this, flags) : str);
	  }

	  /** Validates if value is acceptable */
	  doValidate(flags) {
	    return (!this.validate || this.validate(this.value, this, flags)) && (!this.parent || this.parent.doValidate(flags));
	  }

	  /** Does additional processing at the end of editing */
	  doCommit() {
	    if (this.commit) this.commit(this.value, this);
	  }
	  splice(start, deleteCount, inserted, removeDirection, flags) {
	    if (inserted === void 0) {
	      inserted = '';
	    }
	    if (removeDirection === void 0) {
	      removeDirection = DIRECTION.NONE;
	    }
	    if (flags === void 0) {
	      flags = {
	        input: true
	      };
	    }
	    const tailPos = start + deleteCount;
	    const tail = this.extractTail(tailPos);
	    const eagerRemove = this.eager === true || this.eager === 'remove';
	    let oldRawValue;
	    if (eagerRemove) {
	      removeDirection = forceDirection(removeDirection);
	      oldRawValue = this.extractInput(0, tailPos, {
	        raw: true
	      });
	    }
	    let startChangePos = start;
	    const details = new ChangeDetails();

	    // if it is just deletion without insertion
	    if (removeDirection !== DIRECTION.NONE) {
	      startChangePos = this.nearestInputPos(start, deleteCount > 1 && start !== 0 && !eagerRemove ? DIRECTION.NONE : removeDirection);

	      // adjust tailShift if start was aligned
	      details.tailShift = startChangePos - start;
	    }
	    details.aggregate(this.remove(startChangePos));
	    if (eagerRemove && removeDirection !== DIRECTION.NONE && oldRawValue === this.rawInputValue) {
	      if (removeDirection === DIRECTION.FORCE_LEFT) {
	        let valLength;
	        while (oldRawValue === this.rawInputValue && (valLength = this.displayValue.length)) {
	          details.aggregate(new ChangeDetails({
	            tailShift: -1
	          })).aggregate(this.remove(valLength - 1));
	        }
	      } else if (removeDirection === DIRECTION.FORCE_RIGHT) {
	        tail.unshift();
	      }
	    }
	    return details.aggregate(this.append(inserted, flags, tail));
	  }
	  maskEquals(mask) {
	    return this.mask === mask;
	  }
	  optionsIsChanged(opts) {
	    return !objectIncludes(this, opts);
	  }
	  typedValueEquals(value) {
	    const tval = this.typedValue;
	    return value === tval || Masked.EMPTY_VALUES.includes(value) && Masked.EMPTY_VALUES.includes(tval) || (this.format ? this.format(value, this) === this.format(this.typedValue, this) : false);
	  }
	  pad(flags) {
	    return new ChangeDetails();
	  }
	}
	Masked.DEFAULTS = {
	  skipInvalid: true
	};
	Masked.EMPTY_VALUES = [undefined, null, ''];
	IMask.Masked = Masked;

	class ChunksTailDetails {
	  /** */

	  constructor(chunks, from) {
	    if (chunks === void 0) {
	      chunks = [];
	    }
	    if (from === void 0) {
	      from = 0;
	    }
	    this.chunks = chunks;
	    this.from = from;
	  }
	  toString() {
	    return this.chunks.map(String).join('');
	  }
	  extend(tailChunk) {
	    if (!String(tailChunk)) return;
	    tailChunk = isString(tailChunk) ? new ContinuousTailDetails(String(tailChunk)) : tailChunk;
	    const lastChunk = this.chunks[this.chunks.length - 1];
	    const extendLast = lastChunk && (
	    // if stops are same or tail has no stop
	    lastChunk.stop === tailChunk.stop || tailChunk.stop == null) &&
	    // if tail chunk goes just after last chunk
	    tailChunk.from === lastChunk.from + lastChunk.toString().length;
	    if (tailChunk instanceof ContinuousTailDetails) {
	      // check the ability to extend previous chunk
	      if (extendLast) {
	        // extend previous chunk
	        lastChunk.extend(tailChunk.toString());
	      } else {
	        // append new chunk
	        this.chunks.push(tailChunk);
	      }
	    } else if (tailChunk instanceof ChunksTailDetails) {
	      if (tailChunk.stop == null) {
	        // unwrap floating chunks to parent, keeping `from` pos
	        let firstTailChunk;
	        while (tailChunk.chunks.length && tailChunk.chunks[0].stop == null) {
	          firstTailChunk = tailChunk.chunks.shift(); // not possible to be `undefined` because length was checked above
	          firstTailChunk.from += tailChunk.from;
	          this.extend(firstTailChunk);
	        }
	      }

	      // if tail chunk still has value
	      if (tailChunk.toString()) {
	        // if chunks contains stops, then popup stop to container
	        tailChunk.stop = tailChunk.blockIndex;
	        this.chunks.push(tailChunk);
	      }
	    }
	  }
	  appendTo(masked) {
	    if (!(masked instanceof IMask.MaskedPattern)) {
	      const tail = new ContinuousTailDetails(this.toString());
	      return tail.appendTo(masked);
	    }
	    const details = new ChangeDetails();
	    for (let ci = 0; ci < this.chunks.length; ++ci) {
	      const chunk = this.chunks[ci];
	      const lastBlockIter = masked._mapPosToBlock(masked.displayValue.length);
	      const stop = chunk.stop;
	      let chunkBlock;
	      if (stop != null && (
	      // if block not found or stop is behind lastBlock
	      !lastBlockIter || lastBlockIter.index <= stop)) {
	        if (chunk instanceof ChunksTailDetails ||
	        // for continuous block also check if stop is exist
	        masked._stops.indexOf(stop) >= 0) {
	          details.aggregate(masked._appendPlaceholder(stop));
	        }
	        chunkBlock = chunk instanceof ChunksTailDetails && masked._blocks[stop];
	      }
	      if (chunkBlock) {
	        const tailDetails = chunkBlock.appendTail(chunk);
	        details.aggregate(tailDetails);

	        // get not inserted chars
	        const remainChars = chunk.toString().slice(tailDetails.rawInserted.length);
	        if (remainChars) details.aggregate(masked.append(remainChars, {
	          tail: true
	        }));
	      } else {
	        details.aggregate(masked.append(chunk.toString(), {
	          tail: true
	        }));
	      }
	    }
	    return details;
	  }
	  get state() {
	    return {
	      chunks: this.chunks.map(c => c.state),
	      from: this.from,
	      stop: this.stop,
	      blockIndex: this.blockIndex
	    };
	  }
	  set state(state) {
	    const {
	      chunks,
	      ...props
	    } = state;
	    Object.assign(this, props);
	    this.chunks = chunks.map(cstate => {
	      const chunk = "chunks" in cstate ? new ChunksTailDetails() : new ContinuousTailDetails();
	      chunk.state = cstate;
	      return chunk;
	    });
	  }
	  unshift(beforePos) {
	    if (!this.chunks.length || beforePos != null && this.from >= beforePos) return '';
	    const chunkShiftPos = beforePos != null ? beforePos - this.from : beforePos;
	    let ci = 0;
	    while (ci < this.chunks.length) {
	      const chunk = this.chunks[ci];
	      const shiftChar = chunk.unshift(chunkShiftPos);
	      if (chunk.toString()) {
	        // chunk still contains value
	        // but not shifted - means no more available chars to shift
	        if (!shiftChar) break;
	        ++ci;
	      } else {
	        // clean if chunk has no value
	        this.chunks.splice(ci, 1);
	      }
	      if (shiftChar) return shiftChar;
	    }
	    return '';
	  }
	  shift() {
	    if (!this.chunks.length) return '';
	    let ci = this.chunks.length - 1;
	    while (0 <= ci) {
	      const chunk = this.chunks[ci];
	      const shiftChar = chunk.shift();
	      if (chunk.toString()) {
	        // chunk still contains value
	        // but not shifted - means no more available chars to shift
	        if (!shiftChar) break;
	        --ci;
	      } else {
	        // clean if chunk has no value
	        this.chunks.splice(ci, 1);
	      }
	      if (shiftChar) return shiftChar;
	    }
	    return '';
	  }
	}

	class PatternCursor {
	  constructor(masked, pos) {
	    this.masked = masked;
	    this._log = [];
	    const {
	      offset,
	      index
	    } = masked._mapPosToBlock(pos) || (pos < 0 ?
	    // first
	    {
	      index: 0,
	      offset: 0
	    } :
	    // last
	    {
	      index: this.masked._blocks.length,
	      offset: 0
	    });
	    this.offset = offset;
	    this.index = index;
	    this.ok = false;
	  }
	  get block() {
	    return this.masked._blocks[this.index];
	  }
	  get pos() {
	    return this.masked._blockStartPos(this.index) + this.offset;
	  }
	  get state() {
	    return {
	      index: this.index,
	      offset: this.offset,
	      ok: this.ok
	    };
	  }
	  set state(s) {
	    Object.assign(this, s);
	  }
	  pushState() {
	    this._log.push(this.state);
	  }
	  popState() {
	    const s = this._log.pop();
	    if (s) this.state = s;
	    return s;
	  }
	  bindBlock() {
	    if (this.block) return;
	    if (this.index < 0) {
	      this.index = 0;
	      this.offset = 0;
	    }
	    if (this.index >= this.masked._blocks.length) {
	      this.index = this.masked._blocks.length - 1;
	      this.offset = this.block.displayValue.length; // TODO this is stupid type error, `block` depends on index that was changed above
	    }
	  }

	  _pushLeft(fn) {
	    this.pushState();
	    for (this.bindBlock(); 0 <= this.index; --this.index, this.offset = ((_this$block = this.block) == null ? void 0 : _this$block.displayValue.length) || 0) {
	      var _this$block;
	      if (fn()) return this.ok = true;
	    }
	    return this.ok = false;
	  }
	  _pushRight(fn) {
	    this.pushState();
	    for (this.bindBlock(); this.index < this.masked._blocks.length; ++this.index, this.offset = 0) {
	      if (fn()) return this.ok = true;
	    }
	    return this.ok = false;
	  }
	  pushLeftBeforeFilled() {
	    return this._pushLeft(() => {
	      if (this.block.isFixed || !this.block.value) return;
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.FORCE_LEFT);
	      if (this.offset !== 0) return true;
	    });
	  }
	  pushLeftBeforeInput() {
	    // cases:
	    // filled input: 00|
	    // optional empty input: 00[]|
	    // nested block: XX<[]>|
	    return this._pushLeft(() => {
	      if (this.block.isFixed) return;
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.LEFT);
	      return true;
	    });
	  }
	  pushLeftBeforeRequired() {
	    return this._pushLeft(() => {
	      if (this.block.isFixed || this.block.isOptional && !this.block.value) return;
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.LEFT);
	      return true;
	    });
	  }
	  pushRightBeforeFilled() {
	    return this._pushRight(() => {
	      if (this.block.isFixed || !this.block.value) return;
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.FORCE_RIGHT);
	      if (this.offset !== this.block.value.length) return true;
	    });
	  }
	  pushRightBeforeInput() {
	    return this._pushRight(() => {
	      if (this.block.isFixed) return;

	      // const o = this.offset;
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.NONE);
	      // HACK cases like (STILL DOES NOT WORK FOR NESTED)
	      // aa|X
	      // aa<X|[]>X_    - this will not work
	      // if (o && o === this.offset && this.block instanceof PatternInputDefinition) continue;
	      return true;
	    });
	  }
	  pushRightBeforeRequired() {
	    return this._pushRight(() => {
	      if (this.block.isFixed || this.block.isOptional && !this.block.value) return;

	      // TODO check |[*]XX_
	      this.offset = this.block.nearestInputPos(this.offset, DIRECTION.NONE);
	      return true;
	    });
	  }
	}

	class PatternFixedDefinition {
	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  constructor(opts) {
	    Object.assign(this, opts);
	    this._value = '';
	    this.isFixed = true;
	  }
	  get value() {
	    return this._value;
	  }
	  get unmaskedValue() {
	    return this.isUnmasking ? this.value : '';
	  }
	  get rawInputValue() {
	    return this._isRawInput ? this.value : '';
	  }
	  get displayValue() {
	    return this.value;
	  }
	  reset() {
	    this._isRawInput = false;
	    this._value = '';
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this._value.length;
	    }
	    this._value = this._value.slice(0, fromPos) + this._value.slice(toPos);
	    if (!this._value) this._isRawInput = false;
	    return new ChangeDetails();
	  }
	  nearestInputPos(cursorPos, direction) {
	    if (direction === void 0) {
	      direction = DIRECTION.NONE;
	    }
	    const minPos = 0;
	    const maxPos = this._value.length;
	    switch (direction) {
	      case DIRECTION.LEFT:
	      case DIRECTION.FORCE_LEFT:
	        return minPos;
	      case DIRECTION.NONE:
	      case DIRECTION.RIGHT:
	      case DIRECTION.FORCE_RIGHT:
	      default:
	        return maxPos;
	    }
	  }
	  totalInputPositions(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this._value.length;
	    }
	    return this._isRawInput ? toPos - fromPos : 0;
	  }
	  extractInput(fromPos, toPos, flags) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this._value.length;
	    }
	    if (flags === void 0) {
	      flags = {};
	    }
	    return flags.raw && this._isRawInput && this._value.slice(fromPos, toPos) || '';
	  }
	  get isComplete() {
	    return true;
	  }
	  get isFilled() {
	    return Boolean(this._value);
	  }
	  _appendChar(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (this.isFilled) return new ChangeDetails();
	    const appendEager = this.eager === true || this.eager === 'append';
	    const appended = this.char === ch;
	    const isResolved = appended && (this.isUnmasking || flags.input || flags.raw) && (!flags.raw || !appendEager) && !flags.tail;
	    const details = new ChangeDetails({
	      inserted: this.char,
	      rawInserted: isResolved ? this.char : ''
	    });
	    this._value = this.char;
	    this._isRawInput = isResolved && (flags.raw || flags.input);
	    return details;
	  }
	  _appendEager() {
	    return this._appendChar(this.char, {
	      tail: true
	    });
	  }
	  _appendPlaceholder() {
	    const details = new ChangeDetails();
	    if (this.isFilled) return details;
	    this._value = details.inserted = this.char;
	    return details;
	  }
	  extractTail() {
	    return new ContinuousTailDetails('');
	  }
	  appendTail(tail) {
	    if (isString(tail)) tail = new ContinuousTailDetails(String(tail));
	    return tail.appendTo(this);
	  }
	  append(str, flags, tail) {
	    const details = this._appendChar(str[0], flags);
	    if (tail != null) {
	      details.tailShift += this.appendTail(tail).tailShift;
	    }
	    return details;
	  }
	  doCommit() {}
	  get state() {
	    return {
	      _value: this._value,
	      _rawInputValue: this.rawInputValue
	    };
	  }
	  set state(state) {
	    this._value = state._value;
	    this._isRawInput = Boolean(state._rawInputValue);
	  }
	  pad(flags) {
	    return this._appendPlaceholder();
	  }
	}

	class PatternInputDefinition {
	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  /** */

	  constructor(opts) {
	    const {
	      parent,
	      isOptional,
	      placeholderChar,
	      displayChar,
	      lazy,
	      eager,
	      ...maskOpts
	    } = opts;
	    this.masked = createMask(maskOpts);
	    Object.assign(this, {
	      parent,
	      isOptional,
	      placeholderChar,
	      displayChar,
	      lazy,
	      eager
	    });
	  }
	  reset() {
	    this.isFilled = false;
	    this.masked.reset();
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.value.length;
	    }
	    if (fromPos === 0 && toPos >= 1) {
	      this.isFilled = false;
	      return this.masked.remove(fromPos, toPos);
	    }
	    return new ChangeDetails();
	  }
	  get value() {
	    return this.masked.value || (this.isFilled && !this.isOptional ? this.placeholderChar : '');
	  }
	  get unmaskedValue() {
	    return this.masked.unmaskedValue;
	  }
	  get rawInputValue() {
	    return this.masked.rawInputValue;
	  }
	  get displayValue() {
	    return this.masked.value && this.displayChar || this.value;
	  }
	  get isComplete() {
	    return Boolean(this.masked.value) || this.isOptional;
	  }
	  _appendChar(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (this.isFilled) return new ChangeDetails();
	    const state = this.masked.state;
	    // simulate input
	    let details = this.masked._appendChar(ch, this.currentMaskFlags(flags));
	    if (details.inserted && this.doValidate(flags) === false) {
	      details = new ChangeDetails();
	      this.masked.state = state;
	    }
	    if (!details.inserted && !this.isOptional && !this.lazy && !flags.input) {
	      details.inserted = this.placeholderChar;
	    }
	    details.skip = !details.inserted && !this.isOptional;
	    this.isFilled = Boolean(details.inserted);
	    return details;
	  }
	  append(str, flags, tail) {
	    // TODO probably should be done via _appendChar
	    return this.masked.append(str, this.currentMaskFlags(flags), tail);
	  }
	  _appendPlaceholder() {
	    if (this.isFilled || this.isOptional) return new ChangeDetails();
	    this.isFilled = true;
	    return new ChangeDetails({
	      inserted: this.placeholderChar
	    });
	  }
	  _appendEager() {
	    return new ChangeDetails();
	  }
	  extractTail(fromPos, toPos) {
	    return this.masked.extractTail(fromPos, toPos);
	  }
	  appendTail(tail) {
	    return this.masked.appendTail(tail);
	  }
	  extractInput(fromPos, toPos, flags) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.value.length;
	    }
	    return this.masked.extractInput(fromPos, toPos, flags);
	  }
	  nearestInputPos(cursorPos, direction) {
	    if (direction === void 0) {
	      direction = DIRECTION.NONE;
	    }
	    const minPos = 0;
	    const maxPos = this.value.length;
	    const boundPos = Math.min(Math.max(cursorPos, minPos), maxPos);
	    switch (direction) {
	      case DIRECTION.LEFT:
	      case DIRECTION.FORCE_LEFT:
	        return this.isComplete ? boundPos : minPos;
	      case DIRECTION.RIGHT:
	      case DIRECTION.FORCE_RIGHT:
	        return this.isComplete ? boundPos : maxPos;
	      case DIRECTION.NONE:
	      default:
	        return boundPos;
	    }
	  }
	  totalInputPositions(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.value.length;
	    }
	    return this.value.slice(fromPos, toPos).length;
	  }
	  doValidate(flags) {
	    return this.masked.doValidate(this.currentMaskFlags(flags)) && (!this.parent || this.parent.doValidate(this.currentMaskFlags(flags)));
	  }
	  doCommit() {
	    this.masked.doCommit();
	  }
	  get state() {
	    return {
	      _value: this.value,
	      _rawInputValue: this.rawInputValue,
	      masked: this.masked.state,
	      isFilled: this.isFilled
	    };
	  }
	  set state(state) {
	    this.masked.state = state.masked;
	    this.isFilled = state.isFilled;
	  }
	  currentMaskFlags(flags) {
	    var _flags$_beforeTailSta;
	    return {
	      ...flags,
	      _beforeTailState: (flags == null || (_flags$_beforeTailSta = flags._beforeTailState) == null ? void 0 : _flags$_beforeTailSta.masked) || (flags == null ? void 0 : flags._beforeTailState)
	    };
	  }
	  pad(flags) {
	    return new ChangeDetails();
	  }
	}
	PatternInputDefinition.DEFAULT_DEFINITIONS = {
	  '0': /\d/,
	  'a': /[\u0041-\u005A\u0061-\u007A\u00AA\u00B5\u00BA\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u0527\u0531-\u0556\u0559\u0561-\u0587\u05D0-\u05EA\u05F0-\u05F2\u0620-\u064A\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE\u06EF\u06FA-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07CA-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u08A0\u08A2-\u08AC\u0904-\u0939\u093D\u0950\u0958-\u0961\u0971-\u0977\u0979-\u097F\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09F0\u09F1\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B71\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C33\u0C35-\u0C39\u0C3D\u0C58\u0C59\u0C60\u0C61\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDE\u0CE0\u0CE1\u0CF1\u0CF2\u0D05-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D60\u0D61\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E81\u0E82\u0E84\u0E87\u0E88\u0E8A\u0E8D\u0E94-\u0E97\u0E99-\u0E9F\u0EA1-\u0EA3\u0EA5\u0EA7\u0EAA\u0EAB\u0EAD-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0EDC-\u0EDF\u0F00\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1380-\u138F\u13A0-\u13F4\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u1700-\u170C\u170E-\u1711\u1720-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u1820-\u1877\u1880-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191C\u1950-\u196D\u1970-\u1974\u1980-\u19AB\u19C1-\u19C7\u1A00-\u1A16\u1A20-\u1A54\u1AA7\u1B05-\u1B33\u1B45-\u1B4B\u1B83-\u1BA0\u1BAE\u1BAF\u1BBA-\u1BE5\u1C00-\u1C23\u1C4D-\u1C4F\u1C5A-\u1C7D\u1CE9-\u1CEC\u1CEE-\u1CF1\u1CF5\u1CF6\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2071\u207F\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2183\u2184\u2C00-\u2C2E\u2C30-\u2C5E\u2C60-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005\u3006\u3031-\u3035\u303B\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312D\u3131-\u318E\u31A0-\u31BA\u31F0-\u31FF\u3400-\u4DB5\u4E00-\u9FCC\uA000-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA61F\uA62A\uA62B\uA640-\uA66E\uA67F-\uA697\uA6A0-\uA6E5\uA717-\uA71F\uA722-\uA788\uA78B-\uA78E\uA790-\uA793\uA7A0-\uA7AA\uA7F8-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA840-\uA873\uA882-\uA8B3\uA8F2-\uA8F7\uA8FB\uA90A-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA60-\uAA76\uAA7A\uAA80-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uABC0-\uABE2\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC]/,
	  // http://stackoverflow.com/a/22075070
	  '*': /./
	};

	/** Masking by RegExp */
	class MaskedRegExp extends Masked {
	  /** */

	  /** Enable characters overwriting */

	  /** */

	  /** */

	  /** */

	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    const mask = opts.mask;
	    if (mask) opts.validate = value => value.search(mask) >= 0;
	    super._update(opts);
	  }
	}
	IMask.MaskedRegExp = MaskedRegExp;

	/** Pattern mask */
	class MaskedPattern extends Masked {
	  /** */

	  /** */

	  /** Single char for empty input */

	  /** Single char for filled input */

	  /** Show placeholder only when needed */

	  /** Enable characters overwriting */

	  /** */

	  /** */

	  /** */

	  constructor(opts) {
	    super({
	      ...MaskedPattern.DEFAULTS,
	      ...opts,
	      definitions: Object.assign({}, PatternInputDefinition.DEFAULT_DEFINITIONS, opts == null ? void 0 : opts.definitions)
	    });
	  }
	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    opts.definitions = Object.assign({}, this.definitions, opts.definitions);
	    super._update(opts);
	    this._rebuildMask();
	  }
	  _rebuildMask() {
	    const defs = this.definitions;
	    this._blocks = [];
	    this.exposeBlock = undefined;
	    this._stops = [];
	    this._maskedBlocks = {};
	    const pattern = this.mask;
	    if (!pattern || !defs) return;
	    let unmaskingBlock = false;
	    let optionalBlock = false;
	    for (let i = 0; i < pattern.length; ++i) {
	      if (this.blocks) {
	        const p = pattern.slice(i);
	        const bNames = Object.keys(this.blocks).filter(bName => p.indexOf(bName) === 0);
	        // order by key length
	        bNames.sort((a, b) => b.length - a.length);
	        // use block name with max length
	        const bName = bNames[0];
	        if (bName) {
	          const {
	            expose,
	            repeat,
	            ...bOpts
	          } = normalizeOpts(this.blocks[bName]); // TODO type Opts<Arg & Extra>
	          const blockOpts = {
	            lazy: this.lazy,
	            eager: this.eager,
	            placeholderChar: this.placeholderChar,
	            displayChar: this.displayChar,
	            overwrite: this.overwrite,
	            autofix: this.autofix,
	            ...bOpts,
	            repeat,
	            parent: this
	          };
	          const maskedBlock = repeat != null ? new IMask.RepeatBlock(blockOpts /* TODO */) : createMask(blockOpts);
	          if (maskedBlock) {
	            this._blocks.push(maskedBlock);
	            if (expose) this.exposeBlock = maskedBlock;

	            // store block index
	            if (!this._maskedBlocks[bName]) this._maskedBlocks[bName] = [];
	            this._maskedBlocks[bName].push(this._blocks.length - 1);
	          }
	          i += bName.length - 1;
	          continue;
	        }
	      }
	      let char = pattern[i];
	      let isInput = (char in defs);
	      if (char === MaskedPattern.STOP_CHAR) {
	        this._stops.push(this._blocks.length);
	        continue;
	      }
	      if (char === '{' || char === '}') {
	        unmaskingBlock = !unmaskingBlock;
	        continue;
	      }
	      if (char === '[' || char === ']') {
	        optionalBlock = !optionalBlock;
	        continue;
	      }
	      if (char === MaskedPattern.ESCAPE_CHAR) {
	        ++i;
	        char = pattern[i];
	        if (!char) break;
	        isInput = false;
	      }
	      const def = isInput ? new PatternInputDefinition({
	        isOptional: optionalBlock,
	        lazy: this.lazy,
	        eager: this.eager,
	        placeholderChar: this.placeholderChar,
	        displayChar: this.displayChar,
	        ...normalizeOpts(defs[char]),
	        parent: this
	      }) : new PatternFixedDefinition({
	        char,
	        eager: this.eager,
	        isUnmasking: unmaskingBlock
	      });
	      this._blocks.push(def);
	    }
	  }
	  get state() {
	    return {
	      ...super.state,
	      _blocks: this._blocks.map(b => b.state)
	    };
	  }
	  set state(state) {
	    if (!state) {
	      this.reset();
	      return;
	    }
	    const {
	      _blocks,
	      ...maskedState
	    } = state;
	    this._blocks.forEach((b, bi) => b.state = _blocks[bi]);
	    super.state = maskedState;
	  }
	  reset() {
	    super.reset();
	    this._blocks.forEach(b => b.reset());
	  }
	  get isComplete() {
	    return this.exposeBlock ? this.exposeBlock.isComplete : this._blocks.every(b => b.isComplete);
	  }
	  get isFilled() {
	    return this._blocks.every(b => b.isFilled);
	  }
	  get isFixed() {
	    return this._blocks.every(b => b.isFixed);
	  }
	  get isOptional() {
	    return this._blocks.every(b => b.isOptional);
	  }
	  doCommit() {
	    this._blocks.forEach(b => b.doCommit());
	    super.doCommit();
	  }
	  get unmaskedValue() {
	    return this.exposeBlock ? this.exposeBlock.unmaskedValue : this._blocks.reduce((str, b) => str += b.unmaskedValue, '');
	  }
	  set unmaskedValue(unmaskedValue) {
	    if (this.exposeBlock) {
	      const tail = this.extractTail(this._blockStartPos(this._blocks.indexOf(this.exposeBlock)) + this.exposeBlock.displayValue.length);
	      this.exposeBlock.unmaskedValue = unmaskedValue;
	      this.appendTail(tail);
	      this.doCommit();
	    } else super.unmaskedValue = unmaskedValue;
	  }
	  get value() {
	    return this.exposeBlock ? this.exposeBlock.value :
	    // TODO return _value when not in change?
	    this._blocks.reduce((str, b) => str += b.value, '');
	  }
	  set value(value) {
	    if (this.exposeBlock) {
	      const tail = this.extractTail(this._blockStartPos(this._blocks.indexOf(this.exposeBlock)) + this.exposeBlock.displayValue.length);
	      this.exposeBlock.value = value;
	      this.appendTail(tail);
	      this.doCommit();
	    } else super.value = value;
	  }
	  get typedValue() {
	    return this.exposeBlock ? this.exposeBlock.typedValue : super.typedValue;
	  }
	  set typedValue(value) {
	    if (this.exposeBlock) {
	      const tail = this.extractTail(this._blockStartPos(this._blocks.indexOf(this.exposeBlock)) + this.exposeBlock.displayValue.length);
	      this.exposeBlock.typedValue = value;
	      this.appendTail(tail);
	      this.doCommit();
	    } else super.typedValue = value;
	  }
	  get displayValue() {
	    return this._blocks.reduce((str, b) => str += b.displayValue, '');
	  }
	  appendTail(tail) {
	    return super.appendTail(tail).aggregate(this._appendPlaceholder());
	  }
	  _appendEager() {
	    var _this$_mapPosToBlock;
	    const details = new ChangeDetails();
	    let startBlockIndex = (_this$_mapPosToBlock = this._mapPosToBlock(this.displayValue.length)) == null ? void 0 : _this$_mapPosToBlock.index;
	    if (startBlockIndex == null) return details;

	    // TODO test if it works for nested pattern masks
	    if (this._blocks[startBlockIndex].isFilled) ++startBlockIndex;
	    for (let bi = startBlockIndex; bi < this._blocks.length; ++bi) {
	      const d = this._blocks[bi]._appendEager();
	      if (!d.inserted) break;
	      details.aggregate(d);
	    }
	    return details;
	  }
	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const blockIter = this._mapPosToBlock(this.displayValue.length);
	    const details = new ChangeDetails();
	    if (!blockIter) return details;
	    for (let bi = blockIter.index, block; block = this._blocks[bi]; ++bi) {
	      var _flags$_beforeTailSta;
	      const blockDetails = block._appendChar(ch, {
	        ...flags,
	        _beforeTailState: (_flags$_beforeTailSta = flags._beforeTailState) == null || (_flags$_beforeTailSta = _flags$_beforeTailSta._blocks) == null ? void 0 : _flags$_beforeTailSta[bi]
	      });
	      details.aggregate(blockDetails);
	      if (blockDetails.consumed) break; // go next char
	    }

	    return details;
	  }
	  extractTail(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    const chunkTail = new ChunksTailDetails();
	    if (fromPos === toPos) return chunkTail;
	    this._forEachBlocksInRange(fromPos, toPos, (b, bi, bFromPos, bToPos) => {
	      const blockChunk = b.extractTail(bFromPos, bToPos);
	      blockChunk.stop = this._findStopBefore(bi);
	      blockChunk.from = this._blockStartPos(bi);
	      if (blockChunk instanceof ChunksTailDetails) blockChunk.blockIndex = bi;
	      chunkTail.extend(blockChunk);
	    });
	    return chunkTail;
	  }
	  extractInput(fromPos, toPos, flags) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (fromPos === toPos) return '';
	    let input = '';
	    this._forEachBlocksInRange(fromPos, toPos, (b, _, fromPos, toPos) => {
	      input += b.extractInput(fromPos, toPos, flags);
	    });
	    return input;
	  }
	  _findStopBefore(blockIndex) {
	    let stopBefore;
	    for (let si = 0; si < this._stops.length; ++si) {
	      const stop = this._stops[si];
	      if (stop <= blockIndex) stopBefore = stop;else break;
	    }
	    return stopBefore;
	  }

	  /** Appends placeholder depending on laziness */
	  _appendPlaceholder(toBlockIndex) {
	    const details = new ChangeDetails();
	    if (this.lazy && toBlockIndex == null) return details;
	    const startBlockIter = this._mapPosToBlock(this.displayValue.length);
	    if (!startBlockIter) return details;
	    const startBlockIndex = startBlockIter.index;
	    const endBlockIndex = toBlockIndex != null ? toBlockIndex : this._blocks.length;
	    this._blocks.slice(startBlockIndex, endBlockIndex).forEach(b => {
	      if (!b.lazy || toBlockIndex != null) {
	        var _blocks2;
	        details.aggregate(b._appendPlaceholder((_blocks2 = b._blocks) == null ? void 0 : _blocks2.length));
	      }
	    });
	    return details;
	  }

	  /** Finds block in pos */
	  _mapPosToBlock(pos) {
	    let accVal = '';
	    for (let bi = 0; bi < this._blocks.length; ++bi) {
	      const block = this._blocks[bi];
	      const blockStartPos = accVal.length;
	      accVal += block.displayValue;
	      if (pos <= accVal.length) {
	        return {
	          index: bi,
	          offset: pos - blockStartPos
	        };
	      }
	    }
	  }
	  _blockStartPos(blockIndex) {
	    return this._blocks.slice(0, blockIndex).reduce((pos, b) => pos += b.displayValue.length, 0);
	  }
	  _forEachBlocksInRange(fromPos, toPos, fn) {
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    const fromBlockIter = this._mapPosToBlock(fromPos);
	    if (fromBlockIter) {
	      const toBlockIter = this._mapPosToBlock(toPos);
	      // process first block
	      const isSameBlock = toBlockIter && fromBlockIter.index === toBlockIter.index;
	      const fromBlockStartPos = fromBlockIter.offset;
	      const fromBlockEndPos = toBlockIter && isSameBlock ? toBlockIter.offset : this._blocks[fromBlockIter.index].displayValue.length;
	      fn(this._blocks[fromBlockIter.index], fromBlockIter.index, fromBlockStartPos, fromBlockEndPos);
	      if (toBlockIter && !isSameBlock) {
	        // process intermediate blocks
	        for (let bi = fromBlockIter.index + 1; bi < toBlockIter.index; ++bi) {
	          fn(this._blocks[bi], bi, 0, this._blocks[bi].displayValue.length);
	        }

	        // process last block
	        fn(this._blocks[toBlockIter.index], toBlockIter.index, 0, toBlockIter.offset);
	      }
	    }
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    const removeDetails = super.remove(fromPos, toPos);
	    this._forEachBlocksInRange(fromPos, toPos, (b, _, bFromPos, bToPos) => {
	      removeDetails.aggregate(b.remove(bFromPos, bToPos));
	    });
	    return removeDetails;
	  }
	  nearestInputPos(cursorPos, direction) {
	    if (direction === void 0) {
	      direction = DIRECTION.NONE;
	    }
	    if (!this._blocks.length) return 0;
	    const cursor = new PatternCursor(this, cursorPos);
	    if (direction === DIRECTION.NONE) {
	      // -------------------------------------------------
	      // NONE should only go out from fixed to the right!
	      // -------------------------------------------------
	      if (cursor.pushRightBeforeInput()) return cursor.pos;
	      cursor.popState();
	      if (cursor.pushLeftBeforeInput()) return cursor.pos;
	      return this.displayValue.length;
	    }

	    // FORCE is only about a|* otherwise is 0
	    if (direction === DIRECTION.LEFT || direction === DIRECTION.FORCE_LEFT) {
	      // try to break fast when *|a
	      if (direction === DIRECTION.LEFT) {
	        cursor.pushRightBeforeFilled();
	        if (cursor.ok && cursor.pos === cursorPos) return cursorPos;
	        cursor.popState();
	      }

	      // forward flow
	      cursor.pushLeftBeforeInput();
	      cursor.pushLeftBeforeRequired();
	      cursor.pushLeftBeforeFilled();

	      // backward flow
	      if (direction === DIRECTION.LEFT) {
	        cursor.pushRightBeforeInput();
	        cursor.pushRightBeforeRequired();
	        if (cursor.ok && cursor.pos <= cursorPos) return cursor.pos;
	        cursor.popState();
	        if (cursor.ok && cursor.pos <= cursorPos) return cursor.pos;
	        cursor.popState();
	      }
	      if (cursor.ok) return cursor.pos;
	      if (direction === DIRECTION.FORCE_LEFT) return 0;
	      cursor.popState();
	      if (cursor.ok) return cursor.pos;
	      cursor.popState();
	      if (cursor.ok) return cursor.pos;
	      return 0;
	    }
	    if (direction === DIRECTION.RIGHT || direction === DIRECTION.FORCE_RIGHT) {
	      // forward flow
	      cursor.pushRightBeforeInput();
	      cursor.pushRightBeforeRequired();
	      if (cursor.pushRightBeforeFilled()) return cursor.pos;
	      if (direction === DIRECTION.FORCE_RIGHT) return this.displayValue.length;

	      // backward flow
	      cursor.popState();
	      if (cursor.ok) return cursor.pos;
	      cursor.popState();
	      if (cursor.ok) return cursor.pos;
	      return this.nearestInputPos(cursorPos, DIRECTION.LEFT);
	    }
	    return cursorPos;
	  }
	  totalInputPositions(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    let total = 0;
	    this._forEachBlocksInRange(fromPos, toPos, (b, _, bFromPos, bToPos) => {
	      total += b.totalInputPositions(bFromPos, bToPos);
	    });
	    return total;
	  }

	  /** Get block by name */
	  maskedBlock(name) {
	    return this.maskedBlocks(name)[0];
	  }

	  /** Get all blocks by name */
	  maskedBlocks(name) {
	    const indices = this._maskedBlocks[name];
	    if (!indices) return [];
	    return indices.map(gi => this._blocks[gi]);
	  }
	  pad(flags) {
	    const details = new ChangeDetails();
	    this._forEachBlocksInRange(0, this.displayValue.length, b => details.aggregate(b.pad(flags)));
	    return details;
	  }
	}
	MaskedPattern.DEFAULTS = {
	  ...Masked.DEFAULTS,
	  lazy: true,
	  placeholderChar: '_'
	};
	MaskedPattern.STOP_CHAR = '`';
	MaskedPattern.ESCAPE_CHAR = '\\';
	MaskedPattern.InputDefinition = PatternInputDefinition;
	MaskedPattern.FixedDefinition = PatternFixedDefinition;
	IMask.MaskedPattern = MaskedPattern;

	/** Pattern which accepts ranges */
	class MaskedRange extends MaskedPattern {
	  /**
	    Optionally sets max length of pattern.
	    Used when pattern length is longer then `to` param length. Pads zeros at start in this case.
	  */

	  /** Min bound */

	  /** Max bound */

	  get _matchFrom() {
	    return this.maxLength - String(this.from).length;
	  }
	  constructor(opts) {
	    super(opts); // mask will be created in _update
	  }

	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    const {
	      to = this.to || 0,
	      from = this.from || 0,
	      maxLength = this.maxLength || 0,
	      autofix = this.autofix,
	      ...patternOpts
	    } = opts;
	    this.to = to;
	    this.from = from;
	    this.maxLength = Math.max(String(to).length, maxLength);
	    this.autofix = autofix;
	    const fromStr = String(this.from).padStart(this.maxLength, '0');
	    const toStr = String(this.to).padStart(this.maxLength, '0');
	    let sameCharsCount = 0;
	    while (sameCharsCount < toStr.length && toStr[sameCharsCount] === fromStr[sameCharsCount]) ++sameCharsCount;
	    patternOpts.mask = toStr.slice(0, sameCharsCount).replace(/0/g, '\\0') + '0'.repeat(this.maxLength - sameCharsCount);
	    super._update(patternOpts);
	  }
	  get isComplete() {
	    return super.isComplete && Boolean(this.value);
	  }
	  boundaries(str) {
	    let minstr = '';
	    let maxstr = '';
	    const [, placeholder, num] = str.match(/^(\D*)(\d*)(\D*)/) || [];
	    if (num) {
	      minstr = '0'.repeat(placeholder.length) + num;
	      maxstr = '9'.repeat(placeholder.length) + num;
	    }
	    minstr = minstr.padEnd(this.maxLength, '0');
	    maxstr = maxstr.padEnd(this.maxLength, '9');
	    return [minstr, maxstr];
	  }
	  doPrepareChar(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    let details;
	    [ch, details] = super.doPrepareChar(ch.replace(/\D/g, ''), flags);
	    if (!ch) details.skip = !this.isComplete;
	    return [ch, details];
	  }
	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (!this.autofix || this.value.length + 1 > this.maxLength) return super._appendCharRaw(ch, flags);
	    const fromStr = String(this.from).padStart(this.maxLength, '0');
	    const toStr = String(this.to).padStart(this.maxLength, '0');
	    const [minstr, maxstr] = this.boundaries(this.value + ch);
	    if (Number(maxstr) < this.from) return super._appendCharRaw(fromStr[this.value.length], flags);
	    if (Number(minstr) > this.to) {
	      if (!flags.tail && this.autofix === 'pad' && this.value.length + 1 < this.maxLength) {
	        return super._appendCharRaw(fromStr[this.value.length], flags).aggregate(this._appendCharRaw(ch, flags));
	      }
	      return super._appendCharRaw(toStr[this.value.length], flags);
	    }
	    return super._appendCharRaw(ch, flags);
	  }
	  doValidate(flags) {
	    const str = this.value;
	    const firstNonZero = str.search(/[^0]/);
	    if (firstNonZero === -1 && str.length <= this._matchFrom) return true;
	    const [minstr, maxstr] = this.boundaries(str);
	    return this.from <= Number(maxstr) && Number(minstr) <= this.to && super.doValidate(flags);
	  }
	  pad(flags) {
	    const details = new ChangeDetails();
	    if (this.value.length === this.maxLength) return details;
	    const value = this.value;
	    const padLength = this.maxLength - this.value.length;
	    if (padLength) {
	      this.reset();
	      for (let i = 0; i < padLength; ++i) {
	        details.aggregate(super._appendCharRaw('0', flags));
	      }

	      // append tail
	      value.split('').forEach(ch => this._appendCharRaw(ch));
	    }
	    return details;
	  }
	}
	IMask.MaskedRange = MaskedRange;

	const DefaultPattern = 'd{.}`m{.}`Y';

	// Make format and parse required when pattern is provided

	/** Date mask */
	class MaskedDate extends MaskedPattern {
	  static extractPatternOptions(opts) {
	    const {
	      mask,
	      pattern,
	      ...patternOpts
	    } = opts;
	    return {
	      ...patternOpts,
	      mask: isString(mask) ? mask : pattern
	    };
	  }

	  /** Pattern mask for date according to {@link MaskedDate#format} */

	  /** Start date */

	  /** End date */

	  /** Format typed value to string */

	  /** Parse string to get typed value */

	  constructor(opts) {
	    super(MaskedDate.extractPatternOptions({
	      ...MaskedDate.DEFAULTS,
	      ...opts
	    }));
	  }
	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    const {
	      mask,
	      pattern,
	      blocks,
	      ...patternOpts
	    } = {
	      ...MaskedDate.DEFAULTS,
	      ...opts
	    };
	    const patternBlocks = Object.assign({}, MaskedDate.GET_DEFAULT_BLOCKS());
	    // adjust year block
	    if (opts.min) patternBlocks.Y.from = opts.min.getFullYear();
	    if (opts.max) patternBlocks.Y.to = opts.max.getFullYear();
	    if (opts.min && opts.max && patternBlocks.Y.from === patternBlocks.Y.to) {
	      patternBlocks.m.from = opts.min.getMonth() + 1;
	      patternBlocks.m.to = opts.max.getMonth() + 1;
	      if (patternBlocks.m.from === patternBlocks.m.to) {
	        patternBlocks.d.from = opts.min.getDate();
	        patternBlocks.d.to = opts.max.getDate();
	      }
	    }
	    Object.assign(patternBlocks, this.blocks, blocks);
	    super._update({
	      ...patternOpts,
	      mask: isString(mask) ? mask : pattern,
	      blocks: patternBlocks
	    });
	  }
	  doValidate(flags) {
	    const date = this.date;
	    return super.doValidate(flags) && (!this.isComplete || this.isDateExist(this.value) && date != null && (this.min == null || this.min <= date) && (this.max == null || date <= this.max));
	  }

	  /** Checks if date is exists */
	  isDateExist(str) {
	    return this.format(this.parse(str, this), this).indexOf(str) >= 0;
	  }

	  /** Parsed Date */
	  get date() {
	    return this.typedValue;
	  }
	  set date(date) {
	    this.typedValue = date;
	  }
	  get typedValue() {
	    return this.isComplete ? super.typedValue : null;
	  }
	  set typedValue(value) {
	    super.typedValue = value;
	  }
	  maskEquals(mask) {
	    return mask === Date || super.maskEquals(mask);
	  }
	  optionsIsChanged(opts) {
	    return super.optionsIsChanged(MaskedDate.extractPatternOptions(opts));
	  }
	}
	MaskedDate.GET_DEFAULT_BLOCKS = () => ({
	  d: {
	    mask: MaskedRange,
	    from: 1,
	    to: 31,
	    maxLength: 2
	  },
	  m: {
	    mask: MaskedRange,
	    from: 1,
	    to: 12,
	    maxLength: 2
	  },
	  Y: {
	    mask: MaskedRange,
	    from: 1900,
	    to: 9999
	  }
	});
	MaskedDate.DEFAULTS = {
	  ...MaskedPattern.DEFAULTS,
	  mask: Date,
	  pattern: DefaultPattern,
	  format: (date, masked) => {
	    if (!date) return '';
	    const day = String(date.getDate()).padStart(2, '0');
	    const month = String(date.getMonth() + 1).padStart(2, '0');
	    const year = date.getFullYear();
	    return [day, month, year].join('.');
	  },
	  parse: (str, masked) => {
	    const [day, month, year] = str.split('.').map(Number);
	    return new Date(year, month - 1, day);
	  }
	};
	IMask.MaskedDate = MaskedDate;

	/** Dynamic mask for choosing appropriate mask in run-time */
	class MaskedDynamic extends Masked {
	  constructor(opts) {
	    super({
	      ...MaskedDynamic.DEFAULTS,
	      ...opts
	    });
	    this.currentMask = undefined;
	  }
	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    super._update(opts);
	    if ('mask' in opts) {
	      this.exposeMask = undefined;
	      // mask could be totally dynamic with only `dispatch` option
	      this.compiledMasks = Array.isArray(opts.mask) ? opts.mask.map(m => {
	        const {
	          expose,
	          ...maskOpts
	        } = normalizeOpts(m);
	        const masked = createMask({
	          overwrite: this._overwrite,
	          eager: this._eager,
	          skipInvalid: this._skipInvalid,
	          ...maskOpts
	        });
	        if (expose) this.exposeMask = masked;
	        return masked;
	      }) : [];

	      // this.currentMask = this.doDispatch(''); // probably not needed but lets see
	    }
	  }

	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const details = this._applyDispatch(ch, flags);
	    if (this.currentMask) {
	      details.aggregate(this.currentMask._appendChar(ch, this.currentMaskFlags(flags)));
	    }
	    return details;
	  }
	  _applyDispatch(appended, flags, tail) {
	    if (appended === void 0) {
	      appended = '';
	    }
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (tail === void 0) {
	      tail = '';
	    }
	    const prevValueBeforeTail = flags.tail && flags._beforeTailState != null ? flags._beforeTailState._value : this.value;
	    const inputValue = this.rawInputValue;
	    const insertValue = flags.tail && flags._beforeTailState != null ? flags._beforeTailState._rawInputValue : inputValue;
	    const tailValue = inputValue.slice(insertValue.length);
	    const prevMask = this.currentMask;
	    const details = new ChangeDetails();
	    const prevMaskState = prevMask == null ? void 0 : prevMask.state;

	    // clone flags to prevent overwriting `_beforeTailState`
	    this.currentMask = this.doDispatch(appended, {
	      ...flags
	    }, tail);

	    // restore state after dispatch
	    if (this.currentMask) {
	      if (this.currentMask !== prevMask) {
	        // if mask changed reapply input
	        this.currentMask.reset();
	        if (insertValue) {
	          this.currentMask.append(insertValue, {
	            raw: true
	          });
	          details.tailShift = this.currentMask.value.length - prevValueBeforeTail.length;
	        }
	        if (tailValue) {
	          details.tailShift += this.currentMask.append(tailValue, {
	            raw: true,
	            tail: true
	          }).tailShift;
	        }
	      } else if (prevMaskState) {
	        // Dispatch can do something bad with state, so
	        // restore prev mask state
	        this.currentMask.state = prevMaskState;
	      }
	    }
	    return details;
	  }
	  _appendPlaceholder() {
	    const details = this._applyDispatch();
	    if (this.currentMask) {
	      details.aggregate(this.currentMask._appendPlaceholder());
	    }
	    return details;
	  }
	  _appendEager() {
	    const details = this._applyDispatch();
	    if (this.currentMask) {
	      details.aggregate(this.currentMask._appendEager());
	    }
	    return details;
	  }
	  appendTail(tail) {
	    const details = new ChangeDetails();
	    if (tail) details.aggregate(this._applyDispatch('', {}, tail));
	    return details.aggregate(this.currentMask ? this.currentMask.appendTail(tail) : super.appendTail(tail));
	  }
	  currentMaskFlags(flags) {
	    var _flags$_beforeTailSta, _flags$_beforeTailSta2;
	    return {
	      ...flags,
	      _beforeTailState: ((_flags$_beforeTailSta = flags._beforeTailState) == null ? void 0 : _flags$_beforeTailSta.currentMaskRef) === this.currentMask && ((_flags$_beforeTailSta2 = flags._beforeTailState) == null ? void 0 : _flags$_beforeTailSta2.currentMask) || flags._beforeTailState
	    };
	  }
	  doDispatch(appended, flags, tail) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    if (tail === void 0) {
	      tail = '';
	    }
	    return this.dispatch(appended, this, flags, tail);
	  }
	  doValidate(flags) {
	    return super.doValidate(flags) && (!this.currentMask || this.currentMask.doValidate(this.currentMaskFlags(flags)));
	  }
	  doPrepare(str, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    let [s, details] = super.doPrepare(str, flags);
	    if (this.currentMask) {
	      let currentDetails;
	      [s, currentDetails] = super.doPrepare(s, this.currentMaskFlags(flags));
	      details = details.aggregate(currentDetails);
	    }
	    return [s, details];
	  }
	  doPrepareChar(str, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    let [s, details] = super.doPrepareChar(str, flags);
	    if (this.currentMask) {
	      let currentDetails;
	      [s, currentDetails] = super.doPrepareChar(s, this.currentMaskFlags(flags));
	      details = details.aggregate(currentDetails);
	    }
	    return [s, details];
	  }
	  reset() {
	    var _this$currentMask;
	    (_this$currentMask = this.currentMask) == null || _this$currentMask.reset();
	    this.compiledMasks.forEach(m => m.reset());
	  }
	  get value() {
	    return this.exposeMask ? this.exposeMask.value : this.currentMask ? this.currentMask.value : '';
	  }
	  set value(value) {
	    if (this.exposeMask) {
	      this.exposeMask.value = value;
	      this.currentMask = this.exposeMask;
	      this._applyDispatch();
	    } else super.value = value;
	  }
	  get unmaskedValue() {
	    return this.exposeMask ? this.exposeMask.unmaskedValue : this.currentMask ? this.currentMask.unmaskedValue : '';
	  }
	  set unmaskedValue(unmaskedValue) {
	    if (this.exposeMask) {
	      this.exposeMask.unmaskedValue = unmaskedValue;
	      this.currentMask = this.exposeMask;
	      this._applyDispatch();
	    } else super.unmaskedValue = unmaskedValue;
	  }
	  get typedValue() {
	    return this.exposeMask ? this.exposeMask.typedValue : this.currentMask ? this.currentMask.typedValue : '';
	  }
	  set typedValue(typedValue) {
	    if (this.exposeMask) {
	      this.exposeMask.typedValue = typedValue;
	      this.currentMask = this.exposeMask;
	      this._applyDispatch();
	      return;
	    }
	    let unmaskedValue = String(typedValue);

	    // double check it
	    if (this.currentMask) {
	      this.currentMask.typedValue = typedValue;
	      unmaskedValue = this.currentMask.unmaskedValue;
	    }
	    this.unmaskedValue = unmaskedValue;
	  }
	  get displayValue() {
	    return this.currentMask ? this.currentMask.displayValue : '';
	  }
	  get isComplete() {
	    var _this$currentMask2;
	    return Boolean((_this$currentMask2 = this.currentMask) == null ? void 0 : _this$currentMask2.isComplete);
	  }
	  get isFilled() {
	    var _this$currentMask3;
	    return Boolean((_this$currentMask3 = this.currentMask) == null ? void 0 : _this$currentMask3.isFilled);
	  }
	  remove(fromPos, toPos) {
	    const details = new ChangeDetails();
	    if (this.currentMask) {
	      details.aggregate(this.currentMask.remove(fromPos, toPos))
	      // update with dispatch
	      .aggregate(this._applyDispatch());
	    }
	    return details;
	  }
	  get state() {
	    var _this$currentMask4;
	    return {
	      ...super.state,
	      _rawInputValue: this.rawInputValue,
	      compiledMasks: this.compiledMasks.map(m => m.state),
	      currentMaskRef: this.currentMask,
	      currentMask: (_this$currentMask4 = this.currentMask) == null ? void 0 : _this$currentMask4.state
	    };
	  }
	  set state(state) {
	    const {
	      compiledMasks,
	      currentMaskRef,
	      currentMask,
	      ...maskedState
	    } = state;
	    if (compiledMasks) this.compiledMasks.forEach((m, mi) => m.state = compiledMasks[mi]);
	    if (currentMaskRef != null) {
	      this.currentMask = currentMaskRef;
	      this.currentMask.state = currentMask;
	    }
	    super.state = maskedState;
	  }
	  extractInput(fromPos, toPos, flags) {
	    return this.currentMask ? this.currentMask.extractInput(fromPos, toPos, flags) : '';
	  }
	  extractTail(fromPos, toPos) {
	    return this.currentMask ? this.currentMask.extractTail(fromPos, toPos) : super.extractTail(fromPos, toPos);
	  }
	  doCommit() {
	    if (this.currentMask) this.currentMask.doCommit();
	    super.doCommit();
	  }
	  nearestInputPos(cursorPos, direction) {
	    return this.currentMask ? this.currentMask.nearestInputPos(cursorPos, direction) : super.nearestInputPos(cursorPos, direction);
	  }
	  get overwrite() {
	    return this.currentMask ? this.currentMask.overwrite : this._overwrite;
	  }
	  set overwrite(overwrite) {
	    this._overwrite = overwrite;
	  }
	  get eager() {
	    return this.currentMask ? this.currentMask.eager : this._eager;
	  }
	  set eager(eager) {
	    this._eager = eager;
	  }
	  get skipInvalid() {
	    return this.currentMask ? this.currentMask.skipInvalid : this._skipInvalid;
	  }
	  set skipInvalid(skipInvalid) {
	    this._skipInvalid = skipInvalid;
	  }
	  get autofix() {
	    return this.currentMask ? this.currentMask.autofix : this._autofix;
	  }
	  set autofix(autofix) {
	    this._autofix = autofix;
	  }
	  maskEquals(mask) {
	    return Array.isArray(mask) ? this.compiledMasks.every((m, mi) => {
	      if (!mask[mi]) return;
	      const {
	        mask: oldMask,
	        ...restOpts
	      } = mask[mi];
	      return objectIncludes(m, restOpts) && m.maskEquals(oldMask);
	    }) : super.maskEquals(mask);
	  }
	  typedValueEquals(value) {
	    var _this$currentMask5;
	    return Boolean((_this$currentMask5 = this.currentMask) == null ? void 0 : _this$currentMask5.typedValueEquals(value));
	  }
	}
	/** Currently chosen mask */
	/** Currently chosen mask */
	/** Compliled {@link Masked} options */
	/** Chooses {@link Masked} depending on input value */
	MaskedDynamic.DEFAULTS = {
	  ...Masked.DEFAULTS,
	  dispatch: (appended, masked, flags, tail) => {
	    if (!masked.compiledMasks.length) return;
	    const inputValue = masked.rawInputValue;

	    // simulate input
	    const inputs = masked.compiledMasks.map((m, index) => {
	      const isCurrent = masked.currentMask === m;
	      const startInputPos = isCurrent ? m.displayValue.length : m.nearestInputPos(m.displayValue.length, DIRECTION.FORCE_LEFT);
	      if (m.rawInputValue !== inputValue) {
	        m.reset();
	        m.append(inputValue, {
	          raw: true
	        });
	      } else if (!isCurrent) {
	        m.remove(startInputPos);
	      }
	      m.append(appended, masked.currentMaskFlags(flags));
	      m.appendTail(tail);
	      return {
	        index,
	        weight: m.rawInputValue.length,
	        totalInputPositions: m.totalInputPositions(0, Math.max(startInputPos, m.nearestInputPos(m.displayValue.length, DIRECTION.FORCE_LEFT)))
	      };
	    });

	    // pop masks with longer values first
	    inputs.sort((i1, i2) => i2.weight - i1.weight || i2.totalInputPositions - i1.totalInputPositions);
	    return masked.compiledMasks[inputs[0].index];
	  }
	};
	IMask.MaskedDynamic = MaskedDynamic;

	/** Pattern which validates enum values */
	class MaskedEnum extends MaskedPattern {
	  constructor(opts) {
	    super({
	      ...MaskedEnum.DEFAULTS,
	      ...opts
	    }); // mask will be created in _update
	  }

	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    const {
	      enum: enum_,
	      ...eopts
	    } = opts;
	    if (enum_) {
	      const lengths = enum_.map(e => e.length);
	      const requiredLength = Math.min(...lengths);
	      const optionalLength = Math.max(...lengths) - requiredLength;
	      eopts.mask = '*'.repeat(requiredLength);
	      if (optionalLength) eopts.mask += '[' + '*'.repeat(optionalLength) + ']';
	      this.enum = enum_;
	    }
	    super._update(eopts);
	  }
	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const matchFrom = Math.min(this.nearestInputPos(0, DIRECTION.FORCE_RIGHT), this.value.length);
	    const matches = this.enum.filter(e => this.matchValue(e, this.unmaskedValue + ch, matchFrom));
	    if (matches.length) {
	      if (matches.length === 1) {
	        this._forEachBlocksInRange(0, this.value.length, (b, bi) => {
	          const mch = matches[0][bi];
	          if (bi >= this.value.length || mch === b.value) return;
	          b.reset();
	          b._appendChar(mch, flags);
	        });
	      }
	      const d = super._appendCharRaw(matches[0][this.value.length], flags);
	      if (matches.length === 1) {
	        matches[0].slice(this.unmaskedValue.length).split('').forEach(mch => d.aggregate(super._appendCharRaw(mch)));
	      }
	      return d;
	    }
	    return new ChangeDetails({
	      skip: !this.isComplete
	    });
	  }
	  extractTail(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    // just drop tail
	    return new ContinuousTailDetails('', fromPos);
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    if (fromPos === toPos) return new ChangeDetails();
	    const matchFrom = Math.min(super.nearestInputPos(0, DIRECTION.FORCE_RIGHT), this.value.length);
	    let pos;
	    for (pos = fromPos; pos >= 0; --pos) {
	      const matches = this.enum.filter(e => this.matchValue(e, this.value.slice(matchFrom, pos), matchFrom));
	      if (matches.length > 1) break;
	    }
	    const details = super.remove(pos, toPos);
	    details.tailShift += pos - fromPos;
	    return details;
	  }
	  get isComplete() {
	    return this.enum.indexOf(this.value) >= 0;
	  }
	}
	/** Match enum value */
	MaskedEnum.DEFAULTS = {
	  ...MaskedPattern.DEFAULTS,
	  matchValue: (estr, istr, matchFrom) => estr.indexOf(istr, matchFrom) === matchFrom
	};
	IMask.MaskedEnum = MaskedEnum;

	/** Masking by custom Function */
	class MaskedFunction extends Masked {
	  /** */

	  /** Enable characters overwriting */

	  /** */

	  /** */

	  /** */

	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    super._update({
	      ...opts,
	      validate: opts.mask
	    });
	  }
	}
	IMask.MaskedFunction = MaskedFunction;

	var _MaskedNumber;
	/** Number mask */
	class MaskedNumber extends Masked {
	  /** Single char */

	  /** Single char */

	  /** Array of single chars */

	  /** */

	  /** */

	  /** Digits after point */

	  /** Flag to remove leading and trailing zeros in the end of editing */

	  /** Flag to pad trailing zeros after point in the end of editing */

	  /** Enable characters overwriting */

	  /** */

	  /** */

	  /** */

	  /** Format typed value to string */

	  /** Parse string to get typed value */

	  constructor(opts) {
	    super({
	      ...MaskedNumber.DEFAULTS,
	      ...opts
	    });
	  }
	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    super._update(opts);
	    this._updateRegExps();
	  }
	  _updateRegExps() {
	    const start = '^' + (this.allowNegative ? '[+|\\-]?' : '');
	    const mid = '\\d*';
	    const end = (this.scale ? "(" + escapeRegExp(this.radix) + "\\d{0," + this.scale + "})?" : '') + '$';
	    this._numberRegExp = new RegExp(start + mid + end);
	    this._mapToRadixRegExp = new RegExp("[" + this.mapToRadix.map(escapeRegExp).join('') + "]", 'g');
	    this._thousandsSeparatorRegExp = new RegExp(escapeRegExp(this.thousandsSeparator), 'g');
	  }
	  _removeThousandsSeparators(value) {
	    return value.replace(this._thousandsSeparatorRegExp, '');
	  }
	  _insertThousandsSeparators(value) {
	    // https://stackoverflow.com/questions/2901102/how-to-print-a-number-with-commas-as-thousands-separators-in-javascript
	    const parts = value.split(this.radix);
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, this.thousandsSeparator);
	    return parts.join(this.radix);
	  }
	  doPrepareChar(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const [prepCh, details] = super.doPrepareChar(this._removeThousandsSeparators(this.scale && this.mapToRadix.length && (
	    /*
	      radix should be mapped when
	      1) input is done from keyboard = flags.input && flags.raw
	      2) unmasked value is set = !flags.input && !flags.raw
	      and should not be mapped when
	      1) value is set = flags.input && !flags.raw
	      2) raw value is set = !flags.input && flags.raw
	    */
	    flags.input && flags.raw || !flags.input && !flags.raw) ? ch.replace(this._mapToRadixRegExp, this.radix) : ch), flags);
	    if (ch && !prepCh) details.skip = true;
	    if (prepCh && !this.allowPositive && !this.value && prepCh !== '-') details.aggregate(this._appendChar('-'));
	    return [prepCh, details];
	  }
	  _separatorsCount(to, extendOnSeparators) {
	    if (extendOnSeparators === void 0) {
	      extendOnSeparators = false;
	    }
	    let count = 0;
	    for (let pos = 0; pos < to; ++pos) {
	      if (this._value.indexOf(this.thousandsSeparator, pos) === pos) {
	        ++count;
	        if (extendOnSeparators) to += this.thousandsSeparator.length;
	      }
	    }
	    return count;
	  }
	  _separatorsCountFromSlice(slice) {
	    if (slice === void 0) {
	      slice = this._value;
	    }
	    return this._separatorsCount(this._removeThousandsSeparators(slice).length, true);
	  }
	  extractInput(fromPos, toPos, flags) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    [fromPos, toPos] = this._adjustRangeWithSeparators(fromPos, toPos);
	    return this._removeThousandsSeparators(super.extractInput(fromPos, toPos, flags));
	  }
	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const prevBeforeTailValue = flags.tail && flags._beforeTailState ? flags._beforeTailState._value : this._value;
	    const prevBeforeTailSeparatorsCount = this._separatorsCountFromSlice(prevBeforeTailValue);
	    this._value = this._removeThousandsSeparators(this.value);
	    const oldValue = this._value;
	    this._value += ch;
	    const num = this.number;
	    let accepted = !isNaN(num);
	    let skip = false;
	    if (accepted) {
	      let fixedNum;
	      if (this.min != null && this.min < 0 && this.number < this.min) fixedNum = this.min;
	      if (this.max != null && this.max > 0 && this.number > this.max) fixedNum = this.max;
	      if (fixedNum != null) {
	        if (this.autofix) {
	          this._value = this.format(fixedNum, this).replace(MaskedNumber.UNMASKED_RADIX, this.radix);
	          skip || (skip = oldValue === this._value && !flags.tail); // if not changed on tail it's still ok to proceed
	        } else {
	          accepted = false;
	        }
	      }
	      accepted && (accepted = Boolean(this._value.match(this._numberRegExp)));
	    }
	    let appendDetails;
	    if (!accepted) {
	      this._value = oldValue;
	      appendDetails = new ChangeDetails();
	    } else {
	      appendDetails = new ChangeDetails({
	        inserted: this._value.slice(oldValue.length),
	        rawInserted: skip ? '' : ch,
	        skip
	      });
	    }
	    this._value = this._insertThousandsSeparators(this._value);
	    const beforeTailValue = flags.tail && flags._beforeTailState ? flags._beforeTailState._value : this._value;
	    const beforeTailSeparatorsCount = this._separatorsCountFromSlice(beforeTailValue);
	    appendDetails.tailShift += (beforeTailSeparatorsCount - prevBeforeTailSeparatorsCount) * this.thousandsSeparator.length;
	    return appendDetails;
	  }
	  _findSeparatorAround(pos) {
	    if (this.thousandsSeparator) {
	      const searchFrom = pos - this.thousandsSeparator.length + 1;
	      const separatorPos = this.value.indexOf(this.thousandsSeparator, searchFrom);
	      if (separatorPos <= pos) return separatorPos;
	    }
	    return -1;
	  }
	  _adjustRangeWithSeparators(from, to) {
	    const separatorAroundFromPos = this._findSeparatorAround(from);
	    if (separatorAroundFromPos >= 0) from = separatorAroundFromPos;
	    const separatorAroundToPos = this._findSeparatorAround(to);
	    if (separatorAroundToPos >= 0) to = separatorAroundToPos + this.thousandsSeparator.length;
	    return [from, to];
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    [fromPos, toPos] = this._adjustRangeWithSeparators(fromPos, toPos);
	    const valueBeforePos = this.value.slice(0, fromPos);
	    const valueAfterPos = this.value.slice(toPos);
	    const prevBeforeTailSeparatorsCount = this._separatorsCount(valueBeforePos.length);
	    this._value = this._insertThousandsSeparators(this._removeThousandsSeparators(valueBeforePos + valueAfterPos));
	    const beforeTailSeparatorsCount = this._separatorsCountFromSlice(valueBeforePos);
	    return new ChangeDetails({
	      tailShift: (beforeTailSeparatorsCount - prevBeforeTailSeparatorsCount) * this.thousandsSeparator.length
	    });
	  }
	  nearestInputPos(cursorPos, direction) {
	    if (!this.thousandsSeparator) return cursorPos;
	    switch (direction) {
	      case DIRECTION.NONE:
	      case DIRECTION.LEFT:
	      case DIRECTION.FORCE_LEFT:
	        {
	          const separatorAtLeftPos = this._findSeparatorAround(cursorPos - 1);
	          if (separatorAtLeftPos >= 0) {
	            const separatorAtLeftEndPos = separatorAtLeftPos + this.thousandsSeparator.length;
	            if (cursorPos < separatorAtLeftEndPos || this.value.length <= separatorAtLeftEndPos || direction === DIRECTION.FORCE_LEFT) {
	              return separatorAtLeftPos;
	            }
	          }
	          break;
	        }
	      case DIRECTION.RIGHT:
	      case DIRECTION.FORCE_RIGHT:
	        {
	          const separatorAtRightPos = this._findSeparatorAround(cursorPos);
	          if (separatorAtRightPos >= 0) {
	            return separatorAtRightPos + this.thousandsSeparator.length;
	          }
	        }
	    }
	    return cursorPos;
	  }
	  doCommit() {
	    if (this.value) {
	      const number = this.number;
	      let validnum = number;

	      // check bounds
	      if (this.min != null) validnum = Math.max(validnum, this.min);
	      if (this.max != null) validnum = Math.min(validnum, this.max);
	      if (validnum !== number) this.unmaskedValue = this.format(validnum, this);
	      let formatted = this.value;
	      if (this.normalizeZeros) formatted = this._normalizeZeros(formatted);
	      if (this.padFractionalZeros && this.scale > 0) formatted = this._padFractionalZeros(formatted);
	      this._value = formatted;
	    }
	    super.doCommit();
	  }
	  _normalizeZeros(value) {
	    const parts = this._removeThousandsSeparators(value).split(this.radix);

	    // remove leading zeros
	    parts[0] = parts[0].replace(/^(\D*)(0*)(\d*)/, (match, sign, zeros, num) => sign + num);
	    // add leading zero
	    if (value.length && !/\d$/.test(parts[0])) parts[0] = parts[0] + '0';
	    if (parts.length > 1) {
	      parts[1] = parts[1].replace(/0*$/, ''); // remove trailing zeros
	      if (!parts[1].length) parts.length = 1; // remove fractional
	    }

	    return this._insertThousandsSeparators(parts.join(this.radix));
	  }
	  _padFractionalZeros(value) {
	    if (!value) return value;
	    const parts = value.split(this.radix);
	    if (parts.length < 2) parts.push('');
	    parts[1] = parts[1].padEnd(this.scale, '0');
	    return parts.join(this.radix);
	  }
	  doSkipInvalid(ch, flags, checkTail) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const dropFractional = this.scale === 0 && ch !== this.thousandsSeparator && (ch === this.radix || ch === MaskedNumber.UNMASKED_RADIX || this.mapToRadix.includes(ch));
	    return super.doSkipInvalid(ch, flags, checkTail) && !dropFractional;
	  }
	  get unmaskedValue() {
	    return this._removeThousandsSeparators(this._normalizeZeros(this.value)).replace(this.radix, MaskedNumber.UNMASKED_RADIX);
	  }
	  set unmaskedValue(unmaskedValue) {
	    super.unmaskedValue = unmaskedValue;
	  }
	  get typedValue() {
	    return this.parse(this.unmaskedValue, this);
	  }
	  set typedValue(n) {
	    this.rawInputValue = this.format(n, this).replace(MaskedNumber.UNMASKED_RADIX, this.radix);
	  }

	  /** Parsed Number */
	  get number() {
	    return this.typedValue;
	  }
	  set number(number) {
	    this.typedValue = number;
	  }
	  get allowNegative() {
	    return this.min != null && this.min < 0 || this.max != null && this.max < 0;
	  }
	  get allowPositive() {
	    return this.min != null && this.min > 0 || this.max != null && this.max > 0;
	  }
	  typedValueEquals(value) {
	    // handle  0 -> '' case (typed = 0 even if value = '')
	    // for details see https://github.com/uNmAnNeR/imaskjs/issues/134
	    return (super.typedValueEquals(value) || MaskedNumber.EMPTY_VALUES.includes(value) && MaskedNumber.EMPTY_VALUES.includes(this.typedValue)) && !(value === 0 && this.value === '');
	  }
	}
	_MaskedNumber = MaskedNumber;
	MaskedNumber.UNMASKED_RADIX = '.';
	MaskedNumber.EMPTY_VALUES = [...Masked.EMPTY_VALUES, 0];
	MaskedNumber.DEFAULTS = {
	  ...Masked.DEFAULTS,
	  mask: Number,
	  radix: ',',
	  thousandsSeparator: '',
	  mapToRadix: [_MaskedNumber.UNMASKED_RADIX],
	  min: Number.MIN_SAFE_INTEGER,
	  max: Number.MAX_SAFE_INTEGER,
	  scale: 2,
	  normalizeZeros: true,
	  padFractionalZeros: false,
	  parse: Number,
	  format: n => n.toLocaleString('en-US', {
	    useGrouping: false,
	    maximumFractionDigits: 20
	  })
	};
	IMask.MaskedNumber = MaskedNumber;

	/** Mask pipe source and destination types */
	const PIPE_TYPE = {
	  MASKED: 'value',
	  UNMASKED: 'unmaskedValue',
	  TYPED: 'typedValue'
	};
	/** Creates new pipe function depending on mask type, source and destination options */
	function createPipe(arg, from, to) {
	  if (from === void 0) {
	    from = PIPE_TYPE.MASKED;
	  }
	  if (to === void 0) {
	    to = PIPE_TYPE.MASKED;
	  }
	  const masked = createMask(arg);
	  return value => masked.runIsolated(m => {
	    m[from] = value;
	    return m[to];
	  });
	}

	/** Pipes value through mask depending on mask type, source and destination options */
	function pipe(value, mask, from, to) {
	  return createPipe(mask, from, to)(value);
	}
	IMask.PIPE_TYPE = PIPE_TYPE;
	IMask.createPipe = createPipe;
	IMask.pipe = pipe;

	/** Pattern mask */
	class RepeatBlock extends MaskedPattern {
	  get repeatFrom() {
	    var _ref;
	    return (_ref = Array.isArray(this.repeat) ? this.repeat[0] : this.repeat === Infinity ? 0 : this.repeat) != null ? _ref : 0;
	  }
	  get repeatTo() {
	    var _ref2;
	    return (_ref2 = Array.isArray(this.repeat) ? this.repeat[1] : this.repeat) != null ? _ref2 : Infinity;
	  }
	  constructor(opts) {
	    super(opts);
	  }
	  updateOptions(opts) {
	    super.updateOptions(opts);
	  }
	  _update(opts) {
	    var _ref3, _ref4, _this$_blocks;
	    const {
	      repeat,
	      ...blockOpts
	    } = normalizeOpts(opts); // TODO type
	    this._blockOpts = Object.assign({}, this._blockOpts, blockOpts);
	    const block = createMask(this._blockOpts);
	    this.repeat = (_ref3 = (_ref4 = repeat != null ? repeat : block.repeat) != null ? _ref4 : this.repeat) != null ? _ref3 : Infinity; // TODO type

	    super._update({
	      mask: 'm'.repeat(Math.max(this.repeatTo === Infinity && ((_this$_blocks = this._blocks) == null ? void 0 : _this$_blocks.length) || 0, this.repeatFrom)),
	      blocks: {
	        m: block
	      },
	      eager: block.eager,
	      overwrite: block.overwrite,
	      skipInvalid: block.skipInvalid,
	      lazy: block.lazy,
	      placeholderChar: block.placeholderChar,
	      displayChar: block.displayChar
	    });
	  }
	  _allocateBlock(bi) {
	    if (bi < this._blocks.length) return this._blocks[bi];
	    if (this.repeatTo === Infinity || this._blocks.length < this.repeatTo) {
	      this._blocks.push(createMask(this._blockOpts));
	      this.mask += 'm';
	      return this._blocks[this._blocks.length - 1];
	    }
	  }
	  _appendCharRaw(ch, flags) {
	    if (flags === void 0) {
	      flags = {};
	    }
	    const details = new ChangeDetails();
	    for (let bi = (_this$_mapPosToBlock$ = (_this$_mapPosToBlock = this._mapPosToBlock(this.displayValue.length)) == null ? void 0 : _this$_mapPosToBlock.index) != null ? _this$_mapPosToBlock$ : Math.max(this._blocks.length - 1, 0), block, allocated;
	    // try to get a block or
	    // try to allocate a new block if not allocated already
	    block = (_this$_blocks$bi = this._blocks[bi]) != null ? _this$_blocks$bi : allocated = !allocated && this._allocateBlock(bi); ++bi) {
	      var _this$_mapPosToBlock$, _this$_mapPosToBlock, _this$_blocks$bi, _flags$_beforeTailSta;
	      const blockDetails = block._appendChar(ch, {
	        ...flags,
	        _beforeTailState: (_flags$_beforeTailSta = flags._beforeTailState) == null || (_flags$_beforeTailSta = _flags$_beforeTailSta._blocks) == null ? void 0 : _flags$_beforeTailSta[bi]
	      });
	      if (blockDetails.skip && allocated) {
	        // remove the last allocated block and break
	        this._blocks.pop();
	        this.mask = this.mask.slice(1);
	        break;
	      }
	      details.aggregate(blockDetails);
	      if (blockDetails.consumed) break; // go next char
	    }

	    return details;
	  }
	  _trimEmptyTail(fromPos, toPos) {
	    var _this$_mapPosToBlock2, _this$_mapPosToBlock3;
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    const firstBlockIndex = Math.max(((_this$_mapPosToBlock2 = this._mapPosToBlock(fromPos)) == null ? void 0 : _this$_mapPosToBlock2.index) || 0, this.repeatFrom, 0);
	    let lastBlockIndex;
	    if (toPos != null) lastBlockIndex = (_this$_mapPosToBlock3 = this._mapPosToBlock(toPos)) == null ? void 0 : _this$_mapPosToBlock3.index;
	    if (lastBlockIndex == null) lastBlockIndex = this._blocks.length - 1;
	    let removeCount = 0;
	    for (let blockIndex = lastBlockIndex; firstBlockIndex <= blockIndex; --blockIndex, ++removeCount) {
	      if (this._blocks[blockIndex].unmaskedValue) break;
	    }
	    if (removeCount) {
	      this._blocks.splice(lastBlockIndex - removeCount + 1, removeCount);
	      this.mask = this.mask.slice(removeCount);
	    }
	  }
	  reset() {
	    super.reset();
	    this._trimEmptyTail();
	  }
	  remove(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos === void 0) {
	      toPos = this.displayValue.length;
	    }
	    const removeDetails = super.remove(fromPos, toPos);
	    this._trimEmptyTail(fromPos, toPos);
	    return removeDetails;
	  }
	  totalInputPositions(fromPos, toPos) {
	    if (fromPos === void 0) {
	      fromPos = 0;
	    }
	    if (toPos == null && this.repeatTo === Infinity) return Infinity;
	    return super.totalInputPositions(fromPos, toPos);
	  }
	  get state() {
	    return super.state;
	  }
	  set state(state) {
	    this._blocks.length = state._blocks.length;
	    this.mask = this.mask.slice(0, this._blocks.length);
	    super.state = state;
	  }
	}
	IMask.RepeatBlock = RepeatBlock;

	try {
	  globalThis.IMask = IMask;
	} catch {}

	var PhoneInputController = function PhoneInputController() {
	  var wrapper = document.querySelector('.wrapper');
	  if (wrapper) {
	    var inputPhoneMaskPaste = function inputPhoneMaskPaste(input) {
	      if (input.getAttribute('data-type') == 'tel') {
	        new IMask(input, {
	          mask: "+{7} (000) 000-00-00",
	          prepare: function prepare(appended, masked) {
	            if (input.value.charAt(0) == '8') {
	              return input.value.split('8').join(' ');
	            }
	            if (appended === '8' && masked.value === '') {
	              return '+7';
	            }
	            return appended;
	          }
	        });
	      }
	    };
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.getAttribute('data-type') == 'tel') {
	        inputPhoneMaskPaste(e.target);
	      }
	    });
	    wrapper.addEventListener('keyup', function (e) {
	      if (e.target.getAttribute('data-type') == 'tel') {
	        inputPhoneMaskPaste(e.target);
	      }
	    });
	  }
	};

	var takeControlDropdown = function takeControlDropdown() {
	  var dropdownClose = function dropdownClose(dropdown, option) {
	    dropdown.classList.remove('_active');
	    if (option) {
	      option.classList.add('_selected');
	      var tooltipValue = option.getAttribute('data-tip');
	      var tooltip = dropdown.querySelector('[data-dropdown-tip]');
	      if (tooltip && tooltipValue) {
	        tooltip.textContent = tooltipValue;
	      }
	      var input = dropdown.querySelector('input');
	      if (input) {
	        input.setAttribute('value', option.getAttribute('data-value'));
	        input.dispatchEvent(new Event('change', {
	          bubbles: true
	        }));
	      }
	    }
	  };
	  var dropdowns = document.querySelectorAll('.dropdown');
	  if (dropdowns.length > 0) {
	    dropdowns.forEach(function (dropdown) {
	      var title = dropdown.querySelector('.dropdown__title'),
	        placeholder = dropdown.querySelector('.dropdown__placeholder');
	      if (placeholder) {
	        title.style.display = 'none';
	      }
	    });
	  }
	  var wrapper = document.querySelector('.wrapper');
	  if (wrapper) {
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.classList.contains('dropdown__button')) {
	        var dropdown = e.target.closest('.dropdown');
	        var dropdownActive = document.querySelector(".dropdown._active");
	        if (dropdownActive && dropdown !== dropdownActive) {
	          dropdownActive.classList.remove('_active');
	        }
	        dropdown.classList.toggle('_active');
	      }
	    });
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.classList.contains('dropdown__option')) {
	        var title = e.target.closest('.dropdown').querySelector('.dropdown__title'),
	          placeholder = e.target.closest('.dropdown').querySelector('.dropdown__placeholder');
	        var optionSelected = e.target.closest('.dropdown').querySelector('._selected');
	        if (optionSelected && optionSelected !== e.target) {
	          optionSelected.classList.remove('_selected');
	        }
	        if (placeholder) {
	          title.style.display = 'inline-block';
	          placeholder.style.display = 'none';
	        }
	        dropdownClose(e.target.closest('.dropdown'), e.target);
	        e.target.closest('.dropdown').querySelector('span').innerHTML = e.target.innerHTML;
	        if (e.target.closest('.dropdown').classList.contains('not-filled')) {
	          e.target.closest('.dropdown').classList.remove('not-filled');
	        }
	        if (e.target.closest('.dropdown').classList.contains('has-danger')) {
	          e.target.closest('.dropdown').classList.remove('has-danger');
	        }
	      }
	    });
	    document.addEventListener('click', function (e) {
	      if (e.target.className !== 'dropdown' && e.target.className !== 'dropdown__button' && e.target.className !== 'dropdown__options') {
	        var dropdown = document.querySelector('.dropdown._active');
	        if (dropdown) {
	          dropdownClose(dropdown);
	        }
	      }
	    });
	  }
	};

	var takeControlInputs = function takeControlInputs() {
	  var changeFilled = function changeFilled(inputs) {
	    inputs.forEach(function (input) {
	      if (!input.closest('.dropdown') && !input.closest('.checkbox') && input.getAttribute('type') != 'radio') {
	        if (input.value) {
	          input.classList.add('_filled');
	        } else {
	          input.classList.remove('_filled');
	        }
	      }
	    });
	  };
	  var collectInputs = function collectInputs() {
	    var inputs = document.querySelectorAll('input');
	    if (inputs.length > 0) {
	      changeFilled(inputs);
	    }
	    var textareas = document.querySelectorAll('textarea');
	    if (textareas.length > 0) {
	      changeFilled(textareas);
	    }
	  };
	  collectInputs();
	  document.addEventListener('click', collectInputs);
	  document.addEventListener('input', collectInputs);
	  document.addEventListener('blur', collectInputs);
	};

	var takeControlFilter = function takeControlFilter() {
	  var wrapper = document.querySelector('.wrapper');
	  wrapper.addEventListener('click', function (e) {
	    if (e.target.classList.contains('filter__header')) {
	      wrapper.querySelector('.filter__main').classList.add('_open');
	      //document.body.classList.add('_lock');
	    }
	    if (e.target.classList.contains('filter__close')) {
	      wrapper.querySelector('.filter__main').classList.remove('_open');
	      document.body.classList.remove('_lock');
	    }
	    if (e.target.classList.contains('filter__title')) {
	      e.target.classList.toggle('_open');
	      e.target.closest('.filter__item').querySelector('.filter__body').classList.toggle('_open');
	      if (e.target.closest('.filter__item').querySelector('.filter__body').classList.contains('_maximum')) {
	        e.target.closest('.filter__item').querySelector('.filter__body').classList.remove('_maximum');
	        e.target.closest('.filter__item').querySelector('.filter__inputs').classList.remove('_maximum');
	        e.target.closest('.filter__item').querySelector('.filter__more').textContent = '+ Показать еще';
	      }
	    }
	    if (e.target.classList.contains('filter__more')) {
	      var inputs = e.target.closest('.filter__item').querySelector('.filter__inputs');
	      if (inputs.classList.contains('_maximum')) {
	        inputs.classList.remove('_maximum');
	        e.target.closest('.filter__item').querySelector('.filter__body').classList.remove('_maximum');
	        e.target.textContent = '+ Показать еще';
	      } else {
	        inputs.classList.add('_maximum');
	        e.target.closest('.filter__item').querySelector('.filter__body').classList.add('_maximum');
	        e.target.textContent = 'Скрыть';
	      }
	    }
	  });
	};

	var takeControlInputRange = function takeControlInputRange() {
	  var valueChange = function valueChange(take, get) {
	    get.value = take.value;
	  };
	  var wrapper = document.querySelector('.wrapper');
	  if (wrapper) {
	    var inputContainers = document.querySelectorAll('.input-range');
	    if (inputContainers.length > 0) {
	      inputContainers.forEach(function (inputContainer) {
	        var inputCheckbox = inputContainer.querySelector("input[type='checkbox']");
	        if (inputCheckbox) {
	          if (inputCheckbox.checked == false) {
	            inputContainer.classList.add('_disabled');
	          }
	        }
	      });
	    }
	    document.querySelectorAll('input[type="checkbox"]').forEach(function (el) {
	      el.addEventListener('input', function () {
	        if (el.checked == true) {
	          el.setAttribute('checked', 'true');
	        } else {
	          el.removeAttribute('checked');
	        }
	      });
	    });
	  }
	  wrapper.addEventListener('input', function (e) {
	    if (e.target.closest('.input-range')) {
	      var inputRange = e.target.closest('.input-range').querySelector("input[type='range']"),
	        inputNumber = e.target.closest('.input-range').querySelector("input[type='number']"),
	        inputCheckbox = e.target.closest('.input-range').querySelector("input[type='checkbox']");
	      if (inputRange && inputNumber) {
	        if (e.target.getAttribute('type') == 'range') {
	          valueChange(inputRange, inputNumber);
	        }
	        if (e.target.getAttribute('type') == 'number') {
	          valueChange(inputNumber, inputRange);
	        }
	      }
	      if (inputRange && inputCheckbox) {
	        var checkboxLabel = e.target.closest('.input-range').querySelector('.checkbox__label span span');
	        if (e.target.getAttribute('type') == 'range') {
	          checkboxLabel.textContent = inputRange.value;
	        }
	        if (e.target.getAttribute('type') == 'checkbox') {
	          if (inputCheckbox.checked == true) {
	            e.target.closest('.input-range').classList.remove('_disabled');
	          } else {
	            e.target.closest('.input-range').classList.add('_disabled');
	            inputRange.setAttribute('value', '0');
	          }
	        }
	      }
	    }
	  });
	};

	var takeControlScrollIntoView = function takeControlScrollIntoView() {
	  var anchors = document.querySelectorAll('.link-scroll');
	  if (anchors.length > 0) {
	    anchors.forEach(function (anchor) {
	      anchor.addEventListener('click', function (e) {
	        e.preventDefault();
	        var blockID = anchor.getAttribute('href').replace('#', '');
	        if (blockID) {
	          var blockTitle = document.getElementById(blockID);
	          blockTitle.scrollIntoView({
	            behavior: 'smooth',
	            block: 'start'
	          });
	          if (blockTitle.classList.contains('tabs__title')) {
	            var tabs = blockTitle.closest('.tabs');
	            var titles = tabs.querySelectorAll('.tabs__title');
	            var contents = tabs.querySelectorAll('.tabs__content');
	            var titleActive = tabs.querySelector('.tabs__title._active');
	            var contentActive = tabs.querySelector('.tabs__content._active');
	            if (titleActive) {
	              titleActive.classList.remove('_active');
	              contentActive.classList.remove('_active');
	            }
	            titles.forEach(function (title, i) {
	              if (title == blockTitle) {
	                titles[i].classList.add('_active');
	                contents[i].classList.add('_active');
	              }
	            });
	          }
	        }
	      });
	    });
	  }
	};

	var takeControlInputCount = function takeControlInputCount() {
	    document.body.addEventListener('click', function (e) {
	      if (e.target.closest('.input-count')) {
	        var inputBlock = e.target.closest('.input-count'),
	          lower = inputBlock.querySelector('.input-count__btn_lower'),
	          uppper = inputBlock.querySelector('.input-count__btn_uppper'),
	          input = inputBlock.querySelector('input'),
	          min = Number(input.getAttribute('min')),
	          max = Number(input.getAttribute('max'));
	        var value = Number(input.value);
	        var disableBtn = function disableBtn(value) {
	          if (lower && min) {
	            if (value <= min) {
	              lower.classList.add('_disabled');
	            } else if (value > min) {
	              lower.classList.remove('_disabled');
	            }
	          }
	          if (uppper && max) {
	            if (value >= max) {
	              uppper.classList.add('_disabled');
	            } else if (value < max) {
	              uppper.classList.remove('_disabled');
	            }
	          }
	        };
	        disableBtn(value);
	        if (e.target.classList.contains('input-count__btn_lower')) {
	          value = Number(input.value) - 1;
	          input.value = value;
	          input.setAttribute('value', value);
	          input.dispatchEvent(new Event('change', {
	            bubbles: true
	          }));
	          disableBtn(value);
	        }
	        if (e.target.classList.contains('input-count__btn_uppper')) {
	          value = Number(input.value) + 1;
	          input.value = value;
	          input.setAttribute('value', value);
	          input.dispatchEvent(new Event('change', {
	            bubbles: true
	          }));
	          disableBtn(value);
	        }
	        input.addEventListener('blur', function () {
	          value = Number(input.value);
	          if (value) {
	            input.value = value;
	            input.setAttribute('value', value);
	            disableBtn(value);
	          }
	        });
	      }
	    });
	  
	};

	var takeControlPopupTimer = function takeControlPopupTimer() {
	  var popupTimer = document.querySelector('#catch');
	  if (popupTimer) {
	    var mouseStopped = function mouseStopped() {
	      if (!startTimer) return false;
	      popupTimer.classList.add('_open');
	      body.classList.add('_lock');
	      if (lockPadding.length > 0) {
	        lockPadding.forEach(function (elem) {
	          elem.style.paddingRight = lockPaddingValue;
	        });
	        body.style.paddingRight = lockPaddingValue;
	      }
	    };
	    var body = document.querySelector('body'),
	      lockPadding = document.querySelectorAll('.lock-padding'),
	      lockPaddingValue = window.innerWidth - body.offsetWidth + 'px';
	    var timer;
	    var startTimer = true;
	    window.addEventListener('mousemove', function () {
	      clearTimeout(timer);
	      timer = setTimeout(mouseStopped, 60000);
	    }, {once : true});
	  }
	};

	var takeControlPutInForm = function takeControlPutInForm() {
	  document.addEventListener('click', function (e) {
	    var tenderPopupTextarea = document.querySelector('#tender textarea');
	    if (tenderPopupTextarea) {
	      var product = e.target.closest('.product-preview') ?? e.target.closest('#config_form') ?? e.target.closest('.ware');
			let $product = $(product);
	      if ($product) {
	        let productTitle = '';
			if ($product.attr('id')=='config_form') {
				productTitle = $product.find('.solution-config__task').children().eq(0).text();

			} else if ($product.is('.ware')) {
				productTitle = $product.prev().children('h1').text();
			} else if ($product.is('.product-preview')) {

				productTitle = $product.find('.product-preview__title').find('h4').text();
			}
	        if (productTitle) tenderPopupTextarea.value = productTitle;
	      } else if (e.target.classList.contains('popup-link')) {
	        tenderPopupTextarea.value = '';
	      }
	    }
	  });
	};

	var takeControlInputsAppend = function takeControlInputsAppend() {
	  var wrapper = document.querySelector('.wrapper');
	  if (wrapper) {
	    var taskContainer = document.querySelector('[data-form="group"]');
	    var taskDescriptionContainer = document.querySelector('[data-task-description-container]');
	    var taskDescription = document.querySelector('[data-task-description]');
	    var groupContainer = document.querySelector('[data-form="set"]');
	    var choiceForm = document.querySelector('.choise-form');
	    var updateInputName = function updateInputName(input, id) {
	      var inputName = input.getAttribute('name');
	      input.setAttribute('name', "".concat(inputName, "_duplicate_").concat(id));
	    };
	    var setTaskDescription = function setTaskDescription(taskId, title, value) {
	      var taskDescription = document.querySelector("[data-task-description-id=\"".concat(taskId, "\"]"));
	      var taskDescriptionContainer = taskDescription.querySelector('.solution-config__task-list');
	      if (!taskDescriptionContainer) return;
	      var taskDescriptionElements = taskDescriptionContainer.querySelectorAll('.solution-config__task-item');
	      var isDuplicate = false;
	      taskDescriptionElements.forEach(function (element) {
	        var taskTitle = element.querySelector('h5').textContent.replace(':', '');
	        if (taskTitle.trim() === title.trim()) {
	          element.querySelector('span').textContent = value;
	          isDuplicate = true;
	        }
	      });
	      if (!isDuplicate) {
	        taskDescriptionContainer.append(createElement(getTaskDescriptionElementTemplate(title, value)));
	      }
	    };
	    var setSelectedDropdownTaskValues = function setSelectedDropdownTaskValues(dropdowns, id) {
	      if (!dropdowns) return;
	      dropdowns.forEach(function (element) {
	        var title = element.querySelector('label').textContent;
	        var value = element.querySelector('input').value;
	        if (title && value) {
	          setTaskDescription(id, title, value);
	        }
	      });
	    };
	    var setInputRangeValues = function setInputRangeValues(inputRangeElemets, id) {
	      if (!inputRangeElemets) return;
	      inputRangeElemets.forEach(function (element) {
	        var title = element.querySelector('label').textContent;
	        var inputs = element.querySelectorAll('input');
	        var isChecked = _toConsumableArray(inputs).filter(function (input) {
	          return input.checked;
	        })[0];
	        var value = isChecked ? isChecked.value : false;
	        if (title && value) {
	          setTaskDescription(id, title, value);
	        }
	      });
	    };
	    var setListnersToRadioButtons = function setListnersToRadioButtons(eTarget, taskId) {
	      var inputWrap = eTarget;
	      var title = inputWrap.querySelector('label').textContent;
	      var inputs = inputWrap.querySelectorAll('input');
	      inputs.forEach(function (input) {
	        var isInited = input.getAttribute('data-listener-inited');
	        if (isInited) return;
	        input.setAttribute('data-listener-inited', 'true');
	        input.addEventListener('change', function () {
	          var value = input.value;
	          setTaskDescription(taskId, title, value);
	        });
	      });
	    };
	    var closeAccordions = function closeAccordions(element) {
	      var openedAccordions = element.querySelectorAll('._open');
	      if (openedAccordions) {
	        openedAccordions.forEach(function (accordion) {
	          accordion.classList.remove('_open');
	        });
	      }
	    };
	    var cloneForm = function cloneForm(group, team, id) {
	      var groupAppend = document.createElement('div');
	      groupAppend.setAttribute('data-form', 'group');
	      groupAppend.setAttribute('data-element-id', id);
	      var isPartOfTask = group.hasAttribute('data-part-of-task');
	      if (group.classList.contains('input-set__item')) {
	        groupAppend.className = "input-set__item";
	        groupAppend.innerHTML = group.innerHTML;
	      } else {
	        groupAppend.className = "accordion__group";
	        groupAppend.innerHTML = group.innerHTML + getDeleteButtonTemplate();
	      }
	      var inputs = groupAppend.querySelectorAll('input');
	      if (inputs) {
	        inputs.forEach(function (input) {
	          var isInited = input.getAttribute('data-listener-inited');
	          if (isInited) {
	            input.removeAttribute('data-listener-inited');
	          }
	        });
	      }
	      if (groupAppend) {
	        var inputGroups = groupAppend.querySelectorAll('.form-group');
	        if (inputGroups.length > 0) {
	          inputGroups.forEach(function (inputGroup) {
	            var inputs = inputGroup.querySelectorAll('input');
	            if (inputs.length > 0) {
	              inputs.forEach(function (input) {
	                updateInputName(input, id);
	              });
	            }
	          });
	        }
	      }
	      team.appendChild(groupAppend);
	      if (taskDescription && taskDescriptionContainer && isPartOfTask) {
	        resetInputs(groupAppend);
	        taskDescriptionContainer.append(createElement(getTaskDescriptionTemplate(id)));
	        var accordionOpened = groupAppend.querySelector('.accardeon__tasks._open');
	        if (accordionOpened) {
	          var dropdowns = accordionOpened.querySelectorAll('.dropdown');
	          var taskDropdown = taskContainer.querySelectorAll('[data-task-input]');
	          var inputRangeElemets = accordionOpened.querySelectorAll('.input-radio-castom');
	          setSelectedDropdownTaskValues(dropdowns, id);
	          setSelectedDropdownTaskValues(taskDropdown, id);
	          setInputRangeValues(inputRangeElemets, id);
	        }
	      } else {
	        resetInputs(groupAppend);
	        closeAccordions(groupAppend);
	      }
	    };
	    if (taskContainer && taskDescription) {
	      var id = Date.now();
	      taskContainer.setAttribute('data-element-id', id);
	      taskDescription.setAttribute('data-task-description-id', id);
	      var accordeonOpened = taskContainer.querySelector('.accardeon__tasks._open');
	      if (!accordeonOpened) return;
	      var taskDropdown = taskContainer.querySelectorAll('[data-task-input]');
	      var taskDropdownInput = taskDropdown[0].querySelector('input');
	      var dropdowns = accordeonOpened.querySelectorAll('.dropdown');
	      var inputRangeElemets = accordeonOpened.querySelectorAll('.input-radio-castom');
	      setSelectedDropdownTaskValues(dropdowns, id);
	      setSelectedDropdownTaskValues(taskDropdown, id);
	      setInputRangeValues(inputRangeElemets, id);
	      taskDropdownInput.addEventListener('change', function () {
	        var taskDropdown = document.querySelectorAll('[data-task-input]');
	        setSelectedDropdownTaskValues(taskDropdown, id);
	      });
	    }
	    wrapper.addEventListener('click', function (e) {
	      // Добавление новой группы
	      if (e.target.classList.contains('input-set__append')) {
	        e.preventDefault();
	        var append = e.target;
	        var set = append.closest('[data-form="set"]');
	        if (set) {
	          var team = set.querySelector('[data-form="team"]');
	          if (team) {
	            var group = team.querySelector('[data-form="group"]');
	            if (group) {
	              var _id = Date.now();
	              cloneForm(group, team, _id);
	            }
	          }
	        }
	      }

	      // Удаление добавленной группы
	      if (e.target.closest('.input-set__reset') || e.target.closest('.input-set__delete')) {
	        e.preventDefault();
	        e.target.closest('[data-form="group"]').remove();
	        var taskId = e.target.closest('[data-element-id]').getAttribute('data-element-id');
	        var task = document.querySelector("[data-element-id=\"".concat(taskId, "\"]"));
	        var _taskDescription = document.querySelector("[data-task-description-id=\"".concat(taskId, "\"]"));
	        var characteristics = choiceForm.querySelector('.choise-form__info').querySelectorAll('.solution-config__task-item');
	        if (characteristics) {
	          characteristics.forEach(function (characteristic) {
	            var name = characteristic.getAttribute('data-name');
	            if (name && name.includes(taskId)) {
	              characteristic.remove();
	            }
	          });
	        }
	        characteristics.forEach;
	        if (task) {
	          task.remove();
	        }
	        if (_taskDescription) {
	          _taskDescription.remove();
	        }
	      }
	    });

	    // обновляет значения в блоке "Ваш сервер" при смене задачи
	    if (!groupContainer) return;
	    groupContainer.addEventListener('click', function (e) {
	      if (!choiceForm || e.target.closest('.input-set__append')) return;
	      var taskElement = e.target.closest('[data-element-id]');
	      if (!taskElement) return;
	      var taskId = taskElement.getAttribute('data-element-id');
	      if (!taskId) return;
	      if (e.target.closest('.tasks-value')) {
	        var input = e.target.closest('.dropdown').querySelector('input');
	        var isInited = input.getAttribute('data-listener-inited');
	        if (isInited) return;
	        input.setAttribute('data-listener-inited', 'true');
	      }
	      if (e.target.closest('.dropdown')) {
	        var _input = e.target.closest('.dropdown').querySelector('input');
	        var _isInited = _input.getAttribute('data-listener-inited');
	        e.target.closest('.dropdown').querySelector('label').textContent;
	        if (_isInited) return;
	        _input.setAttribute('data-listener-inited', 'true');
	        // input.addEventListener('change', () => {
	        // 	const value = input.value;
	        // 	setTaskDescription(taskId, title, value);
	        // })
	      }
	      if (e.target.closest('.input-radio')) {
	        setListnersToRadioButtons(e.target.closest('.input-radio'), taskId);
	      }
	      if (e.target.closest('.input-radio-castom')) {
	        setListnersToRadioButtons(e.target.closest('.input-radio-castom'), taskId);
	      }
	    });
	    wrapper.addEventListener('change', function (e) {
	      if (e.target.closest('.tasks-value') && e.target.closest('[data-form="set"]')) {
	        var taskElement = e.target.closest('[data-element-id]');
	        if (!taskElement) return;
	        var taskId = taskElement.getAttribute('data-element-id');
	        if (!taskId) return;
	        var _taskDescriptionContainer = document.querySelector("[data-task-description-id=\"".concat(taskId, "\"]")).querySelector('.solution-config__task-list');
	        if (_taskDescriptionContainer) {
	          _taskDescriptionContainer.innerHTML = '';
	          var taskList = e.target.closest('.tasks-list');
	          var taskValuesDropdown = taskList.querySelectorAll('[data-task-input]');
	          var _taskContainer = taskList.querySelector('.accardeon__tasks._open');
	          var _dropdowns = _taskContainer.querySelectorAll('.dropdown');
	          var _inputRangeElemets = _taskContainer.querySelectorAll('.input-radio-castom');
	          if (taskValuesDropdown) {
	            setSelectedDropdownTaskValues(taskValuesDropdown, taskId);
	          }
	          if (_dropdowns) {
	            setSelectedDropdownTaskValues(_dropdowns, taskId);
	          }
	          if (_inputRangeElemets) {
	            setInputRangeValues(_inputRangeElemets, taskId);
	          }
	        }
	      }
	      if (e.target.closest('.dropdown') && e.target.closest('[data-form="set"]')) {
	        var _taskElement = e.target.closest('[data-element-id]');
	        if (!_taskElement) return;
	        var _taskId = _taskElement.getAttribute('data-element-id');
	        if (!_taskId) return;
	        var input = e.target.closest('.dropdown').querySelector('input');
	        setTaskDescription(_taskId, e.target.closest('.dropdown').querySelector('label').textContent, input.value);
	      }
	    });
	  }
	};

	var takeControlInputRadioCastom = function takeControlInputRadioCastom() {
	  var setNumberOfElementsInputRadioCastom = function setNumberOfElementsInputRadioCastom() {
	    var inputs = document.querySelectorAll('.input-radio-castom');
	    if (inputs[0]) {
	      inputs.forEach(function (inputContainer) {
	        if (inputContainer.getAttribute('data-initialized')) return;
	        inputContainer.setAttribute('data-initialized', '');
	        var inputWrapper = inputContainer.querySelector('.input-radio-castom__inputs');
	        var inputCaptions = inputContainer.querySelector('.input-radio-castom__captions');
	        var inputsCount = inputWrapper.querySelectorAll('.input-radio-castom__input');
	        var captionCount = inputCaptions.querySelectorAll('span');
	        if (inputsCount[0]) {
	          inputWrapper.style.setProperty('--input-count', inputsCount.length - 1);
	        }
	        if (captionCount[0]) {
	          inputCaptions.style.setProperty('--caption-count', captionCount.length - 2);
	        }
	      });
	    }
	  };
	  var wrapper = document.querySelector('.wrapper');
	  setNumberOfElementsInputRadioCastom();
	  if (wrapper) {
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.closest('.input-radio-castom') && e.target.tagName != 'LABEL' && !e.target.classList.contains('input-radio-castom__inputs')) {
	        var isChecked = e.target.closest('.input-radio-castom').querySelector('input[checked]');
	        if (isChecked) {
	          isChecked.removeAttribute('checked');
	        }
	        e.target.setAttribute('checked', '');
	      }
	    });
	  }
	};

	var takeControlInputRadio = function takeControlInputRadio() {
	  var wrapper = document.querySelector('.wrapper');
	  var setTip = function setTip(element) {
	    var inputRadioContainer = element.closest('.input-radio');
	    var tipValue = element.getAttribute('data-tip');
	    if (tipValue && tipValue !== 'undefined') {
	      var tip = inputRadioContainer.querySelector('[data-radio-tip]');
	      tip.textContent = tipValue;
	    }
	  };
	  if (wrapper) {
	    document.querySelectorAll('.input-radio').forEach(function (radio) {
	      return setTip(radio);
	    });
	    wrapper.addEventListener('click', function (e) {
	      if (e.target.closest('.input-radio') && e.target.tagName != 'LABEL' && e.target.tagName === 'INPUT') {
	        var radioChecked = e.target.closest('.input-radio').querySelector('input[checked]');
	        setTip(e.target);
	        if (radioChecked) {
	          radioChecked.removeAttribute('checked');
	        }
	        e.target.setAttribute('checked', '');
	      }
	    });
	  }
	};

	var formTaskController = function formTaskController() {
	  var wrapper = document.querySelector('.wrapper');
	  if (wrapper) {
	    wrapper.addEventListener('click', function (e) {
	      var inpWrapers = document.querySelectorAll('.accordion__inputs');
							if (!e.target.closest('[data-shop-item-input="count"]')) {
								inpWrapers.forEach(function (elem) {
	        if (!elem.classList.contains('tasks-list')) {
	          elem.querySelectorAll('.input-radio-castom');
	          var _title, _text;
	          if (e.target.classList.contains('input-count__btn_lower')) {
	            _title = e.target.closest('.input-count').querySelector('label').textContent;
	            _text = +e.target.closest('.input-count').querySelector('input').value - 1;
	            addTask(_title, _text);
	          }
	          if (e.target.classList.contains('input-count__btn_uppper')) {
	            _title = e.target.closest('.input-count').querySelector('label').textContent;
	            _text = +e.target.closest('.input-count').querySelector('input').value + 1;
	            addTask(_title, _text);
	          }
	          if (e.target.classList.contains('dropdown__option')) {
	            _title = e.target.closest('.dropdown').querySelector('label').textContent;
	            _text = e.target.textContent;
	            addTask(_title, _text);
	          }
	          if (e.target.closest('.input-radio__item') && e.target.tagName == 'INPUT') {
	            _title = e.target.closest('.input-radio').querySelector('label').textContent;
	            e.target.closest('.input-radio').querySelectorAll('input').forEach(function (inp) {
	              if (inp.checked) {
	                _text = inp.parentElement.querySelector('h4').textContent;
	              }
	            });
	            addTask(_title, _text);
	          }
	          if (e.target.closest('.input-radio-castom__input') && e.target.tagName == 'INPUT') {
	            _title = e.target.closest('.input-radio-castom').querySelector('label').textContent;
	            e.target.closest('.input-radio-castom').querySelectorAll('input').forEach(function (inp) {
	              if (inp.checked) {
	                _text = inp.value;
	              }
	            });
	            addTask(_title, _text);
	          }
	        }
	      	});
							}
	      
	    });
	    wrapper.addEventListener('input', function (e) {
	      if (e.target.closest('.input-count') && e.target.tagName == 'INPUT' && !e.target.closest('[data-shop-item-input="count"]')) {
	        title = e.target.closest('.input-count').querySelector('label').textContent;
	        text = e.target.value;
	        addTask(title, text);
	      }
	    });
	  }
	  function addTask(title, text) {
	    var taskWarp = document.querySelector('.solution-config__task.task-second');
	    if (!taskWarp) return;
	    var taskList = taskWarp.querySelector('.solution-config__task-list');
	    var bool = false;
	    var tasks = taskList.querySelectorAll('.solution-config__task-item');
	    if (document.querySelector('.solution-config__task-item')) {
	      tasks.forEach(function (task) {
	        var taskTitle = task.querySelector('h5').textContent;
	        var taskText = task.querySelector('span').textContent;
	        if (taskTitle === title && taskText === text) {
	          bool = true;
	        } else if (taskTitle === title && taskText !== text) {
	          task.querySelector('span').innerHTML = text;
	          bool = true;
	        }
	      });
	    }
	    if (bool === false) {
	      taskList.innerHTML += "<div class=\"solution-config__task-item\">\n\t\t\t\t<h5>".concat(title, "</h5>\n\t\t\t\t<span>").concat(text, "</span>\n\t\t</div>");
	    }
	  }
	};

	var takeControlDependInputs = function takeControlDependInputs() {
	  var dependInputs = document.querySelectorAll('[data-depend-inputs]');
	  if (!dependInputs[0]) return;
	  dependInputs.forEach(function (dependInputConatiner) {
	    var inputs = dependInputConatiner.querySelectorAll('[data-depend-input]');
	    var wrappers = dependInputConatiner.querySelectorAll('[data-depend-input-container]');
	    inputs.forEach(function (input) {
	      input.addEventListener('change', function (evt) {
	        // для одиночного чекбокса
	        if (inputs.length === 1) {
	          wrappers[0].classList.toggle('_open');
	          return;
	        }
	        wrappers.forEach(function (wrapper) {
	          if (wrapper.dataset.dependInputContainer === evt.target.dataset.dependInput) {
	            wrapper.classList.add('_open');
	          } else {
	            wrapper.classList.remove('_open');
	          }
	        });
	      });
	    });
	  });
	};

	var takeControlChoosingRequiredKP = function takeControlChoosingRequiredKP() {
	  var clearRequireds = function clearRequireds(radioChecked) {
	    var phone = radioChecked.closest('.popup').querySelector('.input__container_phone');
	    if (phone) {
	      phone.classList.remove('has-success');
	      phone.classList.remove('has-danger');
	      phone.querySelector('input').required = false;
	      phone.querySelector('input').removeAttribute('aria-invalid');
	      phone.querySelector('.input__label').textContent = phone.querySelector('.input__label').textContent.replace('*', '');
	    }
	    var email = radioChecked.closest('.popup').querySelector('.input__container_email');
	    if (email) {
	      email.classList.remove('has-success');
	      email.classList.remove('has-danger');
	      email.querySelector('input').required = false;
	      email.querySelector('input').removeAttribute('aria-invalid');
	      email.querySelector('.input__label').textContent = email.querySelector('.input__label').textContent.replace('*', '');
	    }
	  };
	  document.addEventListener('click', function (e) {
	    if (e.target.getAttribute('data-name') == 'choosing-social') {
	      var value = e.target.getAttribute('data-value');
	      switch (value) {
	        case 'Telegram':
	        case 'Whatsapp':
	          clearRequireds(e.target);
	          var phone = e.target.closest('.popup').querySelector('.input__container_phone');
	          if (phone) {
	            phone.querySelector('input').required = true;
	            phone.querySelector('.input__label').textContent += '*';
	          }
	          break;
	        case 'E-mail':
	          clearRequireds(e.target);
	          var email = e.target.closest('.popup').querySelector('.input__container_email');
	          if (email) {
	            email.querySelector('input').required = true;
	            email.querySelector('.input__label').textContent += '*';
	          }
	          break;
	      }
	    }
	  });
	};

	var takeControlСlipboards = function takeControlСlipboards() {
	  var clipboardLinks = document.querySelectorAll('[data-clipboard]');
	  if (clipboardLinks.length > 0) {
	    clipboardLinks.forEach(function (link) {
	      link.addEventListener('click', function (e) {
	        e.preventDefault();
	        var textCopied = ClipboardJS.copy(window.location.href);
	        link.classList.add('_active');
	        setTimeout(function () {
	          link.classList.remove('_active');
	        }, 1000);
	        console.log('copied!', textCopied);
	      });
	    });
	  }
	};

	var takeControlRating = function takeControlRating() {
	  document.body.addEventListener('click', function (e) {
	    if (e.target.closest('[data-rating="rating"]') && e.target.hasAttribute('data-rating-value')) {
	      var rating = e.target.closest('[data-rating="rating"]');
	      var value = e.target.getAttribute('data-rating-value');
	      var items = rating.querySelectorAll('[data-rating-value]');
	      if (value && items.length > 0) {
	        items.forEach(function (item) {
	          item.classList.remove('_active');
	        });
	        for (var i = parseInt(value) - 1; i >= 0; i--) {
	          items[i].classList.add('_active');
	        }
	        var input = document.querySelector('[data-rating="input"]');
	        input.value = value;
	      }
	    }
	    if (e.target.closest('[data-rating="rating"]') && e.target.getAttribute('data-rating') == 'btn') {
	      var _rating = e.target.closest('[data-rating="rating"]');
	      var btnChildren = e.target.querySelector('.children');
	      if (_rating.classList.contains('_disabled')) {
	        _rating.classList.remove('_disabled');
	        btnChildren.textContent = 'Оценить';
	      } else {
	        _rating.classList.add('_disabled');
	        btnChildren.textContent = 'Поменять оценку';
	      }
	    }
	  });
	};

	var takeControlBookmark = function takeControlBookmark() {
	  document.addEventListener('click', function (e) {
	    if (e.target.hasAttribute('data-bookmark')) {
	      e.preventDefault();
	      // Проверяем, является ли браузер Chrome, Firefox, Safari, Edge
	      if (window.sidebar && window.sidebar.addPanel) {
	        // Firefox
	        window.sidebar.addPanel(document.title, location.href, '');
	      } else if (window.external && (window.external.AddFavorite || window.external.addToFavorites)) {
	        // IE
	        if (window.external.AddFavorite) {
	          window.external.AddFavorite(location.href, document.title);
	        } else {
	          window.external.addToFavorites(location.href, document.title);
	        }
	      } else {
	        // Другие браузеры (эмуляция)
	        if (confirm("Нажмите OK, чтобы добавить в закладки.  Если не работает, используйте Ctrl+D (Cmd+D на Mac).")) ;
	      }
	    }
	  });
	};

	/**
	 * SSR Window 4.0.2
	 * Better handling for window object in SSR environment
	 * https://github.com/nolimits4web/ssr-window
	 *
	 * Copyright 2021, Vladimir Kharlampidi
	 *
	 * Licensed under MIT
	 *
	 * Released on: December 13, 2021
	 */
	/* eslint-disable no-param-reassign */
	function isObject$1(obj) {
	  return obj !== null && typeof obj === 'object' && 'constructor' in obj && obj.constructor === Object;
	}
	function extend$1(target = {}, src = {}) {
	  Object.keys(src).forEach(key => {
	    if (typeof target[key] === 'undefined') target[key] = src[key];else if (isObject$1(src[key]) && isObject$1(target[key]) && Object.keys(src[key]).length > 0) {
	      extend$1(target[key], src[key]);
	    }
	  });
	}
	const ssrDocument = {
	  body: {},
	  addEventListener() {},
	  removeEventListener() {},
	  activeElement: {
	    blur() {},
	    nodeName: ''
	  },
	  querySelector() {
	    return null;
	  },
	  querySelectorAll() {
	    return [];
	  },
	  getElementById() {
	    return null;
	  },
	  createEvent() {
	    return {
	      initEvent() {}
	    };
	  },
	  createElement() {
	    return {
	      children: [],
	      childNodes: [],
	      style: {},
	      setAttribute() {},
	      getElementsByTagName() {
	        return [];
	      }
	    };
	  },
	  createElementNS() {
	    return {};
	  },
	  importNode() {
	    return null;
	  },
	  location: {
	    hash: '',
	    host: '',
	    hostname: '',
	    href: '',
	    origin: '',
	    pathname: '',
	    protocol: '',
	    search: ''
	  }
	};
	function getDocument() {
	  const doc = typeof document !== 'undefined' ? document : {};
	  extend$1(doc, ssrDocument);
	  return doc;
	}
	const ssrWindow = {
	  document: ssrDocument,
	  navigator: {
	    userAgent: ''
	  },
	  location: {
	    hash: '',
	    host: '',
	    hostname: '',
	    href: '',
	    origin: '',
	    pathname: '',
	    protocol: '',
	    search: ''
	  },
	  history: {
	    replaceState() {},
	    pushState() {},
	    go() {},
	    back() {}
	  },
	  CustomEvent: function CustomEvent() {
	    return this;
	  },
	  addEventListener() {},
	  removeEventListener() {},
	  getComputedStyle() {
	    return {
	      getPropertyValue() {
	        return '';
	      }
	    };
	  },
	  Image() {},
	  Date() {},
	  screen: {},
	  setTimeout() {},
	  clearTimeout() {},
	  matchMedia() {
	    return {};
	  },
	  requestAnimationFrame(callback) {
	    if (typeof setTimeout === 'undefined') {
	      callback();
	      return null;
	    }
	    return setTimeout(callback, 0);
	  },
	  cancelAnimationFrame(id) {
	    if (typeof setTimeout === 'undefined') {
	      return;
	    }
	    clearTimeout(id);
	  }
	};
	function getWindow() {
	  const win = typeof window !== 'undefined' ? window : {};
	  extend$1(win, ssrWindow);
	  return win;
	}

	/**
	 * Dom7 4.0.6
	 * Minimalistic JavaScript library for DOM manipulation, with a jQuery-compatible API
	 * https://framework7.io/docs/dom7.html
	 *
	 * Copyright 2023, Vladimir Kharlampidi
	 *
	 * Licensed under MIT
	 *
	 * Released on: February 2, 2023
	 */

	/* eslint-disable no-proto */
	function makeReactive(obj) {
	  const proto = obj.__proto__;
	  Object.defineProperty(obj, '__proto__', {
	    get() {
	      return proto;
	    },
	    set(value) {
	      proto.__proto__ = value;
	    }
	  });
	}
	class Dom7 extends Array {
	  constructor(items) {
	    if (typeof items === 'number') {
	      super(items);
	    } else {
	      super(...(items || []));
	      makeReactive(this);
	    }
	  }
	}
	function arrayFlat(arr = []) {
	  const res = [];
	  arr.forEach(el => {
	    if (Array.isArray(el)) {
	      res.push(...arrayFlat(el));
	    } else {
	      res.push(el);
	    }
	  });
	  return res;
	}
	function arrayFilter(arr, callback) {
	  return Array.prototype.filter.call(arr, callback);
	}
	function arrayUnique(arr) {
	  const uniqueArray = [];
	  for (let i = 0; i < arr.length; i += 1) {
	    if (uniqueArray.indexOf(arr[i]) === -1) uniqueArray.push(arr[i]);
	  }
	  return uniqueArray;
	}

	// eslint-disable-next-line

	function qsa(selector, context) {
	  if (typeof selector !== 'string') {
	    return [selector];
	  }
	  const a = [];
	  const res = context.querySelectorAll(selector);
	  for (let i = 0; i < res.length; i += 1) {
	    a.push(res[i]);
	  }
	  return a;
	}
	function $(selector, context) {
	  const window = getWindow();
	  const document = getDocument();
	  let arr = [];
	  if (!context && selector instanceof Dom7) {
	    return selector;
	  }
	  if (!selector) {
	    return new Dom7(arr);
	  }
	  if (typeof selector === 'string') {
	    const html = selector.trim();
	    if (html.indexOf('<') >= 0 && html.indexOf('>') >= 0) {
	      let toCreate = 'div';
	      if (html.indexOf('<li') === 0) toCreate = 'ul';
	      if (html.indexOf('<tr') === 0) toCreate = 'tbody';
	      if (html.indexOf('<td') === 0 || html.indexOf('<th') === 0) toCreate = 'tr';
	      if (html.indexOf('<tbody') === 0) toCreate = 'table';
	      if (html.indexOf('<option') === 0) toCreate = 'select';
	      const tempParent = document.createElement(toCreate);
	      tempParent.innerHTML = html;
	      for (let i = 0; i < tempParent.childNodes.length; i += 1) {
	        arr.push(tempParent.childNodes[i]);
	      }
	    } else {
	      arr = qsa(selector.trim(), context || document);
	    } // arr = qsa(selector, document);
	  } else if (selector.nodeType || selector === window || selector === document) {
	    arr.push(selector);
	  } else if (Array.isArray(selector)) {
	    if (selector instanceof Dom7) return selector;
	    arr = selector;
	  }
	  return new Dom7(arrayUnique(arr));
	}
	$.fn = Dom7.prototype;

	// eslint-disable-next-line

	function addClass(...classes) {
	  const classNames = arrayFlat(classes.map(c => c.split(' ')));
	  this.forEach(el => {
	    el.classList.add(...classNames);
	  });
	  return this;
	}
	function removeClass(...classes) {
	  const classNames = arrayFlat(classes.map(c => c.split(' ')));
	  this.forEach(el => {
	    el.classList.remove(...classNames);
	  });
	  return this;
	}
	function toggleClass(...classes) {
	  const classNames = arrayFlat(classes.map(c => c.split(' ')));
	  this.forEach(el => {
	    classNames.forEach(className => {
	      el.classList.toggle(className);
	    });
	  });
	}
	function hasClass(...classes) {
	  const classNames = arrayFlat(classes.map(c => c.split(' ')));
	  return arrayFilter(this, el => {
	    return classNames.filter(className => el.classList.contains(className)).length > 0;
	  }).length > 0;
	}
	function attr(attrs, value) {
	  if (arguments.length === 1 && typeof attrs === 'string') {
	    // Get attr
	    if (this[0]) return this[0].getAttribute(attrs);
	    return undefined;
	  } // Set attrs

	  for (let i = 0; i < this.length; i += 1) {
	    if (arguments.length === 2) {
	      // String
	      this[i].setAttribute(attrs, value);
	    } else {
	      // Object
	      for (const attrName in attrs) {
	        this[i][attrName] = attrs[attrName];
	        this[i].setAttribute(attrName, attrs[attrName]);
	      }
	    }
	  }
	  return this;
	}
	function removeAttr(attr) {
	  for (let i = 0; i < this.length; i += 1) {
	    this[i].removeAttribute(attr);
	  }
	  return this;
	}
	function transform(transform) {
	  for (let i = 0; i < this.length; i += 1) {
	    this[i].style.transform = transform;
	  }
	  return this;
	}
	function transition$1(duration) {
	  for (let i = 0; i < this.length; i += 1) {
	    this[i].style.transitionDuration = typeof duration !== 'string' ? `${duration}ms` : duration;
	  }
	  return this;
	}
	function on(...args) {
	  let [eventType, targetSelector, listener, capture] = args;
	  if (typeof args[1] === 'function') {
	    [eventType, listener, capture] = args;
	    targetSelector = undefined;
	  }
	  if (!capture) capture = false;
	  function handleLiveEvent(e) {
	    const target = e.target;
	    if (!target) return;
	    const eventData = e.target.dom7EventData || [];
	    if (eventData.indexOf(e) < 0) {
	      eventData.unshift(e);
	    }
	    if ($(target).is(targetSelector)) listener.apply(target, eventData);else {
	      const parents = $(target).parents(); // eslint-disable-line

	      for (let k = 0; k < parents.length; k += 1) {
	        if ($(parents[k]).is(targetSelector)) listener.apply(parents[k], eventData);
	      }
	    }
	  }
	  function handleEvent(e) {
	    const eventData = e && e.target ? e.target.dom7EventData || [] : [];
	    if (eventData.indexOf(e) < 0) {
	      eventData.unshift(e);
	    }
	    listener.apply(this, eventData);
	  }
	  const events = eventType.split(' ');
	  let j;
	  for (let i = 0; i < this.length; i += 1) {
	    const el = this[i];
	    if (!targetSelector) {
	      for (j = 0; j < events.length; j += 1) {
	        const event = events[j];
	        if (!el.dom7Listeners) el.dom7Listeners = {};
	        if (!el.dom7Listeners[event]) el.dom7Listeners[event] = [];
	        el.dom7Listeners[event].push({
	          listener,
	          proxyListener: handleEvent
	        });
	        el.addEventListener(event, handleEvent, capture);
	      }
	    } else {
	      // Live events
	      for (j = 0; j < events.length; j += 1) {
	        const event = events[j];
	        if (!el.dom7LiveListeners) el.dom7LiveListeners = {};
	        if (!el.dom7LiveListeners[event]) el.dom7LiveListeners[event] = [];
	        el.dom7LiveListeners[event].push({
	          listener,
	          proxyListener: handleLiveEvent
	        });
	        el.addEventListener(event, handleLiveEvent, capture);
	      }
	    }
	  }
	  return this;
	}
	function off(...args) {
	  let [eventType, targetSelector, listener, capture] = args;
	  if (typeof args[1] === 'function') {
	    [eventType, listener, capture] = args;
	    targetSelector = undefined;
	  }
	  if (!capture) capture = false;
	  const events = eventType.split(' ');
	  for (let i = 0; i < events.length; i += 1) {
	    const event = events[i];
	    for (let j = 0; j < this.length; j += 1) {
	      const el = this[j];
	      let handlers;
	      if (!targetSelector && el.dom7Listeners) {
	        handlers = el.dom7Listeners[event];
	      } else if (targetSelector && el.dom7LiveListeners) {
	        handlers = el.dom7LiveListeners[event];
	      }
	      if (handlers && handlers.length) {
	        for (let k = handlers.length - 1; k >= 0; k -= 1) {
	          const handler = handlers[k];
	          if (listener && handler.listener === listener) {
	            el.removeEventListener(event, handler.proxyListener, capture);
	            handlers.splice(k, 1);
	          } else if (listener && handler.listener && handler.listener.dom7proxy && handler.listener.dom7proxy === listener) {
	            el.removeEventListener(event, handler.proxyListener, capture);
	            handlers.splice(k, 1);
	          } else if (!listener) {
	            el.removeEventListener(event, handler.proxyListener, capture);
	            handlers.splice(k, 1);
	          }
	        }
	      }
	    }
	  }
	  return this;
	}
	function trigger(...args) {
	  const window = getWindow();
	  const events = args[0].split(' ');
	  const eventData = args[1];
	  for (let i = 0; i < events.length; i += 1) {
	    const event = events[i];
	    for (let j = 0; j < this.length; j += 1) {
	      const el = this[j];
	      if (window.CustomEvent) {
	        const evt = new window.CustomEvent(event, {
	          detail: eventData,
	          bubbles: true,
	          cancelable: true
	        });
	        el.dom7EventData = args.filter((data, dataIndex) => dataIndex > 0);
	        el.dispatchEvent(evt);
	        el.dom7EventData = [];
	        delete el.dom7EventData;
	      }
	    }
	  }
	  return this;
	}
	function transitionEnd$1(callback) {
	  const dom = this;
	  function fireCallBack(e) {
	    if (e.target !== this) return;
	    callback.call(this, e);
	    dom.off('transitionend', fireCallBack);
	  }
	  if (callback) {
	    dom.on('transitionend', fireCallBack);
	  }
	  return this;
	}
	function outerWidth(includeMargins) {
	  if (this.length > 0) {
	    if (includeMargins) {
	      const styles = this.styles();
	      return this[0].offsetWidth + parseFloat(styles.getPropertyValue('margin-right')) + parseFloat(styles.getPropertyValue('margin-left'));
	    }
	    return this[0].offsetWidth;
	  }
	  return null;
	}
	function outerHeight(includeMargins) {
	  if (this.length > 0) {
	    if (includeMargins) {
	      const styles = this.styles();
	      return this[0].offsetHeight + parseFloat(styles.getPropertyValue('margin-top')) + parseFloat(styles.getPropertyValue('margin-bottom'));
	    }
	    return this[0].offsetHeight;
	  }
	  return null;
	}
	function offset() {
	  if (this.length > 0) {
	    const window = getWindow();
	    const document = getDocument();
	    const el = this[0];
	    const box = el.getBoundingClientRect();
	    const body = document.body;
	    const clientTop = el.clientTop || body.clientTop || 0;
	    const clientLeft = el.clientLeft || body.clientLeft || 0;
	    const scrollTop = el === window ? window.scrollY : el.scrollTop;
	    const scrollLeft = el === window ? window.scrollX : el.scrollLeft;
	    return {
	      top: box.top + scrollTop - clientTop,
	      left: box.left + scrollLeft - clientLeft
	    };
	  }
	  return null;
	}
	function styles() {
	  const window = getWindow();
	  if (this[0]) return window.getComputedStyle(this[0], null);
	  return {};
	}
	function css(props, value) {
	  const window = getWindow();
	  let i;
	  if (arguments.length === 1) {
	    if (typeof props === 'string') {
	      // .css('width')
	      if (this[0]) return window.getComputedStyle(this[0], null).getPropertyValue(props);
	    } else {
	      // .css({ width: '100px' })
	      for (i = 0; i < this.length; i += 1) {
	        for (const prop in props) {
	          this[i].style[prop] = props[prop];
	        }
	      }
	      return this;
	    }
	  }
	  if (arguments.length === 2 && typeof props === 'string') {
	    // .css('width', '100px')
	    for (i = 0; i < this.length; i += 1) {
	      this[i].style[props] = value;
	    }
	    return this;
	  }
	  return this;
	}
	function each(callback) {
	  if (!callback) return this;
	  this.forEach((el, index) => {
	    callback.apply(el, [el, index]);
	  });
	  return this;
	}
	function filter(callback) {
	  const result = arrayFilter(this, callback);
	  return $(result);
	}
	function html(html) {
	  if (typeof html === 'undefined') {
	    return this[0] ? this[0].innerHTML : null;
	  }
	  for (let i = 0; i < this.length; i += 1) {
	    this[i].innerHTML = html;
	  }
	  return this;
	}
	function text(text) {
	  if (typeof text === 'undefined') {
	    return this[0] ? this[0].textContent.trim() : null;
	  }
	  for (let i = 0; i < this.length; i += 1) {
	    this[i].textContent = text;
	  }
	  return this;
	}
	function is(selector) {
	  const window = getWindow();
	  const document = getDocument();
	  const el = this[0];
	  let compareWith;
	  let i;
	  if (!el || typeof selector === 'undefined') return false;
	  if (typeof selector === 'string') {
	    if (el.matches) return el.matches(selector);
	    if (el.webkitMatchesSelector) return el.webkitMatchesSelector(selector);
	    if (el.msMatchesSelector) return el.msMatchesSelector(selector);
	    compareWith = $(selector);
	    for (i = 0; i < compareWith.length; i += 1) {
	      if (compareWith[i] === el) return true;
	    }
	    return false;
	  }
	  if (selector === document) {
	    return el === document;
	  }
	  if (selector === window) {
	    return el === window;
	  }
	  if (selector.nodeType || selector instanceof Dom7) {
	    compareWith = selector.nodeType ? [selector] : selector;
	    for (i = 0; i < compareWith.length; i += 1) {
	      if (compareWith[i] === el) return true;
	    }
	    return false;
	  }
	  return false;
	}
	function index() {
	  let child = this[0];
	  let i;
	  if (child) {
	    i = 0; // eslint-disable-next-line

	    while ((child = child.previousSibling) !== null) {
	      if (child.nodeType === 1) i += 1;
	    }
	    return i;
	  }
	  return undefined;
	}
	function eq(index) {
	  if (typeof index === 'undefined') return this;
	  const length = this.length;
	  if (index > length - 1) {
	    return $([]);
	  }
	  if (index < 0) {
	    const returnIndex = length + index;
	    if (returnIndex < 0) return $([]);
	    return $([this[returnIndex]]);
	  }
	  return $([this[index]]);
	}
	function append(...els) {
	  let newChild;
	  const document = getDocument();
	  for (let k = 0; k < els.length; k += 1) {
	    newChild = els[k];
	    for (let i = 0; i < this.length; i += 1) {
	      if (typeof newChild === 'string') {
	        const tempDiv = document.createElement('div');
	        tempDiv.innerHTML = newChild;
	        while (tempDiv.firstChild) {
	          this[i].appendChild(tempDiv.firstChild);
	        }
	      } else if (newChild instanceof Dom7) {
	        for (let j = 0; j < newChild.length; j += 1) {
	          this[i].appendChild(newChild[j]);
	        }
	      } else {
	        this[i].appendChild(newChild);
	      }
	    }
	  }
	  return this;
	}
	function prepend(newChild) {
	  const document = getDocument();
	  let i;
	  let j;
	  for (i = 0; i < this.length; i += 1) {
	    if (typeof newChild === 'string') {
	      const tempDiv = document.createElement('div');
	      tempDiv.innerHTML = newChild;
	      for (j = tempDiv.childNodes.length - 1; j >= 0; j -= 1) {
	        this[i].insertBefore(tempDiv.childNodes[j], this[i].childNodes[0]);
	      }
	    } else if (newChild instanceof Dom7) {
	      for (j = 0; j < newChild.length; j += 1) {
	        this[i].insertBefore(newChild[j], this[i].childNodes[0]);
	      }
	    } else {
	      this[i].insertBefore(newChild, this[i].childNodes[0]);
	    }
	  }
	  return this;
	}
	function next(selector) {
	  if (this.length > 0) {
	    if (selector) {
	      if (this[0].nextElementSibling && $(this[0].nextElementSibling).is(selector)) {
	        return $([this[0].nextElementSibling]);
	      }
	      return $([]);
	    }
	    if (this[0].nextElementSibling) return $([this[0].nextElementSibling]);
	    return $([]);
	  }
	  return $([]);
	}
	function nextAll(selector) {
	  const nextEls = [];
	  let el = this[0];
	  if (!el) return $([]);
	  while (el.nextElementSibling) {
	    const next = el.nextElementSibling; // eslint-disable-line

	    if (selector) {
	      if ($(next).is(selector)) nextEls.push(next);
	    } else nextEls.push(next);
	    el = next;
	  }
	  return $(nextEls);
	}
	function prev(selector) {
	  if (this.length > 0) {
	    const el = this[0];
	    if (selector) {
	      if (el.previousElementSibling && $(el.previousElementSibling).is(selector)) {
	        return $([el.previousElementSibling]);
	      }
	      return $([]);
	    }
	    if (el.previousElementSibling) return $([el.previousElementSibling]);
	    return $([]);
	  }
	  return $([]);
	}
	function prevAll(selector) {
	  const prevEls = [];
	  let el = this[0];
	  if (!el) return $([]);
	  while (el.previousElementSibling) {
	    const prev = el.previousElementSibling; // eslint-disable-line

	    if (selector) {
	      if ($(prev).is(selector)) prevEls.push(prev);
	    } else prevEls.push(prev);
	    el = prev;
	  }
	  return $(prevEls);
	}
	function parent(selector) {
	  const parents = []; // eslint-disable-line

	  for (let i = 0; i < this.length; i += 1) {
	    if (this[i].parentNode !== null) {
	      if (selector) {
	        if ($(this[i].parentNode).is(selector)) parents.push(this[i].parentNode);
	      } else {
	        parents.push(this[i].parentNode);
	      }
	    }
	  }
	  return $(parents);
	}
	function parents(selector) {
	  const parents = []; // eslint-disable-line

	  for (let i = 0; i < this.length; i += 1) {
	    let parent = this[i].parentNode; // eslint-disable-line

	    while (parent) {
	      if (selector) {
	        if ($(parent).is(selector)) parents.push(parent);
	      } else {
	        parents.push(parent);
	      }
	      parent = parent.parentNode;
	    }
	  }
	  return $(parents);
	}
	function closest(selector) {
	  let closest = this; // eslint-disable-line

	  if (typeof selector === 'undefined') {
	    return $([]);
	  }
	  if (!closest.is(selector)) {
	    closest = closest.parents(selector).eq(0);
	  }
	  return closest;
	}
	function find(selector) {
	  const foundElements = [];
	  for (let i = 0; i < this.length; i += 1) {
	    const found = this[i].querySelectorAll(selector);
	    for (let j = 0; j < found.length; j += 1) {
	      foundElements.push(found[j]);
	    }
	  }
	  return $(foundElements);
	}
	function children(selector) {
	  const children = []; // eslint-disable-line

	  for (let i = 0; i < this.length; i += 1) {
	    const childNodes = this[i].children;
	    for (let j = 0; j < childNodes.length; j += 1) {
	      if (!selector || $(childNodes[j]).is(selector)) {
	        children.push(childNodes[j]);
	      }
	    }
	  }
	  return $(children);
	}
	function remove() {
	  for (let i = 0; i < this.length; i += 1) {
	    if (this[i].parentNode) this[i].parentNode.removeChild(this[i]);
	  }
	  return this;
	}

	const Methods = {
	  addClass,
	  removeClass,
	  hasClass,
	  toggleClass,
	  attr,
	  removeAttr,
	  transform,
	  transition: transition$1,
	  on,
	  off,
	  trigger,
	  transitionEnd: transitionEnd$1,
	  outerWidth,
	  outerHeight,
	  styles,
	  offset,
	  css,
	  each,
	  html,
	  text,
	  is,
	  index,
	  eq,
	  append,
	  prepend,
	  next,
	  nextAll,
	  prev,
	  prevAll,
	  parent,
	  parents,
	  closest,
	  find,
	  children,
	  filter,
	  remove
	};
	Object.keys(Methods).forEach(methodName => {
	  Object.defineProperty($.fn, methodName, {
	    value: Methods[methodName],
	    writable: true
	  });
	});

	function deleteProps(obj) {
	  const object = obj;
	  Object.keys(object).forEach(key => {
	    try {
	      object[key] = null;
	    } catch (e) {// no getter for object
	    }
	    try {
	      delete object[key];
	    } catch (e) {// something got wrong
	    }
	  });
	}
	function nextTick(callback, delay = 0) {
	  return setTimeout(callback, delay);
	}
	function now() {
	  return Date.now();
	}
	function getComputedStyle$1(el) {
	  const window = getWindow();
	  let style;
	  if (window.getComputedStyle) {
	    style = window.getComputedStyle(el, null);
	  }
	  if (!style && el.currentStyle) {
	    style = el.currentStyle;
	  }
	  if (!style) {
	    style = el.style;
	  }
	  return style;
	}
	function getTranslate(el, axis = 'x') {
	  const window = getWindow();
	  let matrix;
	  let curTransform;
	  let transformMatrix;
	  const curStyle = getComputedStyle$1(el);
	  if (window.WebKitCSSMatrix) {
	    curTransform = curStyle.transform || curStyle.webkitTransform;
	    if (curTransform.split(',').length > 6) {
	      curTransform = curTransform.split(', ').map(a => a.replace(',', '.')).join(', ');
	    } // Some old versions of Webkit choke when 'none' is passed; pass
	    // empty string instead in this case

	    transformMatrix = new window.WebKitCSSMatrix(curTransform === 'none' ? '' : curTransform);
	  } else {
	    transformMatrix = curStyle.MozTransform || curStyle.OTransform || curStyle.MsTransform || curStyle.msTransform || curStyle.transform || curStyle.getPropertyValue('transform').replace('translate(', 'matrix(1, 0, 0, 1,');
	    matrix = transformMatrix.toString().split(',');
	  }
	  if (axis === 'x') {
	    // Latest Chrome and webkits Fix
	    if (window.WebKitCSSMatrix) curTransform = transformMatrix.m41; // Crazy IE10 Matrix
	    else if (matrix.length === 16) curTransform = parseFloat(matrix[12]); // Normal Browsers
	    else curTransform = parseFloat(matrix[4]);
	  }
	  if (axis === 'y') {
	    // Latest Chrome and webkits Fix
	    if (window.WebKitCSSMatrix) curTransform = transformMatrix.m42; // Crazy IE10 Matrix
	    else if (matrix.length === 16) curTransform = parseFloat(matrix[13]); // Normal Browsers
	    else curTransform = parseFloat(matrix[5]);
	  }
	  return curTransform || 0;
	}
	function isObject(o) {
	  return typeof o === 'object' && o !== null && o.constructor && Object.prototype.toString.call(o).slice(8, -1) === 'Object';
	}
	function isNode(node) {
	  // eslint-disable-next-line
	  if (typeof window !== 'undefined' && typeof window.HTMLElement !== 'undefined') {
	    return node instanceof HTMLElement;
	  }
	  return node && (node.nodeType === 1 || node.nodeType === 11);
	}
	function extend(...args) {
	  const to = Object(args[0]);
	  const noExtend = ['__proto__', 'constructor', 'prototype'];
	  for (let i = 1; i < args.length; i += 1) {
	    const nextSource = args[i];
	    if (nextSource !== undefined && nextSource !== null && !isNode(nextSource)) {
	      const keysArray = Object.keys(Object(nextSource)).filter(key => noExtend.indexOf(key) < 0);
	      for (let nextIndex = 0, len = keysArray.length; nextIndex < len; nextIndex += 1) {
	        const nextKey = keysArray[nextIndex];
	        const desc = Object.getOwnPropertyDescriptor(nextSource, nextKey);
	        if (desc !== undefined && desc.enumerable) {
	          if (isObject(to[nextKey]) && isObject(nextSource[nextKey])) {
	            if (nextSource[nextKey].__swiper__) {
	              to[nextKey] = nextSource[nextKey];
	            } else {
	              extend(to[nextKey], nextSource[nextKey]);
	            }
	          } else if (!isObject(to[nextKey]) && isObject(nextSource[nextKey])) {
	            to[nextKey] = {};
	            if (nextSource[nextKey].__swiper__) {
	              to[nextKey] = nextSource[nextKey];
	            } else {
	              extend(to[nextKey], nextSource[nextKey]);
	            }
	          } else {
	            to[nextKey] = nextSource[nextKey];
	          }
	        }
	      }
	    }
	  }
	  return to;
	}
	function setCSSProperty(el, varName, varValue) {
	  el.style.setProperty(varName, varValue);
	}
	function animateCSSModeScroll({
	  swiper,
	  targetPosition,
	  side
	}) {
	  const window = getWindow();
	  const startPosition = -swiper.translate;
	  let startTime = null;
	  let time;
	  const duration = swiper.params.speed;
	  swiper.wrapperEl.style.scrollSnapType = 'none';
	  window.cancelAnimationFrame(swiper.cssModeFrameID);
	  const dir = targetPosition > startPosition ? 'next' : 'prev';
	  const isOutOfBound = (current, target) => {
	    return dir === 'next' && current >= target || dir === 'prev' && current <= target;
	  };
	  const animate = () => {
	    time = new Date().getTime();
	    if (startTime === null) {
	      startTime = time;
	    }
	    const progress = Math.max(Math.min((time - startTime) / duration, 1), 0);
	    const easeProgress = 0.5 - Math.cos(progress * Math.PI) / 2;
	    let currentPosition = startPosition + easeProgress * (targetPosition - startPosition);
	    if (isOutOfBound(currentPosition, targetPosition)) {
	      currentPosition = targetPosition;
	    }
	    swiper.wrapperEl.scrollTo({
	      [side]: currentPosition
	    });
	    if (isOutOfBound(currentPosition, targetPosition)) {
	      swiper.wrapperEl.style.overflow = 'hidden';
	      swiper.wrapperEl.style.scrollSnapType = '';
	      setTimeout(() => {
	        swiper.wrapperEl.style.overflow = '';
	        swiper.wrapperEl.scrollTo({
	          [side]: currentPosition
	        });
	      });
	      window.cancelAnimationFrame(swiper.cssModeFrameID);
	      return;
	    }
	    swiper.cssModeFrameID = window.requestAnimationFrame(animate);
	  };
	  animate();
	}

	let support;
	function calcSupport() {
	  const window = getWindow();
	  const document = getDocument();
	  return {
	    smoothScroll: document.documentElement && 'scrollBehavior' in document.documentElement.style,
	    touch: !!('ontouchstart' in window || window.DocumentTouch && document instanceof window.DocumentTouch),
	    passiveListener: function checkPassiveListener() {
	      let supportsPassive = false;
	      try {
	        const opts = Object.defineProperty({}, 'passive', {
	          // eslint-disable-next-line
	          get() {
	            supportsPassive = true;
	          }
	        });
	        window.addEventListener('testPassiveListener', null, opts);
	      } catch (e) {// No support
	      }
	      return supportsPassive;
	    }(),
	    gestures: function checkGestures() {
	      return 'ongesturestart' in window;
	    }()
	  };
	}
	function getSupport() {
	  if (!support) {
	    support = calcSupport();
	  }
	  return support;
	}

	let deviceCached;
	function calcDevice({
	  userAgent
	} = {}) {
	  const support = getSupport();
	  const window = getWindow();
	  const platform = window.navigator.platform;
	  const ua = userAgent || window.navigator.userAgent;
	  const device = {
	    ios: false,
	    android: false
	  };
	  const screenWidth = window.screen.width;
	  const screenHeight = window.screen.height;
	  const android = ua.match(/(Android);?[\s\/]+([\d.]+)?/); // eslint-disable-line

	  let ipad = ua.match(/(iPad).*OS\s([\d_]+)/);
	  const ipod = ua.match(/(iPod)(.*OS\s([\d_]+))?/);
	  const iphone = !ipad && ua.match(/(iPhone\sOS|iOS)\s([\d_]+)/);
	  const windows = platform === 'Win32';
	  let macos = platform === 'MacIntel'; // iPadOs 13 fix

	  const iPadScreens = ['1024x1366', '1366x1024', '834x1194', '1194x834', '834x1112', '1112x834', '768x1024', '1024x768', '820x1180', '1180x820', '810x1080', '1080x810'];
	  if (!ipad && macos && support.touch && iPadScreens.indexOf(`${screenWidth}x${screenHeight}`) >= 0) {
	    ipad = ua.match(/(Version)\/([\d.]+)/);
	    if (!ipad) ipad = [0, 1, '13_0_0'];
	    macos = false;
	  } // Android

	  if (android && !windows) {
	    device.os = 'android';
	    device.android = true;
	  }
	  if (ipad || iphone || ipod) {
	    device.os = 'ios';
	    device.ios = true;
	  } // Export object

	  return device;
	}
	function getDevice(overrides = {}) {
	  if (!deviceCached) {
	    deviceCached = calcDevice(overrides);
	  }
	  return deviceCached;
	}

	let browser;
	function calcBrowser() {
	  const window = getWindow();
	  function isSafari() {
	    const ua = window.navigator.userAgent.toLowerCase();
	    return ua.indexOf('safari') >= 0 && ua.indexOf('chrome') < 0 && ua.indexOf('android') < 0;
	  }
	  return {
	    isSafari: isSafari(),
	    isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(window.navigator.userAgent)
	  };
	}
	function getBrowser() {
	  if (!browser) {
	    browser = calcBrowser();
	  }
	  return browser;
	}

	function Resize({
	  swiper,
	  on,
	  emit
	}) {
	  const window = getWindow();
	  let observer = null;
	  let animationFrame = null;
	  const resizeHandler = () => {
	    if (!swiper || swiper.destroyed || !swiper.initialized) return;
	    emit('beforeResize');
	    emit('resize');
	  };
	  const createObserver = () => {
	    if (!swiper || swiper.destroyed || !swiper.initialized) return;
	    observer = new ResizeObserver(entries => {
	      animationFrame = window.requestAnimationFrame(() => {
	        const {
	          width,
	          height
	        } = swiper;
	        let newWidth = width;
	        let newHeight = height;
	        entries.forEach(({
	          contentBoxSize,
	          contentRect,
	          target
	        }) => {
	          if (target && target !== swiper.el) return;
	          newWidth = contentRect ? contentRect.width : (contentBoxSize[0] || contentBoxSize).inlineSize;
	          newHeight = contentRect ? contentRect.height : (contentBoxSize[0] || contentBoxSize).blockSize;
	        });
	        if (newWidth !== width || newHeight !== height) {
	          resizeHandler();
	        }
	      });
	    });
	    observer.observe(swiper.el);
	  };
	  const removeObserver = () => {
	    if (animationFrame) {
	      window.cancelAnimationFrame(animationFrame);
	    }
	    if (observer && observer.unobserve && swiper.el) {
	      observer.unobserve(swiper.el);
	      observer = null;
	    }
	  };
	  const orientationChangeHandler = () => {
	    if (!swiper || swiper.destroyed || !swiper.initialized) return;
	    emit('orientationchange');
	  };
	  on('init', () => {
	    if (swiper.params.resizeObserver && typeof window.ResizeObserver !== 'undefined') {
	      createObserver();
	      return;
	    }
	    window.addEventListener('resize', resizeHandler);
	    window.addEventListener('orientationchange', orientationChangeHandler);
	  });
	  on('destroy', () => {
	    removeObserver();
	    window.removeEventListener('resize', resizeHandler);
	    window.removeEventListener('orientationchange', orientationChangeHandler);
	  });
	}

	function Observer({
	  swiper,
	  extendParams,
	  on,
	  emit
	}) {
	  const observers = [];
	  const window = getWindow();
	  const attach = (target, options = {}) => {
	    const ObserverFunc = window.MutationObserver || window.WebkitMutationObserver;
	    const observer = new ObserverFunc(mutations => {
	      // The observerUpdate event should only be triggered
	      // once despite the number of mutations.  Additional
	      // triggers are redundant and are very costly
	      if (mutations.length === 1) {
	        emit('observerUpdate', mutations[0]);
	        return;
	      }
	      const observerUpdate = function observerUpdate() {
	        emit('observerUpdate', mutations[0]);
	      };
	      if (window.requestAnimationFrame) {
	        window.requestAnimationFrame(observerUpdate);
	      } else {
	        window.setTimeout(observerUpdate, 0);
	      }
	    });
	    observer.observe(target, {
	      attributes: typeof options.attributes === 'undefined' ? true : options.attributes,
	      childList: typeof options.childList === 'undefined' ? true : options.childList,
	      characterData: typeof options.characterData === 'undefined' ? true : options.characterData
	    });
	    observers.push(observer);
	  };
	  const init = () => {
	    if (!swiper.params.observer) return;
	    if (swiper.params.observeParents) {
	      const containerParents = swiper.$el.parents();
	      for (let i = 0; i < containerParents.length; i += 1) {
	        attach(containerParents[i]);
	      }
	    } // Observe container

	    attach(swiper.$el[0], {
	      childList: swiper.params.observeSlideChildren
	    }); // Observe wrapper

	    attach(swiper.$wrapperEl[0], {
	      attributes: false
	    });
	  };
	  const destroy = () => {
	    observers.forEach(observer => {
	      observer.disconnect();
	    });
	    observers.splice(0, observers.length);
	  };
	  extendParams({
	    observer: false,
	    observeParents: false,
	    observeSlideChildren: false
	  });
	  on('init', init);
	  on('destroy', destroy);
	}

	/* eslint-disable no-underscore-dangle */
	var eventsEmitter = {
	  on(events, handler, priority) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (typeof handler !== 'function') return self;
	    const method = priority ? 'unshift' : 'push';
	    events.split(' ').forEach(event => {
	      if (!self.eventsListeners[event]) self.eventsListeners[event] = [];
	      self.eventsListeners[event][method](handler);
	    });
	    return self;
	  },
	  once(events, handler, priority) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (typeof handler !== 'function') return self;
	    function onceHandler(...args) {
	      self.off(events, onceHandler);
	      if (onceHandler.__emitterProxy) {
	        delete onceHandler.__emitterProxy;
	      }
	      handler.apply(self, args);
	    }
	    onceHandler.__emitterProxy = handler;
	    return self.on(events, onceHandler, priority);
	  },
	  onAny(handler, priority) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (typeof handler !== 'function') return self;
	    const method = priority ? 'unshift' : 'push';
	    if (self.eventsAnyListeners.indexOf(handler) < 0) {
	      self.eventsAnyListeners[method](handler);
	    }
	    return self;
	  },
	  offAny(handler) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (!self.eventsAnyListeners) return self;
	    const index = self.eventsAnyListeners.indexOf(handler);
	    if (index >= 0) {
	      self.eventsAnyListeners.splice(index, 1);
	    }
	    return self;
	  },
	  off(events, handler) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (!self.eventsListeners) return self;
	    events.split(' ').forEach(event => {
	      if (typeof handler === 'undefined') {
	        self.eventsListeners[event] = [];
	      } else if (self.eventsListeners[event]) {
	        self.eventsListeners[event].forEach((eventHandler, index) => {
	          if (eventHandler === handler || eventHandler.__emitterProxy && eventHandler.__emitterProxy === handler) {
	            self.eventsListeners[event].splice(index, 1);
	          }
	        });
	      }
	    });
	    return self;
	  },
	  emit(...args) {
	    const self = this;
	    if (!self.eventsListeners || self.destroyed) return self;
	    if (!self.eventsListeners) return self;
	    let events;
	    let data;
	    let context;
	    if (typeof args[0] === 'string' || Array.isArray(args[0])) {
	      events = args[0];
	      data = args.slice(1, args.length);
	      context = self;
	    } else {
	      events = args[0].events;
	      data = args[0].data;
	      context = args[0].context || self;
	    }
	    data.unshift(context);
	    const eventsArray = Array.isArray(events) ? events : events.split(' ');
	    eventsArray.forEach(event => {
	      if (self.eventsAnyListeners && self.eventsAnyListeners.length) {
	        self.eventsAnyListeners.forEach(eventHandler => {
	          eventHandler.apply(context, [event, ...data]);
	        });
	      }
	      if (self.eventsListeners && self.eventsListeners[event]) {
	        self.eventsListeners[event].forEach(eventHandler => {
	          eventHandler.apply(context, data);
	        });
	      }
	    });
	    return self;
	  }
	};

	function updateSize() {
	  const swiper = this;
	  let width;
	  let height;
	  const $el = swiper.$el;
	  if (typeof swiper.params.width !== 'undefined' && swiper.params.width !== null) {
	    width = swiper.params.width;
	  } else {
	    width = $el[0].clientWidth;
	  }
	  if (typeof swiper.params.height !== 'undefined' && swiper.params.height !== null) {
	    height = swiper.params.height;
	  } else {
	    height = $el[0].clientHeight;
	  }
	  if (width === 0 && swiper.isHorizontal() || height === 0 && swiper.isVertical()) {
	    return;
	  } // Subtract paddings

	  width = width - parseInt($el.css('padding-left') || 0, 10) - parseInt($el.css('padding-right') || 0, 10);
	  height = height - parseInt($el.css('padding-top') || 0, 10) - parseInt($el.css('padding-bottom') || 0, 10);
	  if (Number.isNaN(width)) width = 0;
	  if (Number.isNaN(height)) height = 0;
	  Object.assign(swiper, {
	    width,
	    height,
	    size: swiper.isHorizontal() ? width : height
	  });
	}

	function updateSlides() {
	  const swiper = this;
	  function getDirectionLabel(property) {
	    if (swiper.isHorizontal()) {
	      return property;
	    } // prettier-ignore

	    return {
	      'width': 'height',
	      'margin-top': 'margin-left',
	      'margin-bottom ': 'margin-right',
	      'margin-left': 'margin-top',
	      'margin-right': 'margin-bottom',
	      'padding-left': 'padding-top',
	      'padding-right': 'padding-bottom',
	      'marginRight': 'marginBottom'
	    }[property];
	  }
	  function getDirectionPropertyValue(node, label) {
	    return parseFloat(node.getPropertyValue(getDirectionLabel(label)) || 0);
	  }
	  const params = swiper.params;
	  const {
	    $wrapperEl,
	    size: swiperSize,
	    rtlTranslate: rtl,
	    wrongRTL
	  } = swiper;
	  const isVirtual = swiper.virtual && params.virtual.enabled;
	  const previousSlidesLength = isVirtual ? swiper.virtual.slides.length : swiper.slides.length;
	  const slides = $wrapperEl.children(`.${swiper.params.slideClass}`);
	  const slidesLength = isVirtual ? swiper.virtual.slides.length : slides.length;
	  let snapGrid = [];
	  const slidesGrid = [];
	  const slidesSizesGrid = [];
	  let offsetBefore = params.slidesOffsetBefore;
	  if (typeof offsetBefore === 'function') {
	    offsetBefore = params.slidesOffsetBefore.call(swiper);
	  }
	  let offsetAfter = params.slidesOffsetAfter;
	  if (typeof offsetAfter === 'function') {
	    offsetAfter = params.slidesOffsetAfter.call(swiper);
	  }
	  const previousSnapGridLength = swiper.snapGrid.length;
	  const previousSlidesGridLength = swiper.slidesGrid.length;
	  let spaceBetween = params.spaceBetween;
	  let slidePosition = -offsetBefore;
	  let prevSlideSize = 0;
	  let index = 0;
	  if (typeof swiperSize === 'undefined') {
	    return;
	  }
	  if (typeof spaceBetween === 'string' && spaceBetween.indexOf('%') >= 0) {
	    spaceBetween = parseFloat(spaceBetween.replace('%', '')) / 100 * swiperSize;
	  }
	  swiper.virtualSize = -spaceBetween; // reset margins

	  if (rtl) slides.css({
	    marginLeft: '',
	    marginBottom: '',
	    marginTop: ''
	  });else slides.css({
	    marginRight: '',
	    marginBottom: '',
	    marginTop: ''
	  }); // reset cssMode offsets

	  if (params.centeredSlides && params.cssMode) {
	    setCSSProperty(swiper.wrapperEl, '--swiper-centered-offset-before', '');
	    setCSSProperty(swiper.wrapperEl, '--swiper-centered-offset-after', '');
	  }
	  const gridEnabled = params.grid && params.grid.rows > 1 && swiper.grid;
	  if (gridEnabled) {
	    swiper.grid.initSlides(slidesLength);
	  } // Calc slides

	  let slideSize;
	  const shouldResetSlideSize = params.slidesPerView === 'auto' && params.breakpoints && Object.keys(params.breakpoints).filter(key => {
	    return typeof params.breakpoints[key].slidesPerView !== 'undefined';
	  }).length > 0;
	  for (let i = 0; i < slidesLength; i += 1) {
	    slideSize = 0;
	    const slide = slides.eq(i);
	    if (gridEnabled) {
	      swiper.grid.updateSlide(i, slide, slidesLength, getDirectionLabel);
	    }
	    if (slide.css('display') === 'none') continue; // eslint-disable-line

	    if (params.slidesPerView === 'auto') {
	      if (shouldResetSlideSize) {
	        slides[i].style[getDirectionLabel('width')] = ``;
	      }
	      const slideStyles = getComputedStyle(slide[0]);
	      const currentTransform = slide[0].style.transform;
	      const currentWebKitTransform = slide[0].style.webkitTransform;
	      if (currentTransform) {
	        slide[0].style.transform = 'none';
	      }
	      if (currentWebKitTransform) {
	        slide[0].style.webkitTransform = 'none';
	      }
	      if (params.roundLengths) {
	        slideSize = swiper.isHorizontal() ? slide.outerWidth(true) : slide.outerHeight(true);
	      } else {
	        // eslint-disable-next-line
	        const width = getDirectionPropertyValue(slideStyles, 'width');
	        const paddingLeft = getDirectionPropertyValue(slideStyles, 'padding-left');
	        const paddingRight = getDirectionPropertyValue(slideStyles, 'padding-right');
	        const marginLeft = getDirectionPropertyValue(slideStyles, 'margin-left');
	        const marginRight = getDirectionPropertyValue(slideStyles, 'margin-right');
	        const boxSizing = slideStyles.getPropertyValue('box-sizing');
	        if (boxSizing && boxSizing === 'border-box') {
	          slideSize = width + marginLeft + marginRight;
	        } else {
	          const {
	            clientWidth,
	            offsetWidth
	          } = slide[0];
	          slideSize = width + paddingLeft + paddingRight + marginLeft + marginRight + (offsetWidth - clientWidth);
	        }
	      }
	      if (currentTransform) {
	        slide[0].style.transform = currentTransform;
	      }
	      if (currentWebKitTransform) {
	        slide[0].style.webkitTransform = currentWebKitTransform;
	      }
	      if (params.roundLengths) slideSize = Math.floor(slideSize);
	    } else {
	      slideSize = (swiperSize - (params.slidesPerView - 1) * spaceBetween) / params.slidesPerView;
	      if (params.roundLengths) slideSize = Math.floor(slideSize);
	      if (slides[i]) {
	        slides[i].style[getDirectionLabel('width')] = `${slideSize}px`;
	      }
	    }
	    if (slides[i]) {
	      slides[i].swiperSlideSize = slideSize;
	    }
	    slidesSizesGrid.push(slideSize);
	    if (params.centeredSlides) {
	      slidePosition = slidePosition + slideSize / 2 + prevSlideSize / 2 + spaceBetween;
	      if (prevSlideSize === 0 && i !== 0) slidePosition = slidePosition - swiperSize / 2 - spaceBetween;
	      if (i === 0) slidePosition = slidePosition - swiperSize / 2 - spaceBetween;
	      if (Math.abs(slidePosition) < 1 / 1000) slidePosition = 0;
	      if (params.roundLengths) slidePosition = Math.floor(slidePosition);
	      if (index % params.slidesPerGroup === 0) snapGrid.push(slidePosition);
	      slidesGrid.push(slidePosition);
	    } else {
	      if (params.roundLengths) slidePosition = Math.floor(slidePosition);
	      if ((index - Math.min(swiper.params.slidesPerGroupSkip, index)) % swiper.params.slidesPerGroup === 0) snapGrid.push(slidePosition);
	      slidesGrid.push(slidePosition);
	      slidePosition = slidePosition + slideSize + spaceBetween;
	    }
	    swiper.virtualSize += slideSize + spaceBetween;
	    prevSlideSize = slideSize;
	    index += 1;
	  }
	  swiper.virtualSize = Math.max(swiper.virtualSize, swiperSize) + offsetAfter;
	  if (rtl && wrongRTL && (params.effect === 'slide' || params.effect === 'coverflow')) {
	    $wrapperEl.css({
	      width: `${swiper.virtualSize + params.spaceBetween}px`
	    });
	  }
	  if (params.setWrapperSize) {
	    $wrapperEl.css({
	      [getDirectionLabel('width')]: `${swiper.virtualSize + params.spaceBetween}px`
	    });
	  }
	  if (gridEnabled) {
	    swiper.grid.updateWrapperSize(slideSize, snapGrid, getDirectionLabel);
	  } // Remove last grid elements depending on width

	  if (!params.centeredSlides) {
	    const newSlidesGrid = [];
	    for (let i = 0; i < snapGrid.length; i += 1) {
	      let slidesGridItem = snapGrid[i];
	      if (params.roundLengths) slidesGridItem = Math.floor(slidesGridItem);
	      if (snapGrid[i] <= swiper.virtualSize - swiperSize) {
	        newSlidesGrid.push(slidesGridItem);
	      }
	    }
	    snapGrid = newSlidesGrid;
	    if (Math.floor(swiper.virtualSize - swiperSize) - Math.floor(snapGrid[snapGrid.length - 1]) > 1) {
	      snapGrid.push(swiper.virtualSize - swiperSize);
	    }
	  }
	  if (snapGrid.length === 0) snapGrid = [0];
	  if (params.spaceBetween !== 0) {
	    const key = swiper.isHorizontal() && rtl ? 'marginLeft' : getDirectionLabel('marginRight');
	    slides.filter((_, slideIndex) => {
	      if (!params.cssMode) return true;
	      if (slideIndex === slides.length - 1) {
	        return false;
	      }
	      return true;
	    }).css({
	      [key]: `${spaceBetween}px`
	    });
	  }
	  if (params.centeredSlides && params.centeredSlidesBounds) {
	    let allSlidesSize = 0;
	    slidesSizesGrid.forEach(slideSizeValue => {
	      allSlidesSize += slideSizeValue + (params.spaceBetween ? params.spaceBetween : 0);
	    });
	    allSlidesSize -= params.spaceBetween;
	    const maxSnap = allSlidesSize - swiperSize;
	    snapGrid = snapGrid.map(snap => {
	      if (snap < 0) return -offsetBefore;
	      if (snap > maxSnap) return maxSnap + offsetAfter;
	      return snap;
	    });
	  }
	  if (params.centerInsufficientSlides) {
	    let allSlidesSize = 0;
	    slidesSizesGrid.forEach(slideSizeValue => {
	      allSlidesSize += slideSizeValue + (params.spaceBetween ? params.spaceBetween : 0);
	    });
	    allSlidesSize -= params.spaceBetween;
	    if (allSlidesSize < swiperSize) {
	      const allSlidesOffset = (swiperSize - allSlidesSize) / 2;
	      snapGrid.forEach((snap, snapIndex) => {
	        snapGrid[snapIndex] = snap - allSlidesOffset;
	      });
	      slidesGrid.forEach((snap, snapIndex) => {
	        slidesGrid[snapIndex] = snap + allSlidesOffset;
	      });
	    }
	  }
	  Object.assign(swiper, {
	    slides,
	    snapGrid,
	    slidesGrid,
	    slidesSizesGrid
	  });
	  if (params.centeredSlides && params.cssMode && !params.centeredSlidesBounds) {
	    setCSSProperty(swiper.wrapperEl, '--swiper-centered-offset-before', `${-snapGrid[0]}px`);
	    setCSSProperty(swiper.wrapperEl, '--swiper-centered-offset-after', `${swiper.size / 2 - slidesSizesGrid[slidesSizesGrid.length - 1] / 2}px`);
	    const addToSnapGrid = -swiper.snapGrid[0];
	    const addToSlidesGrid = -swiper.slidesGrid[0];
	    swiper.snapGrid = swiper.snapGrid.map(v => v + addToSnapGrid);
	    swiper.slidesGrid = swiper.slidesGrid.map(v => v + addToSlidesGrid);
	  }
	  if (slidesLength !== previousSlidesLength) {
	    swiper.emit('slidesLengthChange');
	  }
	  if (snapGrid.length !== previousSnapGridLength) {
	    if (swiper.params.watchOverflow) swiper.checkOverflow();
	    swiper.emit('snapGridLengthChange');
	  }
	  if (slidesGrid.length !== previousSlidesGridLength) {
	    swiper.emit('slidesGridLengthChange');
	  }
	  if (params.watchSlidesProgress) {
	    swiper.updateSlidesOffset();
	  }
	  if (!isVirtual && !params.cssMode && (params.effect === 'slide' || params.effect === 'fade')) {
	    const backFaceHiddenClass = `${params.containerModifierClass}backface-hidden`;
	    const hasClassBackfaceClassAdded = swiper.$el.hasClass(backFaceHiddenClass);
	    if (slidesLength <= params.maxBackfaceHiddenSlides) {
	      if (!hasClassBackfaceClassAdded) swiper.$el.addClass(backFaceHiddenClass);
	    } else if (hasClassBackfaceClassAdded) {
	      swiper.$el.removeClass(backFaceHiddenClass);
	    }
	  }
	}

	function updateAutoHeight(speed) {
	  const swiper = this;
	  const activeSlides = [];
	  const isVirtual = swiper.virtual && swiper.params.virtual.enabled;
	  let newHeight = 0;
	  let i;
	  if (typeof speed === 'number') {
	    swiper.setTransition(speed);
	  } else if (speed === true) {
	    swiper.setTransition(swiper.params.speed);
	  }
	  const getSlideByIndex = index => {
	    if (isVirtual) {
	      return swiper.slides.filter(el => parseInt(el.getAttribute('data-swiper-slide-index'), 10) === index)[0];
	    }
	    return swiper.slides.eq(index)[0];
	  }; // Find slides currently in view

	  if (swiper.params.slidesPerView !== 'auto' && swiper.params.slidesPerView > 1) {
	    if (swiper.params.centeredSlides) {
	      (swiper.visibleSlides || $([])).each(slide => {
	        activeSlides.push(slide);
	      });
	    } else {
	      for (i = 0; i < Math.ceil(swiper.params.slidesPerView); i += 1) {
	        const index = swiper.activeIndex + i;
	        if (index > swiper.slides.length && !isVirtual) break;
	        activeSlides.push(getSlideByIndex(index));
	      }
	    }
	  } else {
	    activeSlides.push(getSlideByIndex(swiper.activeIndex));
	  } // Find new height from highest slide in view

	  for (i = 0; i < activeSlides.length; i += 1) {
	    if (typeof activeSlides[i] !== 'undefined') {
	      const height = activeSlides[i].offsetHeight;
	      newHeight = height > newHeight ? height : newHeight;
	    }
	  } // Update Height

	  if (newHeight || newHeight === 0) swiper.$wrapperEl.css('height', `${newHeight}px`);
	}

	function updateSlidesOffset() {
	  const swiper = this;
	  const slides = swiper.slides;
	  for (let i = 0; i < slides.length; i += 1) {
	    slides[i].swiperSlideOffset = swiper.isHorizontal() ? slides[i].offsetLeft : slides[i].offsetTop;
	  }
	}

	function updateSlidesProgress(translate = this && this.translate || 0) {
	  const swiper = this;
	  const params = swiper.params;
	  const {
	    slides,
	    rtlTranslate: rtl,
	    snapGrid
	  } = swiper;
	  if (slides.length === 0) return;
	  if (typeof slides[0].swiperSlideOffset === 'undefined') swiper.updateSlidesOffset();
	  let offsetCenter = -translate;
	  if (rtl) offsetCenter = translate; // Visible Slides

	  slides.removeClass(params.slideVisibleClass);
	  swiper.visibleSlidesIndexes = [];
	  swiper.visibleSlides = [];
	  for (let i = 0; i < slides.length; i += 1) {
	    const slide = slides[i];
	    let slideOffset = slide.swiperSlideOffset;
	    if (params.cssMode && params.centeredSlides) {
	      slideOffset -= slides[0].swiperSlideOffset;
	    }
	    const slideProgress = (offsetCenter + (params.centeredSlides ? swiper.minTranslate() : 0) - slideOffset) / (slide.swiperSlideSize + params.spaceBetween);
	    const originalSlideProgress = (offsetCenter - snapGrid[0] + (params.centeredSlides ? swiper.minTranslate() : 0) - slideOffset) / (slide.swiperSlideSize + params.spaceBetween);
	    const slideBefore = -(offsetCenter - slideOffset);
	    const slideAfter = slideBefore + swiper.slidesSizesGrid[i];
	    const isVisible = slideBefore >= 0 && slideBefore < swiper.size - 1 || slideAfter > 1 && slideAfter <= swiper.size || slideBefore <= 0 && slideAfter >= swiper.size;
	    if (isVisible) {
	      swiper.visibleSlides.push(slide);
	      swiper.visibleSlidesIndexes.push(i);
	      slides.eq(i).addClass(params.slideVisibleClass);
	    }
	    slide.progress = rtl ? -slideProgress : slideProgress;
	    slide.originalProgress = rtl ? -originalSlideProgress : originalSlideProgress;
	  }
	  swiper.visibleSlides = $(swiper.visibleSlides);
	}

	function updateProgress(translate) {
	  const swiper = this;
	  if (typeof translate === 'undefined') {
	    const multiplier = swiper.rtlTranslate ? -1 : 1; // eslint-disable-next-line

	    translate = swiper && swiper.translate && swiper.translate * multiplier || 0;
	  }
	  const params = swiper.params;
	  const translatesDiff = swiper.maxTranslate() - swiper.minTranslate();
	  let {
	    progress,
	    isBeginning,
	    isEnd
	  } = swiper;
	  const wasBeginning = isBeginning;
	  const wasEnd = isEnd;
	  if (translatesDiff === 0) {
	    progress = 0;
	    isBeginning = true;
	    isEnd = true;
	  } else {
	    progress = (translate - swiper.minTranslate()) / translatesDiff;
	    isBeginning = progress <= 0;
	    isEnd = progress >= 1;
	  }
	  Object.assign(swiper, {
	    progress,
	    isBeginning,
	    isEnd
	  });
	  if (params.watchSlidesProgress || params.centeredSlides && params.autoHeight) swiper.updateSlidesProgress(translate);
	  if (isBeginning && !wasBeginning) {
	    swiper.emit('reachBeginning toEdge');
	  }
	  if (isEnd && !wasEnd) {
	    swiper.emit('reachEnd toEdge');
	  }
	  if (wasBeginning && !isBeginning || wasEnd && !isEnd) {
	    swiper.emit('fromEdge');
	  }
	  swiper.emit('progress', progress);
	}

	function updateSlidesClasses() {
	  const swiper = this;
	  const {
	    slides,
	    params,
	    $wrapperEl,
	    activeIndex,
	    realIndex
	  } = swiper;
	  const isVirtual = swiper.virtual && params.virtual.enabled;
	  slides.removeClass(`${params.slideActiveClass} ${params.slideNextClass} ${params.slidePrevClass} ${params.slideDuplicateActiveClass} ${params.slideDuplicateNextClass} ${params.slideDuplicatePrevClass}`);
	  let activeSlide;
	  if (isVirtual) {
	    activeSlide = swiper.$wrapperEl.find(`.${params.slideClass}[data-swiper-slide-index="${activeIndex}"]`);
	  } else {
	    activeSlide = slides.eq(activeIndex);
	  } // Active classes

	  activeSlide.addClass(params.slideActiveClass);
	  if (params.loop) {
	    // Duplicate to all looped slides
	    if (activeSlide.hasClass(params.slideDuplicateClass)) {
	      $wrapperEl.children(`.${params.slideClass}:not(.${params.slideDuplicateClass})[data-swiper-slide-index="${realIndex}"]`).addClass(params.slideDuplicateActiveClass);
	    } else {
	      $wrapperEl.children(`.${params.slideClass}.${params.slideDuplicateClass}[data-swiper-slide-index="${realIndex}"]`).addClass(params.slideDuplicateActiveClass);
	    }
	  } // Next Slide

	  let nextSlide = activeSlide.nextAll(`.${params.slideClass}`).eq(0).addClass(params.slideNextClass);
	  if (params.loop && nextSlide.length === 0) {
	    nextSlide = slides.eq(0);
	    nextSlide.addClass(params.slideNextClass);
	  } // Prev Slide

	  let prevSlide = activeSlide.prevAll(`.${params.slideClass}`).eq(0).addClass(params.slidePrevClass);
	  if (params.loop && prevSlide.length === 0) {
	    prevSlide = slides.eq(-1);
	    prevSlide.addClass(params.slidePrevClass);
	  }
	  if (params.loop) {
	    // Duplicate to all looped slides
	    if (nextSlide.hasClass(params.slideDuplicateClass)) {
	      $wrapperEl.children(`.${params.slideClass}:not(.${params.slideDuplicateClass})[data-swiper-slide-index="${nextSlide.attr('data-swiper-slide-index')}"]`).addClass(params.slideDuplicateNextClass);
	    } else {
	      $wrapperEl.children(`.${params.slideClass}.${params.slideDuplicateClass}[data-swiper-slide-index="${nextSlide.attr('data-swiper-slide-index')}"]`).addClass(params.slideDuplicateNextClass);
	    }
	    if (prevSlide.hasClass(params.slideDuplicateClass)) {
	      $wrapperEl.children(`.${params.slideClass}:not(.${params.slideDuplicateClass})[data-swiper-slide-index="${prevSlide.attr('data-swiper-slide-index')}"]`).addClass(params.slideDuplicatePrevClass);
	    } else {
	      $wrapperEl.children(`.${params.slideClass}.${params.slideDuplicateClass}[data-swiper-slide-index="${prevSlide.attr('data-swiper-slide-index')}"]`).addClass(params.slideDuplicatePrevClass);
	    }
	  }
	  swiper.emitSlidesClasses();
	}

	function updateActiveIndex(newActiveIndex) {
	  const swiper = this;
	  const translate = swiper.rtlTranslate ? swiper.translate : -swiper.translate;
	  const {
	    slidesGrid,
	    snapGrid,
	    params,
	    activeIndex: previousIndex,
	    realIndex: previousRealIndex,
	    snapIndex: previousSnapIndex
	  } = swiper;
	  let activeIndex = newActiveIndex;
	  let snapIndex;
	  if (typeof activeIndex === 'undefined') {
	    for (let i = 0; i < slidesGrid.length; i += 1) {
	      if (typeof slidesGrid[i + 1] !== 'undefined') {
	        if (translate >= slidesGrid[i] && translate < slidesGrid[i + 1] - (slidesGrid[i + 1] - slidesGrid[i]) / 2) {
	          activeIndex = i;
	        } else if (translate >= slidesGrid[i] && translate < slidesGrid[i + 1]) {
	          activeIndex = i + 1;
	        }
	      } else if (translate >= slidesGrid[i]) {
	        activeIndex = i;
	      }
	    } // Normalize slideIndex

	    if (params.normalizeSlideIndex) {
	      if (activeIndex < 0 || typeof activeIndex === 'undefined') activeIndex = 0;
	    }
	  }
	  if (snapGrid.indexOf(translate) >= 0) {
	    snapIndex = snapGrid.indexOf(translate);
	  } else {
	    const skip = Math.min(params.slidesPerGroupSkip, activeIndex);
	    snapIndex = skip + Math.floor((activeIndex - skip) / params.slidesPerGroup);
	  }
	  if (snapIndex >= snapGrid.length) snapIndex = snapGrid.length - 1;
	  if (activeIndex === previousIndex) {
	    if (snapIndex !== previousSnapIndex) {
	      swiper.snapIndex = snapIndex;
	      swiper.emit('snapIndexChange');
	    }
	    return;
	  } // Get real index

	  const realIndex = parseInt(swiper.slides.eq(activeIndex).attr('data-swiper-slide-index') || activeIndex, 10);
	  Object.assign(swiper, {
	    snapIndex,
	    realIndex,
	    previousIndex,
	    activeIndex
	  });
	  swiper.emit('activeIndexChange');
	  swiper.emit('snapIndexChange');
	  if (previousRealIndex !== realIndex) {
	    swiper.emit('realIndexChange');
	  }
	  if (swiper.initialized || swiper.params.runCallbacksOnInit) {
	    swiper.emit('slideChange');
	  }
	}

	function updateClickedSlide(e) {
	  const swiper = this;
	  const params = swiper.params;
	  const slide = $(e).closest(`.${params.slideClass}`)[0];
	  let slideFound = false;
	  let slideIndex;
	  if (slide) {
	    for (let i = 0; i < swiper.slides.length; i += 1) {
	      if (swiper.slides[i] === slide) {
	        slideFound = true;
	        slideIndex = i;
	        break;
	      }
	    }
	  }
	  if (slide && slideFound) {
	    swiper.clickedSlide = slide;
	    if (swiper.virtual && swiper.params.virtual.enabled) {
	      swiper.clickedIndex = parseInt($(slide).attr('data-swiper-slide-index'), 10);
	    } else {
	      swiper.clickedIndex = slideIndex;
	    }
	  } else {
	    swiper.clickedSlide = undefined;
	    swiper.clickedIndex = undefined;
	    return;
	  }
	  if (params.slideToClickedSlide && swiper.clickedIndex !== undefined && swiper.clickedIndex !== swiper.activeIndex) {
	    swiper.slideToClickedSlide();
	  }
	}

	var update = {
	  updateSize,
	  updateSlides,
	  updateAutoHeight,
	  updateSlidesOffset,
	  updateSlidesProgress,
	  updateProgress,
	  updateSlidesClasses,
	  updateActiveIndex,
	  updateClickedSlide
	};

	function getSwiperTranslate(axis = this.isHorizontal() ? 'x' : 'y') {
	  const swiper = this;
	  const {
	    params,
	    rtlTranslate: rtl,
	    translate,
	    $wrapperEl
	  } = swiper;
	  if (params.virtualTranslate) {
	    return rtl ? -translate : translate;
	  }
	  if (params.cssMode) {
	    return translate;
	  }
	  let currentTranslate = getTranslate($wrapperEl[0], axis);
	  if (rtl) currentTranslate = -currentTranslate;
	  return currentTranslate || 0;
	}

	function setTranslate(translate, byController) {
	  const swiper = this;
	  const {
	    rtlTranslate: rtl,
	    params,
	    $wrapperEl,
	    wrapperEl,
	    progress
	  } = swiper;
	  let x = 0;
	  let y = 0;
	  const z = 0;
	  if (swiper.isHorizontal()) {
	    x = rtl ? -translate : translate;
	  } else {
	    y = translate;
	  }
	  if (params.roundLengths) {
	    x = Math.floor(x);
	    y = Math.floor(y);
	  }
	  if (params.cssMode) {
	    wrapperEl[swiper.isHorizontal() ? 'scrollLeft' : 'scrollTop'] = swiper.isHorizontal() ? -x : -y;
	  } else if (!params.virtualTranslate) {
	    $wrapperEl.transform(`translate3d(${x}px, ${y}px, ${z}px)`);
	  }
	  swiper.previousTranslate = swiper.translate;
	  swiper.translate = swiper.isHorizontal() ? x : y; // Check if we need to update progress

	  let newProgress;
	  const translatesDiff = swiper.maxTranslate() - swiper.minTranslate();
	  if (translatesDiff === 0) {
	    newProgress = 0;
	  } else {
	    newProgress = (translate - swiper.minTranslate()) / translatesDiff;
	  }
	  if (newProgress !== progress) {
	    swiper.updateProgress(translate);
	  }
	  swiper.emit('setTranslate', swiper.translate, byController);
	}

	function minTranslate() {
	  return -this.snapGrid[0];
	}

	function maxTranslate() {
	  return -this.snapGrid[this.snapGrid.length - 1];
	}

	function translateTo(translate = 0, speed = this.params.speed, runCallbacks = true, translateBounds = true, internal) {
	  const swiper = this;
	  const {
	    params,
	    wrapperEl
	  } = swiper;
	  if (swiper.animating && params.preventInteractionOnTransition) {
	    return false;
	  }
	  const minTranslate = swiper.minTranslate();
	  const maxTranslate = swiper.maxTranslate();
	  let newTranslate;
	  if (translateBounds && translate > minTranslate) newTranslate = minTranslate;else if (translateBounds && translate < maxTranslate) newTranslate = maxTranslate;else newTranslate = translate; // Update progress

	  swiper.updateProgress(newTranslate);
	  if (params.cssMode) {
	    const isH = swiper.isHorizontal();
	    if (speed === 0) {
	      wrapperEl[isH ? 'scrollLeft' : 'scrollTop'] = -newTranslate;
	    } else {
	      if (!swiper.support.smoothScroll) {
	        animateCSSModeScroll({
	          swiper,
	          targetPosition: -newTranslate,
	          side: isH ? 'left' : 'top'
	        });
	        return true;
	      }
	      wrapperEl.scrollTo({
	        [isH ? 'left' : 'top']: -newTranslate,
	        behavior: 'smooth'
	      });
	    }
	    return true;
	  }
	  if (speed === 0) {
	    swiper.setTransition(0);
	    swiper.setTranslate(newTranslate);
	    if (runCallbacks) {
	      swiper.emit('beforeTransitionStart', speed, internal);
	      swiper.emit('transitionEnd');
	    }
	  } else {
	    swiper.setTransition(speed);
	    swiper.setTranslate(newTranslate);
	    if (runCallbacks) {
	      swiper.emit('beforeTransitionStart', speed, internal);
	      swiper.emit('transitionStart');
	    }
	    if (!swiper.animating) {
	      swiper.animating = true;
	      if (!swiper.onTranslateToWrapperTransitionEnd) {
	        swiper.onTranslateToWrapperTransitionEnd = function transitionEnd(e) {
	          if (!swiper || swiper.destroyed) return;
	          if (e.target !== this) return;
	          swiper.$wrapperEl[0].removeEventListener('transitionend', swiper.onTranslateToWrapperTransitionEnd);
	          swiper.$wrapperEl[0].removeEventListener('webkitTransitionEnd', swiper.onTranslateToWrapperTransitionEnd);
	          swiper.onTranslateToWrapperTransitionEnd = null;
	          delete swiper.onTranslateToWrapperTransitionEnd;
	          if (runCallbacks) {
	            swiper.emit('transitionEnd');
	          }
	        };
	      }
	      swiper.$wrapperEl[0].addEventListener('transitionend', swiper.onTranslateToWrapperTransitionEnd);
	      swiper.$wrapperEl[0].addEventListener('webkitTransitionEnd', swiper.onTranslateToWrapperTransitionEnd);
	    }
	  }
	  return true;
	}

	var translate = {
	  getTranslate: getSwiperTranslate,
	  setTranslate,
	  minTranslate,
	  maxTranslate,
	  translateTo
	};

	function setTransition(duration, byController) {
	  const swiper = this;
	  if (!swiper.params.cssMode) {
	    swiper.$wrapperEl.transition(duration);
	  }
	  swiper.emit('setTransition', duration, byController);
	}

	function transitionEmit({
	  swiper,
	  runCallbacks,
	  direction,
	  step
	}) {
	  const {
	    activeIndex,
	    previousIndex
	  } = swiper;
	  let dir = direction;
	  if (!dir) {
	    if (activeIndex > previousIndex) dir = 'next';else if (activeIndex < previousIndex) dir = 'prev';else dir = 'reset';
	  }
	  swiper.emit(`transition${step}`);
	  if (runCallbacks && activeIndex !== previousIndex) {
	    if (dir === 'reset') {
	      swiper.emit(`slideResetTransition${step}`);
	      return;
	    }
	    swiper.emit(`slideChangeTransition${step}`);
	    if (dir === 'next') {
	      swiper.emit(`slideNextTransition${step}`);
	    } else {
	      swiper.emit(`slidePrevTransition${step}`);
	    }
	  }
	}

	function transitionStart(runCallbacks = true, direction) {
	  const swiper = this;
	  const {
	    params
	  } = swiper;
	  if (params.cssMode) return;
	  if (params.autoHeight) {
	    swiper.updateAutoHeight();
	  }
	  transitionEmit({
	    swiper,
	    runCallbacks,
	    direction,
	    step: 'Start'
	  });
	}

	function transitionEnd(runCallbacks = true, direction) {
	  const swiper = this;
	  const {
	    params
	  } = swiper;
	  swiper.animating = false;
	  if (params.cssMode) return;
	  swiper.setTransition(0);
	  transitionEmit({
	    swiper,
	    runCallbacks,
	    direction,
	    step: 'End'
	  });
	}

	var transition = {
	  setTransition,
	  transitionStart,
	  transitionEnd
	};

	function slideTo(index = 0, speed = this.params.speed, runCallbacks = true, internal, initial) {
	  if (typeof index !== 'number' && typeof index !== 'string') {
	    throw new Error(`The 'index' argument cannot have type other than 'number' or 'string'. [${typeof index}] given.`);
	  }
	  if (typeof index === 'string') {
	    /**
	     * The `index` argument converted from `string` to `number`.
	     * @type {number}
	     */
	    const indexAsNumber = parseInt(index, 10);
	    /**
	     * Determines whether the `index` argument is a valid `number`
	     * after being converted from the `string` type.
	     * @type {boolean}
	     */

	    const isValidNumber = isFinite(indexAsNumber);
	    if (!isValidNumber) {
	      throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${index}] given.`);
	    } // Knowing that the converted `index` is a valid number,
	    // we can update the original argument's value.

	    index = indexAsNumber;
	  }
	  const swiper = this;
	  let slideIndex = index;
	  if (slideIndex < 0) slideIndex = 0;
	  const {
	    params,
	    snapGrid,
	    slidesGrid,
	    previousIndex,
	    activeIndex,
	    rtlTranslate: rtl,
	    wrapperEl,
	    enabled
	  } = swiper;
	  if (swiper.animating && params.preventInteractionOnTransition || !enabled && !internal && !initial) {
	    return false;
	  }
	  const skip = Math.min(swiper.params.slidesPerGroupSkip, slideIndex);
	  let snapIndex = skip + Math.floor((slideIndex - skip) / swiper.params.slidesPerGroup);
	  if (snapIndex >= snapGrid.length) snapIndex = snapGrid.length - 1;
	  const translate = -snapGrid[snapIndex]; // Normalize slideIndex

	  if (params.normalizeSlideIndex) {
	    for (let i = 0; i < slidesGrid.length; i += 1) {
	      const normalizedTranslate = -Math.floor(translate * 100);
	      const normalizedGrid = Math.floor(slidesGrid[i] * 100);
	      const normalizedGridNext = Math.floor(slidesGrid[i + 1] * 100);
	      if (typeof slidesGrid[i + 1] !== 'undefined') {
	        if (normalizedTranslate >= normalizedGrid && normalizedTranslate < normalizedGridNext - (normalizedGridNext - normalizedGrid) / 2) {
	          slideIndex = i;
	        } else if (normalizedTranslate >= normalizedGrid && normalizedTranslate < normalizedGridNext) {
	          slideIndex = i + 1;
	        }
	      } else if (normalizedTranslate >= normalizedGrid) {
	        slideIndex = i;
	      }
	    }
	  } // Directions locks

	  if (swiper.initialized && slideIndex !== activeIndex) {
	    if (!swiper.allowSlideNext && translate < swiper.translate && translate < swiper.minTranslate()) {
	      return false;
	    }
	    if (!swiper.allowSlidePrev && translate > swiper.translate && translate > swiper.maxTranslate()) {
	      if ((activeIndex || 0) !== slideIndex) return false;
	    }
	  }
	  if (slideIndex !== (previousIndex || 0) && runCallbacks) {
	    swiper.emit('beforeSlideChangeStart');
	  } // Update progress

	  swiper.updateProgress(translate);
	  let direction;
	  if (slideIndex > activeIndex) direction = 'next';else if (slideIndex < activeIndex) direction = 'prev';else direction = 'reset'; // Update Index

	  if (rtl && -translate === swiper.translate || !rtl && translate === swiper.translate) {
	    swiper.updateActiveIndex(slideIndex); // Update Height

	    if (params.autoHeight) {
	      swiper.updateAutoHeight();
	    }
	    swiper.updateSlidesClasses();
	    if (params.effect !== 'slide') {
	      swiper.setTranslate(translate);
	    }
	    if (direction !== 'reset') {
	      swiper.transitionStart(runCallbacks, direction);
	      swiper.transitionEnd(runCallbacks, direction);
	    }
	    return false;
	  }
	  if (params.cssMode) {
	    const isH = swiper.isHorizontal();
	    const t = rtl ? translate : -translate;
	    if (speed === 0) {
	      const isVirtual = swiper.virtual && swiper.params.virtual.enabled;
	      if (isVirtual) {
	        swiper.wrapperEl.style.scrollSnapType = 'none';
	        swiper._immediateVirtual = true;
	      }
	      wrapperEl[isH ? 'scrollLeft' : 'scrollTop'] = t;
	      if (isVirtual) {
	        requestAnimationFrame(() => {
	          swiper.wrapperEl.style.scrollSnapType = '';
	          swiper._swiperImmediateVirtual = false;
	        });
	      }
	    } else {
	      if (!swiper.support.smoothScroll) {
	        animateCSSModeScroll({
	          swiper,
	          targetPosition: t,
	          side: isH ? 'left' : 'top'
	        });
	        return true;
	      }
	      wrapperEl.scrollTo({
	        [isH ? 'left' : 'top']: t,
	        behavior: 'smooth'
	      });
	    }
	    return true;
	  }
	  swiper.setTransition(speed);
	  swiper.setTranslate(translate);
	  swiper.updateActiveIndex(slideIndex);
	  swiper.updateSlidesClasses();
	  swiper.emit('beforeTransitionStart', speed, internal);
	  swiper.transitionStart(runCallbacks, direction);
	  if (speed === 0) {
	    swiper.transitionEnd(runCallbacks, direction);
	  } else if (!swiper.animating) {
	    swiper.animating = true;
	    if (!swiper.onSlideToWrapperTransitionEnd) {
	      swiper.onSlideToWrapperTransitionEnd = function transitionEnd(e) {
	        if (!swiper || swiper.destroyed) return;
	        if (e.target !== this) return;
	        swiper.$wrapperEl[0].removeEventListener('transitionend', swiper.onSlideToWrapperTransitionEnd);
	        swiper.$wrapperEl[0].removeEventListener('webkitTransitionEnd', swiper.onSlideToWrapperTransitionEnd);
	        swiper.onSlideToWrapperTransitionEnd = null;
	        delete swiper.onSlideToWrapperTransitionEnd;
	        swiper.transitionEnd(runCallbacks, direction);
	      };
	    }
	    swiper.$wrapperEl[0].addEventListener('transitionend', swiper.onSlideToWrapperTransitionEnd);
	    swiper.$wrapperEl[0].addEventListener('webkitTransitionEnd', swiper.onSlideToWrapperTransitionEnd);
	  }
	  return true;
	}

	function slideToLoop(index = 0, speed = this.params.speed, runCallbacks = true, internal) {
	  if (typeof index === 'string') {
	    /**
	     * The `index` argument converted from `string` to `number`.
	     * @type {number}
	     */
	    const indexAsNumber = parseInt(index, 10);
	    /**
	     * Determines whether the `index` argument is a valid `number`
	     * after being converted from the `string` type.
	     * @type {boolean}
	     */

	    const isValidNumber = isFinite(indexAsNumber);
	    if (!isValidNumber) {
	      throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${index}] given.`);
	    } // Knowing that the converted `index` is a valid number,
	    // we can update the original argument's value.

	    index = indexAsNumber;
	  }
	  const swiper = this;
	  let newIndex = index;
	  if (swiper.params.loop) {
	    newIndex += swiper.loopedSlides;
	  }
	  return swiper.slideTo(newIndex, speed, runCallbacks, internal);
	}

	/* eslint no-unused-vars: "off" */
	function slideNext(speed = this.params.speed, runCallbacks = true, internal) {
	  const swiper = this;
	  const {
	    animating,
	    enabled,
	    params
	  } = swiper;
	  if (!enabled) return swiper;
	  let perGroup = params.slidesPerGroup;
	  if (params.slidesPerView === 'auto' && params.slidesPerGroup === 1 && params.slidesPerGroupAuto) {
	    perGroup = Math.max(swiper.slidesPerViewDynamic('current', true), 1);
	  }
	  const increment = swiper.activeIndex < params.slidesPerGroupSkip ? 1 : perGroup;
	  if (params.loop) {
	    if (animating && params.loopPreventsSlide) return false;
	    swiper.loopFix(); // eslint-disable-next-line

	    swiper._clientLeft = swiper.$wrapperEl[0].clientLeft;
	  }
	  if (params.rewind && swiper.isEnd) {
	    return swiper.slideTo(0, speed, runCallbacks, internal);
	  }
	  return swiper.slideTo(swiper.activeIndex + increment, speed, runCallbacks, internal);
	}

	/* eslint no-unused-vars: "off" */
	function slidePrev(speed = this.params.speed, runCallbacks = true, internal) {
	  const swiper = this;
	  const {
	    params,
	    animating,
	    snapGrid,
	    slidesGrid,
	    rtlTranslate,
	    enabled
	  } = swiper;
	  if (!enabled) return swiper;
	  if (params.loop) {
	    if (animating && params.loopPreventsSlide) return false;
	    swiper.loopFix(); // eslint-disable-next-line

	    swiper._clientLeft = swiper.$wrapperEl[0].clientLeft;
	  }
	  const translate = rtlTranslate ? swiper.translate : -swiper.translate;
	  function normalize(val) {
	    if (val < 0) return -Math.floor(Math.abs(val));
	    return Math.floor(val);
	  }
	  const normalizedTranslate = normalize(translate);
	  const normalizedSnapGrid = snapGrid.map(val => normalize(val));
	  let prevSnap = snapGrid[normalizedSnapGrid.indexOf(normalizedTranslate) - 1];
	  if (typeof prevSnap === 'undefined' && params.cssMode) {
	    let prevSnapIndex;
	    snapGrid.forEach((snap, snapIndex) => {
	      if (normalizedTranslate >= snap) {
	        // prevSnap = snap;
	        prevSnapIndex = snapIndex;
	      }
	    });
	    if (typeof prevSnapIndex !== 'undefined') {
	      prevSnap = snapGrid[prevSnapIndex > 0 ? prevSnapIndex - 1 : prevSnapIndex];
	    }
	  }
	  let prevIndex = 0;
	  if (typeof prevSnap !== 'undefined') {
	    prevIndex = slidesGrid.indexOf(prevSnap);
	    if (prevIndex < 0) prevIndex = swiper.activeIndex - 1;
	    if (params.slidesPerView === 'auto' && params.slidesPerGroup === 1 && params.slidesPerGroupAuto) {
	      prevIndex = prevIndex - swiper.slidesPerViewDynamic('previous', true) + 1;
	      prevIndex = Math.max(prevIndex, 0);
	    }
	  }
	  if (params.rewind && swiper.isBeginning) {
	    const lastIndex = swiper.params.virtual && swiper.params.virtual.enabled && swiper.virtual ? swiper.virtual.slides.length - 1 : swiper.slides.length - 1;
	    return swiper.slideTo(lastIndex, speed, runCallbacks, internal);
	  }
	  return swiper.slideTo(prevIndex, speed, runCallbacks, internal);
	}

	/* eslint no-unused-vars: "off" */
	function slideReset(speed = this.params.speed, runCallbacks = true, internal) {
	  const swiper = this;
	  return swiper.slideTo(swiper.activeIndex, speed, runCallbacks, internal);
	}

	/* eslint no-unused-vars: "off" */
	function slideToClosest(speed = this.params.speed, runCallbacks = true, internal, threshold = 0.5) {
	  const swiper = this;
	  let index = swiper.activeIndex;
	  const skip = Math.min(swiper.params.slidesPerGroupSkip, index);
	  const snapIndex = skip + Math.floor((index - skip) / swiper.params.slidesPerGroup);
	  const translate = swiper.rtlTranslate ? swiper.translate : -swiper.translate;
	  if (translate >= swiper.snapGrid[snapIndex]) {
	    // The current translate is on or after the current snap index, so the choice
	    // is between the current index and the one after it.
	    const currentSnap = swiper.snapGrid[snapIndex];
	    const nextSnap = swiper.snapGrid[snapIndex + 1];
	    if (translate - currentSnap > (nextSnap - currentSnap) * threshold) {
	      index += swiper.params.slidesPerGroup;
	    }
	  } else {
	    // The current translate is before the current snap index, so the choice
	    // is between the current index and the one before it.
	    const prevSnap = swiper.snapGrid[snapIndex - 1];
	    const currentSnap = swiper.snapGrid[snapIndex];
	    if (translate - prevSnap <= (currentSnap - prevSnap) * threshold) {
	      index -= swiper.params.slidesPerGroup;
	    }
	  }
	  index = Math.max(index, 0);
	  index = Math.min(index, swiper.slidesGrid.length - 1);
	  return swiper.slideTo(index, speed, runCallbacks, internal);
	}

	function slideToClickedSlide() {
	  const swiper = this;
	  const {
	    params,
	    $wrapperEl
	  } = swiper;
	  const slidesPerView = params.slidesPerView === 'auto' ? swiper.slidesPerViewDynamic() : params.slidesPerView;
	  let slideToIndex = swiper.clickedIndex;
	  let realIndex;
	  if (params.loop) {
	    if (swiper.animating) return;
	    realIndex = parseInt($(swiper.clickedSlide).attr('data-swiper-slide-index'), 10);
	    if (params.centeredSlides) {
	      if (slideToIndex < swiper.loopedSlides - slidesPerView / 2 || slideToIndex > swiper.slides.length - swiper.loopedSlides + slidesPerView / 2) {
	        swiper.loopFix();
	        slideToIndex = $wrapperEl.children(`.${params.slideClass}[data-swiper-slide-index="${realIndex}"]:not(.${params.slideDuplicateClass})`).eq(0).index();
	        nextTick(() => {
	          swiper.slideTo(slideToIndex);
	        });
	      } else {
	        swiper.slideTo(slideToIndex);
	      }
	    } else if (slideToIndex > swiper.slides.length - slidesPerView) {
	      swiper.loopFix();
	      slideToIndex = $wrapperEl.children(`.${params.slideClass}[data-swiper-slide-index="${realIndex}"]:not(.${params.slideDuplicateClass})`).eq(0).index();
	      nextTick(() => {
	        swiper.slideTo(slideToIndex);
	      });
	    } else {
	      swiper.slideTo(slideToIndex);
	    }
	  } else {
	    swiper.slideTo(slideToIndex);
	  }
	}

	var slide = {
	  slideTo,
	  slideToLoop,
	  slideNext,
	  slidePrev,
	  slideReset,
	  slideToClosest,
	  slideToClickedSlide
	};

	function loopCreate() {
	  const swiper = this;
	  const document = getDocument();
	  const {
	    params,
	    $wrapperEl
	  } = swiper; // Remove duplicated slides

	  const $selector = $wrapperEl.children().length > 0 ? $($wrapperEl.children()[0].parentNode) : $wrapperEl;
	  $selector.children(`.${params.slideClass}.${params.slideDuplicateClass}`).remove();
	  let slides = $selector.children(`.${params.slideClass}`);
	  if (params.loopFillGroupWithBlank) {
	    const blankSlidesNum = params.slidesPerGroup - slides.length % params.slidesPerGroup;
	    if (blankSlidesNum !== params.slidesPerGroup) {
	      for (let i = 0; i < blankSlidesNum; i += 1) {
	        const blankNode = $(document.createElement('div')).addClass(`${params.slideClass} ${params.slideBlankClass}`);
	        $selector.append(blankNode);
	      }
	      slides = $selector.children(`.${params.slideClass}`);
	    }
	  }
	  if (params.slidesPerView === 'auto' && !params.loopedSlides) params.loopedSlides = slides.length;
	  swiper.loopedSlides = Math.ceil(parseFloat(params.loopedSlides || params.slidesPerView, 10));
	  swiper.loopedSlides += params.loopAdditionalSlides;
	  if (swiper.loopedSlides > slides.length && swiper.params.loopedSlidesLimit) {
	    swiper.loopedSlides = slides.length;
	  }
	  const prependSlides = [];
	  const appendSlides = [];
	  slides.each((el, index) => {
	    const slide = $(el);
	    slide.attr('data-swiper-slide-index', index);
	  });
	  for (let i = 0; i < swiper.loopedSlides; i += 1) {
	    const index = i - Math.floor(i / slides.length) * slides.length;
	    appendSlides.push(slides.eq(index)[0]);
	    prependSlides.unshift(slides.eq(slides.length - index - 1)[0]);
	  }
	  for (let i = 0; i < appendSlides.length; i += 1) {
	    $selector.append($(appendSlides[i].cloneNode(true)).addClass(params.slideDuplicateClass));
	  }
	  for (let i = prependSlides.length - 1; i >= 0; i -= 1) {
	    $selector.prepend($(prependSlides[i].cloneNode(true)).addClass(params.slideDuplicateClass));
	  }
	}

	function loopFix() {
	  const swiper = this;
	  swiper.emit('beforeLoopFix');
	  const {
	    activeIndex,
	    slides,
	    loopedSlides,
	    allowSlidePrev,
	    allowSlideNext,
	    snapGrid,
	    rtlTranslate: rtl
	  } = swiper;
	  let newIndex;
	  swiper.allowSlidePrev = true;
	  swiper.allowSlideNext = true;
	  const snapTranslate = -snapGrid[activeIndex];
	  const diff = snapTranslate - swiper.getTranslate(); // Fix For Negative Oversliding

	  if (activeIndex < loopedSlides) {
	    newIndex = slides.length - loopedSlides * 3 + activeIndex;
	    newIndex += loopedSlides;
	    const slideChanged = swiper.slideTo(newIndex, 0, false, true);
	    if (slideChanged && diff !== 0) {
	      swiper.setTranslate((rtl ? -swiper.translate : swiper.translate) - diff);
	    }
	  } else if (activeIndex >= slides.length - loopedSlides) {
	    // Fix For Positive Oversliding
	    newIndex = -slides.length + activeIndex + loopedSlides;
	    newIndex += loopedSlides;
	    const slideChanged = swiper.slideTo(newIndex, 0, false, true);
	    if (slideChanged && diff !== 0) {
	      swiper.setTranslate((rtl ? -swiper.translate : swiper.translate) - diff);
	    }
	  }
	  swiper.allowSlidePrev = allowSlidePrev;
	  swiper.allowSlideNext = allowSlideNext;
	  swiper.emit('loopFix');
	}

	function loopDestroy() {
	  const swiper = this;
	  const {
	    $wrapperEl,
	    params,
	    slides
	  } = swiper;
	  $wrapperEl.children(`.${params.slideClass}.${params.slideDuplicateClass},.${params.slideClass}.${params.slideBlankClass}`).remove();
	  slides.removeAttr('data-swiper-slide-index');
	}

	var loop = {
	  loopCreate,
	  loopFix,
	  loopDestroy
	};

	function setGrabCursor(moving) {
	  const swiper = this;
	  if (swiper.support.touch || !swiper.params.simulateTouch || swiper.params.watchOverflow && swiper.isLocked || swiper.params.cssMode) return;
	  const el = swiper.params.touchEventsTarget === 'container' ? swiper.el : swiper.wrapperEl;
	  el.style.cursor = 'move';
	  el.style.cursor = moving ? 'grabbing' : 'grab';
	}

	function unsetGrabCursor() {
	  const swiper = this;
	  if (swiper.support.touch || swiper.params.watchOverflow && swiper.isLocked || swiper.params.cssMode) {
	    return;
	  }
	  swiper[swiper.params.touchEventsTarget === 'container' ? 'el' : 'wrapperEl'].style.cursor = '';
	}

	var grabCursor = {
	  setGrabCursor,
	  unsetGrabCursor
	};

	function closestElement(selector, base = this) {
	  function __closestFrom(el) {
	    if (!el || el === getDocument() || el === getWindow()) return null;
	    if (el.assignedSlot) el = el.assignedSlot;
	    const found = el.closest(selector);
	    if (!found && !el.getRootNode) {
	      return null;
	    }
	    return found || __closestFrom(el.getRootNode().host);
	  }
	  return __closestFrom(base);
	}
	function onTouchStart(event) {
	  const swiper = this;
	  const document = getDocument();
	  const window = getWindow();
	  const data = swiper.touchEventsData;
	  const {
	    params,
	    touches,
	    enabled
	  } = swiper;
	  if (!enabled) return;
	  if (swiper.animating && params.preventInteractionOnTransition) {
	    return;
	  }
	  if (!swiper.animating && params.cssMode && params.loop) {
	    swiper.loopFix();
	  }
	  let e = event;
	  if (e.originalEvent) e = e.originalEvent;
	  let $targetEl = $(e.target);
	  if (params.touchEventsTarget === 'wrapper') {
	    if (!$targetEl.closest(swiper.wrapperEl).length) return;
	  }
	  data.isTouchEvent = e.type === 'touchstart';
	  if (!data.isTouchEvent && 'which' in e && e.which === 3) return;
	  if (!data.isTouchEvent && 'button' in e && e.button > 0) return;
	  if (data.isTouched && data.isMoved) return; // change target el for shadow root component

	  const swipingClassHasValue = !!params.noSwipingClass && params.noSwipingClass !== ''; // eslint-disable-next-line

	  const eventPath = event.composedPath ? event.composedPath() : event.path;
	  if (swipingClassHasValue && e.target && e.target.shadowRoot && eventPath) {
	    $targetEl = $(eventPath[0]);
	  }
	  const noSwipingSelector = params.noSwipingSelector ? params.noSwipingSelector : `.${params.noSwipingClass}`;
	  const isTargetShadow = !!(e.target && e.target.shadowRoot); // use closestElement for shadow root element to get the actual closest for nested shadow root element

	  if (params.noSwiping && (isTargetShadow ? closestElement(noSwipingSelector, $targetEl[0]) : $targetEl.closest(noSwipingSelector)[0])) {
	    swiper.allowClick = true;
	    return;
	  }
	  if (params.swipeHandler) {
	    if (!$targetEl.closest(params.swipeHandler)[0]) return;
	  }
	  touches.currentX = e.type === 'touchstart' ? e.targetTouches[0].pageX : e.pageX;
	  touches.currentY = e.type === 'touchstart' ? e.targetTouches[0].pageY : e.pageY;
	  const startX = touches.currentX;
	  const startY = touches.currentY; // Do NOT start if iOS edge swipe is detected. Otherwise iOS app cannot swipe-to-go-back anymore

	  const edgeSwipeDetection = params.edgeSwipeDetection || params.iOSEdgeSwipeDetection;
	  const edgeSwipeThreshold = params.edgeSwipeThreshold || params.iOSEdgeSwipeThreshold;
	  if (edgeSwipeDetection && (startX <= edgeSwipeThreshold || startX >= window.innerWidth - edgeSwipeThreshold)) {
	    if (edgeSwipeDetection === 'prevent') {
	      event.preventDefault();
	    } else {
	      return;
	    }
	  }
	  Object.assign(data, {
	    isTouched: true,
	    isMoved: false,
	    allowTouchCallbacks: true,
	    isScrolling: undefined,
	    startMoving: undefined
	  });
	  touches.startX = startX;
	  touches.startY = startY;
	  data.touchStartTime = now();
	  swiper.allowClick = true;
	  swiper.updateSize();
	  swiper.swipeDirection = undefined;
	  if (params.threshold > 0) data.allowThresholdMove = false;
	  if (e.type !== 'touchstart') {
	    let preventDefault = true;
	    if ($targetEl.is(data.focusableElements)) {
	      preventDefault = false;
	      if ($targetEl[0].nodeName === 'SELECT') {
	        data.isTouched = false;
	      }
	    }
	    if (document.activeElement && $(document.activeElement).is(data.focusableElements) && document.activeElement !== $targetEl[0]) {
	      document.activeElement.blur();
	    }
	    const shouldPreventDefault = preventDefault && swiper.allowTouchMove && params.touchStartPreventDefault;
	    if ((params.touchStartForcePreventDefault || shouldPreventDefault) && !$targetEl[0].isContentEditable) {
	      e.preventDefault();
	    }
	  }
	  if (swiper.params.freeMode && swiper.params.freeMode.enabled && swiper.freeMode && swiper.animating && !params.cssMode) {
	    swiper.freeMode.onTouchStart();
	  }
	  swiper.emit('touchStart', e);
	}

	function onTouchMove(event) {
	  const document = getDocument();
	  const swiper = this;
	  const data = swiper.touchEventsData;
	  const {
	    params,
	    touches,
	    rtlTranslate: rtl,
	    enabled
	  } = swiper;
	  if (!enabled) return;
	  let e = event;
	  if (e.originalEvent) e = e.originalEvent;
	  if (!data.isTouched) {
	    if (data.startMoving && data.isScrolling) {
	      swiper.emit('touchMoveOpposite', e);
	    }
	    return;
	  }
	  if (data.isTouchEvent && e.type !== 'touchmove') return;
	  const targetTouch = e.type === 'touchmove' && e.targetTouches && (e.targetTouches[0] || e.changedTouches[0]);
	  const pageX = e.type === 'touchmove' ? targetTouch.pageX : e.pageX;
	  const pageY = e.type === 'touchmove' ? targetTouch.pageY : e.pageY;
	  if (e.preventedByNestedSwiper) {
	    touches.startX = pageX;
	    touches.startY = pageY;
	    return;
	  }
	  if (!swiper.allowTouchMove) {
	    if (!$(e.target).is(data.focusableElements)) {
	      swiper.allowClick = false;
	    }
	    if (data.isTouched) {
	      Object.assign(touches, {
	        startX: pageX,
	        startY: pageY,
	        currentX: pageX,
	        currentY: pageY
	      });
	      data.touchStartTime = now();
	    }
	    return;
	  }
	  if (data.isTouchEvent && params.touchReleaseOnEdges && !params.loop) {
	    if (swiper.isVertical()) {
	      // Vertical
	      if (pageY < touches.startY && swiper.translate <= swiper.maxTranslate() || pageY > touches.startY && swiper.translate >= swiper.minTranslate()) {
	        data.isTouched = false;
	        data.isMoved = false;
	        return;
	      }
	    } else if (pageX < touches.startX && swiper.translate <= swiper.maxTranslate() || pageX > touches.startX && swiper.translate >= swiper.minTranslate()) {
	      return;
	    }
	  }
	  if (data.isTouchEvent && document.activeElement) {
	    if (e.target === document.activeElement && $(e.target).is(data.focusableElements)) {
	      data.isMoved = true;
	      swiper.allowClick = false;
	      return;
	    }
	  }
	  if (data.allowTouchCallbacks) {
	    swiper.emit('touchMove', e);
	  }
	  if (e.targetTouches && e.targetTouches.length > 1) return;
	  touches.currentX = pageX;
	  touches.currentY = pageY;
	  const diffX = touches.currentX - touches.startX;
	  const diffY = touches.currentY - touches.startY;
	  if (swiper.params.threshold && Math.sqrt(diffX ** 2 + diffY ** 2) < swiper.params.threshold) return;
	  if (typeof data.isScrolling === 'undefined') {
	    let touchAngle;
	    if (swiper.isHorizontal() && touches.currentY === touches.startY || swiper.isVertical() && touches.currentX === touches.startX) {
	      data.isScrolling = false;
	    } else {
	      // eslint-disable-next-line
	      if (diffX * diffX + diffY * diffY >= 25) {
	        touchAngle = Math.atan2(Math.abs(diffY), Math.abs(diffX)) * 180 / Math.PI;
	        data.isScrolling = swiper.isHorizontal() ? touchAngle > params.touchAngle : 90 - touchAngle > params.touchAngle;
	      }
	    }
	  }
	  if (data.isScrolling) {
	    swiper.emit('touchMoveOpposite', e);
	  }
	  if (typeof data.startMoving === 'undefined') {
	    if (touches.currentX !== touches.startX || touches.currentY !== touches.startY) {
	      data.startMoving = true;
	    }
	  }
	  if (data.isScrolling) {
	    data.isTouched = false;
	    return;
	  }
	  if (!data.startMoving) {
	    return;
	  }
	  swiper.allowClick = false;
	  if (!params.cssMode && e.cancelable) {
	    e.preventDefault();
	  }
	  if (params.touchMoveStopPropagation && !params.nested) {
	    e.stopPropagation();
	  }
	  if (!data.isMoved) {
	    if (params.loop && !params.cssMode) {
	      swiper.loopFix();
	    }
	    data.startTranslate = swiper.getTranslate();
	    swiper.setTransition(0);
	    if (swiper.animating) {
	      swiper.$wrapperEl.trigger('webkitTransitionEnd transitionend');
	    }
	    data.allowMomentumBounce = false; // Grab Cursor

	    if (params.grabCursor && (swiper.allowSlideNext === true || swiper.allowSlidePrev === true)) {
	      swiper.setGrabCursor(true);
	    }
	    swiper.emit('sliderFirstMove', e);
	  }
	  swiper.emit('sliderMove', e);
	  data.isMoved = true;
	  let diff = swiper.isHorizontal() ? diffX : diffY;
	  touches.diff = diff;
	  diff *= params.touchRatio;
	  if (rtl) diff = -diff;
	  swiper.swipeDirection = diff > 0 ? 'prev' : 'next';
	  data.currentTranslate = diff + data.startTranslate;
	  let disableParentSwiper = true;
	  let resistanceRatio = params.resistanceRatio;
	  if (params.touchReleaseOnEdges) {
	    resistanceRatio = 0;
	  }
	  if (diff > 0 && data.currentTranslate > swiper.minTranslate()) {
	    disableParentSwiper = false;
	    if (params.resistance) data.currentTranslate = swiper.minTranslate() - 1 + (-swiper.minTranslate() + data.startTranslate + diff) ** resistanceRatio;
	  } else if (diff < 0 && data.currentTranslate < swiper.maxTranslate()) {
	    disableParentSwiper = false;
	    if (params.resistance) data.currentTranslate = swiper.maxTranslate() + 1 - (swiper.maxTranslate() - data.startTranslate - diff) ** resistanceRatio;
	  }
	  if (disableParentSwiper) {
	    e.preventedByNestedSwiper = true;
	  } // Directions locks

	  if (!swiper.allowSlideNext && swiper.swipeDirection === 'next' && data.currentTranslate < data.startTranslate) {
	    data.currentTranslate = data.startTranslate;
	  }
	  if (!swiper.allowSlidePrev && swiper.swipeDirection === 'prev' && data.currentTranslate > data.startTranslate) {
	    data.currentTranslate = data.startTranslate;
	  }
	  if (!swiper.allowSlidePrev && !swiper.allowSlideNext) {
	    data.currentTranslate = data.startTranslate;
	  } // Threshold

	  if (params.threshold > 0) {
	    if (Math.abs(diff) > params.threshold || data.allowThresholdMove) {
	      if (!data.allowThresholdMove) {
	        data.allowThresholdMove = true;
	        touches.startX = touches.currentX;
	        touches.startY = touches.currentY;
	        data.currentTranslate = data.startTranslate;
	        touches.diff = swiper.isHorizontal() ? touches.currentX - touches.startX : touches.currentY - touches.startY;
	        return;
	      }
	    } else {
	      data.currentTranslate = data.startTranslate;
	      return;
	    }
	  }
	  if (!params.followFinger || params.cssMode) return; // Update active index in free mode

	  if (params.freeMode && params.freeMode.enabled && swiper.freeMode || params.watchSlidesProgress) {
	    swiper.updateActiveIndex();
	    swiper.updateSlidesClasses();
	  }
	  if (swiper.params.freeMode && params.freeMode.enabled && swiper.freeMode) {
	    swiper.freeMode.onTouchMove();
	  } // Update progress

	  swiper.updateProgress(data.currentTranslate); // Update translate

	  swiper.setTranslate(data.currentTranslate);
	}

	function onTouchEnd(event) {
	  const swiper = this;
	  const data = swiper.touchEventsData;
	  const {
	    params,
	    touches,
	    rtlTranslate: rtl,
	    slidesGrid,
	    enabled
	  } = swiper;
	  if (!enabled) return;
	  let e = event;
	  if (e.originalEvent) e = e.originalEvent;
	  if (data.allowTouchCallbacks) {
	    swiper.emit('touchEnd', e);
	  }
	  data.allowTouchCallbacks = false;
	  if (!data.isTouched) {
	    if (data.isMoved && params.grabCursor) {
	      swiper.setGrabCursor(false);
	    }
	    data.isMoved = false;
	    data.startMoving = false;
	    return;
	  } // Return Grab Cursor

	  if (params.grabCursor && data.isMoved && data.isTouched && (swiper.allowSlideNext === true || swiper.allowSlidePrev === true)) {
	    swiper.setGrabCursor(false);
	  } // Time diff

	  const touchEndTime = now();
	  const timeDiff = touchEndTime - data.touchStartTime; // Tap, doubleTap, Click

	  if (swiper.allowClick) {
	    const pathTree = e.path || e.composedPath && e.composedPath();
	    swiper.updateClickedSlide(pathTree && pathTree[0] || e.target);
	    swiper.emit('tap click', e);
	    if (timeDiff < 300 && touchEndTime - data.lastClickTime < 300) {
	      swiper.emit('doubleTap doubleClick', e);
	    }
	  }
	  data.lastClickTime = now();
	  nextTick(() => {
	    if (!swiper.destroyed) swiper.allowClick = true;
	  });
	  if (!data.isTouched || !data.isMoved || !swiper.swipeDirection || touches.diff === 0 || data.currentTranslate === data.startTranslate) {
	    data.isTouched = false;
	    data.isMoved = false;
	    data.startMoving = false;
	    return;
	  }
	  data.isTouched = false;
	  data.isMoved = false;
	  data.startMoving = false;
	  let currentPos;
	  if (params.followFinger) {
	    currentPos = rtl ? swiper.translate : -swiper.translate;
	  } else {
	    currentPos = -data.currentTranslate;
	  }
	  if (params.cssMode) {
	    return;
	  }
	  if (swiper.params.freeMode && params.freeMode.enabled) {
	    swiper.freeMode.onTouchEnd({
	      currentPos
	    });
	    return;
	  } // Find current slide

	  let stopIndex = 0;
	  let groupSize = swiper.slidesSizesGrid[0];
	  for (let i = 0; i < slidesGrid.length; i += i < params.slidesPerGroupSkip ? 1 : params.slidesPerGroup) {
	    const increment = i < params.slidesPerGroupSkip - 1 ? 1 : params.slidesPerGroup;
	    if (typeof slidesGrid[i + increment] !== 'undefined') {
	      if (currentPos >= slidesGrid[i] && currentPos < slidesGrid[i + increment]) {
	        stopIndex = i;
	        groupSize = slidesGrid[i + increment] - slidesGrid[i];
	      }
	    } else if (currentPos >= slidesGrid[i]) {
	      stopIndex = i;
	      groupSize = slidesGrid[slidesGrid.length - 1] - slidesGrid[slidesGrid.length - 2];
	    }
	  }
	  let rewindFirstIndex = null;
	  let rewindLastIndex = null;
	  if (params.rewind) {
	    if (swiper.isBeginning) {
	      rewindLastIndex = swiper.params.virtual && swiper.params.virtual.enabled && swiper.virtual ? swiper.virtual.slides.length - 1 : swiper.slides.length - 1;
	    } else if (swiper.isEnd) {
	      rewindFirstIndex = 0;
	    }
	  } // Find current slide size

	  const ratio = (currentPos - slidesGrid[stopIndex]) / groupSize;
	  const increment = stopIndex < params.slidesPerGroupSkip - 1 ? 1 : params.slidesPerGroup;
	  if (timeDiff > params.longSwipesMs) {
	    // Long touches
	    if (!params.longSwipes) {
	      swiper.slideTo(swiper.activeIndex);
	      return;
	    }
	    if (swiper.swipeDirection === 'next') {
	      if (ratio >= params.longSwipesRatio) swiper.slideTo(params.rewind && swiper.isEnd ? rewindFirstIndex : stopIndex + increment);else swiper.slideTo(stopIndex);
	    }
	    if (swiper.swipeDirection === 'prev') {
	      if (ratio > 1 - params.longSwipesRatio) {
	        swiper.slideTo(stopIndex + increment);
	      } else if (rewindLastIndex !== null && ratio < 0 && Math.abs(ratio) > params.longSwipesRatio) {
	        swiper.slideTo(rewindLastIndex);
	      } else {
	        swiper.slideTo(stopIndex);
	      }
	    }
	  } else {
	    // Short swipes
	    if (!params.shortSwipes) {
	      swiper.slideTo(swiper.activeIndex);
	      return;
	    }
	    const isNavButtonTarget = swiper.navigation && (e.target === swiper.navigation.nextEl || e.target === swiper.navigation.prevEl);
	    if (!isNavButtonTarget) {
	      if (swiper.swipeDirection === 'next') {
	        swiper.slideTo(rewindFirstIndex !== null ? rewindFirstIndex : stopIndex + increment);
	      }
	      if (swiper.swipeDirection === 'prev') {
	        swiper.slideTo(rewindLastIndex !== null ? rewindLastIndex : stopIndex);
	      }
	    } else if (e.target === swiper.navigation.nextEl) {
	      swiper.slideTo(stopIndex + increment);
	    } else {
	      swiper.slideTo(stopIndex);
	    }
	  }
	}

	function onResize() {
	  const swiper = this;
	  const {
	    params,
	    el
	  } = swiper;
	  if (el && el.offsetWidth === 0) return; // Breakpoints

	  if (params.breakpoints) {
	    swiper.setBreakpoint();
	  } // Save locks

	  const {
	    allowSlideNext,
	    allowSlidePrev,
	    snapGrid
	  } = swiper; // Disable locks on resize

	  swiper.allowSlideNext = true;
	  swiper.allowSlidePrev = true;
	  swiper.updateSize();
	  swiper.updateSlides();
	  swiper.updateSlidesClasses();
	  if ((params.slidesPerView === 'auto' || params.slidesPerView > 1) && swiper.isEnd && !swiper.isBeginning && !swiper.params.centeredSlides) {
	    swiper.slideTo(swiper.slides.length - 1, 0, false, true);
	  } else {
	    swiper.slideTo(swiper.activeIndex, 0, false, true);
	  }
	  if (swiper.autoplay && swiper.autoplay.running && swiper.autoplay.paused) {
	    swiper.autoplay.run();
	  } // Return locks after resize

	  swiper.allowSlidePrev = allowSlidePrev;
	  swiper.allowSlideNext = allowSlideNext;
	  if (swiper.params.watchOverflow && snapGrid !== swiper.snapGrid) {
	    swiper.checkOverflow();
	  }
	}

	function onClick(e) {
	  const swiper = this;
	  if (!swiper.enabled) return;
	  if (!swiper.allowClick) {
	    if (swiper.params.preventClicks) e.preventDefault();
	    if (swiper.params.preventClicksPropagation && swiper.animating) {
	      e.stopPropagation();
	      e.stopImmediatePropagation();
	    }
	  }
	}

	function onScroll() {
	  const swiper = this;
	  const {
	    wrapperEl,
	    rtlTranslate,
	    enabled
	  } = swiper;
	  if (!enabled) return;
	  swiper.previousTranslate = swiper.translate;
	  if (swiper.isHorizontal()) {
	    swiper.translate = -wrapperEl.scrollLeft;
	  } else {
	    swiper.translate = -wrapperEl.scrollTop;
	  } // eslint-disable-next-line

	  if (swiper.translate === 0) swiper.translate = 0;
	  swiper.updateActiveIndex();
	  swiper.updateSlidesClasses();
	  let newProgress;
	  const translatesDiff = swiper.maxTranslate() - swiper.minTranslate();
	  if (translatesDiff === 0) {
	    newProgress = 0;
	  } else {
	    newProgress = (swiper.translate - swiper.minTranslate()) / translatesDiff;
	  }
	  if (newProgress !== swiper.progress) {
	    swiper.updateProgress(rtlTranslate ? -swiper.translate : swiper.translate);
	  }
	  swiper.emit('setTranslate', swiper.translate, false);
	}

	let dummyEventAttached = false;
	function dummyEventListener() {}
	const events = (swiper, method) => {
	  const document = getDocument();
	  const {
	    params,
	    touchEvents,
	    el,
	    wrapperEl,
	    device,
	    support
	  } = swiper;
	  const capture = !!params.nested;
	  const domMethod = method === 'on' ? 'addEventListener' : 'removeEventListener';
	  const swiperMethod = method; // Touch Events

	  if (!support.touch) {
	    el[domMethod](touchEvents.start, swiper.onTouchStart, false);
	    document[domMethod](touchEvents.move, swiper.onTouchMove, capture);
	    document[domMethod](touchEvents.end, swiper.onTouchEnd, false);
	  } else {
	    const passiveListener = touchEvents.start === 'touchstart' && support.passiveListener && params.passiveListeners ? {
	      passive: true,
	      capture: false
	    } : false;
	    el[domMethod](touchEvents.start, swiper.onTouchStart, passiveListener);
	    el[domMethod](touchEvents.move, swiper.onTouchMove, support.passiveListener ? {
	      passive: false,
	      capture
	    } : capture);
	    el[domMethod](touchEvents.end, swiper.onTouchEnd, passiveListener);
	    if (touchEvents.cancel) {
	      el[domMethod](touchEvents.cancel, swiper.onTouchEnd, passiveListener);
	    }
	  } // Prevent Links Clicks

	  if (params.preventClicks || params.preventClicksPropagation) {
	    el[domMethod]('click', swiper.onClick, true);
	  }
	  if (params.cssMode) {
	    wrapperEl[domMethod]('scroll', swiper.onScroll);
	  } // Resize handler

	  if (params.updateOnWindowResize) {
	    swiper[swiperMethod](device.ios || device.android ? 'resize orientationchange observerUpdate' : 'resize observerUpdate', onResize, true);
	  } else {
	    swiper[swiperMethod]('observerUpdate', onResize, true);
	  }
	};
	function attachEvents() {
	  const swiper = this;
	  const document = getDocument();
	  const {
	    params,
	    support
	  } = swiper;
	  swiper.onTouchStart = onTouchStart.bind(swiper);
	  swiper.onTouchMove = onTouchMove.bind(swiper);
	  swiper.onTouchEnd = onTouchEnd.bind(swiper);
	  if (params.cssMode) {
	    swiper.onScroll = onScroll.bind(swiper);
	  }
	  swiper.onClick = onClick.bind(swiper);
	  if (support.touch && !dummyEventAttached) {
	    document.addEventListener('touchstart', dummyEventListener);
	    dummyEventAttached = true;
	  }
	  events(swiper, 'on');
	}
	function detachEvents() {
	  const swiper = this;
	  events(swiper, 'off');
	}
	var events$1 = {
	  attachEvents,
	  detachEvents
	};

	const isGridEnabled = (swiper, params) => {
	  return swiper.grid && params.grid && params.grid.rows > 1;
	};
	function setBreakpoint() {
	  const swiper = this;
	  const {
	    activeIndex,
	    initialized,
	    loopedSlides = 0,
	    params,
	    $el
	  } = swiper;
	  const breakpoints = params.breakpoints;
	  if (!breakpoints || breakpoints && Object.keys(breakpoints).length === 0) return; // Get breakpoint for window width and update parameters

	  const breakpoint = swiper.getBreakpoint(breakpoints, swiper.params.breakpointsBase, swiper.el);
	  if (!breakpoint || swiper.currentBreakpoint === breakpoint) return;
	  const breakpointOnlyParams = breakpoint in breakpoints ? breakpoints[breakpoint] : undefined;
	  const breakpointParams = breakpointOnlyParams || swiper.originalParams;
	  const wasMultiRow = isGridEnabled(swiper, params);
	  const isMultiRow = isGridEnabled(swiper, breakpointParams);
	  const wasEnabled = params.enabled;
	  if (wasMultiRow && !isMultiRow) {
	    $el.removeClass(`${params.containerModifierClass}grid ${params.containerModifierClass}grid-column`);
	    swiper.emitContainerClasses();
	  } else if (!wasMultiRow && isMultiRow) {
	    $el.addClass(`${params.containerModifierClass}grid`);
	    if (breakpointParams.grid.fill && breakpointParams.grid.fill === 'column' || !breakpointParams.grid.fill && params.grid.fill === 'column') {
	      $el.addClass(`${params.containerModifierClass}grid-column`);
	    }
	    swiper.emitContainerClasses();
	  } // Toggle navigation, pagination, scrollbar

	  ['navigation', 'pagination', 'scrollbar'].forEach(prop => {
	    const wasModuleEnabled = params[prop] && params[prop].enabled;
	    const isModuleEnabled = breakpointParams[prop] && breakpointParams[prop].enabled;
	    if (wasModuleEnabled && !isModuleEnabled) {
	      swiper[prop].disable();
	    }
	    if (!wasModuleEnabled && isModuleEnabled) {
	      swiper[prop].enable();
	    }
	  });
	  const directionChanged = breakpointParams.direction && breakpointParams.direction !== params.direction;
	  const needsReLoop = params.loop && (breakpointParams.slidesPerView !== params.slidesPerView || directionChanged);
	  if (directionChanged && initialized) {
	    swiper.changeDirection();
	  }
	  extend(swiper.params, breakpointParams);
	  const isEnabled = swiper.params.enabled;
	  Object.assign(swiper, {
	    allowTouchMove: swiper.params.allowTouchMove,
	    allowSlideNext: swiper.params.allowSlideNext,
	    allowSlidePrev: swiper.params.allowSlidePrev
	  });
	  if (wasEnabled && !isEnabled) {
	    swiper.disable();
	  } else if (!wasEnabled && isEnabled) {
	    swiper.enable();
	  }
	  swiper.currentBreakpoint = breakpoint;
	  swiper.emit('_beforeBreakpoint', breakpointParams);
	  if (needsReLoop && initialized) {
	    swiper.loopDestroy();
	    swiper.loopCreate();
	    swiper.updateSlides();
	    swiper.slideTo(activeIndex - loopedSlides + swiper.loopedSlides, 0, false);
	  }
	  swiper.emit('breakpoint', breakpointParams);
	}

	function getBreakpoint(breakpoints, base = 'window', containerEl) {
	  if (!breakpoints || base === 'container' && !containerEl) return undefined;
	  let breakpoint = false;
	  const window = getWindow();
	  const currentHeight = base === 'window' ? window.innerHeight : containerEl.clientHeight;
	  const points = Object.keys(breakpoints).map(point => {
	    if (typeof point === 'string' && point.indexOf('@') === 0) {
	      const minRatio = parseFloat(point.substr(1));
	      const value = currentHeight * minRatio;
	      return {
	        value,
	        point
	      };
	    }
	    return {
	      value: point,
	      point
	    };
	  });
	  points.sort((a, b) => parseInt(a.value, 10) - parseInt(b.value, 10));
	  for (let i = 0; i < points.length; i += 1) {
	    const {
	      point,
	      value
	    } = points[i];
	    if (base === 'window') {
	      if (window.matchMedia(`(min-width: ${value}px)`).matches) {
	        breakpoint = point;
	      }
	    } else if (value <= containerEl.clientWidth) {
	      breakpoint = point;
	    }
	  }
	  return breakpoint || 'max';
	}

	var breakpoints = {
	  setBreakpoint,
	  getBreakpoint
	};

	function prepareClasses(entries, prefix) {
	  const resultClasses = [];
	  entries.forEach(item => {
	    if (typeof item === 'object') {
	      Object.keys(item).forEach(classNames => {
	        if (item[classNames]) {
	          resultClasses.push(prefix + classNames);
	        }
	      });
	    } else if (typeof item === 'string') {
	      resultClasses.push(prefix + item);
	    }
	  });
	  return resultClasses;
	}
	function addClasses() {
	  const swiper = this;
	  const {
	    classNames,
	    params,
	    rtl,
	    $el,
	    device,
	    support
	  } = swiper; // prettier-ignore

	  const suffixes = prepareClasses(['initialized', params.direction, {
	    'pointer-events': !support.touch
	  }, {
	    'free-mode': swiper.params.freeMode && params.freeMode.enabled
	  }, {
	    'autoheight': params.autoHeight
	  }, {
	    'rtl': rtl
	  }, {
	    'grid': params.grid && params.grid.rows > 1
	  }, {
	    'grid-column': params.grid && params.grid.rows > 1 && params.grid.fill === 'column'
	  }, {
	    'android': device.android
	  }, {
	    'ios': device.ios
	  }, {
	    'css-mode': params.cssMode
	  }, {
	    'centered': params.cssMode && params.centeredSlides
	  }, {
	    'watch-progress': params.watchSlidesProgress
	  }], params.containerModifierClass);
	  classNames.push(...suffixes);
	  $el.addClass([...classNames].join(' '));
	  swiper.emitContainerClasses();
	}

	function removeClasses() {
	  const swiper = this;
	  const {
	    $el,
	    classNames
	  } = swiper;
	  $el.removeClass(classNames.join(' '));
	  swiper.emitContainerClasses();
	}

	var classes = {
	  addClasses,
	  removeClasses
	};

	function loadImage(imageEl, src, srcset, sizes, checkForComplete, callback) {
	  const window = getWindow();
	  let image;
	  function onReady() {
	    if (callback) callback();
	  }
	  const isPicture = $(imageEl).parent('picture')[0];
	  if (!isPicture && (!imageEl.complete || !checkForComplete)) {
	    if (src) {
	      image = new window.Image();
	      image.onload = onReady;
	      image.onerror = onReady;
	      if (sizes) {
	        image.sizes = sizes;
	      }
	      if (srcset) {
	        image.srcset = srcset;
	      }
	      if (src) {
	        image.src = src;
	      }
	    } else {
	      onReady();
	    }
	  } else {
	    // image already loaded...
	    onReady();
	  }
	}

	function preloadImages() {
	  const swiper = this;
	  swiper.imagesToLoad = swiper.$el.find('img');
	  function onReady() {
	    if (typeof swiper === 'undefined' || swiper === null || !swiper || swiper.destroyed) return;
	    if (swiper.imagesLoaded !== undefined) swiper.imagesLoaded += 1;
	    if (swiper.imagesLoaded === swiper.imagesToLoad.length) {
	      if (swiper.params.updateOnImagesReady) swiper.update();
	      swiper.emit('imagesReady');
	    }
	  }
	  for (let i = 0; i < swiper.imagesToLoad.length; i += 1) {
	    const imageEl = swiper.imagesToLoad[i];
	    swiper.loadImage(imageEl, imageEl.currentSrc || imageEl.getAttribute('src'), imageEl.srcset || imageEl.getAttribute('srcset'), imageEl.sizes || imageEl.getAttribute('sizes'), true, onReady);
	  }
	}

	var images = {
	  loadImage,
	  preloadImages
	};

	function checkOverflow() {
	  const swiper = this;
	  const {
	    isLocked: wasLocked,
	    params
	  } = swiper;
	  const {
	    slidesOffsetBefore
	  } = params;
	  if (slidesOffsetBefore) {
	    const lastSlideIndex = swiper.slides.length - 1;
	    const lastSlideRightEdge = swiper.slidesGrid[lastSlideIndex] + swiper.slidesSizesGrid[lastSlideIndex] + slidesOffsetBefore * 2;
	    swiper.isLocked = swiper.size > lastSlideRightEdge;
	  } else {
	    swiper.isLocked = swiper.snapGrid.length === 1;
	  }
	  if (params.allowSlideNext === true) {
	    swiper.allowSlideNext = !swiper.isLocked;
	  }
	  if (params.allowSlidePrev === true) {
	    swiper.allowSlidePrev = !swiper.isLocked;
	  }
	  if (wasLocked && wasLocked !== swiper.isLocked) {
	    swiper.isEnd = false;
	  }
	  if (wasLocked !== swiper.isLocked) {
	    swiper.emit(swiper.isLocked ? 'lock' : 'unlock');
	  }
	}
	var checkOverflow$1 = {
	  checkOverflow
	};

	var defaults = {
	  init: true,
	  direction: 'horizontal',
	  touchEventsTarget: 'wrapper',
	  initialSlide: 0,
	  speed: 300,
	  cssMode: false,
	  updateOnWindowResize: true,
	  resizeObserver: true,
	  nested: false,
	  createElements: false,
	  enabled: true,
	  focusableElements: 'input, select, option, textarea, button, video, label',
	  // Overrides
	  width: null,
	  height: null,
	  //
	  preventInteractionOnTransition: false,
	  // ssr
	  userAgent: null,
	  url: null,
	  // To support iOS's swipe-to-go-back gesture (when being used in-app).
	  edgeSwipeDetection: false,
	  edgeSwipeThreshold: 20,
	  // Autoheight
	  autoHeight: false,
	  // Set wrapper width
	  setWrapperSize: false,
	  // Virtual Translate
	  virtualTranslate: false,
	  // Effects
	  effect: 'slide',
	  // 'slide' or 'fade' or 'cube' or 'coverflow' or 'flip'
	  // Breakpoints
	  breakpoints: undefined,
	  breakpointsBase: 'window',
	  // Slides grid
	  spaceBetween: 0,
	  slidesPerView: 1,
	  slidesPerGroup: 1,
	  slidesPerGroupSkip: 0,
	  slidesPerGroupAuto: false,
	  centeredSlides: false,
	  centeredSlidesBounds: false,
	  slidesOffsetBefore: 0,
	  // in px
	  slidesOffsetAfter: 0,
	  // in px
	  normalizeSlideIndex: true,
	  centerInsufficientSlides: false,
	  // Disable swiper and hide navigation when container not overflow
	  watchOverflow: true,
	  // Round length
	  roundLengths: false,
	  // Touches
	  touchRatio: 1,
	  touchAngle: 45,
	  simulateTouch: true,
	  shortSwipes: true,
	  longSwipes: true,
	  longSwipesRatio: 0.5,
	  longSwipesMs: 300,
	  followFinger: true,
	  allowTouchMove: true,
	  threshold: 0,
	  touchMoveStopPropagation: false,
	  touchStartPreventDefault: true,
	  touchStartForcePreventDefault: false,
	  touchReleaseOnEdges: false,
	  // Unique Navigation Elements
	  uniqueNavElements: true,
	  // Resistance
	  resistance: true,
	  resistanceRatio: 0.85,
	  // Progress
	  watchSlidesProgress: false,
	  // Cursor
	  grabCursor: false,
	  // Clicks
	  preventClicks: true,
	  preventClicksPropagation: true,
	  slideToClickedSlide: false,
	  // Images
	  preloadImages: true,
	  updateOnImagesReady: true,
	  // loop
	  loop: false,
	  loopAdditionalSlides: 0,
	  loopedSlides: null,
	  loopedSlidesLimit: true,
	  loopFillGroupWithBlank: false,
	  loopPreventsSlide: true,
	  // rewind
	  rewind: false,
	  // Swiping/no swiping
	  allowSlidePrev: true,
	  allowSlideNext: true,
	  swipeHandler: null,
	  // '.swipe-handler',
	  noSwiping: true,
	  noSwipingClass: 'swiper-no-swiping',
	  noSwipingSelector: null,
	  // Passive Listeners
	  passiveListeners: true,
	  maxBackfaceHiddenSlides: 10,
	  // NS
	  containerModifierClass: 'swiper-',
	  // NEW
	  slideClass: 'swiper-slide',
	  slideBlankClass: 'swiper-slide-invisible-blank',
	  slideActiveClass: 'swiper-slide-active',
	  slideDuplicateActiveClass: 'swiper-slide-duplicate-active',
	  slideVisibleClass: 'swiper-slide-visible',
	  slideDuplicateClass: 'swiper-slide-duplicate',
	  slideNextClass: 'swiper-slide-next',
	  slideDuplicateNextClass: 'swiper-slide-duplicate-next',
	  slidePrevClass: 'swiper-slide-prev',
	  slideDuplicatePrevClass: 'swiper-slide-duplicate-prev',
	  wrapperClass: 'swiper-wrapper',
	  // Callbacks
	  runCallbacksOnInit: true,
	  // Internals
	  _emitClasses: false
	};

	function moduleExtendParams(params, allModulesParams) {
	  return function extendParams(obj = {}) {
	    const moduleParamName = Object.keys(obj)[0];
	    const moduleParams = obj[moduleParamName];
	    if (typeof moduleParams !== 'object' || moduleParams === null) {
	      extend(allModulesParams, obj);
	      return;
	    }
	    if (['navigation', 'pagination', 'scrollbar'].indexOf(moduleParamName) >= 0 && params[moduleParamName] === true) {
	      params[moduleParamName] = {
	        auto: true
	      };
	    }
	    if (!(moduleParamName in params && 'enabled' in moduleParams)) {
	      extend(allModulesParams, obj);
	      return;
	    }
	    if (params[moduleParamName] === true) {
	      params[moduleParamName] = {
	        enabled: true
	      };
	    }
	    if (typeof params[moduleParamName] === 'object' && !('enabled' in params[moduleParamName])) {
	      params[moduleParamName].enabled = true;
	    }
	    if (!params[moduleParamName]) params[moduleParamName] = {
	      enabled: false
	    };
	    extend(allModulesParams, obj);
	  };
	}

	/* eslint no-param-reassign: "off" */
	const prototypes = {
	  eventsEmitter,
	  update,
	  translate,
	  transition,
	  slide,
	  loop,
	  grabCursor,
	  events: events$1,
	  breakpoints,
	  checkOverflow: checkOverflow$1,
	  classes,
	  images
	};
	const extendedDefaults = {};
	class Swiper {
	  constructor(...args) {
	    let el;
	    let params;
	    if (args.length === 1 && args[0].constructor && Object.prototype.toString.call(args[0]).slice(8, -1) === 'Object') {
	      params = args[0];
	    } else {
	      [el, params] = args;
	    }
	    if (!params) params = {};
	    params = extend({}, params);
	    if (el && !params.el) params.el = el;
	    if (params.el && $(params.el).length > 1) {
	      const swipers = [];
	      $(params.el).each(containerEl => {
	        const newParams = extend({}, params, {
	          el: containerEl
	        });
	        swipers.push(new Swiper(newParams));
	      }); // eslint-disable-next-line no-constructor-return

	      return swipers;
	    } // Swiper Instance

	    const swiper = this;
	    swiper.__swiper__ = true;
	    swiper.support = getSupport();
	    swiper.device = getDevice({
	      userAgent: params.userAgent
	    });
	    swiper.browser = getBrowser();
	    swiper.eventsListeners = {};
	    swiper.eventsAnyListeners = [];
	    swiper.modules = [...swiper.__modules__];
	    if (params.modules && Array.isArray(params.modules)) {
	      swiper.modules.push(...params.modules);
	    }
	    const allModulesParams = {};
	    swiper.modules.forEach(mod => {
	      mod({
	        swiper,
	        extendParams: moduleExtendParams(params, allModulesParams),
	        on: swiper.on.bind(swiper),
	        once: swiper.once.bind(swiper),
	        off: swiper.off.bind(swiper),
	        emit: swiper.emit.bind(swiper)
	      });
	    }); // Extend defaults with modules params

	    const swiperParams = extend({}, defaults, allModulesParams); // Extend defaults with passed params

	    swiper.params = extend({}, swiperParams, extendedDefaults, params);
	    swiper.originalParams = extend({}, swiper.params);
	    swiper.passedParams = extend({}, params); // add event listeners

	    if (swiper.params && swiper.params.on) {
	      Object.keys(swiper.params.on).forEach(eventName => {
	        swiper.on(eventName, swiper.params.on[eventName]);
	      });
	    }
	    if (swiper.params && swiper.params.onAny) {
	      swiper.onAny(swiper.params.onAny);
	    } // Save Dom lib

	    swiper.$ = $; // Extend Swiper

	    Object.assign(swiper, {
	      enabled: swiper.params.enabled,
	      el,
	      // Classes
	      classNames: [],
	      // Slides
	      slides: $(),
	      slidesGrid: [],
	      snapGrid: [],
	      slidesSizesGrid: [],
	      // isDirection
	      isHorizontal() {
	        return swiper.params.direction === 'horizontal';
	      },
	      isVertical() {
	        return swiper.params.direction === 'vertical';
	      },
	      // Indexes
	      activeIndex: 0,
	      realIndex: 0,
	      //
	      isBeginning: true,
	      isEnd: false,
	      // Props
	      translate: 0,
	      previousTranslate: 0,
	      progress: 0,
	      velocity: 0,
	      animating: false,
	      // Locks
	      allowSlideNext: swiper.params.allowSlideNext,
	      allowSlidePrev: swiper.params.allowSlidePrev,
	      // Touch Events
	      touchEvents: function touchEvents() {
	        const touch = ['touchstart', 'touchmove', 'touchend', 'touchcancel'];
	        const desktop = ['pointerdown', 'pointermove', 'pointerup'];
	        swiper.touchEventsTouch = {
	          start: touch[0],
	          move: touch[1],
	          end: touch[2],
	          cancel: touch[3]
	        };
	        swiper.touchEventsDesktop = {
	          start: desktop[0],
	          move: desktop[1],
	          end: desktop[2]
	        };
	        return swiper.support.touch || !swiper.params.simulateTouch ? swiper.touchEventsTouch : swiper.touchEventsDesktop;
	      }(),
	      touchEventsData: {
	        isTouched: undefined,
	        isMoved: undefined,
	        allowTouchCallbacks: undefined,
	        touchStartTime: undefined,
	        isScrolling: undefined,
	        currentTranslate: undefined,
	        startTranslate: undefined,
	        allowThresholdMove: undefined,
	        // Form elements to match
	        focusableElements: swiper.params.focusableElements,
	        // Last click time
	        lastClickTime: now(),
	        clickTimeout: undefined,
	        // Velocities
	        velocities: [],
	        allowMomentumBounce: undefined,
	        isTouchEvent: undefined,
	        startMoving: undefined
	      },
	      // Clicks
	      allowClick: true,
	      // Touches
	      allowTouchMove: swiper.params.allowTouchMove,
	      touches: {
	        startX: 0,
	        startY: 0,
	        currentX: 0,
	        currentY: 0,
	        diff: 0
	      },
	      // Images
	      imagesToLoad: [],
	      imagesLoaded: 0
	    });
	    swiper.emit('_swiper'); // Init

	    if (swiper.params.init) {
	      swiper.init();
	    } // Return app instance
	    // eslint-disable-next-line no-constructor-return

	    return swiper;
	  }
	  enable() {
	    const swiper = this;
	    if (swiper.enabled) return;
	    swiper.enabled = true;
	    if (swiper.params.grabCursor) {
	      swiper.setGrabCursor();
	    }
	    swiper.emit('enable');
	  }
	  disable() {
	    const swiper = this;
	    if (!swiper.enabled) return;
	    swiper.enabled = false;
	    if (swiper.params.grabCursor) {
	      swiper.unsetGrabCursor();
	    }
	    swiper.emit('disable');
	  }
	  setProgress(progress, speed) {
	    const swiper = this;
	    progress = Math.min(Math.max(progress, 0), 1);
	    const min = swiper.minTranslate();
	    const max = swiper.maxTranslate();
	    const current = (max - min) * progress + min;
	    swiper.translateTo(current, typeof speed === 'undefined' ? 0 : speed);
	    swiper.updateActiveIndex();
	    swiper.updateSlidesClasses();
	  }
	  emitContainerClasses() {
	    const swiper = this;
	    if (!swiper.params._emitClasses || !swiper.el) return;
	    const cls = swiper.el.className.split(' ').filter(className => {
	      return className.indexOf('swiper') === 0 || className.indexOf(swiper.params.containerModifierClass) === 0;
	    });
	    swiper.emit('_containerClasses', cls.join(' '));
	  }
	  getSlideClasses(slideEl) {
	    const swiper = this;
	    if (swiper.destroyed) return '';
	    return slideEl.className.split(' ').filter(className => {
	      return className.indexOf('swiper-slide') === 0 || className.indexOf(swiper.params.slideClass) === 0;
	    }).join(' ');
	  }
	  emitSlidesClasses() {
	    const swiper = this;
	    if (!swiper.params._emitClasses || !swiper.el) return;
	    const updates = [];
	    swiper.slides.each(slideEl => {
	      const classNames = swiper.getSlideClasses(slideEl);
	      updates.push({
	        slideEl,
	        classNames
	      });
	      swiper.emit('_slideClass', slideEl, classNames);
	    });
	    swiper.emit('_slideClasses', updates);
	  }
	  slidesPerViewDynamic(view = 'current', exact = false) {
	    const swiper = this;
	    const {
	      params,
	      slides,
	      slidesGrid,
	      slidesSizesGrid,
	      size: swiperSize,
	      activeIndex
	    } = swiper;
	    let spv = 1;
	    if (params.centeredSlides) {
	      let slideSize = slides[activeIndex].swiperSlideSize;
	      let breakLoop;
	      for (let i = activeIndex + 1; i < slides.length; i += 1) {
	        if (slides[i] && !breakLoop) {
	          slideSize += slides[i].swiperSlideSize;
	          spv += 1;
	          if (slideSize > swiperSize) breakLoop = true;
	        }
	      }
	      for (let i = activeIndex - 1; i >= 0; i -= 1) {
	        if (slides[i] && !breakLoop) {
	          slideSize += slides[i].swiperSlideSize;
	          spv += 1;
	          if (slideSize > swiperSize) breakLoop = true;
	        }
	      }
	    } else {
	      // eslint-disable-next-line
	      if (view === 'current') {
	        for (let i = activeIndex + 1; i < slides.length; i += 1) {
	          const slideInView = exact ? slidesGrid[i] + slidesSizesGrid[i] - slidesGrid[activeIndex] < swiperSize : slidesGrid[i] - slidesGrid[activeIndex] < swiperSize;
	          if (slideInView) {
	            spv += 1;
	          }
	        }
	      } else {
	        // previous
	        for (let i = activeIndex - 1; i >= 0; i -= 1) {
	          const slideInView = slidesGrid[activeIndex] - slidesGrid[i] < swiperSize;
	          if (slideInView) {
	            spv += 1;
	          }
	        }
	      }
	    }
	    return spv;
	  }
	  update() {
	    const swiper = this;
	    if (!swiper || swiper.destroyed) return;
	    const {
	      snapGrid,
	      params
	    } = swiper; // Breakpoints

	    if (params.breakpoints) {
	      swiper.setBreakpoint();
	    }
	    swiper.updateSize();
	    swiper.updateSlides();
	    swiper.updateProgress();
	    swiper.updateSlidesClasses();
	    function setTranslate() {
	      const translateValue = swiper.rtlTranslate ? swiper.translate * -1 : swiper.translate;
	      const newTranslate = Math.min(Math.max(translateValue, swiper.maxTranslate()), swiper.minTranslate());
	      swiper.setTranslate(newTranslate);
	      swiper.updateActiveIndex();
	      swiper.updateSlidesClasses();
	    }
	    let translated;
	    if (swiper.params.freeMode && swiper.params.freeMode.enabled) {
	      setTranslate();
	      if (swiper.params.autoHeight) {
	        swiper.updateAutoHeight();
	      }
	    } else {
	      if ((swiper.params.slidesPerView === 'auto' || swiper.params.slidesPerView > 1) && swiper.isEnd && !swiper.params.centeredSlides) {
	        translated = swiper.slideTo(swiper.slides.length - 1, 0, false, true);
	      } else {
	        translated = swiper.slideTo(swiper.activeIndex, 0, false, true);
	      }
	      if (!translated) {
	        setTranslate();
	      }
	    }
	    if (params.watchOverflow && snapGrid !== swiper.snapGrid) {
	      swiper.checkOverflow();
	    }
	    swiper.emit('update');
	  }
	  changeDirection(newDirection, needUpdate = true) {
	    const swiper = this;
	    const currentDirection = swiper.params.direction;
	    if (!newDirection) {
	      // eslint-disable-next-line
	      newDirection = currentDirection === 'horizontal' ? 'vertical' : 'horizontal';
	    }
	    if (newDirection === currentDirection || newDirection !== 'horizontal' && newDirection !== 'vertical') {
	      return swiper;
	    }
	    swiper.$el.removeClass(`${swiper.params.containerModifierClass}${currentDirection}`).addClass(`${swiper.params.containerModifierClass}${newDirection}`);
	    swiper.emitContainerClasses();
	    swiper.params.direction = newDirection;
	    swiper.slides.each(slideEl => {
	      if (newDirection === 'vertical') {
	        slideEl.style.width = '';
	      } else {
	        slideEl.style.height = '';
	      }
	    });
	    swiper.emit('changeDirection');
	    if (needUpdate) swiper.update();
	    return swiper;
	  }
	  changeLanguageDirection(direction) {
	    const swiper = this;
	    if (swiper.rtl && direction === 'rtl' || !swiper.rtl && direction === 'ltr') return;
	    swiper.rtl = direction === 'rtl';
	    swiper.rtlTranslate = swiper.params.direction === 'horizontal' && swiper.rtl;
	    if (swiper.rtl) {
	      swiper.$el.addClass(`${swiper.params.containerModifierClass}rtl`);
	      swiper.el.dir = 'rtl';
	    } else {
	      swiper.$el.removeClass(`${swiper.params.containerModifierClass}rtl`);
	      swiper.el.dir = 'ltr';
	    }
	    swiper.update();
	  }
	  mount(el) {
	    const swiper = this;
	    if (swiper.mounted) return true; // Find el

	    const $el = $(el || swiper.params.el);
	    el = $el[0];
	    if (!el) {
	      return false;
	    }
	    el.swiper = swiper;
	    const getWrapperSelector = () => {
	      return `.${(swiper.params.wrapperClass || '').trim().split(' ').join('.')}`;
	    };
	    const getWrapper = () => {
	      if (el && el.shadowRoot && el.shadowRoot.querySelector) {
	        const res = $(el.shadowRoot.querySelector(getWrapperSelector())); // Children needs to return slot items

	        res.children = options => $el.children(options);
	        return res;
	      }
	      if (!$el.children) {
	        return $($el).children(getWrapperSelector());
	      }
	      return $el.children(getWrapperSelector());
	    }; // Find Wrapper

	    let $wrapperEl = getWrapper();
	    if ($wrapperEl.length === 0 && swiper.params.createElements) {
	      const document = getDocument();
	      const wrapper = document.createElement('div');
	      $wrapperEl = $(wrapper);
	      wrapper.className = swiper.params.wrapperClass;
	      $el.append(wrapper);
	      $el.children(`.${swiper.params.slideClass}`).each(slideEl => {
	        $wrapperEl.append(slideEl);
	      });
	    }
	    Object.assign(swiper, {
	      $el,
	      el,
	      $wrapperEl,
	      wrapperEl: $wrapperEl[0],
	      mounted: true,
	      // RTL
	      rtl: el.dir.toLowerCase() === 'rtl' || $el.css('direction') === 'rtl',
	      rtlTranslate: swiper.params.direction === 'horizontal' && (el.dir.toLowerCase() === 'rtl' || $el.css('direction') === 'rtl'),
	      wrongRTL: $wrapperEl.css('display') === '-webkit-box'
	    });
	    return true;
	  }
	  init(el) {
	    const swiper = this;
	    if (swiper.initialized) return swiper;
	    const mounted = swiper.mount(el);
	    if (mounted === false) return swiper;
	    swiper.emit('beforeInit'); // Set breakpoint

	    if (swiper.params.breakpoints) {
	      swiper.setBreakpoint();
	    } // Add Classes

	    swiper.addClasses(); // Create loop

	    if (swiper.params.loop) {
	      swiper.loopCreate();
	    } // Update size

	    swiper.updateSize(); // Update slides

	    swiper.updateSlides();
	    if (swiper.params.watchOverflow) {
	      swiper.checkOverflow();
	    } // Set Grab Cursor

	    if (swiper.params.grabCursor && swiper.enabled) {
	      swiper.setGrabCursor();
	    }
	    if (swiper.params.preloadImages) {
	      swiper.preloadImages();
	    } // Slide To Initial Slide

	    if (swiper.params.loop) {
	      swiper.slideTo(swiper.params.initialSlide + swiper.loopedSlides, 0, swiper.params.runCallbacksOnInit, false, true);
	    } else {
	      swiper.slideTo(swiper.params.initialSlide, 0, swiper.params.runCallbacksOnInit, false, true);
	    } // Attach events

	    swiper.attachEvents(); // Init Flag

	    swiper.initialized = true; // Emit

	    swiper.emit('init');
	    swiper.emit('afterInit');
	    return swiper;
	  }
	  destroy(deleteInstance = true, cleanStyles = true) {
	    const swiper = this;
	    const {
	      params,
	      $el,
	      $wrapperEl,
	      slides
	    } = swiper;
	    if (typeof swiper.params === 'undefined' || swiper.destroyed) {
	      return null;
	    }
	    swiper.emit('beforeDestroy'); // Init Flag

	    swiper.initialized = false; // Detach events

	    swiper.detachEvents(); // Destroy loop

	    if (params.loop) {
	      swiper.loopDestroy();
	    } // Cleanup styles

	    if (cleanStyles) {
	      swiper.removeClasses();
	      $el.removeAttr('style');
	      $wrapperEl.removeAttr('style');
	      if (slides && slides.length) {
	        slides.removeClass([params.slideVisibleClass, params.slideActiveClass, params.slideNextClass, params.slidePrevClass].join(' ')).removeAttr('style').removeAttr('data-swiper-slide-index');
	      }
	    }
	    swiper.emit('destroy'); // Detach emitter events

	    Object.keys(swiper.eventsListeners).forEach(eventName => {
	      swiper.off(eventName);
	    });
	    if (deleteInstance !== false) {
	      swiper.$el[0].swiper = null;
	      deleteProps(swiper);
	    }
	    swiper.destroyed = true;
	    return null;
	  }
	  static extendDefaults(newDefaults) {
	    extend(extendedDefaults, newDefaults);
	  }
	  static get extendedDefaults() {
	    return extendedDefaults;
	  }
	  static get defaults() {
	    return defaults;
	  }
	  static installModule(mod) {
	    if (!Swiper.prototype.__modules__) Swiper.prototype.__modules__ = [];
	    const modules = Swiper.prototype.__modules__;
	    if (typeof mod === 'function' && modules.indexOf(mod) < 0) {
	      modules.push(mod);
	    }
	  }
	  static use(module) {
	    if (Array.isArray(module)) {
	      module.forEach(m => Swiper.installModule(m));
	      return Swiper;
	    }
	    Swiper.installModule(module);
	    return Swiper;
	  }
	}
	Object.keys(prototypes).forEach(prototypeGroup => {
	  Object.keys(prototypes[prototypeGroup]).forEach(protoMethod => {
	    Swiper.prototype[protoMethod] = prototypes[prototypeGroup][protoMethod];
	  });
	});
	Swiper.use([Resize, Observer]);

	function createElementIfNotDefined(swiper, originalParams, params, checkProps) {
	  const document = getDocument();
	  if (swiper.params.createElements) {
	    Object.keys(checkProps).forEach(key => {
	      if (!params[key] && params.auto === true) {
	        let element = swiper.$el.children(`.${checkProps[key]}`)[0];
	        if (!element) {
	          element = document.createElement('div');
	          element.className = checkProps[key];
	          swiper.$el.append(element);
	        }
	        params[key] = element;
	        originalParams[key] = element;
	      }
	    });
	  }
	  return params;
	}

	function Navigation({
	  swiper,
	  extendParams,
	  on,
	  emit
	}) {
	  extendParams({
	    navigation: {
	      nextEl: null,
	      prevEl: null,
	      hideOnClick: false,
	      disabledClass: 'swiper-button-disabled',
	      hiddenClass: 'swiper-button-hidden',
	      lockClass: 'swiper-button-lock',
	      navigationDisabledClass: 'swiper-navigation-disabled'
	    }
	  });
	  swiper.navigation = {
	    nextEl: null,
	    $nextEl: null,
	    prevEl: null,
	    $prevEl: null
	  };
	  function getEl(el) {
	    let $el;
	    if (el) {
	      $el = $(el);
	      if (swiper.params.uniqueNavElements && typeof el === 'string' && $el.length > 1 && swiper.$el.find(el).length === 1) {
	        $el = swiper.$el.find(el);
	      }
	    }
	    return $el;
	  }
	  function toggleEl($el, disabled) {
	    const params = swiper.params.navigation;
	    if ($el && $el.length > 0) {
	      $el[disabled ? 'addClass' : 'removeClass'](params.disabledClass);
	      if ($el[0] && $el[0].tagName === 'BUTTON') $el[0].disabled = disabled;
	      if (swiper.params.watchOverflow && swiper.enabled) {
	        $el[swiper.isLocked ? 'addClass' : 'removeClass'](params.lockClass);
	      }
	    }
	  }
	  function update() {
	    // Update Navigation Buttons
	    if (swiper.params.loop) return;
	    const {
	      $nextEl,
	      $prevEl
	    } = swiper.navigation;
	    toggleEl($prevEl, swiper.isBeginning && !swiper.params.rewind);
	    toggleEl($nextEl, swiper.isEnd && !swiper.params.rewind);
	  }
	  function onPrevClick(e) {
	    e.preventDefault();
	    if (swiper.isBeginning && !swiper.params.loop && !swiper.params.rewind) return;
	    swiper.slidePrev();
	    emit('navigationPrev');
	  }
	  function onNextClick(e) {
	    e.preventDefault();
	    if (swiper.isEnd && !swiper.params.loop && !swiper.params.rewind) return;
	    swiper.slideNext();
	    emit('navigationNext');
	  }
	  function init() {
	    const params = swiper.params.navigation;
	    swiper.params.navigation = createElementIfNotDefined(swiper, swiper.originalParams.navigation, swiper.params.navigation, {
	      nextEl: 'swiper-button-next',
	      prevEl: 'swiper-button-prev'
	    });
	    if (!(params.nextEl || params.prevEl)) return;
	    const $nextEl = getEl(params.nextEl);
	    const $prevEl = getEl(params.prevEl);
	    if ($nextEl && $nextEl.length > 0) {
	      $nextEl.on('click', onNextClick);
	    }
	    if ($prevEl && $prevEl.length > 0) {
	      $prevEl.on('click', onPrevClick);
	    }
	    Object.assign(swiper.navigation, {
	      $nextEl,
	      nextEl: $nextEl && $nextEl[0],
	      $prevEl,
	      prevEl: $prevEl && $prevEl[0]
	    });
	    if (!swiper.enabled) {
	      if ($nextEl) $nextEl.addClass(params.lockClass);
	      if ($prevEl) $prevEl.addClass(params.lockClass);
	    }
	  }
	  function destroy() {
	    const {
	      $nextEl,
	      $prevEl
	    } = swiper.navigation;
	    if ($nextEl && $nextEl.length) {
	      $nextEl.off('click', onNextClick);
	      $nextEl.removeClass(swiper.params.navigation.disabledClass);
	    }
	    if ($prevEl && $prevEl.length) {
	      $prevEl.off('click', onPrevClick);
	      $prevEl.removeClass(swiper.params.navigation.disabledClass);
	    }
	  }
	  on('init', () => {
	    if (swiper.params.navigation.enabled === false) {
	      // eslint-disable-next-line
	      disable();
	    } else {
	      init();
	      update();
	    }
	  });
	  on('toEdge fromEdge lock unlock', () => {
	    update();
	  });
	  on('destroy', () => {
	    destroy();
	  });
	  on('enable disable', () => {
	    const {
	      $nextEl,
	      $prevEl
	    } = swiper.navigation;
	    if ($nextEl) {
	      $nextEl[swiper.enabled ? 'removeClass' : 'addClass'](swiper.params.navigation.lockClass);
	    }
	    if ($prevEl) {
	      $prevEl[swiper.enabled ? 'removeClass' : 'addClass'](swiper.params.navigation.lockClass);
	    }
	  });
	  on('click', (_s, e) => {
	    const {
	      $nextEl,
	      $prevEl
	    } = swiper.navigation;
	    const targetEl = e.target;
	    if (swiper.params.navigation.hideOnClick && !$(targetEl).is($prevEl) && !$(targetEl).is($nextEl)) {
	      if (swiper.pagination && swiper.params.pagination && swiper.params.pagination.clickable && (swiper.pagination.el === targetEl || swiper.pagination.el.contains(targetEl))) return;
	      let isHidden;
	      if ($nextEl) {
	        isHidden = $nextEl.hasClass(swiper.params.navigation.hiddenClass);
	      } else if ($prevEl) {
	        isHidden = $prevEl.hasClass(swiper.params.navigation.hiddenClass);
	      }
	      if (isHidden === true) {
	        emit('navigationShow');
	      } else {
	        emit('navigationHide');
	      }
	      if ($nextEl) {
	        $nextEl.toggleClass(swiper.params.navigation.hiddenClass);
	      }
	      if ($prevEl) {
	        $prevEl.toggleClass(swiper.params.navigation.hiddenClass);
	      }
	    }
	  });
	  const enable = () => {
	    swiper.$el.removeClass(swiper.params.navigation.navigationDisabledClass);
	    init();
	    update();
	  };
	  const disable = () => {
	    swiper.$el.addClass(swiper.params.navigation.navigationDisabledClass);
	    destroy();
	  };
	  Object.assign(swiper.navigation, {
	    enable,
	    disable,
	    update,
	    init,
	    destroy
	  });
	}

	function classesToSelector(classes = '') {
	  return `.${classes.trim().replace(/([\.:!\/])/g, '\\$1') // eslint-disable-line
  .replace(/ /g, '.')}`;
	}

	function Pagination({
	  swiper,
	  extendParams,
	  on,
	  emit
	}) {
	  const pfx = 'swiper-pagination';
	  extendParams({
	    pagination: {
	      el: null,
	      bulletElement: 'span',
	      clickable: false,
	      hideOnClick: false,
	      renderBullet: null,
	      renderProgressbar: null,
	      renderFraction: null,
	      renderCustom: null,
	      progressbarOpposite: false,
	      type: 'bullets',
	      // 'bullets' or 'progressbar' or 'fraction' or 'custom'
	      dynamicBullets: false,
	      dynamicMainBullets: 1,
	      formatFractionCurrent: number => number,
	      formatFractionTotal: number => number,
	      bulletClass: `${pfx}-bullet`,
	      bulletActiveClass: `${pfx}-bullet-active`,
	      modifierClass: `${pfx}-`,
	      currentClass: `${pfx}-current`,
	      totalClass: `${pfx}-total`,
	      hiddenClass: `${pfx}-hidden`,
	      progressbarFillClass: `${pfx}-progressbar-fill`,
	      progressbarOppositeClass: `${pfx}-progressbar-opposite`,
	      clickableClass: `${pfx}-clickable`,
	      lockClass: `${pfx}-lock`,
	      horizontalClass: `${pfx}-horizontal`,
	      verticalClass: `${pfx}-vertical`,
	      paginationDisabledClass: `${pfx}-disabled`
	    }
	  });
	  swiper.pagination = {
	    el: null,
	    $el: null,
	    bullets: []
	  };
	  let bulletSize;
	  let dynamicBulletIndex = 0;
	  function isPaginationDisabled() {
	    return !swiper.params.pagination.el || !swiper.pagination.el || !swiper.pagination.$el || swiper.pagination.$el.length === 0;
	  }
	  function setSideBullets($bulletEl, position) {
	    const {
	      bulletActiveClass
	    } = swiper.params.pagination;
	    $bulletEl[position]().addClass(`${bulletActiveClass}-${position}`)[position]().addClass(`${bulletActiveClass}-${position}-${position}`);
	  }
	  function update() {
	    // Render || Update Pagination bullets/items
	    const rtl = swiper.rtl;
	    const params = swiper.params.pagination;
	    if (isPaginationDisabled()) return;
	    const slidesLength = swiper.virtual && swiper.params.virtual.enabled ? swiper.virtual.slides.length : swiper.slides.length;
	    const $el = swiper.pagination.$el; // Current/Total

	    let current;
	    const total = swiper.params.loop ? Math.ceil((slidesLength - swiper.loopedSlides * 2) / swiper.params.slidesPerGroup) : swiper.snapGrid.length;
	    if (swiper.params.loop) {
	      current = Math.ceil((swiper.activeIndex - swiper.loopedSlides) / swiper.params.slidesPerGroup);
	      if (current > slidesLength - 1 - swiper.loopedSlides * 2) {
	        current -= slidesLength - swiper.loopedSlides * 2;
	      }
	      if (current > total - 1) current -= total;
	      if (current < 0 && swiper.params.paginationType !== 'bullets') current = total + current;
	    } else if (typeof swiper.snapIndex !== 'undefined') {
	      current = swiper.snapIndex;
	    } else {
	      current = swiper.activeIndex || 0;
	    } // Types

	    if (params.type === 'bullets' && swiper.pagination.bullets && swiper.pagination.bullets.length > 0) {
	      const bullets = swiper.pagination.bullets;
	      let firstIndex;
	      let lastIndex;
	      let midIndex;
	      if (params.dynamicBullets) {
	        bulletSize = bullets.eq(0)[swiper.isHorizontal() ? 'outerWidth' : 'outerHeight'](true);
	        $el.css(swiper.isHorizontal() ? 'width' : 'height', `${bulletSize * (params.dynamicMainBullets + 4)}px`);
	        if (params.dynamicMainBullets > 1 && swiper.previousIndex !== undefined) {
	          dynamicBulletIndex += current - (swiper.previousIndex - swiper.loopedSlides || 0);
	          if (dynamicBulletIndex > params.dynamicMainBullets - 1) {
	            dynamicBulletIndex = params.dynamicMainBullets - 1;
	          } else if (dynamicBulletIndex < 0) {
	            dynamicBulletIndex = 0;
	          }
	        }
	        firstIndex = Math.max(current - dynamicBulletIndex, 0);
	        lastIndex = firstIndex + (Math.min(bullets.length, params.dynamicMainBullets) - 1);
	        midIndex = (lastIndex + firstIndex) / 2;
	      }
	      bullets.removeClass(['', '-next', '-next-next', '-prev', '-prev-prev', '-main'].map(suffix => `${params.bulletActiveClass}${suffix}`).join(' '));
	      if ($el.length > 1) {
	        bullets.each(bullet => {
	          const $bullet = $(bullet);
	          const bulletIndex = $bullet.index();
	          if (bulletIndex === current) {
	            $bullet.addClass(params.bulletActiveClass);
	          }
	          if (params.dynamicBullets) {
	            if (bulletIndex >= firstIndex && bulletIndex <= lastIndex) {
	              $bullet.addClass(`${params.bulletActiveClass}-main`);
	            }
	            if (bulletIndex === firstIndex) {
	              setSideBullets($bullet, 'prev');
	            }
	            if (bulletIndex === lastIndex) {
	              setSideBullets($bullet, 'next');
	            }
	          }
	        });
	      } else {
	        const $bullet = bullets.eq(current);
	        const bulletIndex = $bullet.index();
	        $bullet.addClass(params.bulletActiveClass);
	        if (params.dynamicBullets) {
	          const $firstDisplayedBullet = bullets.eq(firstIndex);
	          const $lastDisplayedBullet = bullets.eq(lastIndex);
	          for (let i = firstIndex; i <= lastIndex; i += 1) {
	            bullets.eq(i).addClass(`${params.bulletActiveClass}-main`);
	          }
	          if (swiper.params.loop) {
	            if (bulletIndex >= bullets.length) {
	              for (let i = params.dynamicMainBullets; i >= 0; i -= 1) {
	                bullets.eq(bullets.length - i).addClass(`${params.bulletActiveClass}-main`);
	              }
	              bullets.eq(bullets.length - params.dynamicMainBullets - 1).addClass(`${params.bulletActiveClass}-prev`);
	            } else {
	              setSideBullets($firstDisplayedBullet, 'prev');
	              setSideBullets($lastDisplayedBullet, 'next');
	            }
	          } else {
	            setSideBullets($firstDisplayedBullet, 'prev');
	            setSideBullets($lastDisplayedBullet, 'next');
	          }
	        }
	      }
	      if (params.dynamicBullets) {
	        const dynamicBulletsLength = Math.min(bullets.length, params.dynamicMainBullets + 4);
	        const bulletsOffset = (bulletSize * dynamicBulletsLength - bulletSize) / 2 - midIndex * bulletSize;
	        const offsetProp = rtl ? 'right' : 'left';
	        bullets.css(swiper.isHorizontal() ? offsetProp : 'top', `${bulletsOffset}px`);
	      }
	    }
	    if (params.type === 'fraction') {
	      $el.find(classesToSelector(params.currentClass)).text(params.formatFractionCurrent(current + 1));
	      $el.find(classesToSelector(params.totalClass)).text(params.formatFractionTotal(total));
	    }
	    if (params.type === 'progressbar') {
	      let progressbarDirection;
	      if (params.progressbarOpposite) {
	        progressbarDirection = swiper.isHorizontal() ? 'vertical' : 'horizontal';
	      } else {
	        progressbarDirection = swiper.isHorizontal() ? 'horizontal' : 'vertical';
	      }
	      const scale = (current + 1) / total;
	      let scaleX = 1;
	      let scaleY = 1;
	      if (progressbarDirection === 'horizontal') {
	        scaleX = scale;
	      } else {
	        scaleY = scale;
	      }
	      $el.find(classesToSelector(params.progressbarFillClass)).transform(`translate3d(0,0,0) scaleX(${scaleX}) scaleY(${scaleY})`).transition(swiper.params.speed);
	    }
	    if (params.type === 'custom' && params.renderCustom) {
	      $el.html(params.renderCustom(swiper, current + 1, total));
	      emit('paginationRender', $el[0]);
	    } else {
	      emit('paginationUpdate', $el[0]);
	    }
	    if (swiper.params.watchOverflow && swiper.enabled) {
	      $el[swiper.isLocked ? 'addClass' : 'removeClass'](params.lockClass);
	    }
	  }
	  function render() {
	    // Render Container
	    const params = swiper.params.pagination;
	    if (isPaginationDisabled()) return;
	    const slidesLength = swiper.virtual && swiper.params.virtual.enabled ? swiper.virtual.slides.length : swiper.slides.length;
	    const $el = swiper.pagination.$el;
	    let paginationHTML = '';
	    if (params.type === 'bullets') {
	      let numberOfBullets = swiper.params.loop ? Math.ceil((slidesLength - swiper.loopedSlides * 2) / swiper.params.slidesPerGroup) : swiper.snapGrid.length;
	      if (swiper.params.freeMode && swiper.params.freeMode.enabled && !swiper.params.loop && numberOfBullets > slidesLength) {
	        numberOfBullets = slidesLength;
	      }
	      for (let i = 0; i < numberOfBullets; i += 1) {
	        if (params.renderBullet) {
	          paginationHTML += params.renderBullet.call(swiper, i, params.bulletClass);
	        } else {
	          paginationHTML += `<${params.bulletElement} class="${params.bulletClass}"></${params.bulletElement}>`;
	        }
	      }
	      $el.html(paginationHTML);
	      swiper.pagination.bullets = $el.find(classesToSelector(params.bulletClass));
	    }
	    if (params.type === 'fraction') {
	      if (params.renderFraction) {
	        paginationHTML = params.renderFraction.call(swiper, params.currentClass, params.totalClass);
	      } else {
	        paginationHTML = `<span class="${params.currentClass}"></span>` + ' / ' + `<span class="${params.totalClass}"></span>`;
	      }
	      $el.html(paginationHTML);
	    }
	    if (params.type === 'progressbar') {
	      if (params.renderProgressbar) {
	        paginationHTML = params.renderProgressbar.call(swiper, params.progressbarFillClass);
	      } else {
	        paginationHTML = `<span class="${params.progressbarFillClass}"></span>`;
	      }
	      $el.html(paginationHTML);
	    }
	    if (params.type !== 'custom') {
	      emit('paginationRender', swiper.pagination.$el[0]);
	    }
	  }
	  function init() {
	    swiper.params.pagination = createElementIfNotDefined(swiper, swiper.originalParams.pagination, swiper.params.pagination, {
	      el: 'swiper-pagination'
	    });
	    const params = swiper.params.pagination;
	    if (!params.el) return;
	    let $el = $(params.el);
	    if ($el.length === 0) return;
	    if (swiper.params.uniqueNavElements && typeof params.el === 'string' && $el.length > 1) {
	      $el = swiper.$el.find(params.el); // check if it belongs to another nested Swiper

	      if ($el.length > 1) {
	        $el = $el.filter(el => {
	          if ($(el).parents('.swiper')[0] !== swiper.el) return false;
	          return true;
	        });
	      }
	    }
	    if (params.type === 'bullets' && params.clickable) {
	      $el.addClass(params.clickableClass);
	    }
	    $el.addClass(params.modifierClass + params.type);
	    $el.addClass(swiper.isHorizontal() ? params.horizontalClass : params.verticalClass);
	    if (params.type === 'bullets' && params.dynamicBullets) {
	      $el.addClass(`${params.modifierClass}${params.type}-dynamic`);
	      dynamicBulletIndex = 0;
	      if (params.dynamicMainBullets < 1) {
	        params.dynamicMainBullets = 1;
	      }
	    }
	    if (params.type === 'progressbar' && params.progressbarOpposite) {
	      $el.addClass(params.progressbarOppositeClass);
	    }
	    if (params.clickable) {
	      $el.on('click', classesToSelector(params.bulletClass), function onClick(e) {
	        e.preventDefault();
	        let index = $(this).index() * swiper.params.slidesPerGroup;
	        if (swiper.params.loop) index += swiper.loopedSlides;
	        swiper.slideTo(index);
	      });
	    }
	    Object.assign(swiper.pagination, {
	      $el,
	      el: $el[0]
	    });
	    if (!swiper.enabled) {
	      $el.addClass(params.lockClass);
	    }
	  }
	  function destroy() {
	    const params = swiper.params.pagination;
	    if (isPaginationDisabled()) return;
	    const $el = swiper.pagination.$el;
	    $el.removeClass(params.hiddenClass);
	    $el.removeClass(params.modifierClass + params.type);
	    $el.removeClass(swiper.isHorizontal() ? params.horizontalClass : params.verticalClass);
	    if (swiper.pagination.bullets && swiper.pagination.bullets.removeClass) swiper.pagination.bullets.removeClass(params.bulletActiveClass);
	    if (params.clickable) {
	      $el.off('click', classesToSelector(params.bulletClass));
	    }
	  }
	  on('init', () => {
	    if (swiper.params.pagination.enabled === false) {
	      // eslint-disable-next-line
	      disable();
	    } else {
	      init();
	      render();
	      update();
	    }
	  });
	  on('activeIndexChange', () => {
	    if (swiper.params.loop) {
	      update();
	    } else if (typeof swiper.snapIndex === 'undefined') {
	      update();
	    }
	  });
	  on('snapIndexChange', () => {
	    if (!swiper.params.loop) {
	      update();
	    }
	  });
	  on('slidesLengthChange', () => {
	    if (swiper.params.loop) {
	      render();
	      update();
	    }
	  });
	  on('snapGridLengthChange', () => {
	    if (!swiper.params.loop) {
	      render();
	      update();
	    }
	  });
	  on('destroy', () => {
	    destroy();
	  });
	  on('enable disable', () => {
	    const {
	      $el
	    } = swiper.pagination;
	    if ($el) {
	      $el[swiper.enabled ? 'removeClass' : 'addClass'](swiper.params.pagination.lockClass);
	    }
	  });
	  on('lock unlock', () => {
	    update();
	  });
	  on('click', (_s, e) => {
	    const targetEl = e.target;
	    const {
	      $el
	    } = swiper.pagination;
	    if (swiper.params.pagination.el && swiper.params.pagination.hideOnClick && $el && $el.length > 0 && !$(targetEl).hasClass(swiper.params.pagination.bulletClass)) {
	      if (swiper.navigation && (swiper.navigation.nextEl && targetEl === swiper.navigation.nextEl || swiper.navigation.prevEl && targetEl === swiper.navigation.prevEl)) return;
	      const isHidden = $el.hasClass(swiper.params.pagination.hiddenClass);
	      if (isHidden === true) {
	        emit('paginationShow');
	      } else {
	        emit('paginationHide');
	      }
	      $el.toggleClass(swiper.params.pagination.hiddenClass);
	    }
	  });
	  const enable = () => {
	    swiper.$el.removeClass(swiper.params.pagination.paginationDisabledClass);
	    if (swiper.pagination.$el) {
	      swiper.pagination.$el.removeClass(swiper.params.pagination.paginationDisabledClass);
	    }
	    init();
	    render();
	    update();
	  };
	  const disable = () => {
	    swiper.$el.addClass(swiper.params.pagination.paginationDisabledClass);
	    if (swiper.pagination.$el) {
	      swiper.pagination.$el.addClass(swiper.params.pagination.paginationDisabledClass);
	    }
	    destroy();
	  };
	  Object.assign(swiper.pagination, {
	    enable,
	    disable,
	    render,
	    update,
	    init,
	    destroy
	  });
	}

	/* eslint no-underscore-dangle: "off" */
	function Autoplay({
	  swiper,
	  extendParams,
	  on,
	  emit
	}) {
	  let timeout;
	  swiper.autoplay = {
	    running: false,
	    paused: false
	  };
	  extendParams({
	    autoplay: {
	      enabled: false,
	      delay: 3000,
	      waitForTransition: true,
	      disableOnInteraction: true,
	      stopOnLastSlide: false,
	      reverseDirection: false,
	      pauseOnMouseEnter: false
	    }
	  });
	  function run() {
	    if (!swiper.size) {
	      swiper.autoplay.running = false;
	      swiper.autoplay.paused = false;
	      return;
	    }
	    const $activeSlideEl = swiper.slides.eq(swiper.activeIndex);
	    let delay = swiper.params.autoplay.delay;
	    if ($activeSlideEl.attr('data-swiper-autoplay')) {
	      delay = $activeSlideEl.attr('data-swiper-autoplay') || swiper.params.autoplay.delay;
	    }
	    clearTimeout(timeout);
	    timeout = nextTick(() => {
	      let autoplayResult;
	      if (swiper.params.autoplay.reverseDirection) {
	        if (swiper.params.loop) {
	          swiper.loopFix();
	          autoplayResult = swiper.slidePrev(swiper.params.speed, true, true);
	          emit('autoplay');
	        } else if (!swiper.isBeginning) {
	          autoplayResult = swiper.slidePrev(swiper.params.speed, true, true);
	          emit('autoplay');
	        } else if (!swiper.params.autoplay.stopOnLastSlide) {
	          autoplayResult = swiper.slideTo(swiper.slides.length - 1, swiper.params.speed, true, true);
	          emit('autoplay');
	        } else {
	          stop();
	        }
	      } else if (swiper.params.loop) {
	        swiper.loopFix();
	        autoplayResult = swiper.slideNext(swiper.params.speed, true, true);
	        emit('autoplay');
	      } else if (!swiper.isEnd) {
	        autoplayResult = swiper.slideNext(swiper.params.speed, true, true);
	        emit('autoplay');
	      } else if (!swiper.params.autoplay.stopOnLastSlide) {
	        autoplayResult = swiper.slideTo(0, swiper.params.speed, true, true);
	        emit('autoplay');
	      } else {
	        stop();
	      }
	      if (swiper.params.cssMode && swiper.autoplay.running) run();else if (autoplayResult === false) {
	        run();
	      }
	    }, delay);
	  }
	  function start() {
	    if (typeof timeout !== 'undefined') return false;
	    if (swiper.autoplay.running) return false;
	    swiper.autoplay.running = true;
	    emit('autoplayStart');
	    run();
	    return true;
	  }
	  function stop() {
	    if (!swiper.autoplay.running) return false;
	    if (typeof timeout === 'undefined') return false;
	    if (timeout) {
	      clearTimeout(timeout);
	      timeout = undefined;
	    }
	    swiper.autoplay.running = false;
	    emit('autoplayStop');
	    return true;
	  }
	  function pause(speed) {
	    if (!swiper.autoplay.running) return;
	    if (swiper.autoplay.paused) return;
	    if (timeout) clearTimeout(timeout);
	    swiper.autoplay.paused = true;
	    if (speed === 0 || !swiper.params.autoplay.waitForTransition) {
	      swiper.autoplay.paused = false;
	      run();
	    } else {
	      ['transitionend', 'webkitTransitionEnd'].forEach(event => {
	        swiper.$wrapperEl[0].addEventListener(event, onTransitionEnd);
	      });
	    }
	  }
	  function onVisibilityChange() {
	    const document = getDocument();
	    if (document.visibilityState === 'hidden' && swiper.autoplay.running) {
	      pause();
	    }
	    if (document.visibilityState === 'visible' && swiper.autoplay.paused) {
	      run();
	      swiper.autoplay.paused = false;
	    }
	  }
	  function onTransitionEnd(e) {
	    if (!swiper || swiper.destroyed || !swiper.$wrapperEl) return;
	    if (e.target !== swiper.$wrapperEl[0]) return;
	    ['transitionend', 'webkitTransitionEnd'].forEach(event => {
	      swiper.$wrapperEl[0].removeEventListener(event, onTransitionEnd);
	    });
	    swiper.autoplay.paused = false;
	    if (!swiper.autoplay.running) {
	      stop();
	    } else {
	      run();
	    }
	  }
	  function onMouseEnter() {
	    if (swiper.params.autoplay.disableOnInteraction) {
	      stop();
	    } else {
	      emit('autoplayPause');
	      pause();
	    }
	    ['transitionend', 'webkitTransitionEnd'].forEach(event => {
	      swiper.$wrapperEl[0].removeEventListener(event, onTransitionEnd);
	    });
	  }
	  function onMouseLeave() {
	    if (swiper.params.autoplay.disableOnInteraction) {
	      return;
	    }
	    swiper.autoplay.paused = false;
	    emit('autoplayResume');
	    run();
	  }
	  function attachMouseEvents() {
	    if (swiper.params.autoplay.pauseOnMouseEnter) {
	      swiper.$el.on('mouseenter', onMouseEnter);
	      swiper.$el.on('mouseleave', onMouseLeave);
	    }
	  }
	  function detachMouseEvents() {
	    swiper.$el.off('mouseenter', onMouseEnter);
	    swiper.$el.off('mouseleave', onMouseLeave);
	  }
	  on('init', () => {
	    if (swiper.params.autoplay.enabled) {
	      start();
	      const document = getDocument();
	      document.addEventListener('visibilitychange', onVisibilityChange);
	      attachMouseEvents();
	    }
	  });
	  on('beforeTransitionStart', (_s, speed, internal) => {
	    if (swiper.autoplay.running) {
	      if (internal || !swiper.params.autoplay.disableOnInteraction) {
	        swiper.autoplay.pause(speed);
	      } else {
	        stop();
	      }
	    }
	  });
	  on('sliderFirstMove', () => {
	    if (swiper.autoplay.running) {
	      if (swiper.params.autoplay.disableOnInteraction) {
	        stop();
	      } else {
	        pause();
	      }
	    }
	  });
	  on('touchEnd', () => {
	    if (swiper.params.cssMode && swiper.autoplay.paused && !swiper.params.autoplay.disableOnInteraction) {
	      run();
	    }
	  });
	  on('destroy', () => {
	    detachMouseEvents();
	    if (swiper.autoplay.running) {
	      stop();
	    }
	    const document = getDocument();
	    document.removeEventListener('visibilitychange', onVisibilityChange);
	  });
	  Object.assign(swiper.autoplay, {
	    pause,
	    run,
	    start,
	    stop
	  });
	}

	function Thumb({
	  swiper,
	  extendParams,
	  on
	}) {
	  extendParams({
	    thumbs: {
	      swiper: null,
	      multipleActiveThumbs: true,
	      autoScrollOffset: 0,
	      slideThumbActiveClass: 'swiper-slide-thumb-active',
	      thumbsContainerClass: 'swiper-thumbs'
	    }
	  });
	  let initialized = false;
	  let swiperCreated = false;
	  swiper.thumbs = {
	    swiper: null
	  };
	  function onThumbClick() {
	    const thumbsSwiper = swiper.thumbs.swiper;
	    if (!thumbsSwiper || thumbsSwiper.destroyed) return;
	    const clickedIndex = thumbsSwiper.clickedIndex;
	    const clickedSlide = thumbsSwiper.clickedSlide;
	    if (clickedSlide && $(clickedSlide).hasClass(swiper.params.thumbs.slideThumbActiveClass)) return;
	    if (typeof clickedIndex === 'undefined' || clickedIndex === null) return;
	    let slideToIndex;
	    if (thumbsSwiper.params.loop) {
	      slideToIndex = parseInt($(thumbsSwiper.clickedSlide).attr('data-swiper-slide-index'), 10);
	    } else {
	      slideToIndex = clickedIndex;
	    }
	    if (swiper.params.loop) {
	      let currentIndex = swiper.activeIndex;
	      if (swiper.slides.eq(currentIndex).hasClass(swiper.params.slideDuplicateClass)) {
	        swiper.loopFix(); // eslint-disable-next-line

	        swiper._clientLeft = swiper.$wrapperEl[0].clientLeft;
	        currentIndex = swiper.activeIndex;
	      }
	      const prevIndex = swiper.slides.eq(currentIndex).prevAll(`[data-swiper-slide-index="${slideToIndex}"]`).eq(0).index();
	      const nextIndex = swiper.slides.eq(currentIndex).nextAll(`[data-swiper-slide-index="${slideToIndex}"]`).eq(0).index();
	      if (typeof prevIndex === 'undefined') slideToIndex = nextIndex;else if (typeof nextIndex === 'undefined') slideToIndex = prevIndex;else if (nextIndex - currentIndex < currentIndex - prevIndex) slideToIndex = nextIndex;else slideToIndex = prevIndex;
	    }
	    swiper.slideTo(slideToIndex);
	  }
	  function init() {
	    const {
	      thumbs: thumbsParams
	    } = swiper.params;
	    if (initialized) return false;
	    initialized = true;
	    const SwiperClass = swiper.constructor;
	    if (thumbsParams.swiper instanceof SwiperClass) {
	      swiper.thumbs.swiper = thumbsParams.swiper;
	      Object.assign(swiper.thumbs.swiper.originalParams, {
	        watchSlidesProgress: true,
	        slideToClickedSlide: false
	      });
	      Object.assign(swiper.thumbs.swiper.params, {
	        watchSlidesProgress: true,
	        slideToClickedSlide: false
	      });
	    } else if (isObject(thumbsParams.swiper)) {
	      const thumbsSwiperParams = Object.assign({}, thumbsParams.swiper);
	      Object.assign(thumbsSwiperParams, {
	        watchSlidesProgress: true,
	        slideToClickedSlide: false
	      });
	      swiper.thumbs.swiper = new SwiperClass(thumbsSwiperParams);
	      swiperCreated = true;
	    }
	    swiper.thumbs.swiper.$el.addClass(swiper.params.thumbs.thumbsContainerClass);
	    swiper.thumbs.swiper.on('tap', onThumbClick);
	    return true;
	  }
	  function update(initial) {
	    const thumbsSwiper = swiper.thumbs.swiper;
	    if (!thumbsSwiper || thumbsSwiper.destroyed) return;
	    const slidesPerView = thumbsSwiper.params.slidesPerView === 'auto' ? thumbsSwiper.slidesPerViewDynamic() : thumbsSwiper.params.slidesPerView; // Activate thumbs

	    let thumbsToActivate = 1;
	    const thumbActiveClass = swiper.params.thumbs.slideThumbActiveClass;
	    if (swiper.params.slidesPerView > 1 && !swiper.params.centeredSlides) {
	      thumbsToActivate = swiper.params.slidesPerView;
	    }
	    if (!swiper.params.thumbs.multipleActiveThumbs) {
	      thumbsToActivate = 1;
	    }
	    thumbsToActivate = Math.floor(thumbsToActivate);
	    thumbsSwiper.slides.removeClass(thumbActiveClass);
	    if (thumbsSwiper.params.loop || thumbsSwiper.params.virtual && thumbsSwiper.params.virtual.enabled) {
	      for (let i = 0; i < thumbsToActivate; i += 1) {
	        thumbsSwiper.$wrapperEl.children(`[data-swiper-slide-index="${swiper.realIndex + i}"]`).addClass(thumbActiveClass);
	      }
	    } else {
	      for (let i = 0; i < thumbsToActivate; i += 1) {
	        thumbsSwiper.slides.eq(swiper.realIndex + i).addClass(thumbActiveClass);
	      }
	    }
	    const autoScrollOffset = swiper.params.thumbs.autoScrollOffset;
	    const useOffset = autoScrollOffset && !thumbsSwiper.params.loop;
	    if (swiper.realIndex !== thumbsSwiper.realIndex || useOffset) {
	      let currentThumbsIndex = thumbsSwiper.activeIndex;
	      let newThumbsIndex;
	      let direction;
	      if (thumbsSwiper.params.loop) {
	        if (thumbsSwiper.slides.eq(currentThumbsIndex).hasClass(thumbsSwiper.params.slideDuplicateClass)) {
	          thumbsSwiper.loopFix(); // eslint-disable-next-line

	          thumbsSwiper._clientLeft = thumbsSwiper.$wrapperEl[0].clientLeft;
	          currentThumbsIndex = thumbsSwiper.activeIndex;
	        } // Find actual thumbs index to slide to

	        const prevThumbsIndex = thumbsSwiper.slides.eq(currentThumbsIndex).prevAll(`[data-swiper-slide-index="${swiper.realIndex}"]`).eq(0).index();
	        const nextThumbsIndex = thumbsSwiper.slides.eq(currentThumbsIndex).nextAll(`[data-swiper-slide-index="${swiper.realIndex}"]`).eq(0).index();
	        if (typeof prevThumbsIndex === 'undefined') {
	          newThumbsIndex = nextThumbsIndex;
	        } else if (typeof nextThumbsIndex === 'undefined') {
	          newThumbsIndex = prevThumbsIndex;
	        } else if (nextThumbsIndex - currentThumbsIndex === currentThumbsIndex - prevThumbsIndex) {
	          newThumbsIndex = thumbsSwiper.params.slidesPerGroup > 1 ? nextThumbsIndex : currentThumbsIndex;
	        } else if (nextThumbsIndex - currentThumbsIndex < currentThumbsIndex - prevThumbsIndex) {
	          newThumbsIndex = nextThumbsIndex;
	        } else {
	          newThumbsIndex = prevThumbsIndex;
	        }
	        direction = swiper.activeIndex > swiper.previousIndex ? 'next' : 'prev';
	      } else {
	        newThumbsIndex = swiper.realIndex;
	        direction = newThumbsIndex > swiper.previousIndex ? 'next' : 'prev';
	      }
	      if (useOffset) {
	        newThumbsIndex += direction === 'next' ? autoScrollOffset : -1 * autoScrollOffset;
	      }
	      if (thumbsSwiper.visibleSlidesIndexes && thumbsSwiper.visibleSlidesIndexes.indexOf(newThumbsIndex) < 0) {
	        if (thumbsSwiper.params.centeredSlides) {
	          if (newThumbsIndex > currentThumbsIndex) {
	            newThumbsIndex = newThumbsIndex - Math.floor(slidesPerView / 2) + 1;
	          } else {
	            newThumbsIndex = newThumbsIndex + Math.floor(slidesPerView / 2) - 1;
	          }
	        } else if (newThumbsIndex > currentThumbsIndex && thumbsSwiper.params.slidesPerGroup === 1) ;
	        thumbsSwiper.slideTo(newThumbsIndex, initial ? 0 : undefined);
	      }
	    }
	  }
	  on('beforeInit', () => {
	    const {
	      thumbs
	    } = swiper.params;
	    if (!thumbs || !thumbs.swiper) return;
	    init();
	    update(true);
	  });
	  on('slideChange update resize observerUpdate', () => {
	    update();
	  });
	  on('setTransition', (_s, duration) => {
	    const thumbsSwiper = swiper.thumbs.swiper;
	    if (!thumbsSwiper || thumbsSwiper.destroyed) return;
	    thumbsSwiper.setTransition(duration);
	  });
	  on('beforeDestroy', () => {
	    const thumbsSwiper = swiper.thumbs.swiper;
	    if (!thumbsSwiper || thumbsSwiper.destroyed) return;
	    if (swiperCreated) {
	      thumbsSwiper.destroy();
	    }
	  });
	  Object.assign(swiper.thumbs, {
	    init,
	    update
	  });
	}

	takeControlAccordion();
	takeControlTabs();
	takeControlMenu();
	takeControlForms(); // меняет формы в зависимости от задачи
	takeControlCookie('.cookie-container', '.cookie-accept');
	takeControlSearch();
	takeControlModal();
	PhoneInputController();
	takeControlDropdown();
	takeControlInputs();
	takeControlFilter();
	takeControlInputRange();
	takeControlScrollIntoView();
	takeControlInputCount();
	takeControlPopupTimer();
	//takeControlPutInForm(); // добавляет данные в блок справа
	takeControlInputsAppend(); // клонирует группу
	takeControlInputRadioCastom();
	takeControlInputRadio();
	formTaskController();
	takeControlDependInputs();
	takeControlChoosingRequiredKP();
	takeControlСlipboards();
	takeControlRating();
	takeControlBookmark();
	// document.addEventListener('DOMSubtreeModified', () => {
	// 	takeControlDropdown()
	// 	console.log('modified')
	// })

	// Код ниже для возвращения исходной высоты мобильному меню (100vh) после ресайза экрана
	// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
	var vh = window.innerHeight * 0.01;
	// Then we set the value in the --vh custom property to the root of the document
	document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));
	// We listen to the resize event
	window.addEventListener('resize', function () {
	  // We execute the same script as before
	  var vh = window.innerHeight * 0.01;
	  document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));
	});

	// Swipers
	new Swiper('.main-slider__wrapper', {
	  modules: [Autoplay, Pagination],
	  slideToClickedSlide: false,
	  slidesPerGroup: 1,
	  watchOverflow: true,
	  pagination: {
	    el: '.main-slider__pagination',
	    type: 'bullets',
	    clickable: true
	  },
	  autoHeight: true,
	  autoplay: {
	    // Пауза между прокруткой
	    delay: 3000,
	    // Закончить на последнем слайде
	    stopOnLastSlide: true,
	    // Отключить после ручного перетаскивания
	    disableOnInteraction: false
	  },
	  breakpoints: {
	    0: {
	      slidesPerView: 1,
	      spaceBetween: 8
	    },
	    769: {
	      slidesPerView: 1.05,
	      spaceBetween: 20
	    },
	    1025: {
	      slidesPerView: 1,
	      spaceBetween: 0
	    }
	  }
	});
	var wareSliderMainSelector = document.querySelector('.ware-slider_main');
	var wareSliderMain = new Swiper('.ware-slider_main', {
	  modules: [Navigation, Thumb],
	  slideToClickedSlide: false,
	  slidesPerGroup: 1,
	  watchOverflow: true,
	  navigation: {
	    prevEl: '.ware-slider__navigation ._prev',
	    nextEl: '.ware-slider__navigation ._next'
	  },
	  breakpoints: {
	    0: {
	      slidesPerView: 1.2,
	      spaceBetween: 8
	    },
	    769: {
	      slidesPerView: 1.5,
	      spaceBetween: 8
	    },
	    992: {
	      slidesPerView: 1,
	      spaceBetween: 0
	    }
	  },
	  thumbs: {
	    swiper: {
	      el: '.ware-slider_secondary',
	      slidesPerView: 6,
	      slideToClickedSlide: true,
	      touchRatio: 1,
	      spaceBetween: 12
	    }
	  }
	});
	Fancybox.bind("[data-fancybox]", {
	  theme: "light",
	  Hash: false,
	  mainStyle: {
	    "--f-toolbar-padding": "0",
	    "--f-button-svg-stroke-width": "1.5",
	    "--f-arrow-svg-stroke-width": "1.75",
	    "--f-thumb-width": "82px",
	    "--f-thumb-height": "82px",
	    "--f-thumb-border-radius": "8px",
	    "--f-thumb-selected-shadow": "inset 0 0 0 2px #fff, 0 0 0 1.5px #004B88"
	  },
	  zoomEffect: false,
	  fadeEffect: true,
	  nextEffect: 'fade',
	  prevEffect: 'fade',
	  hideClass: false,
	  dragToClose: false,
	  Carousel: {
	    Toolbar: {
	      absolute: false,
	      display: {
	        left: [""],
	        middle: [""],
	        right: ["zoomIn", "zoomOut", "close"]
	      }
	    },
	    Thumbs: {
	      type: "classic"
	    }
	  },
	  on: {
	    "Carousel.change": function CarouselChange() {
	      if (wareSliderMainSelector) {
	        wareSliderMain.slideTo(Fancybox.getSlide().index);
	      }
	    }
	  }
	});
	var CasesSliders = document.querySelectorAll('.cases-preview__list');
	CasesSliders.forEach(function (item, index) {
	  window["CasesSliders".concat(index + 1)] = new Swiper(item, {
	    simulateTouch: true,
	    slidesPerGroup: 1,
	    watchOverflow: true,
	    breakpoints: {
	      0: {
	        slidesPerView: 1.3,
	        spaceBetween: 8
	      },
	      769: {
	        slidesPerView: 2.1,
	        spaceBetween: 20
	      },
	      1281: {
	        slidesPerView: 3,
	        spaceBetween: 20
	      }
	    }
	  });
	});

	// Swipers
	new Swiper('.certificates__slider', {
	  modules: [Navigation],
	  slideToClickedSlide: false,
	  slidesPerGroup: 1,
	  watchOverflow: true,
	  autoHeight: false,
	  navigation: {
	    prevEl: '.section__navigation_certificates ._prev',
	    nextEl: '.section__navigation_certificates ._next'
	  },
	  breakpoints: {
	    0: {
	      slidesPerView: 1.2,
	      spaceBetween: 8
	    },
	    576: {
	      slidesPerView: 2.2,
	      spaceBetween: 20
	    },
	    769: {
	      slidesPerView: 2.7,
	      spaceBetween: 20
	    },
	    1025: {
	      slidesPerView: 4,
	      spaceBetween: 20
	    }
	  }
	});
	new Swiper('.reviews__slider', {
	  modules: [Navigation],
	  slideToClickedSlide: false,
	  slidesPerGroup: 1,
	  watchOverflow: true,
	  autoHeight: true,
	  navigation: {
	    prevEl: '.section__navigation_reviews ._prev',
	    nextEl: '.section__navigation_reviews ._next'
	  },
	  breakpoints: {
	    0: {
	      slidesPerView: 1.4,
	      spaceBetween: 8
	    },
	    576: {
	      slidesPerView: 1.6,
	      spaceBetween: 20
	    },
	    769: {
	      slidesPerView: 2.1,
	      spaceBetween: 20
	    },
	    1025: {
	      slidesPerView: 2,
	      spaceBetween: 20
	    }
	  }
	});
	new Swiper('.events__slider', {
	  modules: [Navigation],
	  slideToClickedSlide: false,
	  slidesPerGroup: 1,
	  watchOverflow: true,
	  navigation: {
	    prevEl: '.section__navigation_events ._prev',
	    nextEl: '.section__navigation_events ._next'
	  },
	  breakpoints: {
	    0: {
	      slidesPerView: 1.1,
	      spaceBetween: 8
	    },
	    576: {
	      slidesPerView: 1.1,
	      spaceBetween: 20
	    },
	    769: {
	      slidesPerView: 1.5,
	      spaceBetween: 20
	    },
	    1025: {
	      slidesPerView: 2,
	      spaceBetween: 20
	    }
	  }
	});
	var productsPreviewSliders = document.querySelectorAll('.product-preview__slider');
	productsPreviewSliders.forEach(function (item, index) {
	  window["productsPreviewSliders".concat(index + 1)] = new Swiper(item, {
	    modules: [Navigation],
	    slideToClickedSlide: false,
	    slidesPerGroup: 1,
	    watchOverflow: true,
	    navigation: {
	      prevEl: '.section__navigation_product-preview ._prev',
	      nextEl: '.section__navigation_product-preview ._next'
	    },
	    breakpoints: {
	      0: {
	        slidesPerView: 1.5,
	        spaceBetween: 8
	      },
	      576: {
	        slidesPerView: 2,
	        spaceBetween: 20
	      },
	      992: {
	        slidesPerView: 3,
	        spaceBetween: 20
	      },
	      1281: {
	        slidesPerView: 4,
	        spaceBetween: 20
	      }
	    }
	  });
	});

document.addEventListener('click', function (e) {
	if (e.target.classList.contains('policy-agr-close')) {
		e.target.closest('.policy-warning').setAttribute('style', 'display: none;');
	}
	if (e.target.getAttribute('href') == '#tender') {
		var periodStringList = document.querySelectorAll('.popup-form__period');
		if (periodStringList) {
			if (e.target.closest('.ware-settings')) {
				if (e.target.closest('.ware-settings').querySelector('.ware-settings__value').textContent == 'Цена по запросу') {
					periodStringList.forEach(function (period) {
						period.setAttribute('style', 'display: block;');
					});
				}
			} else if (e.target.closest('.product-preview__description')) {
				if (e.target.closest('.product-preview__description').querySelector('.product-preview__score').textContent == 'Цена по запросу') {
					periodStringList.forEach(function (period) {
						period.setAttribute('style', 'display: block;');
					});
				}
			}
		}
	}
});

var callBeforeunload = function callBeforeunload(e) {
	e.preventDefault();
	takeControlShopPOST();
	return;
};
window.addEventListener('beforeunload', callBeforeunload);
window.removeEventListener('beforeunload', callBeforeunload);

})();
//# sourceMappingURL=main.bundle_v2.js.map
