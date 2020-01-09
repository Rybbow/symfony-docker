FROM node:lts-alpine

WORKDIR /srv/app

COPY docker/nodejs/docker-entrypoint.sh /usr/local/bin/docker-app-entrypoint
RUN chmod +x /usr/local/bin/docker-app-entrypoint

ENTRYPOINT ["docker-app-entrypoint"]
CMD ["yarn", "encore", "dev", "-w"]

