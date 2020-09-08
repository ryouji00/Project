/* staffinformation */
//for search filter
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tablefortoday tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
$('.popover-dismiss').popover({
    trigger: 'focus'
})