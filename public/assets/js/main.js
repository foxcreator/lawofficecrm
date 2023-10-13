$(function () {
    $('table td').each(function () {
        var cell = $(this);
        if (cell[0].scrollWidth > cell[0].clientWidth) {
            cell.popover({
                placement: 'top',
                trigger: 'hover',
                content: cell.text(),
            });
        }
    });
});
