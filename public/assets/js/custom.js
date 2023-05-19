$(".btn-delete").click(function() {
    var id = $(this).attr('data-id');
    var result = confirm("Are you sure delete?");
    if(result) {
        $("#delete_"+id).submit();
    }
});

function prepareUrl(key, value) {
    const urlParams = new URLSearchParams(window.location.search);
    
    urlParams.set(key, value);
    let main_url = window.location.href.split('?')[0];
    main_url += "?" + urlParams.toString();
    if (key == "status" || key == "page") {
        window.location.href = main_url;
    }
    changeUrl(main_url);
    fetchData(main_url);
}

function fetchData(url) {
    $.ajax({
        type: 'Get',
        url: url,
        data: { type: 'ajax' },
        success: function(data) {

        }
    });
}

function changeUrl(url) {
    window.history.pushState('', '', url);
}