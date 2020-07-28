# DOCKER COMPOSE LAMP + POSTGRES (optional)

Development environment with basic tools for PHP / MySQL + POSTGRES (optional)


You can see bin/lamp/Dockerfile to install extensions php or other libraries for build container.

You will need to copy sample.env to .env and replace the corresponding values ​​with the ones you want.

First make directory ex. /home/username/Desktop/proyectos 
```
mkdir /home/username/Desktop/proyectos
```

```
cd /home/username/Desktop/proyectos
```

Clone this repo.
```
git clone https://github.com/lbr-linux/docker-compose-lamp
```
```
cd docker-compose-lamp
```

Copy .env file to build Dockerfile, you can modify environments vars as MYSQL_PASSWORD in .env 

```
cp sample.env .env
```


Start the instance
```
docker-compose up
```

If everything is ok you can open the browser in
```
http://localhost/
```


The directory /home/username/Desktop/proyectos is linked with /proyectos in container, this cotains all project in same docker container.

Each public folder must be linked to the directory /var/www/html and to see it in http://localhost/proyectname

example: 

```
docker exec -it lamp ln -s /proyectos/blog/public /var/www/html/blog
```

Then you can enter to blog application by http://localhost/blog
