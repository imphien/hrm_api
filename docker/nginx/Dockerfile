FROM nginx:1.25.4

ARG PHP_FPM_SERVER=127.0.0.1
ARG PHP_FPM_PORT=9000

WORKDIR /var/www/html

COPY docker/nginx/nginx.conf /tmp/nginx.conf
RUN envsubst '$PHP_FPM_SERVER $PHP_FPM_PORT' < /tmp/nginx.conf > /etc/nginx/conf.d/default.conf

EXPOSE 80 443
CMD ["nginx", "-g", "daemon off;"]
