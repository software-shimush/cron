/* globals type, destination */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    const howOften = $("#howOften");
    const radioButton = $("input:radio[name='intervalType']");
    const howMany = $("#howMany");

    const theDestination =
        typeof destination !== "undefined" ? destination : "";
    howOften.hide();

    switch (type) {
        case "text":
            typeInput.append(`<label for="number">Recipient Number</label>
                    <input type="text" class="form-control" id="number" placeholder="Enter Recipient Number" name="number" value=${theDestination}>
                    `);
            break;
        case "email":
            typeInput.append(`<label for="email">Recipient Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Recipient Email" name="email" value=${theDestination}>
                    `);
            break;
        case "post":
            typeInput.append(`<label for="url">Url</label>
                    <input type="url" class="form-control" id="url" placeholder="Enter A Valid Url" name="url" value=${theDestination}>
                    `);
    }

    radioButton.change(() => {
        let oftenSelected = $("input:radio[name='intervalType']:checked").val();
        switch (oftenSelected) {
            case "daily":
                howMany.text("Every How Many Days");
                break;
            case "hourly":
                howMany.text("Every How Many Hours");
                break;
            case "min":
                howMany.text("Every How Many Minutes");
                break;
        }
        howOften.show();
    });
})();
