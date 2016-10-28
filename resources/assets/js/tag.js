function escapeHtml(string) {
    var entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': '&quot;',
        "'": '&#39;',
        "/": '&#x2F;'
    };
    return String(string).replace(/[&<>"'\/]/g, function (s) {
        return entityMap[s];
    });
}

$(document).ready(function () {

    url = '/tag';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#task input[name="_token"]').val()
        }
    });

    $('#add').click(function () {
        $('#myModal').modal('show');
    });

    $('#tsave').click(function () {
        var data = {
            name: $('#tname').val()
        };
        turl = url;
        console.log('save url:' + turl);
        console.log(data);

        $.ajax({
            type: "POST",
            url: turl,
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#myModal').modal('hide');
                $('#task').trigger('reset');
                var task = '<option id="tag" value="'+ data.id +'" selected="selected">'+escapeHtml(data.name)+'</option>';
                console.log(task);
                $('#task-list').append(task);
                toastr.success('添加成功！');
            },
            error: function (data, json, errorThrown) {
                console.log(data);
                $('#debug').html(data.responseText);

                var errors = data.responseJSON;
                var errorsHtml = '';
                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>';
                });
                toastr.error(errorsHtml, "Error " + data.status + ': ' + errorThrown);
            }
        });

    });

    $(".addIntro").click(function(){
      $(".intro_detaile").eq(0).addClass("intro_detail_hide");
      $(".intro_detaile").eq(1).removeClass("intro_detail_hide");
      $(".cancel_btn").click(function(){
        $(".intro_detaile").eq(0).removeClass("intro_detail_hide");
        $(".intro_detaile").eq(1).addClass("intro_detail_hide");
      });
    });

});
