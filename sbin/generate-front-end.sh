#!/usr/bin/env sh

npx @api-platform/client-generator http://localhost/api src/ --resource Afbeelding  --format swagger

node_modules/.bin/generate-api-platform-client http://localhost/docs src/ --format swagger