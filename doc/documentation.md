<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

/auth

    This folder contains all necessities for login and register.

    login.php - the page for the login
    loginbackend.php - backend and db handling of the login
    loginstyle.css - stylesheet of login-page

    logout.php - Session destroyer aka- logout
    register.php - Mask for signing up to the page. 


    registerbackend.php backend of sign up. Here the new account will be created and stored to the database. This page also sends the confirmation email.
    registerstyle.css - Stylesheet of the registerpage

    verify.php - verifies email adress and sets account confirmation variable true in db. 


/doc
    
    concept.md - explains concept of norvi
    documentation.md - this file right here
    resume.md - what i learned during creating norvi

/img 

    contains all images uploaded by users
    also contains the map icons

/map

    addMarker.php - This is the mask for creating a new marker on the map
    addMarkerBackend.php - Backend file for saving all data into database.
    addMarkerStyle.css - Stylesheet for the Addmarker Mask.
    upload.php - uploader for the images
    help.php a helper for people who don´t quite get the upload formular
    map.php - main map. all markers are displayed here, 
    stylesheet.css -main stylesheet for the map.php

/public
        all files which are initally visible are stored here
        about.php - The about section of norvi
        aboutstyle.css - Styling of about Section
        contact.php - Contact Formular for users
        contactstyle.css - Styling of Contact formular
        index.php mainpage of the page. Here you can warm up at a campfire
        stylesheet.css is the general stylesheet of index.php
        toc.php Terms and conditions proudly provided by termly. 
        whatisthis.php is a general introduction for the user what norvi can do



Known Bugs:
Displayphoto row 190 throws invalid due to spaces in path. Can not encode this properly. I have to choose between a non working link and a
valid file. I`ve chose the first option and looking forward to receive a feedback about that. Not only will the photo not show, but also the EXIF data will not be read properly due to a "wrong" path.

