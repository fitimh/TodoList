# Vue 3 + Vite

This template should help get you started developing with Vue 3 in Vite. The template uses Vue 3 `<script setup>` SFCs, check out the [script setup docs](https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup) to learn more.

## Recommended IDE Setup

- [VS Code](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar)


### Features

- Vue Router Included.
- Bootstrap 5.
- Modules/Components organized across folders.
- Pre-configured with code quality tools: Prettier, vetur.
- Basic tests included.

### Directory Structure

| Name                              | Description |
| --------------------------------- | ----------- |
| **build/**                        | Compiled source files will be placed here. |
| **public/**                       | Static assets (fonts, css, js, img). |
| **src/**                          | Source files. |
| **src/components**                | Vue components including shared (common) components. |
| **src/modules**                   | Views - screen components. |
| **src/routes**                    | Application routes. |
| **src/store**                     | Vuex state management. |



## Quick start

### Download

* Clone this repo `git clone https://github.com/fitimh/TodoList.git`

### Build tools

The theme includes a custom Webpack file, which can be used to quickly recompile and minify theme assets while developing or for deployment. You'll need to install Node.js before using Webpack.

Once Node.js is installed, run npm install to install the rest of TodoList's dependencies. All dependencies will be downloaded to the node_modules directory.

```sh
npm install
```

Now you're ready to modify the source files and generate new dist/ files. TodoList uses webpack-dev-server to automatically detect file changes and start a local webserver at http://localhost:3000.

```sh
npm start
```

Compile, optimize, minify and uglify all source files to dist/ folder:

```sh
npm run build
```


### Install Package
```sh
npm install --save
    "@dafcoe/vue-notification": "^0.1.6",
    "@yaireo/tagify": "^4.14.0",
    "axios": "^0.27.2",
    "jquery": "^3.6.0",
    "url": "^0.11.0",
    "vue": "^3.2.33",
    "vue-draggable-next": "^2.1.1",
    "vue-router": "^4.0.16",
    "vuex": "^4.0.2"
```
```
bootstrap 5
   <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
         crossorigin="anonymous"
      />
      
Font Awesome
      
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer"
      />

```


