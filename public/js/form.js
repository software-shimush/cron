/* globals type */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    const howOften = $("#howOften");
    const often = $("input:radio[name='interval']");
    const howMany = $("#howMany");
    howOften.hide();

    switch (type) {
        case "text":
            typeInput.append(`<label for="destination">Recipient Number</label>
                    <input type="text" class="form-control" id="destination" placeholder="Enter Recipient Number" name="destination">`);
            break;
        case "email":
            typeInput.append(`<label for="destination">Recipient Email</label>
                    <input type="email" class="form-control" id="destination" placeholder="Enter Recipient Email" name="destination">`);
            break;
        case "post":
            typeInput.append(`<label for="destination">Url</label>
                    <input type="url" class="form-control" id="destination" placeholder="Enter A Valid Url" name="destination">`);
    }

    often.change(() => {
        let oftenSelected = $("input:radio[name='interval']:checked").val();
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
