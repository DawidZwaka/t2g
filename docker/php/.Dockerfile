FROM php:8.3.2-apache

RUN apt-get update && \
    apt-get install -y nodejs npm
