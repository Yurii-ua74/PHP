// console.log("Script works");

document.addEventListener('DOMContentLoaded', () => {
 // пошук кнопки автентифікації
 const authButton = document.getElementById("auth-button");
 if(authButton) {authButton.onclick = authButtonClick;}   
 // налаштування модальніх вікон
 var elems = document.querySelectorAll('.modal');
 M.Modal.init(elems, {
"opacity":		    0.5,  //    Opacity of the modal overlay.
"inDuration":		250,  //	Transition in duration in milliseconds.
"outDuration":		250,  //	Transition out duration in milliseconds.
"onOpenStart":		null, //	Callback function called before modal is opened.
"onOpenEnd":		null, //	Callback function called after modal is opened.
"onCloseStart":		null, //	Callback function called before modal is closed.
"onCloseEnd	Function":	null, //	Callback function called after modal is closed.
"preventScrolling":		true, //	Prevent page from scrolling while modal is open.
"dismissible":		true,     //	Allow modal to be dismissed by keyboard or overlay click.
"startingTop":	    '4%',     //	Starting top offset
"endingTop":	    '10%',    //	Ending top offset
 });
});

function authButtonClick(e) {
    const emailInput = document.querySelector('input[name="auth-email"]');
    if( ! emailInput ) { throw "'auth-email' not found" ; }
    const passwordInput = document.querySelector('input[name="auth-password"]');
    if( ! passwordInput ) { throw "'auth-password' not found" ; }
    
    // console.log( emailInput.value, passwordInput.value ) ;
    fetch(`/auth?email=${emailInput.value}&password=${passwordInput.value}`, {
        method: 'PATCH'
    })
    .then( r => r.json() )
    .then( console.log ) ; 
}

// $.ajax({
//     url: 'your_server_endpoint.php',
//     method: 'POST', // or 'GET' depending on your server-side implementation
//     data: {
//         email: 'user@example.com',
//         password: 'user_password'
//     },
//     success: function(response) {
//         // Log the response to the console
//         console.log(response);

//         // Handle the response from the server
//         if (response && response.data && response.data.authenticated) {
//             // Update the modal content
//             $('#auth-button').text('ВИХІД');
            
//             // Construct the full path to the avatar file
//             var avatarFilePath = 'wwwroot/emg/' + response.data.avatar;
            
//             // Display the user avatar in the modal
//             $('#user-avatar').attr('src', avatarFilePath);
//             $('#user-avatar-container').show();
//         }
//     },
//     error: function(error) {
//         console.error('Error:', error);
//     }
// });
