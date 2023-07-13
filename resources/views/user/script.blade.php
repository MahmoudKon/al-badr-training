
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var page = 1;
var isLoading = false;

function loadData() {
    if (isLoading) {
        return;
    }

    isLoading = true;

    $.ajax({
        url: '/your-endpoint/' + page,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var data = response.data;
            var content = '';

            if (data.length > 0) {
                data.forEach(function(item) {
                    // Append the item to the content
                    content += '<div>' + item.name + '</div>';
                });

                $('#content').append(content);
                page++;
            }

            isLoading = false;
        }
    });
}

$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
        loadData();
    }
});

$(document).ready(function() {
    loadData();
});
</script>

