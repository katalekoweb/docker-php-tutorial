# Docker Tutorial
## Image
An image is a blueprint for container

An image must exist in order for docker to know whta to build and how to build it

## Build an image
docker build -t juliaokataleko:php81 -f php/Dockerfile .

## Open Docker Shell
docker exec -it [container-name - docker-php-tutorial-web-1] sh