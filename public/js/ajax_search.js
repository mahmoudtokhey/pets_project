$(document).ready(function () {
    // ---------------- Search By Name ----------------
    $(document).on("input", "#search_by_text", function (e) {
        // call "search function"
        make_search();
    });
    // =============== Search Function ===============
    function make_search()
    {
        // search By Name
        var search_by_text = $("#search_by_text").val();
        // search token
        var token_search = $("#token_search").val();
        // search url
        var ajax_search_url = $("#ajax_search_url").val();
        // ajax request
        jQuery.ajax({
            url: ajax_search_url,
            type: "post",
            dataType: "html",
            cache: false,
            data:{search_by_text:search_by_text,_token:token_search},
            success: function (data)
            {
                console.log(data);
                $("#ajax_responce_serarchDiv").html(data);
            },
            error: function () {},
        });
    }
});
