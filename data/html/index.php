<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docker</title>
    <link rel="stylesheet" href="/css/bulma.min.css">
</head>

<body>
    <section class="hero is-medium is-info is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    LAMP + POSTGRES (optional) STACK
                </h1>
                <h2 class="subtitle">
                    Your local development environment.
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <p>
                The directory /home/username/Desktop/proyectos is linked with /proyectos in container, this cotains
                all project in same docker container.
            </p>
            <p>For phpMyAdmin you can access with user root and password prueba:</p>
            <br />
            <code><a href="http://localhost/db">http://localhost/db</a></code>
            <p>
                Each public folder must be linked to the /var/www/html directory so they can be entered as
                http://localhost/proyectname
                example:
                <br />
                <code>docker exec -it lamp ln -s /proyectos/blog/public /var/www/html/blog</code>
                <br />
                Then you can enter to blog application by http://localhost/blog
            </p>
            <h3>How to install more PHP extensions</h3>
            <p>
                Many extensions are already compiled into the image, so it's worth checking the output of php -m or php
                -i before going through the effort of compiling more.
            </p>
            <p>

                We provide the helper scripts docker-php-ext-configure, docker-php-ext-install, and
                docker-php-ext-enable to more easily install PHP extensions.
            </p>
            <p>
                You can install using<br />
                <code>docker exec -it lamp docker-php-ext-install extensionname</code>
            </p>
            <p>
                You can install phpMyAdmin<br />
                <code>
docker exec -it lamp wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.zip --directory-prefix=/var/www/html<br/>
docker exec -it lamp unzip /var/www/html/phpMyAdmin-5.0.2-all-languages.zip -d /var/www/html<br/>
docker exec -it lamp rm /var/www/html/phpMyAdmin-5.0.2-all-languages.zip<br/>
docker exec -it lamp mv /var/www/html/phpMyAdmin-5.0.2-all-languages /var/www/html/db<br/>
docker exec -it lamp mv /var/www/html/db/config.sample.inc.php /var/www/html/db/config.inc.php<br/>
docker exec -it lamp sed -i 's/localhost/mysql/g' /var/www/html/db/config.inc.php<br/>
docker exec -it lamp chown user:user -R /var/www/html/db<br/>
                </code>
            </p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h3 class="title is-3 has-text-centered">Environment</h3>

                    <div class="content">
                        <hr style="width: 100%">
                        <ul>
                            <li><?= apache_get_version(); ?>
                            </li>
                            <li>PHP <?= phpversion(); ?>
                            </li>
                            <li>
                                <?php
                                    $mysql_user = 'root';
                                    $mysql_password = 'prueba';
                                    $link = mysqli_connect("mysql1", $mysql_user, $mysql_password, null);
                                    /* check connection */
                                    if (mysqli_connect_errno()) {
                                        printf("MySQL connecttion failed: %s", mysqli_connect_error());
                                    } else {
                                        /* print server version */
                                        printf("MySQL OK user: %s password: %s", $mysql_user, $mysql_password);
                                        echo "<br/>";
                                        printf("MySQL Server %s", mysqli_get_server_info($link));
                                    }
                                    /* close connection */
                                    mysqli_close($link);
                                    ?>
                            </li>
                        </ul>
                        <hr style="width: 100%">
                        <?php phpinfo();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>