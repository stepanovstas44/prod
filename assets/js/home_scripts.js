$(document).ready(function() {
    /**
     * Created by Karen on 22.01.2016.
     */
    $('.nav-tabs-dropdown').each(function(i, elm) {

        $(elm).text($(elm).next('ul').find('li.active a').text());

    });

    $('.nav-tabs-dropdown').on('click', function(e) {

        e.preventDefault();

        $(e.target).toggleClass('open').next('ul').slideToggle();

    });

    $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {

        e.preventDefault();

        $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());

    });


    /**
     * The All Users Showing JS file
     * */
    $(document).ready(function(){
        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });

        $("[data-toggle=tooltip]").tooltip();
    });
    /**
     * End of File
     * */




    /**
     *   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables
     *   but will likely encounter performance issues on larger tables.
     *
     *		<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
     *		$(input-element).filterTable()
     *
     *	The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
     */
    (function(){
        'use strict';
        var $ = jQuery;
        $.fn.extend({
            filterTable: function(){
                return this.each(function(){
                    $(this).on('keyup', function(e){
                        $('.filterTable_no_results').remove();
                        var $this = $(this),
                            search = $this.val().toLowerCase(),
                            target = $this.attr('data-filters'),
                            $target = $(target),
                            $rows = $target.find('tbody tr');

                        if(search == '') {
                            $rows.show();
                        } else {
                            $rows.each(function(){
                                var $this = $(this);
                                $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                            })
                            if($target.find('tbody tr:visible').size() === 0) {
                                var col_count = $target.find('tr').first().find('td').size();
                                var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
                                $target.find('tbody').append(no_results);
                            }
                        }
                    });
                });
            }
        });
        $('[data-action="filter"]').filterTable();
    })(jQuery);

    $(function(){
        // attach table filter plugin to inputs
        $('[data-action="filter"]').filterTable();

        $('.container').on('click', '.panel-heading span.filter', function(e){
            var $this = $(this),
                $panel = $this.parents('.panel');

            $panel.find('.panel-body').slideToggle();
            if($this.css('display') != 'none') {
                $panel.find('.panel-body input').focus();
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
});

$(document).on('click', '#Clear',function(e) {
    e.preventDefault();
    clear();
});

function clear() {
    $(document).find('input').val('');
    $(document).find('textarea').val('');
};

















