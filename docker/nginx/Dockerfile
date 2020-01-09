FROM nginx

COPY docker/nginx/symfony.conf /etc/nginx/conf.d/
COPY docker/nginx/upstream.conf /etc/nginx/conf.d/
RUN rm /etc/nginx/conf.d/default.conf

