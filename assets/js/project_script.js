/**
 * Created by Karen on 28.01.2016.
 */
$(document).ready(function() {

    /**
     *
     * */
    $(document).on('click', '#projects_tab, #projects_sub_tab', function() {
        $.ajax({
            url: baseUrl + 'project/getProjects',
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $('#projects-table tbody').html(response);
            }
        });
    });

    /**
     * Create Project
     * */
    $(document).on('click', '#save_project', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + 'project/createProject',
            type: 'post',
            data: $('#create_project_form').serialize(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
                $('#Clear').trigger('click');
            }
        });
    });


    /**
     * Get Description for every project
     * */
    $(document).on('click', '.click-project', function(e) {
        var project_id = $(this).attr('data-id');
        $.ajax({
           url: baseUrl + "project/getDescription",
            type: 'post',
            data: {
                project_id: project_id
            },
            dataType: 'text',
            success: function(response) {
                $("#edit-description input").val(project_id);
                $(document).find('#edit_project_description textarea').val(response);
            }
        });
    });

    /**
     * Edit Description For Every Project
     * */
    $(document).on('click', '#send_edit_desc_project', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + "project/editDescription",
            type: 'post',
            data: $('#edit-description').serialize(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
            }
        });
    });


    /**
     * Change User or Status for project
     * */
    $(document).on('click', '#send_edit_project', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + "project/editProjectUserAndStatus",
            type: 'post',
            data: $('#change_project_user').serialize()+ '&status=' + $('#change_status').val(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
            }
        });
    });

    /**
     * Get Users list to attach
     * */
    $(document).on('click', '#open_user_list', function() {
        $.ajax({
            url: baseUrl + 'workers/getWorkersList',
            type: 'get',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#attach_user').html(response);
            }
        });
    });
});
