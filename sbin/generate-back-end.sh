#!/usr/bin/env sh

MODEL_NAME=Person
TABLE_NAME=persons

php artisan migrate
php artisan api-platform:generate
# @todo
php artisan infyom:api $MODEL_NAME --fromTable --tableName=$TABLE_NAME --prefix=Politie
npx browserslist --update-db