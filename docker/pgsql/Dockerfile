# vim:set ft=dockerfile:
FROM postgres:13

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -yqq \
    git \
    make \
    gcc \
    libsodium-dev \
    postgresql-server-dev-13 \
    sudo \
    systemd