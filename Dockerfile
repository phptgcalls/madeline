FROM hub.madelineproto.xyz/danog/madelineproto:latest


ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions \
 && install-php-extensions uv \
 && rm /usr/local/bin/install-php-extensions

WORKDIR /app

COPY . /app

RUN ls -la /app || true

CMD ["php", "/app/bot.php"]
