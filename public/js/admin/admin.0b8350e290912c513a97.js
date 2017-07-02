/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/admin/admin.js":
/***/ (function(module, exports) {

// 加键盘控制提交
$('[name=tagname]').on('keydown', function (e) {
    if (e.keyCode == 13) {
        $('#addTag').trigger('click');
    }
});
// 创建标签
$('#addTag').on('click', function () {
    var tagname = $('[name=tagname]').val();
    if (tagname == '') {
        $('#tagTip').modal('show');
    } else {
        $.post('/admin/tag', {
            name: tagname,
            _token: Laravel.csrfToken
        }).done(function (res) {
            alert(res.msg);
            location.reload();
        }).fail(function (res) {
            if (res.status == 422) {
                var responseText = $.parseJSON(res.responseText);
                var firstError;
                for (firstError in responseText) {
                    break;
                }var msg = responseText[firstError];
                alert(msg);
            } else if (res.status == 500) {
                alert(res.statusText);
            } else {
                alert('创建标签失败');
            }
        });
        $('[name=tagname]').val('');
    }
});
// 删除标签
$('.js-delete').on('click', function () {
    var that = $(this),
        tagID = that.attr('data-tag-id');
    $.post('/admin/tag/' + tagID, {
        _token: Laravel.csrfToken,
        _method: 'DELETE'
    }).done(function (res) {
        if (res.status == 'success') {
            alert(res.msg);
            that.closest('tr').remove();
        }
    }).fail(function () {
        alert('删除标签失败');
    });
});
// 删除文章
$('.js-delete-post').on('click', function () {
    var that = $(this),
        tagID = that.attr('data-post-id');
    $.post('/admin/article/' + tagID, {
        _token: Laravel.csrfToken,
        _method: 'DELETE'
    }).done(function (res) {
        if (res.status == 'success') {
            alert(res.msg);
            that.closest('tr').remove();
        }
    }).fail(function () {
        alert('删除文章失败');
    });
});
// 编辑标签
$('.js-edit').on('click', function () {
    var that = $(this),
        tagName = that.attr('data-tag-name'),
        tagID = that.attr('data-tag-id');
    $('#editeModal').modal('show');
    $('#editeID').val(tagID);
    var editeName = $('#editeName');
    editeName.val(tagName);
    editeName.focus();
    // 加键盘控制提交
    editeName.off();
    editeName.on('keydown', function (e) {
        if (e.keyCode == 13) {
            $('#submitEdit').trigger('click');
        }
    });
    $('#submitEdit').off();
    $('#submitEdit').on('click', function () {
        var newTagName = editeName.val();
        if (newTagName == '') {
            $('#tagTip').modal('show');
        } else {
            $.post('/admin/tag/' + tagID, {
                name: newTagName,
                _token: Laravel.csrfToken,
                _method: 'PUT'
            }).done(function (res) {
                if (res.status == 'success') {
                    alert(res.msg);
                    location.reload();
                }
            }).fail(function () {
                alert('标签更新失败');
            });
        }
    });
});

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/admin/admin.js");


/***/ })

/******/ });