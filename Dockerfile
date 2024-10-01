FROM ubuntu:22.04

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql && \
    a2enmod rewrite

# Создание пользователя и группы www-data, если они отсутствуют
RUN groupadd -g 33 www-data || true && \
    useradd -u 33 -g www-data -d /var/www -s /usr/sbin/nologin www-data || true

COPY ./website /var/www/html

# Установка правильного владельца и прав доступа
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]