#!/usr/bin/env sh

# npx browserslist --update-db

npx @api-platform/client-generator http://laravel.localhost/docs src/ --format swagger --resource adres

# node_modules/.bin/generate-api-platform-client http://laravel.localhost/docs src/ --format swagger