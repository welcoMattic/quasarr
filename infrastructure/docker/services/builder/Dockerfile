ARG PROJECT_NAME

FROM ${PROJECT_NAME}_php-base

RUN apk add --no-cache \
    curl \
    g++ \
    git \
    make \
    nodejs \
    npm \
    php7-phar \
    py3-pip \
    python3 \
    yarn

RUN pip install pycodestyle

COPY --from=composer:2.0.7 /usr/bin/composer /usr/bin/composer

RUN mkdir -p ~/.composer

ENV PATH $PATH:/home/app/.composer/vendor/bin/
ENV TERM xterm

WORKDIR /home/app/application

CMD ["echo"]
