/**
 * Created by Karen on 23.01.2016.
 */

//checkHash();

function setHash(hashParam) {
    if (hashParam) {
        location.hash = hashParam;
    }
}

function checkHash() {
    var action = getHash();

    if(action.trim()) {

        $.ajax({
            url: baseUrl+action,
            type: 'get',
            data: {},
            dataType: 'html',
            success: function(response) {
                $(document).find('#refresh_url').html(response);
            }
        });
    }
}

function getHash() {
    var par = location.hash.trim();
    return par.slice(1);
}

/**
 * Show status messages
 * */
function showMessage(status, message) {
    if (status) {
        var str = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" id="close_status_message"><span aria-hidden="true">&times;</span></button><strong>Success!'+ message +'</strong></div>';
    } else {
        var str = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" id="close_status_message"><span aria-hidden="true">&times;</span></button><strong>Error!'+ message +'</strong></div>';
    }
    $(document).find('#status_1').html(str);
    $(document).find('#status_message').trigger('click');
};



function closeMessage() {
    $(document).on('click', '#close_status_message', function() {
        $(document).find('#status_message').trigger('click');
    });
}
closeMessage();
