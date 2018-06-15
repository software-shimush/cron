/* globals type */
(function() {
    "use strict";

    const typeInput = $("#typeInput");
    const howOften = $("#howOften");
    const often = $("input:radio[name='interval']");

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

        howOften.append(`
            <div class="form-row justify-content-md-center">
                <div class="form-group col-sm-2">
                    <label for="startTime">Start Time</label>
                    <input type="time" class="form-control" id="startTime" name="startTime">
                </div>
        `);
        switch (oftenSelected) {
            case "daily":
                howOften.append(`
                <div class="form-group col-sm-2">
                    <label for="intHour">Every How Many Days?</label>
                    <input type="number" class="form-control" id="intHour" name="intDays">
                </div>
            </div>
            `);
                break;
            case "hourly":
                howOften.append(`
                <div class="form-group col-sm-2">
                    <label for="intHour">Every How Many Hours?</label>
                    <input type="number" class="form-control" id="intHour" name="intDays">
                </div>
            </div>
        `);
                break;
            case "min":
                howOften.append(`
                <div class="form-group col-sm-2">
                    <label for="intHour">Every How Many Minutes?</label>
                    <input type="number" class="form-control" id="intHour" name="intDays">
                </div>
            </div>
        `);
                break;
        }
    });
})();
