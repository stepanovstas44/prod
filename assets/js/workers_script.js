/**
 * Created by Karen on 26.01.2016.
 */
$(document).ready(function() {

    /**
     * Open team creator
     * */
    $(document).find('#role_id').change(function() {
        var val = $(this).find('option:selected').attr('data-key');
        if(val == 3) {
            $.ajax({
                url: baseUrl + 'workers/getTeamLeads',
                method: 'post',
                data: {},
                dataType: 'html',
                success: function(response) {
                    $(document).find('#team_id').html(response);
                    $(document).find('#team_id').fadeIn();
                }
            });
        } else {
            $(document).find('#team_id').fadeOut();
        }
    });

    /**
     * Open team creator for modal
     * */
    $(document).on('change', '#edit_role_id', function() {
        var val = $(this).find('option:selected').attr('data-key');
        if(val == 3) {
            $.ajax({
                url: baseUrl + 'workers/getTeamLeads',
                method: 'post',
                data: {},
                dataType: 'html',
                success: function(response) {
                    $(document).find('#edit_team_id').html(response);
                    $(document).find('#edit_team_id').fadeIn();
                }
            });
        } else {
            $(document).find('#edit_team_id').fadeOut();
        }
    });

    /**
     * Create User
     * */
    $(document).on('click', '#save_user', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + "workers/createWorker",
            type: 'post',
            data: $(document).find('#user_form').serialize(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
                clear();
            }
        });
    });

    /**
     * Load Workers from db
     * */
    $(document).on('click', '#workers_tab, #workers_sub_tab', function(e) {
        $.ajax({
            url: baseUrl + 'workers/getWorkers',
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('.waiting').hide();
                $(document).find('#workers_table tbody').html(response);
            }
        });
    });

    /**
     * Delete worker
     * */
    $(document).on('click', '.delete_worker', function(e) {
        e.preventDefault();
        var self = $(this);
        var url = $(this).attr('href');
        $.ajax({
            url: baseUrl + url,
            type: 'post',
            data: {},
            dataType: 'json',
            success: function(response) {
                showMessage(response.status,response.message);
                self.closest('tr').remove();
            }
        });
    });


    /**
     *  Load team leaders in table
     * */
    $(document).on('click', '#team_leaders_sub', function() {
        $.ajax({
            url: baseUrl + 'workers/getTeamLeadsForWorkers',
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#leads_table tbody').html(response);
            }
        });
    });

    /**
     *  Load team workers
     * */
    $(document).on('click', '.hover', function(e) {
        var self = $(this);
        var self_id = self.attr('data-id');
        $.ajax({
            url: baseUrl + 'workers/getWorkersForTeamLead/' + self_id,
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#workers-table tbody').html(response);
            }
        });
    });

    /**
     *  Load worker info for edit modal
     * */
    $(document).on('click', '.edit_worker', function(e) {
        var self = $(this);
        var self_id = self.attr('data-id');
        $.ajax({
            url: baseUrl + 'workers/getWorkerInfoEdit/' + self_id,
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#edit_worker_modal .modal-body').html(response);
            }
        });
    });

    $(document).on('click', '#edit_user', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + 'workers/editUserInfo',
            type: 'post',
            data: $("#user_edit_form").serialize(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
                console.log(response);
            }
        });

    });

});


















