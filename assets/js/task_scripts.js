/**
 * Created by Karen on 29.01.2016.
 */
$(document).ready(function() {

    /**
     * Get projects to attach to task
     * */
    $(document).on('click', '#open_projects_list', function() {
        $.ajax({
            url: baseUrl + 'project/getProjects/true',
            type: 'get',
            data: {},
            dataType: 'html',
            success: function(response) {
                $("#attach_project_to_task").html(response);
            }

        })
    });

    /**
     * Get Users to attach to task
     * */
    $(document).on('click', '#open_users_list_task', function() {
        $.ajax({
            url: baseUrl + 'workers/getWorkersList',
            type: 'get',
            data: {},
            dataType: 'html',
            success: function(response) {
                $("#attach_user_to_task").html(response);
            }

        })
    });

    /**
     * Create Task
     * */
    $(document).on('click', '#save_task', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + 'task/createTask',
            type: 'post',
            data: $('#create_task_form').serialize(),
            dataType: 'json',
            success: function(response) {
                showMessage(response.status, response.message);
            }

        })
    });

    /**
     * Get all tasks
     * */
    $(document).on('click', '#tasks_sub_tab', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + 'task/getTasks',
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $('#task-table tbody').html(response);
            }

        })
    });
});

