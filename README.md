# docker-c51
## Installing the app using Docker
1. Download docker at "https://www.docker.com/products/docker-desktop" and install 
2. Clone/download the docker-c51 repo
3. Using terminal navigate to /docker folder inside the repo
4. Run ```docker-compose up --build```


It'd take a serveral minutes for docker to download all the necessary packages. After the installation is done. You should see the message "NOTICE: ready to handle connections".
Now you see the app running at "http://localhost"


## Installing the app using local server/php and mysql
1. You need to have a local mysql service running (MAMp provides a free version that is easy to run)
2. Clone/download the docker-c51 repo
2. Navigate inside the /src folder
3. edit .evv file and change following line with using your local mysql creds
```DATABASE_URL="mysql://appUser:secret@database:3306/symfony?serverVersion=5.7"```
4. Run ```composer install```
5. Run ```php bin/console doctrine:database:create```
6. Run ```php bin/console doctrine:migrations:migrate```
7. Run ```mv /root/.symfony/bin/symfony /usr/local/bin/symfony```
8. Run ```symfony server:start```

## How it works?
Docker will create 3 containers on your local computer that is needed to run a php mvc web framwork
- PHP-FPM (to run a php application)
- Nginx (Server)
- MySQL (database)

The containers will use a shared network component to talk to each other. 

After the components are ready, docker will use "composer" to install the symfony's dependencies. 
Then it'll run the symfony's doctrine migrations to create the database "symfony", and table "offer" inside it and populates the table using the c51.json file located inside the data folder within the app.


