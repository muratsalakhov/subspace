$(document).ready(function() {
    function trackerBindEvents(trackerItem) {
        const trackerCheckboxes = trackerItem.querySelectorAll('.tracker-checkbox');
        const trackerTitle = trackerItem.querySelector('.tracker-item-name');

        for (let checkbox of trackerCheckboxes) {
            checkbox.addEventListener('change', checkTrackerItem);
        }
        trackerTitle.addEventListener('change', saveTrackerItem);
    }

    function saveTrackerItem() {
        // ОСТАНОВИЛСЯ ЗДЕСЬ, НУЖНО КАК-ТО ОПРЕДЕЛЯТЬ КАКУЮ ЗАПИСЬ ОБНОВЛЯТЬ
        trackId = this.parentNode.querySelector('.hide').innerText;
        trackerTitle = this.value;
        $.ajax({
            url: 'tracker-processing.php',
            type: 'POST',
            cache: false,
            data: { 'tracker_id' : trackId, 'tracker_title' : trackerTitle},
            dataType: 'html',
            success: function(data){
                //alert(data);
            }
        });
    }

    function checkTrackerItem() {
        const trackerCheckbox = this;
        const trackerCheckboxName = this.classList.item(1);
        const trackerTitle = this.parentNode.querySelector('.tracker-item-name').value;
        var checkbox_status;

        if (trackerCheckbox.checked) {
            checkbox_status = 1;
        } else {
            checkbox_status = 0;
        }

        $.ajax({
            url: 'tracker-processing.php',
            type: 'POST',
            cache: false,
            data: {'tracker_checkbox': trackerCheckboxName, 'tracker_check_status' : checkbox_status, 'tracker_title' : trackerTitle},
            dataType: 'html',
            success: function(data){
                //alert(data);
            }
        });
    }


    const trackerItems = document.querySelectorAll('.tracker-widget-item');

    function main() {
        trackerItems.forEach(item => trackerBindEvents(item));
    }

    main();

});