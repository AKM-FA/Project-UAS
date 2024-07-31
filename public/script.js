
document.addEventListener('DOMContentLoaded', function() {
    // Function to show the registration pop-up
    function showRegistrationPopup() {
        // Create a div element for the pop-up
        var popup = document.createElement('div');
        popup.classList.add('popup');

        // Create a form inside the pop-up
        var form = document.createElement('form');
        form.classList.add('popup-form');

        // Create a close button
        var closeButton = document.createElement('button');
        closeButton.classList.add('popup-close-button');
        closeButton.innerHTML = '&times;'; // Close icon (X)

        // Create a text input for email address
        var emailInput = document.createElement('input');
        emailInput.setAttribute('type', 'email');
        emailInput.setAttribute('placeholder', 'Enter your email address');
        emailInput.required = true;

        // Create a submit button
        var submitButton = document.createElement('button');
        submitButton.textContent = 'Submit';

        // Append input, buttons, and form to the pop-up
        form.appendChild(closeButton);
        form.appendChild(emailInput);
        form.appendChild(submitButton);
        popup.appendChild(form);

        // Append the pop-up to the body
        document.body.appendChild(popup);

        // Prevent scrolling when the pop-up is open
        document.body.style.overflow = 'hidden';

        // Close the pop-up when the close button is clicked
        closeButton.addEventListener('click', closeRegistrationPopup);

        // Close the pop-up when the submit button is clicked
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            var emailAddress = emailInput.value;
            console.log('Email address:', emailAddress); // You can do something with the email address here
            closeRegistrationPopup();
        });
    }

    // Function to close the registration pop-up
    function closeRegistrationPopup() {
        var popup = document.querySelector('.popup');
        if (popup) {
            popup.remove(); // Remove the pop-up from the DOM
            document.body.style.overflow = ''; // Enable scrolling
        }
    }

    // Add event listener to the Registrasi button to show the pop-up
    var registrasiButton = document.querySelector('.button-secondary.button');
    if (registrasiButton) {
        registrasiButton.addEventListener('click', showRegistrationPopup);
    }

    var registrasiButton = document.querySelector('.button.button-transparent');
    if (registrasiButton) {
        registrasiButton.addEventListener('click', showRegistrationPopup);
    }

    var registrasiButton = document.querySelector('.home-button08.button.button-transparent');
    if (registrasiButton) {
        registrasiButton.addEventListener('click', showRegistrationPopup);
    }
});

 document.addEventListener('DOMContentLoaded', function() {
        // Function to show the poster image in fullscreen
        function showFullscreenPoster() {
            // Create a div for the fullscreen image
            var fullscreenContainer = document.createElement('div');
            fullscreenContainer.classList.add('fullscreen-image');

            // Create an image element inside the fullscreen container
            var fullscreenImage = document.createElement('img');
            fullscreenImage.src = 'poster.jpg'; // Replace 'poster.jpg' with the actual URL of your poster image
            fullscreenImage.alt = 'Poster Image';

            // Append the image to the fullscreen container
            fullscreenContainer.appendChild(fullscreenImage);

            // Append the fullscreen container to the body
            document.body.appendChild(fullscreenContainer);

            // Close the fullscreen image when clicked
            fullscreenContainer.addEventListener('click', function() {
                fullscreenContainer.remove(); // Remove the fullscreen container from the DOM
            });
        }

        // Add event listener to the poster image to show it in fullscreen
        var posterImage = document.querySelector('.home-hero-image');
        if (posterImage) {
            posterImage.addEventListener('click', showFullscreenPoster);
        }
    });