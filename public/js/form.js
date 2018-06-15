/* globals type */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    console.log(type);
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
})();
