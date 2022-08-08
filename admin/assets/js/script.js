'use strict';

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll('.alert')
alertList.forEach(function(alert) {
    new bootstrap.Alert(alert)
});


/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler');
const sidePanel = document.getElementById('app-sidepanel');
const sidePanelDrop = document.getElementById('sidepanel-drop');
const sidePanelClose = document.getElementById('sidepanel-close');
const notification = document.getElementById('notification');
const count = document.getElementById('count');
const dropdown = document.getElementById('notifications-dropdown-toggle')


window.addEventListener('load', function() {
    responsiveSidePanel();
});

window.addEventListener('resize', function() {
    responsiveSidePanel();
});


function responsiveSidePanel() {
    let w = window.innerWidth;
    if (w >= 1200) {
        // if larger 
        //console.log('larger');
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');

    } else {
        // if smaller
        //console.log('smaller');
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');
    }
};

sidePanelToggler.addEventListener('click', () => {
    if (sidePanel.classList.contains('sidepanel-visible')) {
        console.log('visible');
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');

    } else {
        console.log('hidden');
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');
    }
});



sidePanelClose.addEventListener('click', (e) => {
    e.preventDefault();
    sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
    sidePanelToggler.click();
});

/* ===== Toast initialisation ====== */
var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function(toastEl) {
    var ele = new bootstrap.Toast(toastEl);
    setTimeout(function() {
        toastEl.className = toastEl.className.replace("show", "");
    }, 5000);
    return ele;
});

/* ===== Example starter JavaScript for disabling form submissions if there are invalid fields ===== */
window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('form-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');

            var inputs = Array.from(form.elements)

            inputs.forEach(input => {
                //console.log(input);
                //console.log(input.nextElementSibling);
                //console.log(input.validationMessage);
                if (input.name == "mdpConfirm" && input.checkValidity()) {
                    var value = document.getElementById("mdp").value;
                    console.log(value);
                    console.log(input.value);
                    console.log(input.value != value);

                    if (input.value != value) {
                        event.preventDefault();
                        event.stopPropagation();
                        input.classList.add("is-invalid");
                        input.nextElementSibling.innerHTML = "les mots de passe ne sont pas identiques";
                    } else {
                        input.classList.add("is-valid");
                        input.nextElementSibling.innerHTML = "";

                    }
                }
                if (!input.checkValidity() && input.nextElementSibling) {
                    input.nextElementSibling.innerHTML = input.validationMessage;
                }
            })
        }, false);
    });
}, false);

/* ===== ajax call to update notification in real time ===== */
/* ===== credit https://www.cloudways.com/blog/real-time-php-notification-system/ ===== */


dropdown.addEventListener('click', (e) => {
    e.preventDefault();
    load_unseen_notification('yes');

});

function load_unseen_notification(view = '') {
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'json';

    xhr.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            var jsonResponse = this.response;
            console.log(jsonResponse);
            notification.innerHTML = jsonResponse['notification'];
            if (jsonResponse['count_notification'] != 0) {
                count.classList.remove('invisible')
                count.innerHTML = jsonResponse['count_notification'];
            } else {
                count.classList.add('invisible');
            }
        }

    }

    var data = "view=" + view;
    xhr.open("POST", "/projet-agence/admin/reservation/notification.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}

load_unseen_notification();
setInterval(function() {
    load_unseen_notification();
}, 10000);