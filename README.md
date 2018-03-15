# Docker Wp Boilerplate

Give your next Wordpress project a jump start.

## TO GET GOING

FORK THIS

Do a find and replace of 'docker-wp-boilerplate' with 'your-theme-name'

this includes the actual theme folder -> ./wp/docker-wp-boilerplate

## Local Development Environment Runs on Docker using Docker-Compose
Download and install Docker: [https://www.docker.com/get-docker](https://www.docker.com/get-docker)
    
    to run:
    docker-compose up
    
    to stop:
    docker-compose down


To access Local Site: http://localhost:8080/

To access PHPMYADMIN: http://localhost:22222

The super awesome docker compose file / docker image by: [https://github.com/visiblevc/wordpress-starter](visiblevc)

## Development & Deployment Commands.

    install node modules:
    yarn

    to run build watch for both js and sass:
    yarn dev
    
    to run final build with Uglify:
    yarn build

    to deploy via sftp to staging:
    yarn deploy-staging

    to deploy via sftp to production:
    yarn deploy-production
