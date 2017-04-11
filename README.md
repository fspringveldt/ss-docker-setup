# ss-docker-setup
Clones down a runnable docker Silverstripe environment.

# Setup
1. Install docker by [following this guide.](https://docs.docker.com/engine/getstarted/step_one/)  
2. Then run `composer create-project -s dev fspringveldt/ss-docker-setup <desired-folder-name>`
3. Run `cd <desired-folder-name>`
4. Run `docker-compose build` to build the images
5. Once built, run `docker-compose up -d` to fire them up. To take them down run `docker-compose down`, adding a -v flag to remove any mounts.

