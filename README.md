# Flickr Mini Gallery App
Flickr Mini Gallery App is a test project developed only for non-commercial use.
The app is developed in PHP 7 and uses HTML5 and CSS3. Bootstrap 3 is used as css templating engine. 
The project structure & setup is inspired from Laravel Framework. The coding style follows PSR-2 standards.

### Libraries used
* [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) - Dotenv library to manage environment file
* Bootstrap 3
## Prerequisites
You need to obtain Flickr api key through Flickr API page first. After obtaining the key, simply copy and paste it to the .env file of the project.

```
FLICKR_API_KEY=your-api-key-here
```

## Instructions for installing the app on local machine 
1. Clone the repo
2. There are two options to run the app which is discussed below.

### Option 1 - Using built-in PHP server
First, run the following command in terminal to install all the dependencies of the project. 

```
composer install
```

Now, you can run the app by typing php -S localhost:8080 -t public/ on the terminal. Visit localhost:8080/ on your browser to open the app.

### Option 2 - Using Docker
You need to have docker installed on your machine before proceeding with the following steps.
* On the root of the project, type 
```
docker build -f docker/Dockerfile [image-name]:[tag] . [tag is optional]
```

* After the image is built, you can run the docker container from that image by using the command below. 
```
docker run -d -p 8080:80 -t [image-name]:[tag] [tag is optional]
```

* Now visit localhost:8080/ on the browser to see the app running via docker.

## Deployment
You can deploy the project to staging or production either normally by hosting on Apache2 or Nginx server of your choice or if you prefer containerization then you can run the project as docker container. Additionally, you can set it up as a service in container orchestration services like docker-compose or docker swarm. 

### Enjoy the app