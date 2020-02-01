$('.article-show').on('click', function (event) {
    event.preventDefault();

    let id = $(this).data('id');

    let linkURL = $(this).attr('href');

    $.ajax({
        url: linkURL,
        datatype: 'html',
        data: {id: id},
        type: 'GET',
        success: function (data) {
            $('#content-row').html(data);
        },
        error: function () {
            alert('Ошибка Ajax!');
        }
    });
});

$('.article-create').on('click', function (event) {
    event.preventDefault();

    let linkURL = $(this).attr('href');

    $.ajax({
        url: linkURL,
        datatype: 'html',
        type: 'GET',
        success: function (data) {
            $('#content-row').html(data);
            $('#content-row').css('display', 'block');
        },
        error: function () {
            alert('Ошибка Ajax!');
        }
    });
});


