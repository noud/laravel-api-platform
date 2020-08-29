# [front end](http://en.wikipedia.org/wiki/Front_end_and_back_end)s from [ER model](http://en.wikipedia.org/wiki/Entity%E2%80%93relationship_model)

This Laravel PHP package is [code generation](http://en.wikipedia.org/wiki/Code_generation_(compiler)) from ER model to [Swagger](http://swagger.io) [OpenAPI](http://swagger.io/resources/open-api) [API](http://en.wikipedia.org/wiki/API) [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) [back end](http://en.wikipedia.org/wiki/Front_end_and_back_end).

## Generated [API-Platform](http://api-platform.com) compatible front ends

The resulting back end is partly API-Platform compatible so there front end [client generator component](http://api-platform.com/docs/client-generator) works.

* [REST](http://en.wikipedia.org/wiki/REST)
    * [JSON](http://en.wikipedia.org/wiki/JSON)
        * [Swagger](http://swagger.io) [OpenAPI](http://swagger.io/resources/open-api)
            * [React](http://reactjs.org)
                * [CRA](http://create-react-app.dev)
                    <!-- - [React-Admin](http://marmelab.com/react-admin) [example](http://github.com/noud/react-admin-openapi/blob/master/README.md) -->
                    - [Redux](http://redux.js.org) [PWA](http://en.wikipedia.org/wiki/Progressive_web_applications), [mobile app example](http://github.com/noud/react-redux-openapi-politie/blob/master/README.md)
                <!-- - [Next.js](http://nextjs.org) [Express](http://expressjs.com) [front end example](http://github.com/noud/react-next-express-openapi/blob/master/README.md) -->
            <!-- - [Vue.js](http://vuejs.org) [Single-page application (SPA)](http://en.wikipedia.org/wiki/Single-page_application), [web application or site example](http://github.com/noud/vue-openapi/blob/master/README.md) -->

## Workflow

```
composer install noud/laravel-api-platform
```

Use [erd-js](https://github.com/noud/erd-js) to transform the .er to React.js Entity-relationship diagram front end .json.
```
cd ../erd-js && npm transform
```

Import in React.js Entity-relationship diagram front end

Export Laravel databases migrations

```
php artisan migrate
php artisan api-platform:generate
```

## Depends on packages

* [CORS Middleware for Laravel](https://github.com/fruitcake/laravel-cors)
* [InfyOm Laravel Generator](http://github.com/infyomlabs/laravel-generator)
    * [Swagger Generator](http://github.com)
* [Laravel/Lumen schema builder](http://github.com/Agontuk/schema-builder)

# [📁 Portfolio](http://github.com/noud/portfolio#portfolio-repositories-index)