#!/usr/bin/env sh

MODEL_NAME=Person
TABLE_NAME=persons

php artisan migrate
# @todo
php artisan infyom:api $MODEL_NAME --fromTable --tableName=$TABLE_NAME