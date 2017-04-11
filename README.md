# ss-docker-setup
Clones down a runnable docker Silverstripe environment. This sets up an eco-system with a database, a web-server (PHP + Apache) and a PHPMyAdmin container so you can access your database. A reverse nginx-proxy container is also used to provide virtual host names functionality.

# Setup
1. Install [Composer](https://getcomposer.org/download/) and [Docker](https://docs.docker.com/engine/getstarted/step_one/)  
2. Then run `composer create-project -s dev fspringveldt/ss-docker-setup <desired-folder-name>`. This pulls down the project and all it's files.
3. Edit the file named .env as below in your project's root directory, adding values after the equals signs
```txt
MYSQL_ROOT_PASSWORD=
MYSQL_DATABASE=
MYSQL_USER=
MYSQL_PASSWORD=
XDEBUG_REMOTE_HOST=
SS_ADMIN_USER=
SS_ADMIN_PASSWORD=
SS_ENVIRONMENT=
PMA_VIRTUAL_HOST=
DB_VIRTUAL_HOST=
SS_VIRTUAL_HOST=
```
4. Edit your local hosts file (/etc/hosts on -nix systems) to point values given for PMA_VIRTUAL_HOST, DB_VIRTUAL_HOST and SS_VIRTUAL_HOST (defined in .env file above) to docker vm ip address
5. Run `cd <desired-folder-name>`
6. Run `docker-compose build` to build the images
7. Once built, run `docker-compose up -d` to fire them up. To take them down run `docker-compose down`, adding a -v flag to remove any mounts.

Once you're setup you can shell into your ss-site container as such: `docker exec -ti ss-site /bin/bash` from whence you can run all your PHP CLI commands (git clone, composer create-project, etc.)
