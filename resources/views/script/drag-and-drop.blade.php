<script>
    $('.tasks-list').change(function () {
        $('.tasks-list').map(function () {
            var status = $(this).prev().text();
            var i = $(this).children('li');
            i.map(function () {
                if ($(this).children('.status').text() !== status) {
                    $(this).children('.status').text(status);
                    console.log(status);
                    $.ajax({
                        url: $(location).attr('href')+ 'api/tasks/' + $(this).attr('data-task-id'),
                        method: 'PUT',
                        data: {
                            status : status
                        }
                    });
                }
            });
        });
    });
</script>
