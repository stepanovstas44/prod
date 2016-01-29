/**
 * Created by Karen on 23.01.2016.
 */

$(document).ready(function() {
    $(document).on('click', '.set_hash', function() {
        //setHash('home/test1');
    });

    /**
     * Load roles from db
     * */
    $(document).on('click', '#roles_tab, #roles_sub_tab', function(e) {
        $.ajax({
            url: baseUrl + 'roles/getRoles',
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('.waiting').hide();
                $(document).find('#roles_table tbody').html(response);
            }
        });
    });

    /**
     * Open modal for edit role
     * */
    $(document).on('click', 'button[id^="role-"]', function() {
        var self = $(this).attr('data-id');
        $.ajax({
            url: baseUrl + 'roles/getModalContent/'+self,
            type: 'post',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#edit_role .modal-dialog').html(response);
            }
        });
    });

    /**
     * Update Role
     * */
    $(document).on('click', '#update_role_button', function() {
        var role = $(document).find('#role_name_field').val();
        var id = $(document).find('#role_name_field').attr('data-id');
        $.ajax({
            url: baseUrl + 'roles/updateRole',
            type: 'post',
            data: {
                role: role,
                id: id
            },
            dataType: 'json',
            success: function(response) {
                showMessage(response.status,response.message);
            }
        });
    });

    /**
     * Delete Role
     * */
    $(document).on('click', '.delete_role', function(e) {
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
     * Create Role and add it on dashboard
     * */
    $(document).on('click', '#save_role', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + 'roles/createRole',
            type: 'post',
            data: $('#role_form').serialize(),
            dataType: 'json'
        }).done(function(response) {
            showMessage(response.status,response.message);
        });
    });
});
