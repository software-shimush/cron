/* globals type, destination, update */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    const howOften = $("#howOften");
    const radioButton = $("input:radio[name='intervalType']");
    const howMany = $("#howMany");
    const msg = $("#msg");

    const theDestination = update ? destination : "";
    // typeof destination !== "undefined" ? destination : "";
    if (!update) {
        howOften.hide();
    }

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
            if (!update) {
                email();
            } else {
                $("#updateParam").click(() => {
                    email();
                    $("#updateParam").hide();
                });
            }
            break;
        case "post":
            typeInput.append(`<label for="url">Url</label>
                    <input type="url" class="form-control" id="url" placeholder="Enter A Valid Url" name="url" value=${theDestination}>
                    `);
            msg.empty();
            if (!update) {
                addParams();
            } else {
                $("#updateParam").click(() => {
                    addParams();
                    $("#updateParam").hide();
                });
            }
            break;
    }

    radioButton.change(() => {
        $("#intervalInput").val("");
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

    function addParams() {
        $(
            '<button type="button" class="btn btn-secondary btn-sm" id="btn">New Key</button>'
        )
            .insertAfter(msg)
            .click(payload);
        payload();
    }

    function payload() {
        for (let i = 0; i < 4; i++) {
            msg.append(`
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Key Value</span>
                    </div>
                    <input type="text" class="form-control" name="key[]">
                    <input type="text" class="form-control" name="value[]"> 
                </div>
            `);
        }
    }

    function email() {
        msg.append(`
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Subject</span>
                </div>
                <input type="text" class="form-control" name="emailParams[]" value="">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cc</span>
                </div>
                <input type="email" class="form-control" name="emailParams[]" value="">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Bcc</span>
                </div>
                <input type="email" class="form-control" name="emailParams[]" value="">
            </div>
        `);
    }
})();
