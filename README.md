# Docker Wp Boilerplate

A Wordpress Skeleton with a collection of basic patterns / defaults to aid in building out sites for portfolio / art / photography / gallery applications.

Plugin Dependencies:
+ Advanced Custom Fields Pro

Plugin Suggestions - Need License:
+ Advanced Custom Fields: Theme Code Pro
    Generates theme code for ACF Pro field groups to speed up development. A real time saver when building out additional featutres.
+	Enhanced Media Library PRO
    This plugin will be handy for those who need to manage a lot of media files.
+ WP Migrate DB Pro
    Export, push, and pull to migrate your WordPress databases. Kinda essential for pushing between local, staging, production.

Plugin Suggestions - Free (DONATE!):
+ Enable Media Replace
    Enable replacing media files by uploading a new file in the "Edit Media" section of the WordPress Media Library.
+ Intuitive Custom Post Order
    Intuitively, Order Items( Posts, Pages, ,Custom Post Types, Custom Taxonomies, Sites ) using a Drag and Drop Sortable JavaScript.
+ Media Cloud
    Automatically upload media to Amazon S3 and integrate with Imgix, a real-time image processing CDN. Boosts site performance and simplifies workflows. I use Digital Ocean Spaces along with KeyCdn for image delivery and this plugin works great.

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

The super awesome docker compose file / docker image by: [visiblevc](https://github.com/visiblevc/wordpress-starter)

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
