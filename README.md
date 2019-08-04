# Flickr Mini Gallery App
Flickr Mini Gallery App is a test project developed by the author only for non-commercial use.
The app is developed in PHP 7, HTML5 and CSS3. Bootstrap 3 is used for templating purposes.
The coding style follows PSR-2 standards.

## Instructions for installing the app on local 
1. Clone the repo
2. There are two options to run the app which is discussed below.

### Option 1 - Using built-in PHP server
First, run the composer install command in terminal to install all the dependencies of the project. Now, you can run the app by typing php -S localhost:8080 -t public/ on the terminal. Visit localhost:8080/ on your browser to open the app.

### Option 2 - Using Docker
You need to have docker installed on your machine before proceeding with the following steps.
1. On the root of the project, type docker build -f docker/Dockerfile <image-name>:<tag> . [tag is optional]
2. After the image is built, you can run the docker container from that image by typing docker run -d -p 8080:80 -t <image-name>:<tag> [tag is optional]
3. Now visit localhost:8080/ on the browser to see the app running via docker.

##Enjoy the app