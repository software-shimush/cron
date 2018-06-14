(function() {
    "use strict";
    const form = $("#form");

    form.submit(event => {
        event.preventDefault();
        const id = $("#id").val();
        $.ajax({
            type: "DELETE",
            url: `/text/${id}`,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: success => {
                console.log(success);
            }
        });
        console.log(id);
    });
})();
