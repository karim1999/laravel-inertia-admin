import MainLayout from "./Layouts/Main";
require('./bootstrap');
import React from 'react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress'
import regeneratorRuntime from "regenerator-runtime";
import './App.scss';

InertiaProgress.init()
createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        const layout= (page) => (<MainLayout children={page}/>)
        page.layout = page.layout || layout
        return page
    },
    setup({ el, App, props }) {
        render(<App {...props} />, el)
    },
})
