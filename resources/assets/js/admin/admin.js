// 加键盘控制提交
$('[name=tagname]').on('keydown', function(e) {
    if (e.keyCode == 13) {
        $('#addTag').trigger('click');
    }
});
// 创建标签
$('#addTag').on('click', function() {
    var tagname = $('[name=tagname]').val();
    if (tagname == '') {
        $('#tagTip').modal('show');
    } else {
        $.post('/admin/tag', {
                name: tagname,
                _token: Laravel.csrfToken
            })
            .done(function(res) {
                alert(res.msg);
                location.reload();
            })
            .fail(function(res) {
                if (res.status == 422) {
                    var responseText = $.parseJSON(res.responseText)
                    var firstError;
                    for (firstError in responseText) break;
                    var msg = responseText[firstError];
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
$('.js-delete').on('click', function() {
    var that = $(this),
        tagID = that.attr('data-tag-id');
    $.post('/admin/tag/' + tagID, {
            _token: Laravel.csrfToken,
            _method: 'DELETE'
        })
        .done(function(res) {
            if (res.status == 'success') {
                alert(res.msg);
                that.closest('tr').remove();
            }
        })
        .fail(function() {
            alert('删除标签失败');
        });
});
// 编辑标签
$('.js-edit').on('click', function() {
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
    editeName.on('keydown', function(e) {
        if (e.keyCode == 13) {
            $('#submitEdit').trigger('click');
        }
    });
    $('#submitEdit').off();
    $('#submitEdit').on('click', function() {
        var newTagName = editeName.val();
        if (newTagName == '') {
            $('#tagTip').modal('show');
        } else {
            $.post('/admin/tag/' + tagID, {
                    name: newTagName,
                    _token: Laravel.csrfToken,
                    _method: 'PUT'
                })
                .done(function(res) {
                    if (res.status == 'success') {
                        alert(res.msg);
                        location.reload();
                    }
                })
                .fail(function() {
                    alert('标签更新失败');
                });
        }
    })
});