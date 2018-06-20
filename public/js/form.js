/* globals type, destination */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    const howOften = $("#howOften");
    const radioButton = $("input:radio[name='intervalType']");
    const howMany = $("#howMany");
<<<<<<< HEAD
    const theDestination =
        typeof destination !== "undefined" ? destination : "";
=======
    var destination = destination || "";
>>>>>>> f3fdca1058f5ec8d8ea654b9b50e98830c450428
    howOften.hide();

    switch (type) {
        case "text":
            typeInput.append(`<label for="number">Recipient Number</label>
<<<<<<< HEAD
                    <input type="text" class="form-control" id="number" placeholder="Enter Recipient Number" name="number" value=${theDestination}>
=======
                    <input type="text" class="form-control" id="number" placeholder="Enter Recipient Number" name="number" value=${destination}>
>>>>>>> f3fdca1058f5ec8d8ea654b9b50e98830c450428
                    `);
            break;
        case "email":
            typeInput.append(`<label for="email">Recipient Email</label>
<<<<<<< HEAD
                    <input type="email" class="form-control" id="email" placeholder="Enter Recipient Email" name="email" value=${theDestination}>
=======
                    <input type="email" class="form-control" id="email" placeholder="Enter Recipient Email" name="email" value=${destination}>
>>>>>>> f3fdca1058f5ec8d8ea654b9b50e98830c450428
                    `);
            break;
        case "post":
            typeInput.append(`<label for="url">Url</label>
<<<<<<< HEAD
                    <input type="url" class="form-control" id="url" placeholder="Enter A Valid Url" name="url" value=${theDestination}>
=======
                    <input type="url" class="form-control" id="url" placeholder="Enter A Valid Url" name="url" value=${destination}>
>>>>>>> f3fdca1058f5ec8d8ea654b9b50e98830c450428
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
